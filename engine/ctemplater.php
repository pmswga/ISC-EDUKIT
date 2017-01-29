<?php
	require_once "smarty/Smarty.class.php";
	
	/****c* CEngine.Templater/CTemplater
	 * NAME
	 *	Класс CTemplater
	 * DERIVED BY
	 * 	Smarty
	 * FUNCTION
	 *	Класс является дополнением к функционалу шаблонизатора Smarty
	 * ATTRIBUTES
	 *	template_dir - папка для хранения tpl шаблонов
	 *	compile_dir - папка для хранение откомпилированных шаблонов
	 *	config_dir - папка для хранения конфигураций шаблонов
	 *	cache_dir - папка для хранения откешированных шаблонов
	 * METHODS
	 *		CTemplater(templaterDir, compileDir, configDir, cacheDir) - конструктор. Указываются папки для работы с шаблонами
	 *	public:
	 *		Show(filename) - отображает указанный шаблон
	 *		assign(key, value) - связывает элемент шаблона с его значением	
	 *		Message(bool, tMessage, fMessage) - отображает сообщение в зависимости от его истинности
	 *****
	 */

    class CTemplater extends Smarty
    {
		/****m* CTemplater/СTemplater()
		 * NAME
		 *	CTemplater(templateDir, compileDir, configDir, cacheDir)
		 * FUNCTION
		 *	Конструктор. Указываются папки для дальнейшей работы с шаблонизатором
		 *****
		 */
		
		function CTemplater($templaterDir, $compileDir, $configDir, $cacheDir)
		{
			parent::__construct();
			$this->template_dir = $templaterDir;
			$this->compile_dir = $compileDir;
			$this->config_dir = $configDir;
			$this->cache_dir = $cacheDir;
		}

		/****m* CTemplater/Show()
		 * NAME
		 *	Show(filename)
		 * FUNCTION
		 *	Отображается указанный в аргументе $filename шаблон. При этом производиться проверка на существование этого шаблона
		 * RETURN VALUE
		 *	Возвращает шаблон (Который выводиться), если шаблон существует.
		 *	Возвращает false, если шаблона не существует
		 *****
		 */
		
		public function Show($filename)
		{
			if(parent::templateExists($filename)) parent::display($filename);
			else return false;
		}
		
		/****m* CTemplater/Message()
		 * NAME
		 *	Message(bool, tMessage, fMessage)
		 * FUNCTION
		 *	Отображает сообщение в зависимости от значения $bool.
		 *		0 - отображается $fMessage
		 *		1 - отображается $tMessage
		 *****
		 */
		
		public function Message($bool, $tMessage, $fMessage)
		{
			echo $bool ? $tMessage."<br>" : $fMessage."<br>";
		}
    }
?>