<?php
namespace framework\component;

class DB
{
	private static $link = NULL;
	private static $instance = NULL;
	private $prefix;
	private $lastSql = NULL;


	private function __construct()
	{

	}

	public static function getInstance()
	{
		return 'db';
		if (isset(self::$link)) {
			return self::$link;
		} else {

		}
	}

	private function getMysqli()
	{
		if (isset($mysqli)) {
			return $mysqli;
		} else {
			$mysqli = mysqli_connect("localhost", "root", "114477", "test");
			/* check connection */ 
			if (mysqli_connect_errno()) {
			    printf("Connect failed: %s\n", mysqli_connect_error());
			    exit();
			}

			return $mysqli;
		}
	}
}