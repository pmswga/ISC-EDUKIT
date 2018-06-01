<?php
	require_once "engine/ctemplater.php";
	require_once "engine/ctools.php";
	require_once "engine/cform.php";
	require_once "engine/settings.php";

	require_once "iep/structures/user.class.php";
	require_once "iep/managers/um.class.php";
	require_once "iep/managers/sbm.class.php";
	require_once "iep/managers/nm.class.php";
	require_once "iep/managers/gm.class.php";
	require_once "iep/managers/tm.class.php";
	require_once "iep/managers/trm.class.php";
	require_once "iep/managers/shm.class.php";
	require_once "iep/consts/typeusers.consts.php";

  use IEP\Managers\UserManager;
  use IEP\Managers\SubjectManager;
  use IEP\Managers\NewsManager;
  use IEP\Managers\GroupManager;
	use IEP\Managers\TestManager;
	use IEP\Managers\TrafficManager;
  use IEP\Managers\ScheduleManager;

	$ROOT_PATH = $_SERVER['DOCUMENT_ROOT']."/iep/v1.0";

	$CT = new CTemplater(
		$ROOT_PATH."/templates/tpl",
		$ROOT_PATH."/templates/tpl_c",
		$ROOT_PATH."/templates/configs",
		$ROOT_PATH."/templates/cache"
	);

	$DB = new PDO("mysql:dbname=".DATA_BASE_NAME.";host=127.0.0.1", USER_NAME, USER_PASSWORD);
  $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$DB->exec("SET NAMES utf8");

	$UM = new UserManager($DB);

	$SM = new SubjectManager($DB);

	$NM = new NewsManager($DB);

	$GM = new GroupManager($DB);

	$TM = new TestManager($DB);

  $TRM = new TrafficManager($DB);

	$SHM = new ScheduleManager($DB);

	$CT->assign("groups", $GM->getGroupsOfCurrentYear());

	session_start();
?>
