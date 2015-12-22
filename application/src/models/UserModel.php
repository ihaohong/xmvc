<?php
namespace app\models;

use framework\component\Model;
use framework\core\DI;

class UserModel extends BaseModel
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