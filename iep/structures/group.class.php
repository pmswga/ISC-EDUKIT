<?php
  declare(strict_types = 1);
	namespace IEP\Structures;
    
  require_once "specialty.class.php";
  
  use IEP\Structures\Specialty;
  
  /*!
    \class Group group.class.php "iep/structures/group.class.php"
    \brief Класс, который несёт в себе информацию об группе
    \author pmswga
    \version 1.0
    
    Класс представляет собой сущность, в которую помещаются данные из базы данных
    
  */
  
	class Group
	{
    
    private $id;               ///< Идентификатор группы
		private $number;           ///< Номер
		private $spec;             ///< Специальность
    private $year_education;   ///< Год обучения
		private $is_budget;        ///< Тип группы (1 - бюджетная, 0 - коммерческая)
    
    /*!
      \param[in] $number         - название группы
      \param[in] $spec           - специальность
      \note Представляет собой объект класса Specialty
      \param[in] $year_education - год выпуска
      \note Указывается в формате [год]/[год]
      \param[in] $is_budget      - тип группы 
      \note 1 - бюджетная, 0 - коммерческая
    */
    
		function __construct(string $number, $spec, string $year_education, int $is_budget = 1)
		{
      $this->id = 0;
			$this->number = $number;
			$this->spec = $spec;
      $this->year_education = $year_education;
			$this->is_budget = $is_budget;
		}
    
    /*!
      \param[in] $method - вызываемый метод
      \param[in] $args   - аргументы вызываемого метода
      \return Вызов существующего метода
      
      \warning
      
        \par
        Конкретно в этом классе переопределён метод __call().
        Это было сделано для того, чтобы убрать "паравозик" при вызове методов из объекта
        
        \par
        Например, чтобы раньше получить код специальности, нужно было писать:
          $group->getSpec()->getCode()
        
        \par
        После переопределения метода _call() можно писать:
          $group->getCode()
        
        \par
        В обоих случаях мы получаем код специальности
      
        
    */
    
    public function __call($method, $args)
    {
      switch ($method)
      {
        case "getCode":
        {          
          return $this->getSpec()->getCode();
        } break;
      }
    }
    
    /*!
      \brief Задаёт идентификатор группе
      \param[in] $id - идентификатор группы
      \note Идентификатор берётся из базы данных
    */
    
    public function setGroupID(int $id)
    {
      $this->id = $id;
    }
    
    /*!
      \brief Возвращает идентификатор группы
      \return Идентификатор группы
      \note Далее идентификатор используется для манипуляций с данными в базе данных
    */
    
    public function getGroupID() : int
    {
      return $this->id;
    }
    
    /*!
      \brief Возвращает номер группы
      \return Название группы
    */
    
		public function getNumberGroup() : string
		{
			return $this->number;
		}
    
    /*!
      \brief Возвращает специальность
      \return Объект типа Specialty
    */
		
		public function getSpec()
		{
			return $this->spec;
		}
		
    /*!
      \brief Возвращает год обучения
      \return Год обучения
    */
    
    public function getYearEducation() : string
    {
      return $this->year_education;
    }
        
    /*!
      \brief Возвращает тип группы
      \return Тип группы
    */
    
		public function getStatus() : int
		{
			return $this->is_budget;
		}
		
	}
  
?>
