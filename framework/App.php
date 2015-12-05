<?php
namespace framework;

final class App
{
	public static function run()
	{
		$controller = ucfirst($_GET['c']).'Controller';
		$action = $_GET['a'].'Action';

		spl_autoload_register(__NAMESPACE__.'\\App::appLoader');
		spl_autoload_register(__NAMESPACE__.'\\App::frameworkLoader');

		$className = '\app\controllers\\'.$controller;

		// $c = new \app\controllers\IndexController();
		(new $className())->$action();
	}

	public static function appLoader($class)
	{
		$prefix = 'app\\';

		// base directory for the namespace prefix
		$base_dir = APP_PATH.'src/';

		// does the class use the namespace prefix?
		$len = strlen($prefix);
		if (strncmp($prefix, $class, $len) !== 0) {
		    // no, move to the next registered autoloader
		    return;
		}

		// get the relative class name
		$relative_class = substr($class, $len);

		// replace the namespace prefix with the base directory, replace namespace
		// separators with directory separators in the relative class name, append
		// with .php
		$file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

		// if the file exists, require it
		if (file_exists($file)) {
			require $file;
		}
	}

	public static function frameworkLoader($class)
	{
		$prefix = 'framework\\';

		$base_dir = ROOT_PATH.'framework/';

		// does the class use the namespace prefix?
		$len = strlen($prefix);
		if (strncmp($prefix, $class, $len) !== 0) {
		// no, move to the next registered autoloader
		 	return;
		}

		// get the relative class name
		$relative_class = substr($class, $len);

		// replace the namespace prefix with the base directory, replace namespace
		// separators with directory separators in the relative class name, append
		// with .php
		$file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

		// if the file exists, require it
		if (file_exists($file)) {
			require $file;
		}
	}

}