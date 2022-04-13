<?php
session_start();
include("../php/conexao.php");
include("../php/verifica_login.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modulo administrador - Master</title> 

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    
</head>
<body style="margim: 0px; overflow-x: hidden;">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    
    <div class="container-fluid">
    <?php include("../componentes/nav-bar-sup.php");?>
    <div>


    <div class="row mb-5">
      <div class="col-sm-4 col-md-2 mb-3">
        
                
                                  
        <!--Menu Lateral-->
        <?php $_SESSION['pg'] = "home"; include("../componentes/nav-lateral.php") ?>
            
    
    
      </div>


        <!--CORPO DO SITE PRINCIPAL-->
        <div class="col-sm-8 col-md-10" style="background-color: rgb(255, 255, 255); height: 80vh;">
            <h1 style="text-align: center;">Bem vindo ao modo administrador!</h1>

        </div>


    </div>
        
        
    </div>
    <?php
          $usuario_logado = $_SESSION['usuario_logado'];
          $sql = "SELECT * FROM empresa WHERE email_empresa='$usuario_logado'";
          $result = mysqli_query($conexao, $sql);
          $info_empresa = mysqli_fetch_assoc($result);

          $id_empresa = $info_empresa['id_empresa'];
          $_SESSION['id_empresa_logada'] = $id_empresa;
        ?>
        <div class="container d-flex justify-content-center">
          <h4>ID do Cliente: <?php echo $_SESSION['id_empresa_logada']; ?></h4>
        </div>

        </div><!--Final do container-fluid-->
</body>
</html>