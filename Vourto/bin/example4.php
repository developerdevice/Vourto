<?php

require_once "../autoload.php";

//example1.php?id=21a

$create = Prop::exec(
	$_GET,
	array("profile" => array(
		"id" => array(
		"minlegth" => array("value" => 4, "callback" => "ID must be at least 4 characters"),
		"type" => array("value" => "numeric", "callback" => "ID must be numerical"),
		"callback" => "ID cannot be empty"
		)
	)),
	function(){
		header("location: example3.php?id={$_GET["id"]}");
});

echo $create->getStd();

$create->close();