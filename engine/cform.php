<?php
	
	class CForm
	{

		static public function GetData($formElements)
		{
			if(!is_array($formElements) and empty($formElements)) return false;
			else
			{
				$data = array();
				foreach($formElements as $vkey) $data[$vkey] = htmlspecialchars($_POST[$vkey]);
				return $data;
			}
		}
		
		static public function GetDataElement($element)
		{
			return htmlspecialchars($_POST[$element]);
		}
		
	}
	
?>