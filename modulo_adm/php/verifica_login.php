<?php
if(isset($_COOKIE["usuario_logado"])){
    $_SESSION['usuario_logado'] = $_COOKIE["usuario_logado"];
}
if(!isset($_SESSION['usuario_logado']) && !isset($_COOKIE["usuario_logado"])){
    header('Location:../pages/login.php');
}
?>