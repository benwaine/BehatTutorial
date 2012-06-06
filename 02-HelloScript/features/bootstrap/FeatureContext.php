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
//

require_once __DIR__ . '/../../vendor/autoload.php';

/**
 * Features context.
 */
class FeatureContext extends BehatContext
{
    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param   array   $parameters     context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
       
    }

    /**
     * @Given /^I am in the src directory$/
     */
    public function iAmInTheSrcDirectory()
    {
        $path = __DIR__ . '/../../src';
        chdir($path);
    }

    /**
     * @When /^I execute the hello command$/
     */
    public function iExecuteTheHelloCommand($name = null)
    {
        $output = exec("php command.php"); 
        
        $this->output = $output;
    }

    /**
     * @When /^I execute the hello command with "([^"]*)"$/
     */
    public function iExecuteTheHelloCommandWith($name)
    {
        $output = exec("php command.php $name");

        $this->output = $output;
    }


    /**
     * @Then /^I should see:$/
     */
    public function iShouldSee(PyStringNode $string)
    {
        if ((string) $string !== $this->output) {
            throw new Exception(
                "Actual output is:\n" . $this->output
            );
        }
    }

}
