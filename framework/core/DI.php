<?php 
namespace framework\core;

class DI 
{
	private static $objects;

	static function set($alias, Callable $callback)
	{
		// dd($callback);
		self::$objects[$alias] = $callback;
	}

	static function get($name)
	{
		$callback = self::$objects[$name];
		return $callback();

		// return call_user_func_array(self::$objects[$alias], []);
	}
}