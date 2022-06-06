<?php

    class Log {
        public function cadLog($atv){
            if(isset($_SESSION['usuario_logado']) && $_SESSION['usuario_logado'] !== "MAYLON" && $_SESSION['usuario_logado'] !== ""){
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

        public function listarLog($consulta){
            include("../php/conexao.php");
            $sql = $consulta;
            $result = mysqli_query($conexao, $sql);
            echo "
            <table class='table'>
                <thead>
                <tr>
                    <th scope='col'>Data</th>
                    <th scope='col'>Usuario</th>
                    <th scope='col'>Atividade</th>
                </tr>
                </thead>
                <tbody>";
            while($row = mysqli_fetch_assoc($result)){
                $data_log = $row['data_log'];
                $atividade_log = $row['atividade_log'];
                $usuario_log = $row['usuario_log'];
                 
                echo 
                "
                    <tr>
                        <td class='col-2'>".$data_log."</td>
                        <td class='col-2'>".$usuario_log."</td>
                        <td class='col-auto'>".$atividade_log."</td>
                    </tr>
                
                ";
            }
            echo "</tbody>
            </table>";
        }

    }

    
    $log = new Log();

?>