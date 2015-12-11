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
		$result = $this->link->query($sql);

		return $result;
	}

	public function affectedRows()
	{
		return $this->link->affected_rows;
	}

	public function getData($sql, $fetch = 'assoc')
	{
		$result = $this->query($sql);
		$fetchMethod = 'fetch_'.$fetch;

		$data = [];
		while ($item = $result->$fetchMethod()) {
			$data[] = $item;
		}

		return $data;
	}

	public function getLine($sql, $fetch = 'assoc')
	{
		$result = $this->getData($sql, $fetch);
		if ($result) {
			return $result[0];
		}
		return false;
	}

	public function getVar($sql)
	{
		$result = $this->getLine($sql, 'array');
		return $result[0];
	}

	public function lastId()
	{
		return $this->link->insert_id;
	}
}