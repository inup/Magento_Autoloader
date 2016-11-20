<?php

class Inup_Autoloader_Model_Autoloader
{
	
	protected static $registered = false;
	
	public function addAutoloader(Varien_Event_Observer $observer)
	{
		if (self::$registered) {
			return;
		}
		spl_autoload_register(array($this, 'autoload'), false, true);
		self::$registered = true;
	}
	
	
	public function autoload($class)
	{
		$classFile = str_replace('\\', '/', $class) . '.php';
		if (strpos($classFile, '/') !== false) {
			include $classFile;
		}
	}
	
}