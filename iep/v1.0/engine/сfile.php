<?php
	require_once "/../core/core.php";
	
	/*
		Класс CFile - класс для работы с файлами и директориями.
		
		Свойства:
			mSelectFile, mSelecetDir;
			
		Методы:
			Основные методы:
				__construct() - задаёт начальные параметры
				CreateDir(dirname) - создаёт новую директорию
				Create(filename) - создаёт новый файл
				DeleteDir(dirname) - удаляет директорию
				Delete(filename) - удаляет файл
				Read(filename) - считывает данные из файла
				Write(filename, text) - записывает данные в файл
				Append(filename, text) - добавляет данные в конец файла
				Rename(filename, newFileName) - переименовывет файл
				Clear(filename) - очищает файл

			Функции is:
				isExists(filename) - проверяет файл на его присутствие
				isExecutable(filename) - проверяет файл, не является ли он исполняемым
				isFile(filneame) - проверяет файл, не является ли он обычным текстовым докумнетом
				isResource(filename) - проверяет файл, не является ли он ресурсным
				isReadable(filename) - проверяет файл на возможность чтения
				isWritable(filename) - проверяет файл на возможность записи
				isInIFile(filename) - проверяет файл, не является ли он файлом настроек
		
			Функции Get:
				GetSize(filename) - возвращает размер файла
				GetType(filename) - возвращает тип файла
				GetPerms(filename) - возвращает параметры доступа (эффективно в Unix системах)
				GetFullPath(filename) - возвращает полный путь относительно файла
			
			Функции InI:
				InIGetAll(filename, isSelection) - возвращает все параметры из файла *.ini
				InIGet(filename, key) - возвращает значение заданного ключа
				InIGetSelection(filename, selection) - возвращает все значения из заданной селекции
	
	*/

	class CFile
	{
		private $mSelectFile, $mSelecetDir;
		
		function CFile()
		{
			$this->mSelectFile = "Set file <br>";
			$this->mSelecetDir = "Set dir <br>";
		}
		
		public function CreateDir($dirname)
		{
			mkdir($dirname);
		}
		
		public function Create($filename)
		{
				$fp = fopen($filename, "w");
				fclose($fp);				
		}
		
		public function DeleteDir($dirname)
		{
			rmdir($dirname);
		}
		
		public function Delete($filename)
		{
			unlink($filename);
		}
	
		public function Read($filename)
		{
			file_get_contents($filename);
		}
		
		public function Write($filename, $text)
		{
			file_put_contents($filename, $text);
		}
		
		public function Append($filename, $text)
		{
			$text = " ".$text;
			$fp = fopen($filename, "a");
			fwrite($fp, $text);
			fclose($fp);
		}
		
		public function Rename($filename, $newFileName)
		{
			rename($filename, $newFileName);
		}
		
		public function Clear($filename)
		{
			$this->Delete($filename);
			$this->Create($filename);
		}
		
		public function isExists($filename)
		{
			file_exists($filename);
		}
		
		public function isExecutable($filename)
		{
			return is_executable($filename);
		}
		
		public function isFile($filename)
		{
			return is_file($filename);
		}
		
		public function isResource($filename)
		{
			return is_resource($filename);
		}
		
		public function isReadable($filename)
		{
			return is_readable($filename);
		}
		
		public function isWritable($filename)
		{
			return is_writable($filename);
		}
		
		public function isInIFile($filename)
		{
			if((end(explode(".", $filename))) == "ini") return true;
			return false;
		}
		
		public function GetSize($filename)
		{
			return filesize($filename)." байт <br>";
		}
		
		public function GetType($filename)
		{
			return filetype($filename);
		}
		
		public function GetFullPath($filename)
		{
			return realpath($filename);
		}
		
		public function GetPerms($filename)
		{
			return fileperms($filename);
		}
		
		public function SetPerms($filename, $roots)
		{
			return chmod($filename, $roots);
		}
		
		public function InIGetAll($filename, $isSelection = false)
		{
			return parse_ini_file($filename, $isSelection);
		}
		
		public function InIGet($filename, $key)
		{
			$data = parse_ini_file($filename);
			foreach($data as $_key => $value) if($_key == $key) return $data[$_key];
		}
		
		public function InIGetSelection($filename, $selection)
		{
			$data = parse_ini_file($filename, true);
			foreach($data as $_selection => $element) if($_selection == $selection) return $data[$_selection];
		}
	}
	
	$File = new DFile();
?>