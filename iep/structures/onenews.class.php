<?php
    declare(strict_types = 1);
	namespace IEP\Structures;

	class OneNews
	{
		private $id_news;
		private $caption;
		private $content;
		private $author;
		private $date_publication;
		
		function __construct(string $caption, $content, string $author, string $date_publication)
		{
			$this->caption = $caption;
			$this->content = $content;
			$this->author = $author;
			$this->date_publication = $date_publication;
		}
		
		public function setNewsID(int $id_news)
		{
			$this->id_news = $id_news;
		}
		
		public function getNewsID() : int
		{
			return $this->id_news;
		}
		
		public function getCaption() : string
		{
			return $this->caption;
		}
		
		public function getContent()
		{
			return html_entity_decode($this->content, ENT_HTML5);
		}
		
		public function getAuthor() : string
		{
			return $this->author;
		}
		
		public function getDatePublication() : string
		{
			return $this->date_publication;
		}
		
		public function setCaption($caption)
		{
			$this->caption = $caption;
		}
		
		public function setContent($content)
		{
			$this->content = $content;
		}
		
		public function setAuthor($author)
		{
			$this->author = $author;
		}
		
		public function setDatePublication($date_publication)
		{
			$this->date_publication = $date_publication;
		}
		
	}
	
?>