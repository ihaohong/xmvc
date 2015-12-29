<?php
namespace framework\core;

class Model
{
	public $tableName;

	public $db;

	public function find($conditions = []) 
	{
		$tempArr = [];
		foreach ($conditions as $key => $value) {
			if (is_int($value) || is_float($value)) {
				$c = $key."=".$value;
			} else {
				$c = $key.'='."'{$value}'";
			}
			
			$tempArr[] = $c;
		}
		$conditions = implode(' AND ', $tempArr);
		$sql = "SELECT * FROM ".$this->tableName." WHERE ".$conditions;
		$result = $this->db->getData($sql);

		return $result;
	}

	public function findFirstById($id)
	{
		$sql = "SELECT * FROM ".$this->tableName." WHERE id = $id LIMIT 1";
		$result = $this->db->getLine($sql);

		// if ($result === 'false') {
		// 	throw 404;
		// }

		return $result;
	}

	public function findFirstByCondition($conditions = [])
	{
		$tempArr = [];
		foreach ($conditions as $key => $value) {
			if (is_int($value) || is_float($value)) {
				$c = $key."=".$value;
			} else {
				$c = $key.'='."'{$value}'";
			}
			
			$tempArr[] = $c;
		}
		$conditions = implode(' AND ', $tempArr);
		$sql = "SELECT * FROM ".$this->tableName." WHERE ".$conditions." LIMIT 1";
		$result = $this->db->getLine($sql);

		return $result;
	}

	public function __call($method, $args)
	{
		$args = $args[0];
		if ($method === 'findFirst') {
			switch (true) {
				case is_int($args):
					$result = call_user_func_array([__CLASS__, 'findFirstById'], [$args]);
					return $result;
					break;

				case is_array($args):
					$result = call_user_func_array([__CLASS__, 'findFirstByCondition'], [$args]);
					return $result;
					break;
				
				default:
					dd('wrong');
					break;
			}
		}
	}

	public function initialize()
	{

	}

	public function __construct()
	{
		$this->db = \framework\component\Database\Factory::createDatabase();
		$this->initialize();
	}
}