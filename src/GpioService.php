<?php

/**
 * GpioService Class
 * This class used to easy integration PHP as Control within RaspberryPi
 * Aji Prastiya [aji.prastiya,ok@gmail.com]
 * Publised : Feb, 05 2017 16:43
 */

class GpioService {

	const IO_HIGH = "1";
	const IO_LOW  = "0";

	public function pinMode() 
	{
		// TODO define PIN number by physical board or BCM
	}

	/**
	 * setup()
	 * initialize direction PORT of PIN
	 * @param  int 		$pin 		Pin Number
	 * @param  string 	$direction 	type of POST direction ("in" or "out")
	 * @return void
	 */
	public function setup($pin, $direction) 
	{
		$cmd = "gpio -g mode {$pin} {$direction}";
		shell_exec($cmd);
	}

	/**
	 * digitalWrite()
	 * set value a PIN with 1 or 0
	 * @param  int 		$pin   	Pin Number
	 * @param  string 	$value 	Digital value ( 1 or 0 )
	 * @return void
	 */
	public function digitalWrite($pin, $value)
	{
		$cmd = "gpio -g write {$pin} {$value}";
		shell_exec($cmd);
	}

	/**
	 * digitalRead()
	 * get info of PIN
	 * @param  int 		$pin 	Pin Number
	 * @return mixed    		Normal case, the return is 0 or 1
	 */
	public function digitalRead($pin)
	{
		$cmd = "gpio -g read {$pin}";
		$res = shell_exec($cmd);
		return trim($res);
	}

	// TODO write analog value
	public function analogWrite(){}

	// TODO read analog value
	public function analogRead(){}
}
