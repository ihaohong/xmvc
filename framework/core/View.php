<?php
namespace framework\core;

class View
{

	private $layout;
	private $file;
	private $data;

	private function getViewPath()
	{
		return VIEW_PATH;
	}

	public function setLayout($layout)
	{
		$this->layout = $layout;
	}

	public function render($view, $data = [])
	{
		$this->file = $view;
		$this->data = $data;
		if (isset($layout)) {
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