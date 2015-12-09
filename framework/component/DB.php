<?php
namespace framework\component;

use framework\core\DI;

class DB
{
	private $link = NULL;
	private static $_instance = NULL;
	private $prefix;
	private $lastSql = NULL;

	private function __construct()
	{
		$config = (array) $this->getConfig();
		extract($config);
		$this->getLink($host, $username, $password, $dbname);
	}

	public static function getInstance()
	{
		if(self::$_instance instanceof self)
		{
			return self::$_instance;
		}

		self::$_instance = new self;
		return self::$_instance;
	}

	private function getConfig()
	{
		$config = DI::get('config');

		return $config->db->master;
	}

	private function getLink($host, $user, $password, $dbName)
	{
		if (isset($this->link)) {
			return $this->link;
		} else {
			$this->link = mysqli_connect($host, $user, $password, $dbName);
			/* check connection */ 
			if (mysqli_connect_errno()) {
			    printf("Connect failed: %s\n", mysqli_connect_error());
			    exit();
			}

			return $this->link;
		}
	}

	public function query($sql)
	{

	}

	public function affectedRows()
	{

	}

	public function getData($sql)
	{

	}

	public function getLine($sql)
	{

	}

	public function getVar()
	{

	}

	public function lastId()
	{

	}
}