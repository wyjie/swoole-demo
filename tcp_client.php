<?php

	//Tcp Client
	$client = new swoole_client(SWOOLE_SOCK_TCP);

	if (!$client->connect('127.0.0.1', 9501)) {
		exit('Connect Fail.' . PHP_EOL);
	}

	//php cli const
	fwrite(STDOUT, 'pls entery...' . PHP_EOL);
	$msg = trim(fgets(STDIN));

	// send msg to tcp server
	if (!$client->send($msg)) {
		exit('Send Fail.' . PHP_EOL);
	}

	$result = $client->recv();

	echo $result . PHP_EOL;