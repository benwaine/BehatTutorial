<?php 

if(isset($_SERVER['argv'][1]))
{
	$name = $_SERVER['argv'][1];
}
else
{
	$name = "stranger"; 
}

echo 'Hello ' . $name . PHP_EOL;