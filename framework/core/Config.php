<?php
namespace framework\core;

class Config
{
	private $config;

	public function __construct($path)
	{
		$this->config = $this->arrayToObject(include($path));
	}

	public function get()
	{
		return $this->config;
	}

	public function merge($toMergedPath)
	{
		$toMergedArr = include($toMergedPath);
		$configArr = $this->objectToArray($this->config);
		
		$resultArr = array_merge($configArr, $toMergedArr);

		$this->config = $this->arrayToObject($resultArr);

		return $this->get();
	}

	private function arrayToObject($array)
	{
		$obj = new \stdClass;
		foreach ($array as $key => $value) {
			if (strlen($key)) {
				if (is_array($value)) {
					$obj->{$key} = $this->arrayToObject($value);
				} else {
					$obj->{$key} = $value;
				}
			}
		}

		return $obj;
	}

	private function objectToArray($object)
	{
		$array = [];
		$array = get_object_vars($object);

		if (count($array)) {
			foreach ($array as $key => $value) {
				if (is_object($value)) {
					$array[$key] = $this->objectToArray($value);
				} else {
					$array[$key] = $value;
				}
			}
		}

		return $array;
	}
}