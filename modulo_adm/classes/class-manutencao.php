<?php

class Servicos {

    public function listarManut($consulta){
        include("../php/conexao.php");
        $sql = $consulta;
        $result = mysqli_query($conexao, $sql);
        echo "
        <table class='table'>
            <thead>
            <tr>
                <th class='col-md-2 d-none d-md-table-cell' scope='col'>Data</th>
                <th class='col-md-1 d-none d-md-table-cell' scope='col'>Modelo</th>
                <th scope='col'>N° Série</th>
                <th scope='col'>Defeito</th>
                <th scope='col'>Solução</th>
                <!-- <th scope='col'>Status</th> -->
            </tr>
            </thead>
            <tbody>";
        while($row = mysqli_fetch_assoc($result)){
            $id_servico = $row['id_servico'];
            $data_servico = $row['data_servico'];
            $modelo_servico = $row['modelo_servico'];
            $numero_serie_servico = $row['numero_serie_servico'];
            $defeito_servico = $row['defeito_servico'];
            $solucao_servico = $row['solucao_servico'];
            $status_servico = $row['status_servico'];

            $linkedit ="solucao_servico=" . str_replace(' ', '+', $solucao_servico) . "&";
            $linkedit .= "modelo_servico=" . str_replace(' ', '+', $modelo_servico) . "&";
            $linkedit .= "status_servico=" . str_replace(' ', '+', $status_servico) . "&";
            $linkedit .= "numero_serie_servico=" . str_replace(' ', '+', $numero_serie_servico) . "&";
            $linkedit .= "defeito_servico=" . str_replace(' ', '+', $defeito_servico) . "&";
            $linkedit .= "id_servico=" . str_replace(' ', '+', $id_servico) . "&";
            $linkedit .= "modo=editar";



                $cor_linha = "linha_tabela_branco";
                $corlinhaon = "linha_tabela_azul";

             
            echo 
            "
                <tr class='linha_tabela $cor_linha' onmouseover=setAttribute('id','$corlinhaon') onmouseout=setAttribute('id','$cor_linha') onclick=location.href='cadManut.php?$linkedit'>
                    <td class='col-md-2 d-none d-md-table-cell'>".$data_servico."</td>
                    <td class='col-md-1 d-none d-md-table-cell'>".$modelo_servico."</td>
                    <td class='col-1'>".$numero_serie_servico."</td>
                    <td class='col-4'>".$defeito_servico."</td>
                    <td class='col-4'>".$solucao_servico."</td>
                    <!-- <td class='col-4'>".$status_servico."</td> --> 
                </tr>
            
            ";
        }
        echo "</tbody>
        </table>";
    }



    public function listarManutSelec($consulta){
        include("../php/conexao.php");
        $sql = $consulta;
        $result = mysqli_query($conexao, $sql);
        echo "
        <table class='table'>
            <thead>
            <tr>
                <th scope='col'>Histórico</th>
            </tr>
            </thead>
            <tbody>";
        while($row = mysqli_fetch_assoc($result)){
            $id_servico = $row['id_servico'];
            $data_servico = $row['data_servico'];
            $defeito_servico = $row['defeito_servico'];
            $solucao_servico = $row['solucao_servico'];

            $linkedit ="solucao_servico=" . str_replace(' ', '+', $solucao_servico) . "&";
            $linkedit .= "defeito_servico=" . str_replace(' ', '+', $defeito_servico) . "&";
            $linkedit .= "id_servico=" . str_replace(' ', '+', $id_servico) . "&";
            $linkedit .= "modo=editar";



                $cor_linha = "linha_tabela_branco";
                $corlinhaon = "linha_tabela_azul";

             
            echo 
            "
                <tr>
                    <td class='col-md-2 d-none d-md-table-cell'>".$data_servico."</td>
                    <td class='col-4'>".$defeito_servico."</td>
                    <td class='col-4'>".$solucao_servico."</td>
                </tr>
            
            ";
        }
        echo "</tbody>
        </table>";
    }

    

    
    


}

?>