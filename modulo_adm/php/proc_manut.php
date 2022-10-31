<?php
    session_start();
    include("../php/verifica_login.php");
    include("../php/conexao.php");

    $id_servico = mysqli_real_escape_string($conexao, trim($_GET['id_servico']));
    $modelo_servico = mysqli_real_escape_string($conexao, trim($_POST['modelo_servico']));
    $numero_serie_servico = strtoupper(mysqli_real_escape_string($conexao, trim($_POST['numero_serie_servico'])));
    $defeito_servico = mysqli_real_escape_string($conexao, trim($_POST['defeito_servico']));
    $solucao_servico = mysqli_real_escape_string($conexao, trim($_POST['solucao_servico']));
    $status_servico = mysqli_real_escape_string($conexao, trim($_POST['status_servico']));


    function get_post_action($name)
    {
        $params = func_get_args();

        foreach ($params as $name) {
            if (isset($_POST[$name])) {
                return $name;
            }
        }
    }


    switch (get_post_action('cadastrar', 'excluir', 'salvar')) {
        case 'cadastrar':
            $sql = "INSERT INTO servicos (data_servico, modelo_servico, numero_serie_servico, defeito_servico, solucao_servico, status_servico) VALUES (NOW(), '$modelo_servico', '$numero_serie_servico', '$defeito_servico', '$solucao_servico', '$status_servico')";
            if($conexao->query($sql) === TRUE) {
                $_SESSION['cad_manut_realizado'] = true;
            }else{
                $_SESSION['cad_manu_erro'] = true;
            }

            $conexao->close();

            header('Location:../pages/cadManut.php');
            exit;
            break;

        case 'excluir':
            $sql = "DELETE FROM servicos WHERE `id_servico`='$id_servico'";
            $result = mysqli_query($conexao, $sql);
            
                if(mysqli_affected_rows($conexao)){
                    $_SESSION['excluir_manut_realizado'] = true;
                    header("Location:../pages/listManut.php");
                }
            break;

        case 'salvar':
            $sql = "UPDATE `servicos` SET `numero_serie_servico`='$numero_serie_servico', `modelo_servico`='$modelo_servico', `defeito_servico`='$defeito_servico', `solucao_servico`='$solucao_servico', `status_servico`='$status_servico'  WHERE  `id_servico`='$id_servico'";
            $result = mysqli_query($conexao, $sql);
            
                if(mysqli_affected_rows($conexao)){
                    $_SESSION['edit_manut_realizado'] = true;
                    echo "atualizacao ok";
                    header("Location:../pages/listManut.php");
                }else{
                    $_SESSION['edit_manut_erro'] = true;
                    header("Location:../pages/listManut.php");
                }
            break;


        default:
            echo "defaut";
    }









?>