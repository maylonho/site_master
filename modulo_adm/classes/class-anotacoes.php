<?php

class Anotacoes {

    public function listarNotas($consulta){
        include("../php/conexao.php");
        $sql = $consulta;
        $result = mysqli_query($conexao, $sql);

        while($row = mysqli_fetch_assoc($result)){
            $id_anotacao = $row['id_anotacao'];
            $titulo_anotacao = $row['titulo_anotacao'];
            $texto_anotacao = $row['texto_anotacao'];
            $cor_anotacao = $row['cor_anotacao'];
            $criador_anotacao = $row['criador_anotacao'];
     
            echo 
            "
            <div class='col-sm-6 col-md-3 col-lg-2 col-xxl-1'>
        
                <div class='card mb-5 bg-".$cor_anotacao." text-light'>
                    <form action='../php/proc_notas.php' method='POST'>
                        <input type='text' class='d-none' value='".$id_anotacao."' id='id_anotacao' name='id_anotacao'>
                        <div class='position-absolute top-0 end-0'>
                            <button type='submit' class='btn btn-sm text-light' name='excluir'>X</button>
                        </div>
                    </form>
                    <div class='card-body'>

                        <h5 class='card-title text-center'>".$titulo_anotacao."</h5>
                        <p class='card-text mb-2 text-center'>".$texto_anotacao."</p>

                    </div>      

                </div>   

            </div>

            
            ";
        }

    }

    

    
    


}

?>