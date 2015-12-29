<?php 
namespace framework\core;



class Log 
{
	private $file;
	private $fp;

	public function __construct($file)
	{
		$config = DI::get('config');
		$logDir = $config->dir->log;

		$this->file = $logDir.$file;

		$this->fp = fopen($this->file, 'a+');
	}

	public function emergency($message)
	{
		$this->write($message, strtoupper(__FUNCTION__));
	}

	public function alert($message)
	{
		$this->write($message, strtoupper(__FUNCTION__));
	}

	public function critical($message)
	{
		$this->write($message, strtoupper(__FUNCTION__));
	}

	public function error($message)
	{
		$this->write($message, strtoupper(__FUNCTION__));
	}

	public function warning($message)
	{
		$this->write($message, strtoupper(__FUNCTION__));
	}

	public function notice($message)
	{
		$this->write($message, strtoupper(__FUNCTION__));
	}

	public function info($message)
	{
		$this->write($message, strtoupper(__FUNCTION__));
	}

	public function debug($message)
	{
		$this->write($message, strtoupper(__FUNCTION__));
	}

	public function log($message)
	{
		$this->write($message, strtoupper(__FUNCTION__));
	}

	protected function write($message, $level)
	{
		$message = '['.date('D, d M Y H:i:s O', time()).']['.$level.'] '.$message."\n";
		fwrite($this->fp, $message);
	}
}