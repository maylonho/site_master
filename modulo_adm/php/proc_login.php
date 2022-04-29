<?php
include("../php/conexao.php");
session_start();

$usuario = mysqli_real_escape_string($conexao ,trim($_POST['login']));
$senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));

$sql = "SELECT *,COUNT(login_func) FROM funcionario WHERE login_func='$usuario' AND senha_func='$senha'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);




if($row['COUNT(login_func)'] == 1){
    $_SESSION['usuario_logado'] = strtoupper($usuario);
    $_SESSION['usuario_cor'] =  $row['cor_func'];
    setcookie("usuario_logado", $_SESSION['usuario_logado'], time() + 7 * (24 * 3600), "/");
    setcookie("usuario_cor", $_SESSION['usuario_cor'], time() + 7 * (24 * 3600), "/");
    header('Location:../pages/home.php');
}else{
    $_SESSION['usuario_invalido'] = true;
    header('Location:../pages/login.php');
}

?>