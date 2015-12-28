<?php
namespace framework\component\Database;

class Factory
{
	static function createDatabase($db = 'mysqli')
	{
		if ($db === 'MySQLi') {
			$db = MySQLi::getInstance();
		} else {
			$db = MySQLi::getInstance();
		}
		
		return $db;
	}
}