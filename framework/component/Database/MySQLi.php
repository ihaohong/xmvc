<?php
namespace framework\component\Database;

use framework\core\DI;

class MySQLi implements IDatabase
{
	protected static $db;
	protected $conn;

	function __construct()
	{
		$config = (array)DI::get('config')->db->master;

		extract($config);
		$this->connect($host, $username, $password, $dbname);
	}

	function connect($host, $user, $password, $dbname)
	{
		$conn = mysqli_connect($host, $user, $password, $dbname);
		$this->conn = $conn;
	}

	function query($sql)
	{
		return $this->conn->query($sql);
	}
 

	function close()
	{
		$this->conn->close();
	}

	static function getInstance()
	{
		if (self::$db) {
			return self::$db;
		} else {
			return self::$db = new self;
		}
	}
}