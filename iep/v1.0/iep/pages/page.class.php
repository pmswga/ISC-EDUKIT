<?php
	declare(strict_types = 1);
	namespace IEP\Pages;

	require_once $_SERVER['DOCUMENT_ROOT']."/iep/v1.0/engine/cform.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/v1.0/engine/ctools.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/v1.0/iep/managers/iep.class.php";

	use IEP\Managers\IEP;

	abstract class Page
	{
		protected $title;
		protected $template;
		protected $template_data;
		protected $managers;

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

		public function managers() : array
		{
			return $this->manager;
		}

		public function setManagers(array $managers)
		{
			$this->managers = $managers;
		}

		abstract public function callback($post);

	}

?>
