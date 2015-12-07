<?php
autoload('app\\', ROOT_PATH.'application/src/');
autoload('framework\\', ROOT_PATH.'framework/');

function autoload($prefix, $baseDir)
{
	spl_autoload_register(function ($class) use ($prefix, $baseDir) {
		// does the class use the namespace prefix?
		$len = strlen($prefix);
		if (strncmp($prefix, $class, $len) !== 0) {
		    // no, move to the next registered autoloader
		    return;
		}

		// get the relative class name
		$relativeClass = substr($class, $len);

		// replace the namespace prefix with the base directory, replace namespace
		// separators with directory separators in the relative class name, append
		// with .php
		$file = $baseDir.str_replace('\\', '/', $relativeClass).'.php';

		// if the file exists, require it
		if (file_exists($file)) {
			require $file;
		}
	});
}
