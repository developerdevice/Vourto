<?php

interface AppInterface
{
	public function __construct($type, $escope, callable $success = null);
	public function getStd();
	public function close();
}

class Fn extends Config implements AppInterface
{
	protected $type;
	protected $escope;
	protected $onsuccess;
	
	public function __destruct(){}
	
	public function __construct($type, $escope, callable $onsuccess = null){
		$this->type = $type;
		$this->escope = $escope;
		$this->onsuccess = $onsuccess;
	}
	
	public function getStd(){
		try{
			if(!array_key_exists("profile", $this->escope)):
				throw new Exception(parent::report("profile_err"));
			elseif(!is_array($this->type)):
				throw new Exception(parent::report("type_err"));
			else:
				foreach($this->escope as $i => $j):
					foreach(array_keys($j) as $dump):
						if(!array_key_exists($dump, $this->type)):
							if(array_key_exists("callback", $this->escope["profile"][$dump])):
								throw new Exception($this->escope["profile"][$dump]["callback"]);
							else:
								throw new Exception("notice: undefined callback at ${dump}");
							endif;
						else:
							if(array_key_exists("minlegth", $this->escope["profile"][$dump])):
								if(!is_int($this->escope["profile"][$dump]["minlegth"]["value"])):
									throw new Exception("notice: ${dump}::minlegth isn't integer");
								else:
									if(strlen($this->type[$dump]) < $this->escope["profile"][$dump]["minlegth"]["value"]):
										if(array_key_exists("callback", $this->escope["profile"][$dump]["minlegth"])):
											throw new Exception($this->escope["profile"][$dump]["minlegth"]["callback"]);
										else:
											throw new Exception("notice: undefined callback at ${dump}");
										endif;
									endif;
								endif;
							endif;
							if(array_key_exists("maxlegth", $this->escope["profile"][$dump])):
								if(!is_int($this->escope["profile"][$dump]["maxlegth"]["value"])):
									throw new Exception("notice: ${dump}::maxlegth isn't integer");
								else:
									if(strlen($this->type[$dump]) > $this->escope["profile"][$dump]["maxlegth"]["value"]):
										if(array_key_exists("callback", $this->escope["profile"][$dump]["maxlegth"])):
											throw new Exception($this->escope["profile"][$dump]["maxlegth"]["callback"]);
										else:
											throw new Exception("notice: undefined callback at ${dump}");
										endif;
									endif;
								endif;
							endif;
							if(array_key_exists("pattern", $this->escope["profile"][$dump])):
								if(!is_string($this->escope["profile"][$dump]["pattern"]["value"])):
									throw new Exception("notice: ${dump}::pattern isn't string");
								else:
									//$closure = str_replace('/', '\/', $this->escope["profile"][$dump]["pattern"]["value"]);
									//$pattern = '/^' . $closure . '$/';
									if(!preg_match($this->escope["profile"][$dump]["pattern"]["value"], $this->type[$dump])):
										if(array_key_exists("callback", $this->escope["profile"][$dump]["pattern"])):
											throw new Exception($this->escope["profile"][$dump]["pattern"]["callback"]);
										else:
											throw new Exception("notice: undefined callback at ${dump}");
										endif;
									endif;
								endif;
							endif;
							if(array_key_exists("type", $this->escope["profile"][$dump])):
								if($this->escope["profile"][$dump]["type"]["value"] == "numeric"):
									if(!is_numeric($this->type[$dump])):
										if(array_key_exists("callback", $this->escope["profile"][$dump]["type"])):
											throw new Exception($this->escope["profile"][$dump]["type"]["callback"]);
										else:
											throw new Exception("notice: undefined callback at ${dump}");
										endif;
									endif;
								endif;
								if($this->escope["profile"][$dump]["type"]["value"] == "double"):
									if(!is_double($this->type[$dump])):
										if(array_key_exists("callback", $this->escope["profile"][$dump]["type"])):
											throw new Exception($this->escope["profile"][$dump]["type"]["callback"]);
										else:
											throw new Exception("notice: undefined callback at ${dump}");
										endif;
									endif;
								endif;
							endif;
						endif;
					endforeach;
				endforeach;
			endif;
			if($this->onsuccess !== null):
				throw new Exception(call_user_func($this->onsuccess, array())); //if all things is ok
			else:
				throw new Exception(true);
			endif;
		}catch(Exception $e){
			return $e->getMessage();
		}
	}
	
	public function close(){
		foreach(get_object_vars($this) as $var):
			unset( $var );
		endforeach;
	}
}
