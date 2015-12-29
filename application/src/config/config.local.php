<?php

return [
	// 'debug' => 1,

	'dir' => [
		'log' => ROOT_PATH.'application/logs/',
	],

	'url' => [

	],

	'db' => [
		'master' => [
			'host' => '127.0.0.1',
			'username' => 'root',
			'password' => '114477',
			'dbname' => 'mvc',
			'charset' => 'utf8'
		],
		'slave' => [
			'host' => '127.0.0.1',
			'username' => 'root',
			'password' => '114477',
			'dbname' => 'mvc',
			'charset' => 'utf8'
		],
	],
];