<?php

require_once "../autoload.php";

//example1.php?id=12&name=mauroalexandre

$create = Prop::exec(
	$_GET,
	array("profile" => array(
		"id" => array(
		"minlegth" => array("value" => 4, "callback" => "ID must be at least 4 characters"),
		"callback" => "ID cannot be empty"
		),
		"name" => array(
		"minlegth" => array("value" => 4, "callback" => "Name must be at least 4 characters"),
		"maxlegth" => array("value" => 5, "callback" => "Name must be a maximum of 11 characters"),
		"callback" => "Name cannot be empty"
		)
	))
);

echo $create->getStd();

$create->close();