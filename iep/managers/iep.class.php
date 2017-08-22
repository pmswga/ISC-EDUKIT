<?php
	declare(strict_types = 1);
	namespace IEP\Managers;
  
  /*!
    
    \class IEP
    \brief Базовый класс для выполнения базовых функций работы с БД
    \author pmswga
    \version 1.0
    
    Базовые функций:
      1. Добавление
      2. 
      
      ...
    
  */
  
	abstract class IEP
	{
		private $DBC;
		
    /*!
      \param[in] $dbc - Контроллер базы данных
      \note Объект класса PDO
    */
    
		function __construct(\PDO $dbc)
		{
			$this->DBC = $dbc;
		}
		
    /*!
      \param[in] $dbc - Контроллер базы данных
      \note Объект класса PDO
    */
    
		public function setDBC($dbc)
		{
			$this->DBC = $dbc;
		}
    
    /*!
      \return Контроллер базы данных
      \note Объект класса PDO
    */
		
		public function dbc()
		{
			return $this->DBC;
		}
		
    /*!
      \param[in] $sql    - SQL код
      \param[in] $params - Аргументы
    */
    
		public function query(string $sql, array $params = array())
		{
			if (!empty($params)) {
				$query = $this->dbc()->prepare($sql);
				$result = $query->execute($params);
        return ($result) ? $query->fetchAll(\PDO::FETCH_ASSOC) : false;
			} else {
        return $this->dbc()->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
      }
		}
		
    /*!
      \return Логи
      \note Массив с записями
    */
		
    public function getLogs() : array
    {
      $logs = $this->DBC->query("call readLogs('all')")->fetchAll(\PDO::FETCH_ASSOC);
      
      return $logs;
    }
    
    /*!
      \param[in] $log_id - идентификатор записи логи
    */
    
    public function removeLogs(int $log_id) : bool
    {
      $remove_log_query = $this->dbc()->prepare("call removeLog(:log)");
      
      $remove_log_query->bindValue(":log", $log_id);
      
      return $remove_log_query->execute();
    }
    
    /*!
      \param[in] $data - Данные для добавления
    */
    
		abstract public function add($data);
    
    /*!
      \param[in] $what - Данные для удаления
    */
    
		abstract public function remove($what);
		
	}
	
?>
