<?php
  declare(strict_types = 1);
  namespace IEP\Managers;
  
  require_once "iep.class.php";
  
  use IEP\Managers\IEP;
  
  /*!
    
    \class ScheduleManager shm.class.php "iep/managers/shm.class.php"
    \extends IEP
    \brief Менеджер для работы с расписанием
    \author pmswga
    \version 1.0
    
    Задачи менеджера:
      1. 
    
  */
  
  class ScheduleManager extends IEP
  {
    
    /*!
      \brief Форматирует числовое представление дня недели в строку
      \param[in] $day - Номер дня недели
      \return Строковое представление дня недели
      \note 1 - ПН, 2 - ВТ, 3 - СР, 4 - ЧТ, 5 - ПТ, 6 - СБ
    */
    
    private function intToDay(int $day) : string
    {
      switch ($day)
      {
        case 1: return "ПН"; break;
        case 2: return "ВТ"; break;
        case 3: return "СР"; break;
        case 4: return "ЧТ"; break;
        case 5: return "ПТ"; break;
        case 6: return "СБ"; break;
        default: return ""; break;
      }
    }
    
    /*!
      \brief Добавление новой записи о расписании
      \param[in] $schedule - Запись о расписании
      \note Ассоциативный массив в формате
      \code
        
        $schedule_entry = array(
          "group"   => ,
          "day"     => ,
          "pair"    => ,
          "subject" => 
        );
        
      \endcode
      
      \return TRUE - успешно, FALSE - ошибка
    */
    
    public function add($schedule) : bool
    {
      if (
        !empty($schedule['group']) &&
        !empty($schedule['day']) &&
        !empty($schedule['pair']) &&
        !empty($schedule['subj_1']) &&
        !empty($schedule['subj_2'])
      ) {
        $add_schedule = $this->dbc()->prepare("call addScheduleEntry(:grp, :day, :pair, :subj_1, :subj_2)");
        
        $add_schedule->bindValue(":grp", $schedule['group']);
        $add_schedule->bindValue(":day", $schedule['day']);
        $add_schedule->bindValue(":pair", $schedule['pair']);
        $add_schedule->bindValue(":subj_1", $schedule['subj_1']);
        $add_schedule->bindValue(":subj_2", $schedule['subj_2']);
        
        return $add_schedule->execute();
      } else {
        return false;
      }
      
    }
    
    /*!
      \brief Добавление новой записи об изменениях в расписании
      \param[in] $schedule - Запись об изменениях в расписании
      \note Ассоциативный массив в формате
      \code
        
        $schedule_entry = array(
          "group"   => ,
          "day"     => ,
          "pair"    => ,
          "subject" => 
        );
        
      \endcode
      
      \return TRUE - успешно, FALSE - ошибка
    */
    
    public function addChangeSchedule($schedule) : bool
    {
      $add_schedule = $this->dbc()->prepare("call addChangeSchedule(:grp, :day, :pair, :subject)");
      
      $add_schedule->bindValue(":grp", $schedule['group']);
      $add_schedule->bindValue(":day", $schedule['day']);
      $add_schedule->bindValue(":pair", $schedule['pair']);
      $add_schedule->bindValue(":subject", $schedule['subject']);
      
      return $add_schedule->execute();
    }
    
    /*!
      \brief Возвращает расписание всех групп      
      \return Расписание
      \note Ассоциативный массив в формате
      \code
        
        $schedule = array(
          "П-304" => array(
            "ПН" => array(
              [0] => array(
                [_day]    => ,
                [group]   => ,
                [id_grp]  => ,
                [pair]    => ,
                [subject] => 
              ),
              ...
            )
            ...
          ),
          ...
        );
        
      \endcode
    */
    
    public function getAllScheduleGroup() : array
    {
      $data = $this->query("call getAllScheduleGroup()");
        
      $dataByGroup = array();
      foreach ($data as $d) {
        $dataByGroup[$d['group']." (".$d['edu_year'].")"][] = $d;
      }
      
      $dataByGroupByDay = array();
      foreach ($dataByGroup as $key => $value) {
        
        foreach ($value as $day) {
          $dataByGroupByDay[$key][$this->intToDay((int)$day['_day'])][] = $day;
        }
        
      }
      
      return $dataByGroupByDay;
    }
    
    /*!
      \brief Возвращает расписание группы
      \param[in] $grp - Идентификатор
      \return Расписание
      \note Ассоциативный массив
    */
    
    public function getScheduleGroup(int $grp)
    {
      $data = $this->query("call getScheduleGroup(:g)", [":g" => $grp]);
  
      $dataByGroup = array();
      foreach ($data as $d) {
        $dataByGroup[$d['group']." (".$d['edu_year'].")"][] = $d;
      }
      
      $dataByGroupByDay = array();
      foreach ($dataByGroup as $key => $value) {
        
        foreach ($value as $day) {      
          $dataByGroupByDay[$key][$this->intToDay((int)$day['_day'])][] = $day;
        }
        
      }
      
      return $dataByGroupByDay;
    }
    
    /*!
      \brief Возвращает изменения во всех группах
      \return Изменения в расписании
      \note Ассоциативный массив в формате
      \code
        
        $schedule = array(
          "П-304" => array(
            "2017-09-02 00:00:00" => array(
              [0] => array(
                [_day]    => ,
                [group]   => ,
                [id_grp]  => ,
                [pair]    => ,
                [subject] => 
              ),
              ...
            )
            ...
          ),
          ...
        );
        
      \endcode
    */

    public function getAllChangedSchedule()
    {
      $data = $this->query("call getAllChangedSchedule()");

      $dataByGroup = array();
      foreach ($data as $d) {
        $dataByGroup[$d['group']." (".$d['edu_year'].")"][] = $d;
      }

      $dataByGroupByDay = array();
      foreach ($dataByGroup as $key => $value) {

        foreach ($value as $day) {            
          $dataByGroupByDay[$key][$day['_day']][] = $day;
        }

      }

      return $dataByGroupByDay;
    }
    
    /*!
      \brief Возвращает изменения в расписании группы
      \param[in] $grp - Идентификатор
      \return Расписание
      \note Ассоциативный массив
    */

    public function getChangeScheduleGroup(int $grp)
    {
      $data = $this->query("call getChangeScheduleGroup(:g)", [":g" => $grp]);
  
      $dataByGroup = array();
      foreach ($data as $d) {
        $dataByGroup[$d['group']][] = $d;
      }
      
      $dataByGroupByDay = array();
      foreach ($dataByGroup as $key => $value) {
        
        foreach ($value as $day) {      
          $dataByGroupByDay[$key][$day['_day']][] = $day;
        }
        
      }
      
      return $dataByGroupByDay;
    }
    
    /*!
      \brief Изменяет предмет
      \param[in] $grp     - Идентификатор группы
      \param[in] $day     - День недели
      \param[in] $pair    - Пара
      \param[in] $subj_1 - Идентфикатор предмета, который на нечётной неделе
      \param[in] $subj_2 - Идентфикатор предмета, который на чётной неделе
      \return TRUE - успешно, FALSE - ошибка
    */
    
    public function changePair(int $grp, int $day, int $pair, int $subj_1, int $subj_2) : bool
    {
      $change_query = $this->dbc()->prepare("UPDATE `schedule`     SET `subj_1`=:s1, `subj_2`=:s2      WHERE `id_grp`=:g AND `pair`=:p AND `_day`=:d");
      $change_query->bindValue(":g", $grp);
      $change_query->bindValue(":d", $day);
      $change_query->bindValue(":p", $pair);
      $change_query->bindValue(":s1", $subj_1);
      $change_query->bindValue(":s2", $subj_2);
            
      return $change_query->execute();
    }
    
    /*!
      \brief Изменяет предмет в изменениях в расписании
      \param[in] $grp     - Идентификатор группы
      \param[in] $day     - День недели
      \param[in] $pair    - Пара
      \param[in] $subject - Идентфикатор предмета
      \return TRUE - успешно, FALSE - ошибка
    */
    
    public function changeChangedPair(int $grp, string $day, int $pair, int $subject) : bool
    {
      $change_query = $this->dbc()->prepare("UPDATE `changed_schedule`     SET `subject`=:s     WHERE `id_grp`=:g AND `pair`=:p AND `_day`=:d");
      $change_query->bindValue(":g", $grp);
      $change_query->bindValue(":d", $day);
      $change_query->bindValue(":p", $pair);
      $change_query->bindValue(":s", $subject);
      
      return $change_query->execute();
    }
    
    /*!
      \brief Удаляет записи об изменениях в расписании
      \param[in] $grp - Идентификатор группы
      \return TRUE - успешно, FALSE - ошибка
    */
    
    public function deleteChangedPair(int $grp) : bool
    {
      $change_query = $this->dbc()->prepare("DELETE FROM `changed_schedule`     WHERE `id_grp`=:g");
      $change_query->bindValue(":g", $grp);
      
      return $change_query->execute();
    }
    
    /*!
      \brief Удаление записи о расписании
      \param[in] $schedule - Запись о расписании
      \warning Ожидает реализации
      \bug Хз, с начала времён тут
    */
    
    public function remove($schedule)
    {
      
    }
    
  }
  
?>
