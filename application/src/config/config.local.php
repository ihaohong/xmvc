<?php

return [
	// 'debug' => 1,

	'path' => [
		'rootPath' => ROOT_PATH,
		'appPath' => ROOT_PATH.'application/',
		'viewPath' => ROOT_PATH.'application/src/views/',
	],

	'url' => [

	],

	'db' => [
		'master' => [
			'host' => '127.0.0.8',
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