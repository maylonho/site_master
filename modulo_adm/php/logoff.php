<?php
session_start();
$_SESSION = array();
session_destroy();
setcookie("usuario_logado", null, -1, "/");
header('Location:../pages/login.php');
?>