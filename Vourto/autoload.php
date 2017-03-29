<?php

spl_autoload_register(function($class){
	try{
		if(file_exists(__DIR__."/vendor/__class/${class}.class.php")):
			require_once __DIR__."/vendor/__class/${class}.class.php";
		else:
			error_reporting(0); //disables default error
			throw new Exception("Class ${class} not found");
		endif;
	}catch(Exception $e){
		echo $e->getMessage();
	}
});