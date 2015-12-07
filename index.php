<?php

define('ROOT_PATH', __DIR__.'/');

require './framework/function_helpers.php';
require './framework/init_autoload.php';

$app = new framework\App(__DIR__);

$app->run();