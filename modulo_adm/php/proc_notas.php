<?php
    session_start();
    include("../php/verifica_login.php");
    include("../php/conexao.php");

    $id_anotacao = mysqli_real_escape_string($conexao, trim($_POST['id_anotacao']));
    $titulo_anotacao = mysqli_real_escape_string($conexao, trim($_POST['titulo_anotacao']));
    $texto_anotacao = mysqli_real_escape_string($conexao, trim($_POST['texto_anotacao']));
    $cor_anotacao = mysqli_real_escape_string($conexao, trim($_POST['cor_anotacao']));
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


    switch (get_post_action('cadastrar', 'excluir')) {
        case 'cadastrar':
            $sql = "INSERT INTO anotacoes (criador_anotacao, titulo_anotacao, texto_anotacao, cor_anotacao) VALUES ('$usuario_logado', '$titulo_anotacao', '$texto_anotacao', '$cor_anotacao')";
            if($conexao->query($sql) === TRUE) {
                $_SESSION['cad_notas_realizado'] = true;
            }else{
                $_SESSION['cad_notas_erro'] = true;
            }

            $conexao->close();

            header('Location:../pages/home.php');
            exit;
            break;

        case 'excluir':
            $sql = "DELETE FROM anotacoes WHERE `id_anotacao`='$id_anotacao'";
            $result = mysqli_query($conexao, $sql);
            
                if(mysqli_affected_rows($conexao)){
                    $_SESSION['excluir_notas_realizado'] = true;
                    header("Location:../pages/home.php");
                }
            break;


        default:
            echo "defaut";
    }









?>