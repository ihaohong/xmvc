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

	function getData($sql, $fetch = 'assoc')
	{
		$result = $this->query($sql);
		$fetchMethod = 'fetch_'.$fetch;

		$data = [];
		while ($item = $result->$fetchMethod()) {
			$data[] = $item;
		}

		return $data;
	}

	function getLine($sql, $fetch = 'assoc')
	{
		$result = $this->getData($sql, $fetch);
		if ($result) {
			return $result[0];
		}
		return false;
	}

	function getVar($sql)
	{
		$result->getLine($sql, 'array');
		return $result[0];
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