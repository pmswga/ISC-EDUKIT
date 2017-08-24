<?php
  
  /*!
    
    \page sqlInfo База данных SQL
    \tableofcontents
    
    \section general Общие сведения
    
    
    
    \section dbc Технология доступа к базе данных
    
      \htmlonly
      
        <p>В качестве контроллера для доступа к базе данных используюется PDO (PHP Data Objects)</p>
        <p>Больше об PDO вы можете узнать в <a href="http://php.net/manual/ru/book.pdo.php" target="_blank">офицальной документации</a></p>
        
      \endhtmlonly  
    
    \section sec Основные объекты базы данных
      Подразделы:
        \ref tables_sec,
        \ref views_sec,
        \ref functions_sec,
        \ref stored_proc_sec,
        \ref triggers_sec
    
    \subsection tables_sec Таблицы
      В этом разделе описываются все таблицы, включая их поля, типы данных и индексы
      
      \htmlonly
      
        <fieldset>
          <legend id="users">Users</legend>
          <table border='1' cellpadding='15' width="100%">
            <tbody>
              <tr>
                <th>Имя</th>
                <th>Тип</th>
                <th>Примечание</th>
              </tr>
              <tr>
                <td>id_user</td>
                <td>int(11)</td>
                <td>AI, PK</td>
              </tr>
              <tr>
                <td>sn</td>
                <td>char(30)</td>
                <td></td>
              </tr>
              <tr>
                <td>fn</td>
                <td>char(30)</td>
                <td></td>
              </tr>
              <tr>
                <td>pt</td>
                <td>char(30)</td>
                <td></td>
              </tr>
              <tr>
                <td>email</td>
                <td>char(255)</td>
                <td></td>
              </tr>
              <tr>
                <td>passwd</td>
                <td>char(32)</td>
                <td></td>
              </tr>
              <tr>
                <td>id_type_user</td>
                <td>int(11)</td>
                <td><a href="#typeUsers">FK</a></td>
              </tr>
            </tbody>
          </table>
        </fieldset>
        
        <br>
        
        <fieldset>
          <legend id="typeUsers">TypeUsers</legend>
          <table border='1' cellpadding='15' width="100%">
            <tbody>
              <tr>
                <th>Имя</th>
                <th>Тип</th>
                <th>Примечание</th>
              </tr>
              <tr>
                <td>id_type_user</td>
                <td>int(11)</td>
                <td>AI, PK</td>
              </tr>
              <tr>
                <td>description</td>
                <td>char(30)</td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </fieldset>
        
        <br>
        
        <fieldset>
          <legend id="students">Students</legend>
          <table border='1' cellpadding='15' width="100%">
            <tbody>
              <tr>
                <th>Имя</th>
                <th>Тип</th>
                <th>Примечание</th>
              </tr>
              <tr>
                <td>id_student</td>
                <td>int(11)</td>
                <td><a href="#users">PK</a></td>
              </tr>
              <tr>
                <td>home_address</td>
                <td>char(255)</td>
                <td></td>
              </tr>
              <tr>
                <td>cell_phone</td>
                <td>char(12)</td>
                <td></td>
              </tr>
              <tr>
                <td>grp</td>
                <td>int(11)</td>
                <td><a href="#groups">FK</a></td>
              </tr>
            </tbody>
          </table>
        </fieldset>
        
        <br>
        
        <fieldset>
          <legend id="groups">Groups</legend>
          <table border='1' cellpadding='15' width="100%">
            <tbody>
              <tr>
                <th>Имя</th>
                <th>Тип</th>
                <th>Примечание</th>
              </tr>
              <tr>
                <td>grp</td>
                <td>int(11)</td>
                <td>AI, PK</td>
              </tr>
              <tr>
                <td>description</td>
                <td>char(10)</td>
                <td></td>
              </tr>
              <tr>
                <td>edu_year</td>
                <td>char(10)</td>
                <td></td>
              </tr>
              <tr>
                <td>spec_id</td>
                <td>int(11)</td>
                <td><a href="#specialty">FK</a></td>
              </tr>
              <tr>
                <td>is_budget</td>
                <td>int(11)</td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </fieldset>
        
        <br>
        
        <fieldset>
          <legend id="specialty">Specialty</legend>
          <table border='1' cellpadding='15' width="100%">
            <tbody>
              <tr>
                <th>Имя</th>
                <th>Тип</th>
                <th>Примечание</th>
              </tr>
              <tr>
                <td>id_spec</td>
                <td>int(11)</td>
                <td>AI, PK</td>
              </tr>
              <tr>
                <td>code_spec</td>
                <td>char(10)</td>
                <td></td>
              </tr>
              <tr>
                <td>description</td>
                <td>char(255)</td>
                <td></td>
              </tr>
              <tr>
                <td>pdf_file</td>
                <td>char(255)</td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </fieldset>
        
        <br>
        
        <fieldset>
          <legend id="parents">Parents</legend>
          <table border='1' cellpadding='15' width="100%">
            <tbody>
              <tr>
                <th>Имя</th>
                <th>Тип</th>
                <th>Примечание</th>
              </tr>
              <tr>
                <td>id_parent</td>
                <td>int(11)</td>
                <td><a href="#users">PK</a></td>
              </tr>
              <tr>
                <td>age</td>
                <td>int(11)</td>
                <td></td>
              </tr>
              <tr>
                <td>education</td>
                <td>char(50)</td>
                <td></td>
              </tr>
              <tr>
                <td>work_place</td>
                <td>char(255)</td>
                <td></td>
              </tr>
              <tr>
                <td>post</td>
                <td>char(255)</td>
                <td></td>
              </tr>
              <tr>
                <td>home_address</td>
                <td>char(30)</td>
                <td></td>
              </tr>
              <tr>
                <td>cell_phone</td>
                <td>char(30)</td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </fieldset>
        
        <br>
        
        <fieldset>
          <legend id="parent_child">Parent_child</legend>
          <table border='1' cellpadding='15' width="100%">
            <tbody>
              <tr>
                <th>Имя</th>
                <th>Тип</th>
                <th>Примечание</th>
              </tr>
              <tr>
                <td>id_parent</td>
                <td>int(11)</td>
                <td><a href="#parents">PK</a></td>
              </tr>
              <tr>
                <td>id_children</td>
                <td>int(11)</td>
                <td><a href="#students">PK</a></td>
              </tr>
              <tr>
                <td>id_type_user</td>
                <td>int(11)</td>
                <td><a href="#relations">FK</a></td>
              </tr>
            </tbody>
          </table>
        </fieldset>
        
        <br>
        
        <fieldset>
          <legend id="relations">Relations</legend>
          <table border='1' cellpadding='15' width="100%">
            <tbody>
              <tr>
                <th>Имя</th>
                <th>Тип</th>
                <th>Примечание</th>
              </tr>
              <tr>
                <td>id_relation</td>
                <td>int(11)</td>
                <td>AI, PK</td>
              </tr>
              <tr>
                <td>description</td>
                <td>char(255)</td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </fieldset>
        
        <br>
        
        <fieldset>
          <legend id="teachers">Teachers</legend>
          <table border='1' cellpadding='15' width="100%">
            <tbody>
              <tr>
                <th>Имя</th>
                <th>Тип</th>
                <th>Примечание</th>
              </tr>
              <tr>
                <td>id_teacher</td>
                <td>int(11)</td>
                <td><a href="#users">PK</a></td>
              </tr>
              <tr>
                <td>info</td>
                <td>text</td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </fieldset>
        
        <br>
        
        <fieldset>
          <legend id="teacher_subjects">Teacher_subjects</legend>
          <table border='1' cellpadding='15' width="100%">
            <tbody>
              <tr>
                <th>Имя</th>
                <th>Тип</th>
                <th>Примечание</th>
              </tr>
              <tr>
                <td>id_teacher</td>
                <td>int(11)</td>
                <td><a href="#teachers">PK</a></td>
              </tr>
              <tr>
                <td>id_subject</td>
                <td>int(11)</td>
                <td><a href="#subjects">PK</a></td>
              </tr>
            </tbody>
          </table>
        </fieldset>
        
        <br>
        
        <fieldset>
          <legend id="subjects">Subjects</legend>
          <table border='1' cellpadding='15' width="100%">
            <tbody>
              <tr>
                <th>Имя</th>
                <th>Тип</th>
                <th>Примечание</th>
              </tr>
              <tr>
                <td>id_subject</td>
                <td>int(11)</td>
                <td>AI, PK</td>
              </tr>
              <tr>
                <td>description</td>
                <td>char(255)</td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </fieldset>
        
        <br>
        
        <fieldset>
          <legend id="news">News</legend>
          <table border='1' cellpadding='15' width="100%">
            <tbody>
              <tr>
                <th>Имя</th>
                <th>Тип</th>
                <th>Примечание</th>
              </tr>
              <tr>
                <td>id_news</td>
                <td>int(11)</td>
                <td>AI, PK</td>
              </tr>
              <tr>
                <td>description</td>
                <td>char(255)</td>
                <td></td>
              </tr>
              <tr>
                <td>caption</td>
                <td>char(255)</td>
                <td></td>
              </tr>
              <tr>
                <td>content</td>
                <td>text</td>
                <td></td>
              </tr>
              <tr>
                <td>id_author</td>
                <td>int(11)</td>
                <td><a href="#users">FK</a></td>
              </tr>
              <tr>
                <td>date_publication</td>
                <td>date</td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </fieldset>
        
        <br>
        
        <fieldset>
          <legend id="tests">Tests</legend>
          <table border='1' cellpadding='15' width="100%">
            <tbody>
              <tr>
                <th>Имя</th>
                <th>Тип</th>
                <th>Примечание</th>
              </tr>
              <tr>
                <td>id_test</td>
                <td>int(11)</td>
                <td>AI, PK</td>
              </tr>
              <tr>
                <td>id_subject</td>
                <td>int(11)</td>
                <td><a href="#subjects">FK</a></td>
              </tr>
              <tr>
                <td>id_teacher</td>
                <td>int(11)</td>
                <td><a href="#teachers">FK</a></td>
              </tr>
              <tr>
                <td>caption</td>
                <td>char(255)</td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </fieldset>
        
        <br>
        
        <fieldset>
          <legend id="questions">Questions</legend>
          <table border='1' cellpadding='15' width="100%">
            <tbody>
              <tr>
                <th>Имя</th>
                <th>Тип</th>
                <th>Примечание</th>
              </tr>
              <tr>
                <td>id_question</td>
                <td>int(11)</td>
                <td>AI, PK</td>
              </tr>
              <tr>
                <td>id_test</td>
                <td>int(11)</td>
                <td><a href="#tests">FK</a></td>
              </tr>
              <tr>
                <td>question</td>
                <td>char(255)</td>
                <td></td>
              </tr>
              <tr>
                <td>r_answer</td>
                <td>char(255)</td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </fieldset>
        
        <br>
        
        <fieldset>
          <legend id="answers">Answers</legend>
          <table border='1' cellpadding='15' width="100%">
            <tbody>
              <tr>
                <th>Имя</th>
                <th>Тип</th>
                <th>Примечание</th>
              </tr>
              <tr>
                <td>id_answer</td>
                <td>int(11)</td>
                <td>AI, PK</td>
              </tr>
              <tr>
                <td>id_question</td>
                <td>int(11)</td>
                <td><a href="#questions">FK</a></td>
              </tr>
              <tr>
                <td>answer</td>
                <td>char(255)</td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </fieldset>
        
        <br>
        
        <fieldset>
          <legend id="groups_tests">Groups_tests</legend>
          <table border='1' cellpadding='15' width="100%">
            <tbody>
              <tr>
                <th>Имя</th>
                <th>Тип</th>
                <th>Примечание</th>
              </tr>
              <tr>
                <td>id_test</td>
                <td>int(11)</td>
                <td><a href="#tests">PK</a></td>
              </tr>
              <tr>
                <td>id_grp</td>
                <td>int(11)</td>
                <td><a href="#groups">PK</a></td>
              </tr>
            </tbody>
          </table>
        </fieldset>
        
        <br>
        
        <fieldset>
          <legend id="admins">Admins</legend>
          <table border='1' cellpadding='15' width="100%">
            <tbody>
              <tr>
                <th>Имя</th>
                <th>Тип</th>
                <th>Примечание</th>
              </tr>
              <tr>
                <td>id_admin</td>
                <td>int(11)</td>
                <td>AI, PK</td>
              </tr>
              <tr>
                <td>sn</td>
                <td>char(30)</td>
                <td></td>
              </tr>
              <tr>
                <td>fn</td>
                <td>char(30)</td>
                <td></td>
              </tr>
              <tr>
                <td>pt</td>
                <td>char(30)</td>
                <td></td>
              </tr>
              <tr>
                <td>email</td>
                <td>char(30)</td>
                <td></td>
              </tr>
              <tr>
                <td>passwd</td>
                <td>char(32)</td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </fieldset>
        
        <br>
        
        <fieldset>
          <legend id="admin_news">Admin_news</legend>
          <table border='1' cellpadding='15' width="100%">
            <tbody>
              <tr>
                <th>Имя</th>
                <th>Тип</th>
                <th>Примечание</th>
              </tr>
              <tr>
                <td>id_news</td>
                <td>int(11)</td>
                <td>AI, PK</td>
              </tr>
              <tr>
                <td>description</td>
                <td>char(255)</td>
                <td></td>
              </tr>
              <tr>
                <td>caption</td>
                <td>char(255)</td>
                <td></td>
              </tr>
              <tr>
                <td>content</td>
                <td>text</td>
                <td></td>
              </tr>
              <tr>
                <td>id_author</td>
                <td>int(11)</td>
                <td><a href="#admins">FK</a></td>
              </tr>
              <tr>
                <td>date_publication</td>
                <td>date</td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </fieldset>
        
        <br>
        
        <fieldset>
          <legend id="schedule">Schedule</legend>
          <table border='1' cellpadding='15' width="100%">
            <tbody>
              <tr>
                <th>Имя</th>
                <th>Тип</th>
                <th>Примечание</th>
              </tr>
              <tr>
                <td>id_grp</td>
                <td>int(11)</td>
                <td><a href="#groups">PK</a></td>
              </tr>
              <tr>
                <td>_day</td>
                <td>int(11)</td>
                <td>PK</td>
              </tr>
              <tr>
                <td>pair</td>
                <td>int(11)</td>
                <td>PK</td>
              </tr>
              <tr>
                <td>subject</td>
                <td>int(11)</td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </fieldset>
        
        <br>
        
        <fieldset>
          <legend id="changed_schedule">Changed_schedule</legend>
          <table border='1' cellpadding='15' width="100%">
            <tbody>
              <tr>
                <th>Имя</th>
                <th>Тип</th>
                <th>Примечание</th>
              </tr>
              <tr>
                <td>id_grp</td>
                <td>int(11)</td>
                <td><a href="#groups">PK</a></td>
              </tr>
              <tr>
                <td>_day</td>
                <td>datetime</td>
                <td>PK</td>
              </tr>
              <tr>
                <td>pair</td>
                <td>int(11)</td>
                <td>PK</td>
              </tr>
              <tr>
                <td>subject</td>
                <td>int(11)</td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </fieldset>
        
        
        
      \endhtmlonly
      
    
    \subsection views_sec Представления
      
      \htmlonly
        
        <table border='1' cellpadding='15' width="100%">
          <tbody>
            <tr>
              <th>Название</th>
              <th>Описание</th>
            </tr>
            <tr>
              <td>v_Admins</td>
              <td>Администраторы</td>
            </tr>
            <tr>
              <td>v_Users</td>
              <td>Пользователи</td>
            </tr>
            <tr>
              <td>v_Students</td>
              <td>Студенты</td>
            </tr>
            <tr>
              <td>v_Teachers</td>
              <td>Преподаватели</td>
            </tr>
            <tr>
              <td>v_Elders</td>
              <td>Старосты</td>
            </tr>
            <tr>
              <td>v_Parents</td>
              <td>Родители</td>
            </tr>
            <tr>
              <td>v_Groups</td>
              <td>Группы</td>
            </tr>
            <tr>
              <td>v_Specialtyes</td>
              <td>Специальности</td>
            </tr>
            <tr>
              <td>v_Subjects</td>
              <td>Предметы</td>
            </tr>
            <tr>
              <td>v_News</td>
              <td>Новости (от преподавателей)</td>
            </tr>
            <tr>
              <td>v_Traffic</td>
              <td>Посещаемость</td>
            </tr>
            <tr>
              <td>v_Relations</td>
              <td>Отношения между родителем и ребёнком</td>
            </tr>
            <tr>
              <td>v_Tests</td>
              <td>Тесты</td>
            </tr>
          </tbody>
        </table>
          
      \endhtmlonly
      
    \subsection functions_sec Функции
    
      Ниже приведён список функций, которые используются для возврата идентификаторов
      
      \htmlonly
      
        <ul>
          <li>getAdminId</li>
          <li>getUserId</li>
          <li>getStudentId</li>
          <li>getElderId</li>
          <li>getParentId</li>
          <li>getTeacherId</li>
          <li>getSubjectId</li>
          <li>getSpecialtyId</li>
          <li>getGroupId</li>
          <li>isGroupHaveElder</li>
          <li>isEmail</li>
          <li>TrafficFixed</li>
        </ul>
      
      \endhtmlonly
    
    \subsection stored_proc_sec Хранимые процедуры
    
      \htmlonly
      
        <fieldset>
          <legend>Вспомогательные процедуры</legend>
          <ul>
            <li>getTeacherID</li>
            <li>getStudentID</li>
            <li>getElderID</li>
            <li>getParentID</li>
            <li>getSubjectID</li>
          </ul>
        </fieldset>
      
        <fieldset>
          <legend>Работа с логами</legend>
          <ul>
            <li>writeLog</li>
            <li>readLogs</li>
            <li>compressLogs</li>
            <li>clearLogs</li>
          </ul>
        </fieldset>
      
        <fieldset>
          <legend>Работа с группами</legend>
          <ul>
            <li>addGroup</li>
            <li>removeGroup</li>
            <li>changeDescriptionGroup</li>
            <li>changeSpecGroup</li>
            <li>upCourse</li>
            <li>getAllGroups</li>
          </ul>
        </fieldset>
      
        <fieldset>
          <legend>Работа с новостями</legend>
          <ul>
            <li>addNews</li>
            <li>addAdminNews</li>
            <li>removeNews</li>
            <li>changeCaptionNews</li>
            <li>changeContentNews</li>
            <li>getNews</li>
            <li>getAllNews</li>
            <li>getAdminNews</li>
            <li>clearAllNews</li>
          </ul>
        </fieldset>
      
        <fieldset>
          <legend>Работа с отношениями (между родителем и ребёнком</legend>
          <ul>
            <li>addRelation</li>
            <li>removeRelation</li>
            <li>getAllRelations</li>
          </ul>
        </fieldset>
      
        <fieldset>
          <legend>Работа с расписанием</legend>
          <ul>
            <li>addScheduleEntry</li>
            <li>addChangeSchedule</li>
            <li>getScheduleGroup</li>
            <li>getChangeScheduleGroup</li>
            <li>getAllScheduleGroup</li>
            <li>getAllChangedSchedule</li>
            <li>changePair</li>
            <li>changeChangedSchedulePair</li>
          </ul>
        </fieldset>
      
        <fieldset>
          <legend></legend>
        </fieldset>
      
        <fieldset>
          <legend></legend>
        </fieldset>
      
        <fieldset>
          <legend></legend>
        </fieldset>
      
        <fieldset>
          <legend></legend>
        </fieldset>
      
        <fieldset>
          <legend></legend>
        </fieldset>
      
        <fieldset>
          <legend></legend>
        </fieldset>
      
        <fieldset>
          <legend></legend>
        </fieldset>
      
        <fieldset>
          <legend></legend>
        </fieldset>
      
        <fieldset>
          <legend></legend>
        </fieldset>
      
      \endhtmlonly
    
    \subsection triggers_sec Триггеры
    
      \htmlonly
      
        <fieldset>
          <legend>Проверка данных</legend>
          <ul>
            <li>insUser</li>
            <li>insTypeUser</li>
            <li>insAdmin</li>
            <li>insStudents</li>
            <li>insGroup</li>
            <li>insSpecialty</li>
            <li>insParent</li>
            <li>insRelation</li>
            <li>insTeacher</li>
            <li>insNews</li>
            <li>insSubject</li>
            <li>insTest</li>
            <li>insQuestion</li>
            <li>insStudentTest</li>
            <li>insStudentAnswer</li>
            <li>insStudentTraffic</li>
          </ul>
        </fieldset>
      
        <fieldset>
          <legend>Ведение лога данных</legend>
          <ul>
            <li>log_insUser</li>
            <li>log_uptUser</li>
            <li>log_delUser</li>
            <li>log_insAdmin</li>
            <li>log_uptAdmin</li>
            <li>log_delAdmin</li>
            <li>log_insStudent</li>
            <li>log_uptStudent</li>
            <li>log_delStudent</li>
            <li>log_insSubject</li>
            <li>log_uptSubject</li>
            <li>log_delSubject</li>
            <li>log_insSpecialty</li>
            <li>log_uptSpecialty</li>
            <li>log_delSpecialty</li>
          </ul>
        </fieldset>
      
      \endhtmlonly
      
    
  */
  
?>