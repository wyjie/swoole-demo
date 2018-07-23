<?php

	$http = new swoole_http_server('0.0.0.0', 9501);

	$http->on('request', function ($request, $response) {
		$response->end('<h1>Hello, '. $request->get('name'); .'</h1>');
	}); 

	$http->start();