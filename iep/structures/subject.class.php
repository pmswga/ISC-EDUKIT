<?php
  declare(strict_types = 1);
	namespace IEP\Structures;

  /*!
    \class Subject subject.class.php "iep/structures/subject.class.php"
    \brief Класс, который несёт в себе информацию об предмете
    \author pmswga
    \version 1.0
    
    Класс представляет собой сущность, в которую помещаются данные из базы данных
    
  */
  
	class Subject
	{
    
    private $id;               ///< Идентификатор
		private $description;      ///< Название предмета
		
    /*!
      \param[in] $description - Название предмета
    */
    
		function __construct(string $description)
		{
			$this->id = 0;
			$this->description = $description;
		}
    
    /*!
      \brief Задаёт идентификатор предмета
      \param[in] $id - Идентификатор предмета
    */
    
    public function setSubjectID(int $id)
    {
      $this->id = $id;
    }
    
    /*!
      \brief Возвращает идентификатор предмета
      \return Идентификатор предмета
    */
		
    public function getSubjectID() : int
    {
      return $this->id;
    }
    
    /*!
      \brief Возвращает название предмета
      \return Название предмета
    */
    
		public function getDescription() : string
		{
			return $this->description;
		}
		
	}
	
?>
