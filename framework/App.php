<?php
namespace framework;

final class App
{
	public static function run()
	{
		self::initDI();

		$controller = ucfirst($_GET['c']).'Controller';
		$action = $_GET['a'].'Action';

		$className = '\app\controllers\\'.$controller;

		(new $className())->$action();
	}

	public static function initDI()
	{
		core\DI::set('db', function () {
			return \framework\component\DB::getInstance();
		});

		core\DI::set('config', function () {
			return new core\Config(APP_PATH.'src/config.php');
		});

		// dd(core\DI::get('config'));
	}

}