<?php
	require_once "start.php";
	require_once "ini.class.php";
  
  $ini = new INI("file");
  $ini->addValue("Section", "var", "value");
  $ini->toFile();
  
  use IEP\Managers\UserManager;
  use IEP\Structures\User;
  
	if (isset($_SESSION['admin']) && 
     ($_SESSION['admin'] instanceof User) &&
     $UM->adminExists($_SESSION['admin'])
  ) {
	
    $UM = new UserManager($DB);
  
    $childrens = $UM->getAllStudents();
    
    $studentsByGroup = array();
    for ($i = 0; $i < count($childrens); $i++) {
      $studentsByGroup[$childrens[$i]->getGroup()->getNumberGroup()][] = $childrens[$i];
    }
    
    
    $CT->assign("studentsByGroup", $studentsByGroup);
  
    if (!empty($_POST['selectStudent'])) {
      $emailStudent = $_POST['emailStudent']; 
      
      $traffic = $UM->query("call getTrafficStudent(:s_email)", [":s_email" => $emailStudent]);
      
      $CT->assign("traffic", $traffic);
    }
  
		$CT->Show("traffic.tpl");
		
	} else {
    CTools::Redirect("login.php");
  }
  
?>
