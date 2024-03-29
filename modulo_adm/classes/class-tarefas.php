<?php

class Tarefas {

    public function listarTarefas($consulta){
        include("../php/conexao.php");
        $sql = $consulta;
        $result = mysqli_query($conexao, $sql);
        echo "
        <table class='table'>
            <thead>
            <tr>
                <th class='d-none d-sm-table-cell' scope='col'>Data</th>
                <th scope='col'>Nome</th>
                <th class='d-none d-sm-table-cell' scope='col'>Prioridade</th>
                <th scope='col'>Status</th>
                <th scope='col'> </th>
            </tr>
            </thead>
            <tbody>";
        while($row = mysqli_fetch_assoc($result)){


            $id_tarefa = $row['id_tarefa'];
            $data_tarefa = $row['data_tarefa'];
            $nome_tarefa = $row['nome_tarefa'];
            $descricao_tarefa = $row['descricao_tarefa'];
            $urgencia_tarefa = $row['urgencia_tarefa'];
            $criador_tarefa = $row['criador_tarefa'];
            $grau_conclusao = $row['grau_conclusao'];
            $status_tarefa = $row['status_tarefa'];
            $finalizado_tarefa = $row['finalizado_tarefa'];
            $img_status = "";
            $usuario_logado = $_SESSION['usuario_logado'];

            
            $sql_co = "SELECT count(id_tarefa) as `qtd_coment` FROM comentario_tarefas WHERE id_tarefa='$id_tarefa'";
            $result_co = mysqli_query($conexao, $sql_co);
            $comentarios = mysqli_fetch_assoc($result_co);
  
            $qtd_coment = $comentarios['qtd_coment'];


            if($finalizado_tarefa !== ""){
                for($i=0; $i<6; $i++){
                    if (mb_strpos($status_tarefa, "$i") !== false) {
                        $cor_ar = array("f00", "ff0", "f0f", "f80", "00f", "000");
                        $img_status .= "<div style='background-color: #".$cor_ar[$i]."; width: 20px; height: 20px; border-radius: 100px;'> &nbsp </div>";
                    }
                }
                    if ($grau_conclusao > 5) {
                        $img_status .= "<img src='../imgs/status/cor_concluido.png' width='20px'>";
                    }

            }else{
                $img_status = "<div style='background-color: #ddd; width: 20px; height: 20px; border-radius: 100px;'> &nbsp </div>";
            }

            
            

            $linkedit ="nome_tarefa=" . str_replace(' ', '+', $nome_tarefa) . "&";
            $linkedit .= "descricao_tarefa=" . str_replace(' ', '+', $descricao_tarefa) . "&";
            $linkedit .= "urgencia_tarefa=" . str_replace(' ', '+', $urgencia_tarefa) . "&";
            $linkedit .= "id_tarefa=" . str_replace(' ', '+', $id_tarefa) . "&";
            $linkedit .= "finalizado_tarefa=" . str_replace(' ', '+', $finalizado_tarefa) . "&";
            $linkedit .= "modo=editar";

            $linkedit = preg_replace('/[ ]|[\t]/', '+', $linkedit);
            
            $corlinhaon = "linha_tabela_azul";
            $corlinhaoff = "linha_tabela_branco";

            if($urgencia_tarefa == "Urgente"){
                $cor_linha = "linha_tabela_urgente";
                $corlinhaoff = "linha_tabela_urgente";
            }else{
                $cor_linha = "";
                $corlinhaoff = "linha_tabela_urgente";
            }
    
            echo 
            "
                <tr class='linha_tabela $cor_linha' onmouseover=setAttribute('id','$corlinhaon') onmouseout=setAttribute('id','$corlinhaoff') onclick=location.href='cadTarefas.php?$linkedit'>
                    <td class='d-none d-sm-table-cell'>".$data_tarefa."</td>
                    <td>".$nome_tarefa."</td>
                    <td class='d-none d-sm-table-cell'>".$urgencia_tarefa."</td>
                    <td>
                        <div class='d-flex'>
                            ". $img_status ."
                        </div>
                    </td>
                    <td>".$qtd_coment. " <img src='../imgs/coment.png' width='25px'></td>
                </tr>
            
            ";
        }
        echo "</tbody>
        </table>";
    }// fecha funcao listarTarefas

    
    public function listarComentTarefas($consulta){
        include("../php/conexao.php");
        $sql = $consulta;
        $result = mysqli_query($conexao, $sql);
        echo "
        <table class='table'>
            <thead>
            <tr>
                <th scope='col'>Comentários</th>
            </tr>
            </thead>
            <tbody>";
        while($row = mysqli_fetch_assoc($result)){
            $data_comentario = $row['data_comentario'];
            $texto_comentario = $row['texto_comentario'];
            $func_comentario = $row['func_comentario'];

            
            echo 
            "
                <tr>
                    <td>".$data_comentario."</td>
                    <td>".$texto_comentario."</td>
                    <td>Por: ".$func_comentario."</td>
                </tr>
            
            ";
        }
        echo "</tbody>
        </table>";
    }//fecha funcao listarComentTarefas

    
    public function enviarEmailTarefa($email_destino_t, $usuario_envia){
        //1 – Definimos Para quem vai ser enviado o email
        $para = $email_destino_t;
        $remetente = "nao-responder@masterradios.com.br";

        //2 - resgatar os campos digitados no formulário e grava nas variaveis
    
        $assunto = "NOVA TAREFA CRIADA POR " . $usuario_envia;
        $nome_tarefa = $_POST['nome_tarefa'];
        $descricao_tarefa = $_POST['descricao_tarefa'];
        $urgencia_tarefa = $_POST['urgencia_tarefa'];
    
        //4 – Agora definimos a  mensagem que vai ser enviado no e-mail
    
        $mensagem = "<strong>Tarefa: </strong>".$nome_tarefa;
        $mensagem .= "<br><br><br>  <strong>Descrição: </strong>".$descricao_tarefa;
        $mensagem .= "<br>          <strong>A tarefa tem prioridade: </strong>".$urgencia_tarefa;
        $mensagem .= "<br><br><br>  <strong>Master Radiocomunicação </strong>";
        $mensagem .= "<br>          <strong>Este e-mail foi enviado do Sistema ADM Interno</strong>";
        $mensagem .= "<br>          Não respoder esse email, email automatico.";
    
        $header = "MIME-Version: 1.0\n";
        $header .= "Content-type: text/html; charset=utf-8\n";
        $header .= "from: $remetente\n";
    
        $envio = mail($para, $assunto, $mensagem, $header);  //função que faz o envio do email.
    }

    public function enviarEmailTarefaTodos($usuario_envia){
        //1 – Definimos Para quem vai ser enviado o email
        $paraAnibal = "anibal@masterradios.com.br";
        $paraMaylon = "tecnica@masterradios.com.br";
        $paraEmily = "emily@masterradios.com.br";
        $paraEliana = "eliana@masterradios.com.br";
        //$paraKarol = "karoline@masterradios.com.br";
        $paraIsabela = "isabela@masterradios.com.br";

        $remetente = "nao-responder@masterradios.com.br";

        //2 - resgatar os campos digitados no formulário e grava nas variaveis
    
        $assunto = "NOVA TAREFA CRIADA POR " . $usuario_envia;
        $nome_tarefa = $_POST['nome_tarefa'];
        $descricao_tarefa = $_POST['descricao_tarefa'];
        $urgencia_tarefa = $_POST['urgencia_tarefa'];
    
        //4 – Agora definimos a  mensagem que vai ser enviado no e-mail
    
        $mensagem = "<strong>Tarefa: </strong>".$nome_tarefa;
        $mensagem .= "<br><br><br>  <strong>Descrição: </strong>".$descricao_tarefa;
        $mensagem .= "<br>          <strong>A tarefa tem prioridade: </strong>".$urgencia_tarefa;
        $mensagem .= "<br><br><br>  <strong>Master Radiocomunicação </strong>";
        $mensagem .= "<br>          <strong>Este e-mail foi enviado do Sistema ADM Interno</strong>";
        $mensagem .= "<br>          Não respoder esse email, email automatico.";
    
        $header = "MIME-Version: 1.0\n";
        $header .= "Content-type: text/html; charset=utf-8\n";
        $header .= "from: $remetente\n";
    
        $envio = mail($paraAnibal, $assunto, $mensagem, $header);  //função que faz o envio do email.
        $envio = mail($paraMaylon, $assunto, $mensagem, $header);  //função que faz o envio do email.
        $envio = mail($paraEmily, $assunto, $mensagem, $header);  //função que faz o envio do email.
        $envio = mail($paraEliana, $assunto, $mensagem, $header);  //função que faz o envio do email.
        //$envio = mail($paraKarol, $assunto, $mensagem, $header);  //função que faz o envio do email.
        $envio = mail($paraIsabela, $assunto, $mensagem, $header);  //função que faz o envio do email.
    }


    
}

?>