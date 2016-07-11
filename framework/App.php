<?php
namespace framework;

use framework\component\Macaw;
use framework\core\DI;
use framework\component\DAO;
use framework\core\Config;

final class App
{
	private $appRoot;

	public function _construct($appRoot)
	{
		$this->appRoot = $appRoot;
	}

	public function run()
	{
		$this->initDI();
		$this->registerRouter();

		Macaw::dispatch();
	}

	private function registerRouter()
	{
		require ROOT_PATH.'application/src/config/routes.php';
	}

	private function initDI()
	{
		DI::set('config', function () {
			return $this->diConfig();
		});

		DI::set('db', function () {
			return $this->diDb();
		});
	}

	private function diDb() 
	{
		return \framework\component\Database\MySQLi::getInstance();
	}

	private function diConfig()
	{
		$cacheFile = $this->appRoot.'application/src/config/_cache.config.php';

		if ($config = $this->readCache($cacheFile)) {
			return $config;
		}

		$config = new Config($this->appRoot.'application/src/config/config.default.php');
		$config->merge($this->appRoot.'application/src/config/config.local.php');
		$config->add('viewPath', $this->appRoot.'application/src/views/', 'path');

		$this->writeCache($cacheFile, $config->get());

		return $config->get();
	}

	private function readCache($cacheFile, $serialize = true)
	{
		if (file_exists($cacheFile) && $cache = include $cacheFile) {
			return $serialize ? unserialize($cache) : $cache;
		}

		return null;
	}

	private function writeCache($cacheFile, $content, $serialize = true)
	{
		if ($cacheFile && $fh = fopen($cacheFile, 'w')) {
			if ($serialize) {
				fwrite($fh, "<?php return '".serialize($content)."';");
			} else {
				fwrite($fh, '<?php return '.var_export($content, true).';');
			}
			fclose($fh);
			return true;
		}

		return false;
	}
}