<?php
	require_once "smarty/Smarty.class.php";
	
	class CTemplater extends Smarty
	{
		
		function __construct($templaterDir, $compileDir, $configDir, $cacheDir)
		{
			parent::__construct();
			$this->template_dir = $templaterDir;
			$this->compile_dir = $compileDir;
			$this->config_dir = $configDir;
			$this->cache_dir = $cacheDir;
		}
		
		public function Show($filename)
		{
			if(parent::templateExists($filename))
			{
				parent::display($filename);
				return true;
			}
			else return false;
		}
		
	}
	
?>