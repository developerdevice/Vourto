<?php

require_once "../autoload.php";

//example1.php?id=1

$create = Prop::exec(
	$_GET,
	array("profile" => array(
		"id" => array()
	))
);

echo $create->getStd();

$create->close();