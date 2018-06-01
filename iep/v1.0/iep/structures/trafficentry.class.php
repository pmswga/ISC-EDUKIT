<?php
  declare(strict_types = 1);
  namespace IEP\Structures;
  
  /*!
    
    \class TrafficEntry trafficentry.class.php "iep/structures/trafficentry.class.php"
    \brief Запись об посещамости
    \author pmswga
    \version 1.0
    
  */
  
  class TrafficEntry
  {
    private $id;                 ///< Идентификатор записи об посещамости
    private $email;              ///< Электронная почта студента
    private $date_visit;         ///< Дата посещения
    private $count_passed_pair;  ///< Кол-во посещённых пар
    private $count_all_pair;     ///< Общее кол-во пар
    
    /*!
      \param[in] $student_email     - Электронная почта студента
      \param[in] $date_visit        - Дата посещения
      \param[in] $count_passed_pair - Кол-во посещённых пар
      \param[in] $count_all_pair    - Общее кол-во пар
    */
    
    function __construct(string $student_email, string $date_visit, int $count_passed_pair, int $count_all_pair)
    {
      $this->id = 0;
      $this->email = $student_email;
      $this->date_visit = $date_visit;
      $this->count_passed_pair = $count_passed_pair;
      $this->count_all_pair = $count_all_pair;
    }
    
    /*!
      \brief Задаёт идентификатор записи об посещамости
      \param[in] $id - Идентификатор записи об посещамости
    */
    
    public function setTrafficID(int $id)
    {
      $this->id = $id;
    }
    
    /*!
      \brief Возвращает идентификатор посещамости
      \return Идентификатор посещамости
    */
    
    public function getTrafficID() : int
    {
      return $this->id;
    }
    
    /*!
      \brief Возвращает электронную почту студента
      \return Электронная почта студента
    */
    
    public function getStudentEmail() : string
    {
      return $this->email;
    }
    
    /*!
      \brief Возвращает дату посещения колледжа
      \return Дата посещения
      \todo Возвращать сразу отформатированную строку через функцию date() в формате "d.m.Y H:i:s"
    */
    
    public function getDateVisit() : string
    {
      return $this->date_visit;
    }
    
    /*!
      \brief Возвращает кол-во посещённых пар
      \return Кол-во посещённых пар
      \warning Возвращает кол-во часов, а не пар. Чтобы получить кол-во пар, нужно поделить часы на 2
    */
    
    public function getCountPassedPair() : int
    {
      return $this->count_passed_pair;
    }
    
    /*!
      \brief Возвращает всего кол-во пар
      \return Общее кол-во пар
      \warning Возвращает кол-во часов, а не пар. Чтобы получить кол-во пар, нужно поделить часы на 2
    */
    
    public function getCountAllPair() : int
    {
      return $this->count_all_pair;
    }
    
  }
  
?>
