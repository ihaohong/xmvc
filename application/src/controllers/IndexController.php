<?php
namespace app\controllers;
use framework\core\Controller as BaseController;

class IndexController extends BaseController
{
	public function indexAction()
	{
		$this->view->setLayout('layouts/default');
		$this->view->render('index/index', ['name' => 'haohong']);
	}
}