<?php
session_start();
include("../classes/class-log.php");
$log->cadLog("Fez logout");
$_SESSION = array();
session_destroy();
setcookie("usuario_logado", null, -1, "/");
header('Location:../pages/login.php');


?>