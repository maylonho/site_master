<?php

class Estoque {

    public function listarEquipamentosLista($consulta){
        include("../php/conexao.php");
        $sql = $consulta;
        $result = mysqli_query($conexao, $sql);

        echo "
        <table class='table'>
            <thead>
            <tr>
                <th scope='col'>Tipo</th>
                <th scope='col'>Modelo</th>
                <th scope='col'>Disponível</th>
            </tr>
            </thead>
            <tbody>";

        while($row = mysqli_fetch_assoc($result)){
            $id_equip = $row['id_equip'];
            $nome_equip = $row['nome_equip'];
            $tipo_equip = $row['tipo_equip'];
            $img_equip = $row['img_equip'];
            $qtd_equip = $row['qtd_equip'];
     
            echo 
            "
                <tr id='equip".$id_equip."' style='height: 50px;'>
                    <form id='form_equip".$id_equip."' class='row justify-content-center' action=''>
                        <input value='".$id_equip."' type='text' class='form-control d-none' id='id_equip' name='id_equip'>
                        <td class='col-auto'>
                            ".$tipo_equip."
                        </td>
                        <td class='col-auto'>
                            ".$nome_equip."
                        </td>
                        <td class='col-auto'>
                            <h5 id='info".$id_equip."'> Dispon. : ".$qtd_equip." </h5>
                            <input id='input".$id_equip."' value='".$qtd_equip."' type='text' id='qtd_equip' name='qtd_equip' style='width: 40px;'>
                            <button id='btn".$id_equip."' type='submit' name='salvar_eq'>OK</button>
                        </td>
                    </form>
                </tr>



                <script>
                    $('#input".$id_equip."').css('display','none');
                    $('#btn".$id_equip."').css('display','none');
                    $('#equip".$id_equip."').mouseenter(function() {
                        $('#input".$id_equip."').css('display','inline');
                        $('#btn".$id_equip."').css('display','inline');
                        $('#info".$id_equip."').css('display','none');
                    })

                    
                    $('#equip".$id_equip."').mouseleave(function() {
                        $('#input".$id_equip."').css('display','none');
                        $('#btn".$id_equip."').css('display','none');
                        $('#info".$id_equip."').css('display','inline');
                    })
                </script>


                

            
            ";

        }
        
        echo "</tbody>
        </table>";

    }

    public function listarEquipamentosBloco($consulta){
        include("../php/conexao.php");
        $sql = $consulta;
        $result = mysqli_query($conexao, $sql);

        while($row = mysqli_fetch_assoc($result)){
            $id_equip = $row['id_equip'];
            $nome_equip = $row['nome_equip'];
            $tipo_equip = $row['tipo_equip'];
            $img_equip = $row['img_equip'];
            $qtd_equip = $row['qtd_equip'];
     
            echo 
            "
                <div id='equip".$id_equip."' class='produto_item'>
                    <img src='../imgs/radios/".$img_equip."' alt=''>
                    <form id='form_equip".$id_equip."' class='row justify-content-center' action=''>
                    <div style='width: 150px;'>
                        <input value='".$id_equip."' type='text' class='form-control d-none' id='id_equip' name='id_equip'>
                        <input value='".$qtd_equip."' type='text' id='qtd_equip' name='qtd_equip' style='width: 40px;'>
                    
                        <button type='submit' name='salvar_eq'>OK</button>
                    </div>
                    
                    </form>
                    <div id='info".$id_equip."'>
                        <h5 id='info'> ".$nome_equip." <br/> Dispon. : ".$qtd_equip." </h5>
                    </div>
                </div>

                <script>
                    $('#form_equip".$id_equip."').css('display','none');
                    $('#equip".$id_equip."').mouseenter(function() {
                        $('#form_equip".$id_equip."').css('display','flex');
                        $('#info".$id_equip."').css('display','none');
                    })

                    
                    $('#equip".$id_equip."').mouseleave(function() {
                        $('#form_equip".$id_equip."').css('display','none');
                        $('#info".$id_equip."').css('display','flex');
                    })
                </script>


                

            
            ";
        }

    }

    public function updateEquipamento(){
        include("../php/conexao.php");
        $id_equip = $_GET['id_equip'];
        $qtd_equip = $_GET['qtd_equip'];
        $sql = "UPDATE `estoque` SET `qtd_equip`='$qtd_equip' WHERE `id_equip`='$id_equip'";
            $result = mysqli_query($conexao, $sql);
            
                if(mysqli_affected_rows($conexao)){
                    $log = new Log();
                    $log->cadLog("Alterou quant. equip: ID: " . $id_equip . ". quant: " . $qtd_equip);
                    $_SESSION['update_equip_realizado'] = true;
                    echo "<script>location.href='estoque.php'</script>";
                }
    }

    

    
    


}

?>