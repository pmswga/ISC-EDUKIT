<?php
	
	/****c* CEngine.Lib/CImage
	 * NAME
	 *	Класс CImage
	 * FUNCTION
	 *	Класс для работы с изображениями
	 * ATTRIBUTES
     *  im - дескриптор на картинку
     *  imageName - цвет
     *  imageType - толщина линии
     * METHODS
     *      CImage(imageFile) - конструктор. Задётся изображение
     *      ~CImage() - дестркутор. Удаляет изображение из памяти
     *  public:
	 *		View() - выводит изображение в браузер
	 *		SetText(x, y. angle, text, fontSize, fontStyle, color) - задёт текст на изображении
	 *		GetImage() - возвращает дескриптор на изображение
	 *		GetWidth() - возвращает ширину изображения
	 *		GetHeigth() - возвращает высоту изображения
	 *		GetColor() - возвращает цвет с пикселя
	 *		GetInfo() - возвращает нформацию об изображении
	 *****
	 */

	class CImage
	{
		private $im;
		private $imageName;
		private $imageType;
		
		function CImage($imageFile)
		{
			$this->imageName = $imageFile;
			
			$info = $this->GetInfo();
			$this->imageType = $info['mime'];
			
			if($this->imageType == "image/jpeg") $this->im = imageCreateFromJpeg($imageFile);
			if($this->imageType == "image/png") $this->im = imageCreateFromPng($imageFile);
			if($this->imageType == "image/gif") $this->im = imageCreateFromGif($imageFile);
		}
		
		public function __destructor()
		{
			imageDestroy($this->im);
		}

		public function View()
		{
			Header("Content-type: ".$this->imageType);
			if($this->imageType == "image/jpeg") imageJpeg($this->im);
			if($this->imageType == "image/png") imagePng($this->im);
			if($this->imageType == "image/gif") imageGif($this->im);
		}
		
		public function SetText($x, $y, $angle, $text, $fontSize, $fontStyle, $color)
		{
			imagefttext($this->im, $fontSize, $angle, $x, $y, imagecolorexact($this->im, $color[0], $color[1], $color[2]), $fontStyle, $text);
		}
		
		public function GetImage()
		{
			return $this->im;	
		}
		
		public function GetWidth()
		{
			return imageSX($this->im);
		}
		
		public function GetHeigth()
		{
			return imageSY($this->im);
			
		}
		
		public function GetColor($x, $y)
		{
			$color = imagecolorat($this->im, $x, $y);
			$color = imagecolorsforindex($this->im, $color);
			return $color;
		}
		
		public function GetInfo()
		{
			return getimagesize($this->imageName);
		}
	}

?>