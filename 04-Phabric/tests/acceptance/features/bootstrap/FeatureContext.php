<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';

require_once __DIR__ . '/../../../../vendor/autoload.php';
   
/**
 * Features context.
 */
class FeatureContext extends BehatContext
{

    protected $service;
    
    protected $result;
    
    protected static $db;
    
    protected static $dataDir;

    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param   array   $parameters     context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        
        $path = __DIR__ . '/' . $parameters['database']['dbPath'];
        
        $params = array(
            'user' => $parameters['database']['username'],
            'password' => $parameters['database']['password'],
            'driver' => $parameters['database']['driver'],
            'path' => $path,
        );

        $con = \Doctrine\DBAL\DriverManager::getConnection($params);

        // Used for all the UI testing steps.
        $this->useContext('mink', new Behat\MinkExtension\Context\MinkContext($parameters));
        
        // Used for Phabric set up and Phabric steps.
        $this->useContext('PhabricContext', new PhabricContext($parameters, $con));
        
        self::$db = $con;
        self::$dataDir = __DIR__ . '/' . $parameters['database']['dataPath'];

    }

    /**
     * @BeforeSuite
     */
    public static function createDB()
    {
        $fileName = self::$dataDir . 'init.sql';
        self::executeQueriesInFile($fileName);
        
    }
    
    /**
     * @BeforeScenario
     */
    public static function resetDB()
    {
        $fileName = self::$dataDir . 'truncate-data.sql';
        self::executeQueriesInFile($fileName);
    }

    /**
     * @Given /^there is confernece data in the database$/
     */
    public function thereIsConferneceDataInTheDatabase()
    {
        $fileName = self::$dataDir . 'sample-conf-session-data.sql';
        self::executeQueriesInFile($fileName);
    }

    /**
     * @When /^I use the findConferences method$/
     */
    public function iUseTheFindConferencesMethod()
    {
        $this->result = $this->conferenceService->findConferences();
        
    }

    
    protected static function executeQueriesInFile($path)
    {
        $sql = file_get_contents($path);
        $queries = explode('|', $sql);
        
        foreach($queries as $q)
        {
            self::$db->query($q);
        }
    }
    
    /**
     * @When /^I wait for the suggestion box to appear$/
     */
    public function iWaitForTheSuggestionBoxToAppear()
    {
        $this->getSession()->wait(5000,
            "$('.suggestions-results').children().length > 0"
        );
    }
    
}
