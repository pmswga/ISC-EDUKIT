<?php
	
	class CFileLoader
	{
		private $uploadDir;
		private $formInputName;
		
		function CFileLoader($formInputName, $uploadDir)
		{
			$this->formInputName = $formInputName;
			$this->uploadDir = $uploadDir;
		}
		
		public function SetFormInput($formInputName)
		{
			$this->formInputName = $formInputName;
		}
		
		public function UploadFile()
		{
			$file = $this->uploadDir."/".$this->GetName();
			if($this->GetErrorLoad() == 0)
			{
				 move_uploaded_file($this->GetTMPFile(), $file);
				 return true;
			}
			return false;
		}
		
		public function GetTMPFile()
		{
			return $_FILES[$this->formInputName]['tmp_name'];	
		}
		
		public function GetName()
		{
			return $_FILES[$this->formInputName]['name'];	
		}
		
		public function GetSize()
		{
			return $_FILES[$this->formInputName]['size'];	
		}
		
		public function GetType()
		{
			return $_FILES[$this->formInputName]['type'];
		}
		
		public function GetErrorLoad()
		{
			return $_FILES[$this->formInputName]['error'];
		}
	}
?>