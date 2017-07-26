<?php

class Service {
	public function test() {
		return time();
	} 
	public function add($a,$b) {
		return $a + $b;
	}
	
	public function set($a,$b){
		return $a * $b;
	}
}

