<?php
namespace app\models;

use framework\component\Dao as BaseModel;
use framework\core\DI;

class PostModel extends BaseModel
{

	public function __construct()
	{
		// parent::__construct();
	}

	public function findPosts()
	{
		return 'posts';
	}
}