<?php
namespace framework\core;

use framework\core\DI;

class View
{
	private $layout;
	private $file;
	private $data;

	private function getViewPath()
	{
		$config = DI::get('config');
		$viewPath = $config->path->viewPath;
		return $viewPath;
	}

	public function setLayout($layout)
	{
		$this->layout = $layout;
	}

	public function render($view, $data = [])
	{
		$this->file = $view;
		$this->data = $data;

		if (isset($this->layout)) {
			$viewPath = $this->getViewPath();
			$layoutPath = $viewPath.$this->layout.'.php';
			require $layoutPath;
		} else {
			$this->getContent();
		}
	}

	private function getContent()
	{
		extract($this->data);

		$viewPath = $this->getViewPath();

		$filePath = $viewPath.$this->file.'.php';
		require $filePath;
	}
}