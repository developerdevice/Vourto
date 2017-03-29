<?php

require_once "../autoload.php";

//example1.php?name=mauro

$create = Prop::exec(
	$_GET,
	array("profile" => array(
		"name" => array(
		"minlegth" => array("value" => 4, "callback" => "Name must be at least 4 characters"),
		"pattern"  => array("value" => '/^David/', "callback" => "Name must be \"David\" "),
		"callback" => "Name cannot be empty"
		)
	)),
	function(){
		//do anything
});

echo $create->getStd();

$create->close();