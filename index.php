<?php

define('ROOT_PATH', __DIR__.'/');
define('APP_PATH', ROOT_PATH.'application/');


require './framework/functionHelpers.php';
require './framework/App.php';

framework\App::run();
