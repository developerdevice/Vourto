<?php

require_once "../autoload.php";

//example1.php?name=mauro

$create = Prop::exec(
	$_GET,
	array("profile" => array(
		"name" => array(
		"minlegth" => array("value" => 4, "callback" => "Name must be at least 4 characters"),
		"maxlegth" => array("value" => 5, "callback" => "Name must be a maximum of 11 characters"),
		"callback" => "Name cannot be empty"
		)
	)),
	function(){
		header("location: example3.php?name={$_GET["name"]}");
});

echo $create->getStd();

$create->close();