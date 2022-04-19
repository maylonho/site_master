<?php
    session_start();
    include("../php/conexao.php");
    include("../php/verifica_login.php");
    include("../classes/class-tarefas.php");
    $tarefas = new Tarefas();

    
    if(isset($_GET['id_tarefa'])) : $id_tarefa = mysqli_real_escape_string($conexao, trim($_GET['id_tarefa'])); endif;
    if(isset($_POST['nome_tarefa'])) : $nome_tarefa = mysqli_real_escape_string($conexao, trim($_POST['nome_tarefa'])); endif;
    if(isset($_POST['descricao_tarefa'])) : $descricao_tarefa = mysqli_real_escape_string($conexao, trim($_POST['descricao_tarefa'])); endif;
    if(isset($_POST['urgencia_tarefa'])) : $urgencia_tarefa = mysqli_real_escape_string($conexao, trim($_POST['urgencia_tarefa'])); endif;
    if(isset($_POST['comentario_tarefa'])) : $texto_comentario = mysqli_real_escape_string($conexao, trim($_POST['comentario_tarefa'])); endif;


    
    $usuario_logado = $_SESSION['usuario_logado'];

    function get_post_action($name)
    {
        $params = func_get_args();

        foreach ($params as $name) {
            if (isset($_POST[$name])) {
                return $name;
            }
        }
    }


    switch (get_post_action('cadastrar', 'excluir', 'salvar', 'finalizar', 'comentar')) {
        case 'cadastrar':
            $sql = "INSERT INTO tarefas (data_tarefa, nome_tarefa, descricao_tarefa, urgencia_tarefa, criador_tarefa) VALUES (NOW(), '$nome_tarefa', '$descricao_tarefa', '$urgencia_tarefa', '$usuario_logado')";
            if($conexao->query($sql) === TRUE) {
                $_SESSION['cad_tarefa_realizado'] = true;
            }else{
                $_SESSION['cad_tarefa_erro'] = true;
            }

            $conexao->close();
            $tarefas->enviarEmailTarefa("tecnica@masterradios.com.br", $usuario_logado);
            $tarefas->enviarEmailTarefa("sgi@masterradios.com.br", $usuario_logado);

            header('Location:../pages/cadTarefas.php');
            exit;
            break;

        case 'excluir':
            $sql = "DELETE FROM tarefas WHERE `id_tarefa`='$id_tarefa'";
            $result = mysqli_query($conexao, $sql);
            
                if(mysqli_affected_rows($conexao)){
                    $_SESSION['excluir_tarefa_realizado'] = true;
                    header("Location:../pages/listTarefas.php");
                }
            break;

        case 'salvar':
            $sql = "UPDATE `tarefas` SET `nome_tarefa`='$nome_tarefa', `descricao_tarefa`='$descricao_tarefa', `urgencia_tarefa`='$urgencia_tarefa'  WHERE  `id_tarefa`='$id_tarefa'";
            $result = mysqli_query($conexao, $sql);
            
                if(mysqli_affected_rows($conexao)){
                    $_SESSION['edit_tarefa_realizado'] = true;
                    echo "atualizacao ok";
                    header("Location:../pages/listTarefas.php");
                }
            break;


        case 'finalizar':
            $sql = "UPDATE `tarefas` SET `grau_conclusao`=grau_conclusao+1, finalizado_tarefa = concat(finalizado_tarefa, ', $usuario_logado')  WHERE  `id_tarefa`='$id_tarefa'";
            $result = mysqli_query($conexao, $sql);
            
                if(mysqli_affected_rows($conexao)){
                    $_SESSION['fina_tarefa_realizado'] = true;
                    echo "atualizacao ok";
                    header("Location:../pages/listTarefas.php");
                }
            break;
        
        case 'comentar':
            $sql = "INSERT INTO comentario_tarefas (id_tarefa, data_comentario, texto_comentario, func_comentario) VALUES ('$id_tarefa', NOW(), '$texto_comentario', '$usuario_logado')";
            if($conexao->query($sql) === TRUE) {
                $_SESSION['cad_coment_realizado'] = true;
            }else{
                $_SESSION['cad_coment_erro'] = true;
            }

            $conexao->close();

            //header('Location:../pages/cadTarefas.php');
            echo '<script>history.back();</script>';
            exit;
            break;

        default:
            echo "defaut";
    }









?>