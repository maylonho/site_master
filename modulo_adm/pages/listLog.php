<?php
session_start();
include("../php/verifica_login.php");
$_SESSION['pg'] = "listManut"; 

include("../classes/class-log.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modulo administrador - Master </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="../css/estilos.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../imgs/favicon.ico" />
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!--Scrips Pessoais - Funções -->
    <script src="../js/functions.js" ></script>

    <!--Menu nav Superior-->
    <?php include("../componentes/nav-bar-sup.php");?>    
    <div class="container-fluid">

    <div class="row mb-5">
          
      <div class="col-sm-4 col-md-3 col-lg-2 mb-3 text-center">
                    
        <!--Menu Lateral-->
        <?php include("../componentes/nav-lateral.php") ?>

      </div>
            
      <div class="col-sm-8 col-md-9 col-lg-10">
      
              
          <div class="container mt-3">
            
              <div class="col-12 row">

              <!--TABELA-->
          
              <?php
                if(1==1){
                  $log->listarLog("SELECT *,date_format(`data_log`,'%d/%m/%Y - %H:%i') as `data_log` FROM log ORDER BY id_log DESC LIMIT 1000");
                }
                ?>
                  



               
      </div>
                
        </div>
    
    </div>
  </div>

  </div><!--Final container-fluid-->
  </body>
</html>