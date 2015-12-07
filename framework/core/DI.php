<?php 
namespace framework\core;

class DI 
{
	private static $objects;

	static function set($alias, Callable $callback)
	{
		self::$objects[$alias] = $callback;
	}

	static function get($name)
	{
		$callback = self::$objects[$name];
		return $callback();
	}
}