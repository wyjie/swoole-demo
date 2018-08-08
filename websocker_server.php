<?php

	class SwooleWebSocket implements ServerIns
	{
		private $server;

		public function __construct ($host, $port)
		{
			$this->server = new swoole_websocket_server($host, $port);
			$this->bind();
			$this->start();
		}

		private function bind()
		{
			$this->server->on('open', [$this, 'open']);

			$this->server->on('message', [$this, 'message']);

			$this->server->on('close', [$this, 'close']);
		}

		private function open(swoole_websocket_server $server, $request)
		{
			echo "server: handshake success with fd{$request->fd}\n";
		}

		private function message(swoole_websocket_server $server, $frame)
		{
			echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";
		    $server->push($frame->fd, "This message is from swoole websocket server.");
		}

		private function close (swoole_websocket_server $server, $fd)
		{
			echo "client {$fd} closed\n";
		}

		private function start()
		{
			$this->server->start();
		}
	}

	new SwooleWebSocket('0.0.0.0', 8801);