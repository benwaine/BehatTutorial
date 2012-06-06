<?php 

// Usefull Headers can be found here: http://php.net/manual/en/function.header.php

// Fake getting an individual user
// Use headers and json_encode an array of data
ini_set('display_errors', 1);
$user = new stdClass();

$user->username = 'benwaine';

header('Status: 200');
$response = json_encode($user);

echo $response;

die;