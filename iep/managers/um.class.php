<?php
  declare(strict_types = 1);
  namespace IEP\Managers;
  
  require_once "iep.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/iep/consts/typeusers.consts.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/user.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/teacher.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/student.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/parent.class.php";
  
  
  
  class UserManager extends IEP
  {
    
    public function add($user)
    {
      switch ($user->getUserType())
      {
        case USER_TYPE_TEACHER:
        {
          
        } break;
        case USER_TYPE_STUDENT:
        {
          
        } break;
        case USER_TYPE_PARENT:
        {
          
          
          
        } break;
        default:
        {
          $add_admin_query = $this->dbc()->prepare("call addAdmin(:sn, :fn, :pt, :email, :passwd)");
          
          $add_admin_query->bindValue(":sn", $user->getSn());
          $add_admin_query->bindValue(":fn", $user->getFn());
          $add_admin_query->bindValue(":pt", $user->getPt());
          $add_admin_query->bindValue(":email", $user->getEmail());
          $add_admin_query->bindValue(":passwd", $user->getPassword());
          
          return $add_admin_query->execute();
        } break;
      }
      
    }
    
    public function remove($user)
    {
      
      
    }
    
    
  }
  

?>