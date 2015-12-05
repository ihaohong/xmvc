<?php
namespace framework\core;

class Controller
{
	public $view;

	public function __construct()
	{
		$this->init();
	}

	public function init()
	{
		$this->view = new View;
	}
}