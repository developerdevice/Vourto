<?php

class Prop
{
	static function exec($type, $escope, callable $onsuccess = null){
		return new Fn($type, $escope, $onsuccess);
	}
}