<?php
namespace PHPCon\Session;

class Service 
{

    protected $mapper;
    
    public function __construct($mapper) 
    {
        $this->mapper = $mapper;
    }
    
    public function findSessions($conferenceId)
    {
        return $this->mapper->fetchByConferenceId($conferenceId);
    }

    
}


