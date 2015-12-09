<?php
namespace app\controllers;

use framework\core\Controller as BaseController;
use framework\core\DI;

class IndexController extends BaseController
{
	public function indexAction()
	{
		$db = DI::get('db');

		$this->view->setLayout('layouts/default');
		$this->view->render('index/index', ['name' => 'haohong']);
	}
}