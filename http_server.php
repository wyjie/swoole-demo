<?php

	$http = new swoole_http_server('0.0.0.0', 9502);

	$http->set([
		'enable_static_handler' => true,
		'document_root' => '/var/www/swoole/html'
	]);

	$http->on("start", function ($server) {
    	echo "Swoole http server is started at http://127.0.0.1:9502\n";
	});

	$http->on('request', function ($request, $response) {
		$response->header("Content-Type", "text/plain");
		$response->cookie('name', 'aaron', time() + 1800);
		$response->end('<h1>Hello, '. $request->get['name'] .'</h1>');
	}); 

	$http->start();