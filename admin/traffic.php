<?php
	require_once "start.php";
	
  use IEP\Managers\UserManager;
  
	if (isset($_SESSION['admin'])) {
	
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
      $CT->assign("test", "Hello");
    }
  
		$CT->Show("traffic.tpl");
		
	} else {
    CTools::Redirect("login.php");
  }
  
?>
