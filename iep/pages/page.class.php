<?php
	declare(strict_types = 1);
	namespace IEP\Pages;

	require_once $_SERVER['DOCUMENT_ROOT']."/engine/ctools.php";

	abstract class Page
	{
		private $title;
		private $template;
		private $template_data;
		
		public function __construct(string $title, string $template,  array $template_data = array())
		{
			$this->title = $title;
			$this->template = $template;
			$this->template_data = $template_data;

			$this->template_data['title'] = $title;
		}
		
		
		public function title() : string
		{
			return $this->title;
		}
		
		public function template() : string
		{
			return $this->template;
		}
		
		public function data() : array
		{
			return $this->template_data;
		}
		
		public function setData(string $var, $value)
		{
			if (!array_key_exists($var, $this->template_data)) {
				$this->template_data[$var] = $value;
			}
		}

		abstract public function callback($post);
		
	}

?>
