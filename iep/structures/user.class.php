<?php
  declare(strict_types = 1);
	namespace IEP\Structures;
	
  /*!
    \class User
    \brief Общий класс для всех пользователей
    \author pmswga
    \version 1.0
    
    \details 
      Данный класс содержит в себе общую информацию об пользователе
    
  */
  
	class User
	{
		protected $sn;        ///< Фамилия
		protected $fn;        ///< Имя
		protected $pt;        ///< Отчество
		protected $email;     ///< Почта
		protected $password;  ///< Пароль
		protected $typeUser;  ///< Тип пользователя
    
    /*!
      \param[in] $sn       - Фамилия
      \param[in] $fn       - Имя
      \param[in] $pt       - Отчество
      \param[in] $email    - Электронная почта
      \param[in] $password - Пароль
      
      \param[in] $typeUser - Тип пользователя
      \note
        там их много крч....
    */
		
		function __construct(string $sn, string $fn, string $pt, string $email, string $password, int $typeUser = 0)
		{
			$this->sn = $sn;
			$this->fn = $fn;
			$this->pt = $pt;
			$this->email = $email;
			$this->password = $password;
			$this->typeUser = $typeUser;
		}
    
    /*!
      \return Фамилию пользователя
    */
    
		public function getSn() : string
		{
			return $this->sn;
		}
    
    /*!
      \return Имя пользователя
    */
		
		public function getFn() : string
		{
			return $this->fn;
		}
    
    /*!
      \return Отчество пользователя
    */
		
		public function getPt() : string
		{
			return $this->pt;
		}
    
    /*!
      \return Электронную почту пользователя
    */
		
		public function getEmail() : string
		{
			return $this->email;
		}
    
    /*!
      \return Пароль пользователя
      \note Пароль захеширован с помощью MD5
    */
		
		public function getPassword() : string
		{
			return $this->password;
		}
    
    /*!
      \return Вовзращает тип пользователя
    */
    
		public function getUserType() : int
		{
			return $this->typeUser;
		}
		
	}
	
?>
