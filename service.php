<?php

require "src/GpioService.php";

$gpio = new GpioService();

if(isset($_GET['action']) && $_GET['action'] == "on") {
	$gpio->setup($_GET["pin"], "out");
	$gpio->digitalWrite(24, GpioService::IO_HIGH);

	$return = [
		'status'  => 'high',
		'message' => 'LED is on!'
	];

	echo json_encode($return);
	exit();
}
elseif (isset($_GET['action']) && $_GET['action'] == "off") {
	$gpio->setup($_GET["pin"], "out");
	$gpio->digitalWrite(24, GpioService::IO_LOW);

	$return = [
		'status'  => 'low',
		'message' => 'LED is off!'
	];

	echo json_encode($return);
	exit();
}
else {
	$result = $gpio->digitalRead($_GET['read']);
	if($result === "1") {
		$return = [
            'status'  => 'high',
        	'message' => 'LED is on!'
    	];
	}
	else {
		$return = [
        	'status'  => 'low',
	        'message' => 'LED is off!'
        ];
	}

	echo json_encode($return);
    exit();
}
