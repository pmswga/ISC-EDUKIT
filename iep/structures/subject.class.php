<?php
  declare(strict_types = 1);
	namespace IEP\Structures;

  /*!
    \class Subject
    \brief Класс, который несёт в себе информацию об предмете
    \author pmswga
    \version 1.0
    
    Класс представляет собой сущность, в которую помещаются данные из базы данных
    
  */
  
	class Subject
	{
    
    private $id;
		private $description;
		
    /*!
      \param[in] $description - Название предмета
    */
    
		function __construct(string $description)
		{
			$this->id = 0;
			$this->description = $description;
		}
    
    /*!
      \param[in] $id - Идентификатор предмета
    */
    
    public function setSubjectID(int $id)
    {
      $this->id = $id;
    }
    
    /*!
      \return Идентификатор предмета
    */
		
    public function getSubjectID() : int
    {
      return $this->id;
    }
    
    /*!
      \return Название предмета
    */
    
		public function getDescription() : string
		{
			return $this->description;
		}
		
	}
	
?>
