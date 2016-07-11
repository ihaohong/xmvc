<?php
namespace app\controllers;

use framework\core\Controller as BaseController;
use framework\core\DI;
use app\models\PostModel;

class IndexController extends BaseController
{
	public function index()
	{
		$logger = new \framework\core\Log('haohongtest.log');
		$logger->info("haha");

		 $postModel = new PostModel();
		 $posts = $postModel->find(['userId' => 333]);

		 dd($posts);

		// $this->view->setLayout('layouts/default');
		// $this->view->render('index/index', ['name' => 'haohong']);
	}
}