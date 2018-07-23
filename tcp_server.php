<?php
	
	//init server object
	$serv = new swoole_server('127.0.0.1', 9501, SWOOLE_PROCESS, SWOOLE_SOCK_TCP);

	//set run
	$serv->set([
		'worker_num' => 4,
		'request' => 1000
	]);

	//register callback
	$serv->on('Connect', function ($serv, $fd) {
    	echo "Client-{$fd}: Connect." . PHP_EOL;
	});

	$serv->on('Receive', function ($serv, $fd, $from_id, $data) {
	    $serv->send($fd, 'Swoole: ' . $data . PHP_EOL);
	});

	$serv->on('Close', function ($serv, $fd) {
	    echo "Client: Close." . PHP_EOL;
	});

	$serv->start();

