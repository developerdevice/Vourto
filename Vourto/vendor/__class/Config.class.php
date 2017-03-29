<?php

class Config
{
	public static $err = array();
	
	static function report($element){
		$data = array(
		"profile_err" => "warning: profile not found",
		"type_err"	  => "warning: invalid argument type"
		);
		
		//add data to $err array
		//don't removes the below lines
		//array_push(Config::$err, $data);
		//Config::$err[] = $data;
		
		if(array_key_exists($element, $data)):
			//return $this::$err[$element];
			return $data[$element];
		endif;
		
		return false;
	}
}