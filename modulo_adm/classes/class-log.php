<?php

    class Log {
        public function cadLog($atv){
            if($_SESSION['usuario_logado'] !== "MAYLON"){
                include("../php/conexao.php");
                $sql = "INSERT INTO log (data_log, atividade_log, usuario_log) VALUES (NOW(), '$atv', '".$_SESSION['usuario_logado']."')";
                $conexao->query($sql);
            }
        }

        public function cadLog_erro($atv, $user_t){
            if($_SESSION['usuario_logado'] !== "MAYLON"){
                include("../php/conexao.php");
                $sql = "INSERT INTO log (data_log, atividade_log, usuario_log) VALUES (NOW(), '$atv', '$user_t')";
                $conexao->query($sql);
            }
        }
    }

    
    $log = new Log();

?>