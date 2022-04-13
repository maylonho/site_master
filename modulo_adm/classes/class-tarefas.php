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
                <th scope='col'>Data</th>
                <th scope='col'>Nome</th>
                <th scope='col'>Prioridade</th>
                <th scope='col'>Criador</th>
                <th scope='col'>Status</th>
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
            $finalizado_tarefa = $row['finalizado_tarefa'];
            $img_status = "<img src='../imgs/status/nivel_0.png' width='100px'>";


            if($grau_conclusao==1){
                $img_status = "<img src='../imgs/status/nivel_1.png' width='100px'>";
            }
            elseif($grau_conclusao==2){
                $img_status = "<img src='../imgs/status/nivel_2.png' width='100px'>";
            }
            elseif($grau_conclusao==3){
                $img_status = "<img src='../imgs/status/nivel_3.png' width='100px'>";
            }
            elseif($grau_conclusao==4){
                $img_status = "<img src='../imgs/status/nivel_4.png' width='100px'>";
            }
            elseif($grau_conclusao>=4){
                $img_status = "<img src='../imgs/status/nivel_5.png' width='100px'>";
            }
            

            $linkedit ="nome_tarefa=" . str_replace(' ', '+', $nome_tarefa) . "&";
            $linkedit .= "nome_tarefa=" . str_replace(' ', '+', $nome_tarefa) . "&";
            $linkedit .= "descricao_tarefa=" . str_replace(' ', '+', $descricao_tarefa) . "&";
            $linkedit .= "urgencia_tarefa=" . str_replace(' ', '+', $urgencia_tarefa) . "&";
            $linkedit .= "id_tarefa=" . str_replace(' ', '+', $id_tarefa) . "&";
            $linkedit .= "finalizado_tarefa=" . str_replace(' ', '+', $finalizado_tarefa) . "&";
            $linkedit .= "modo=editar";

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
                    <td>".$data_tarefa."</td>
                    <td>".$nome_tarefa."</td>
                    <td>".$urgencia_tarefa."</td>
                    <td>".$criador_tarefa."</td>
                    <td>".$img_status."</td>
                </tr>
            
            ";
        }
        echo "</tbody>
        </table>";
    }

    

    
    


}

?>