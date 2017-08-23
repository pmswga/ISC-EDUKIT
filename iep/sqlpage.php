<?php
  
  /*!
    
    \page sqlInfo База данных SQL
    \tableofcontents
    
    \section general Общие сведения
    
    
    
    \section dbc Технология доступа к базе данных
    
    
    \section sec Основные объекты базы данных
      Подразделы:
        \ref tables_sec,
        \ref views_sec
    
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
      Здесь описываем представления
    
  */
  
?>