<?php
	
	/****c* CEngine.Lib/CDraw
	 * NAME
	 *	Класс CDraw
	 * FUNCTION
	 *	Класс для рисования
	 * ATTRIBUTES
     *  im - дескриптор на область рисования
     *  color - цвет
     *  lineWidth - толщина линии
     *  width, height - ширина и высота графической области
     * METHODS
     *      CDraw(width, height) - конструктор. Создаёт графическую область для рисования с заданной шириной и высотой
     *      ~CDraw() - дестркутор. Удаляет графическую область
     *  public:
	 *		GetWidth() - возвращает ширину графической области
	 *		GetHeight() - возввращает высоту графической области
	 *		SetColor(r, g, b) - устанавливает цвет
	 *		SetText(x, y, angle, text, fontSize, fontStyle, color) - задаёт текст на графической области с координатами
	 *		View() - отображает графическую область
	 *		SetPixelColor(x, y) - задаёт цвет отдельного пикселя
	 *		SetLineWidth(width) - задаёт ширину рисуемой линии
	 *		Fill(x, y) - заполняет область цветом
	 *		Save(filename) - сохраняет графическую область в .png картинку
	 *		Line(sx, sy, ex, ey) - рисование линии
	 *		Arc(cx, cy, w, h, sd, ed) - рисование дуги
	 *		Ellipse(cx, cy, w, h, isFill) - рисованеи эллипса
	 *		Rectangle(sx, sy, ex, ey) - рисование квадрата
	 *		Polygon(points, isFill) - рисование полигона
	 *****
	 */


	class CDraw
	{	
		private $im;
		private $color;
		private $lineWidth;
		private $width, $heigth;
		
		function CDraw($width, $heigth)
		{
			$this->im = imageCreateTrueColor($width, $heigth);
			$this->width = $width;
			$this->heigth = $heigth;
		}
		
		function __destructor()
		{
			imageDestroy($this->in);
		}

		public function GetWidth()
		{
			return $this->width;
		}
		
		public function GetHeight()
		{
			return $this->heigth;
		}
		
		public function SetText($x, $y, $angle, $text, $fontSize, $fontStyle, $color)
		{
			imagefttext($this->im, $fontSize, $angle, $x, $y, imagecolorexact($this->im, $color[0], $color[1], $color[2]), $fontStyle, $text);
		}
		
		public function View()
		{
			header("Content-type: image/png");
			imagePng($this->im);
		}
		
		public function SetPixelColor($x, $y)
		{
			imageSetPixel($this->im, $x, $y, $this->color);
		}
		
		public function SetLineWidth($width)
		{
			imageSetThickness($this->im, $width);
		}
		
		public function Fill($x, $y)
		{
			imageFill($this->im, $x, $y, $this->color);
		}
		
		public function SetColor($r, $g, $b)
		{
			$this->color = imageColorAllocate($this->im, $r, $g, $b);
		}
		
		public function Save($fileName)
		{
			imagePng($this->im, $fileName);
		}
		
		public function Line($start_x, $start_y, $end_x, $end_y)
		{
			imageLine($this->im, $start_x, $start_y, $end_x, $end_y, $this->color);
		}
		
		public function Arc($centerX, $centerY, $width, $heigth, $startDegrees, $endDegrees, $isFill = false)
		{
			if($isFill) imageFilledArc($this->im, $centerX, $centerY, $width, $heigth, $startDegrees, $endDegrees, $this->color);
			else imageArc($this->im, $centerX, $centerY, $width, $heigth, $startDegrees, $endDegrees, $this->color);
		}
		
		public function Ellipse($centerX, $centerY, $width, $heigth, $isFill)
		{
			if($isFill) imageFilledEllipse($this->im, $centerX, $centerY, $width, $heigth, $this->color);
			else imageEllipse($this->im, $centerX, $centerY, $width, $heigth, $this->color);
		}
		
		public function Rectangle($start_x, $start_y, $end_x, $end_y, $isFill)
		{
			if($isFill) imageFilledRectangle($this->im, $start_x, $start_y, $end_x, $end_y, $this->color);
			else imageRectangle($this->im, $start_x, $start_y, $end_x, $end_y, $this->color);
		}
		
		public function Polygon($arrayPoints, $isFill)
		{
			if($isFill) imageFilledPolygon($this->im, $arrayPoints, count($arrayPoints)/2, $this->color);
			else imageRectangle($this->im, $start_x, $start_y, $end_x, $end_y, $this->color);
		}
	}
	
?>