<?php
use \framework\component\Macaw;

Macaw::$controller_namespace = 'app\controllers\\';


Macaw::get('', 'IndexController@index');
Macaw::get('fuck', function() {
    echo "成功！";
});
Macaw::$error_callback = function() {
    throw new Exception("路由无匹配项 404 Not Found");
};
