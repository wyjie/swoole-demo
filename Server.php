<?php

	interface ServerIns()
	{
		private bind();

		private open($server, $request);

		private message($server, $frame);

		private close($server, $fd);

		private start();
	}