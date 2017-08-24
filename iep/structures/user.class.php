<?php
  declare(strict_types = 1);
	namespace IEP\Structures;
	
  /*!
  
    \class User user.class.php "iep/structures/user.class.php"
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
    
    /*!
      \var $typeUser
      \brief Тип пользователя
      \note См. константы в typeusers.class.php
    */
    
		protected $typeUser;
    
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
      \brief Возвращает фамилию
      \return Фамилию пользователя
    */
    
		public function getSn() : string
		{
			return $this->sn;
		}
    
    /*!
      \brief Возвращает имя
      \return Имя пользователя
    */
		
		public function getFn() : string
		{
			return $this->fn;
		}
    
    /*!
      \brief Возвращает отчество
      \return Отчество пользователя
    */
		
		public function getPt() : string
		{
			return $this->pt;
		}
    
    /*!
      \brief Возвращает электронную почту
      \return Электронная почта пользователя
    */
		
		public function getEmail() : string
		{
			return $this->email;
		}
    
    /*!
      \brief Возвращает пароль
      \return Пароль пользователя
      \note Пароль захеширован с помощью MD5
    */
		
		public function getPassword() : string
		{
			return $this->password;
		}
    
    /*!
      \brief Возвращает тип пользователя
      \return Тип пользователя
      \note См. константы в typeusers.consts.php
    */
    
		public function getUserType() : int
		{
			return $this->typeUser;
		}
		
	}
	
?>
