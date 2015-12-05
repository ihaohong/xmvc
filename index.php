<?php

define('ROOT_PATH', __DIR__.'/');
define('APP_PATH', ROOT_PATH.'application/');
define('VIEW_PATH', APP_PATH.'src/views/');

require './framework/function_helpers.php';
require './framework/App.php';

framework\App::run();
