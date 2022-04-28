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
                <th scope='col'>Data</th>
                <th scope='col'>Modelo</th>
                <th scope='col'>N° Série</th>
                <th scope='col'>Defeito</th>
                <th scope='col'>Solução</th>
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

            $linkedit ="solucao_servico=" . str_replace(' ', '+', $solucao_servico) . "&";
            $linkedit .= "modelo_servico=" . str_replace(' ', '+', $modelo_servico) . "&";
            $linkedit .= "numero_serie_servico=" . str_replace(' ', '+', $numero_serie_servico) . "&";
            $linkedit .= "defeito_servico=" . str_replace(' ', '+', $defeito_servico) . "&";
            $linkedit .= "id_servico=" . str_replace(' ', '+', $id_servico) . "&";
            $linkedit .= "modo=editar";



                $cor_linha = "linha_tabela_branco";
                $corlinhaon = "linha_tabela_azul";

            
            echo 
            "
                <tr class='linha_tabela $cor_linha' onmouseover=setAttribute('id','$corlinhaon') onmouseout=setAttribute('id','$cor_linha') onclick=location.href='cadManut.php?$linkedit'>
                    <td class='col-2'>".$data_servico."</td>
                    <td class='col-1'>".$modelo_servico."</td>
                    <td class='col-1'>".$numero_serie_servico."</td>
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