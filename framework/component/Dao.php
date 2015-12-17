<?php
namespace framework\component;

use framework\core\DI;

class Dao extends DB
{
	public function find($table, $conditions, $columns=[])
	{
		$sql = "SELECT $columns FROM $table WHERE ";
	}

	public function insert($table, $params)
	{

	}

	public function update($table, $params, $conditions)
	{

	}

	public function delete($table, $conditions)
	{

	}
}