<?php
  require_once "start.php";
  require_once "iep/pages/index.page.class.php";

  use IEP\Structures\User;
  use IEP\Pages\IndexPage;

  $IndexPage = new IndexPage("Информационно-образовательный портал", "index.tpl");

	if (isset($_SESSION['user']) &&
      $_SESSION['user'] instanceof User
  ) {
    $IndexPage->setData("user", $_SESSION['user']);
  }

  $CT->assign($IndexPage->data());
  $CT->Show($IndexPage->template());

?>
