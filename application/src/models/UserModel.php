<?php
namespace app\models;

use framework\component\Model as BaseModel;
use framework\core\DI;

class UserModel extends BaseModel
{
	

	public function findUsers()
	{
		return 'users';
	}
}