<?php
	
	class CTools
	{
		public static function Redirect($to)
		{
			echo "<script>document.location.href = '".$to."';</script>";
			exit;
		}
		
		public static function Message($msg)
		{
			echo "<script>alert('$msg');</script>";
		}
		
		public static function var_dump($data)
		{
			echo "<pre>";
			print_r($data);
			echo "</pre>";
		}
	}
	
?>