<?php

if(isset($_GET["url"])){

    $explode = explode("/", $_GET["url"]);

    /* Verificando se é uma página que mostra o texto do capítulo */
    if(isset($explode[0]) && isset($explode[1]) && isset($explode[2]) && !isset($explode[3])){

        include "paginas/capitulo.php";

    /* Página dos números do capítulo */
    }else if(isset($explode[0]) && !isset($explode[1]) && !isset($explode[2]) && !isset($explode[3])){

        if($explode[0] == "home"){

            include "pages/login.php";

        }else if($explode[0] == "cadastro"){

            include "paginas/cadastro.php";

        }

    /* Existencia de 4 valores na URL */
    }

}else{

    /* if(isset($_COOKIE["email_usuario_ab"]) && isset($_COOKIE["senha_usuario_ab"])){
        if(!isset($_SESSION["id_usuario_ab"])){
            header("location: php/login_automatico.php");
        }else{
            include "paginas/home.php";
        }
    }else{
        include "paginas/home.php";
    } */

    include "home.php";

}

?>