<?php
session_start();
include("../php/conexao.php");
include("../php/verifica_login.php");
include("../classes/class-estoque.php");
$estoque = new Estoque();
$_SESSION['pg'] = "estoque"; 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modulo administrador - Master</title> 
    <link rel="stylesheet" href="../css/estoque.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="shortcut icon" href="../imgs/favicon.ico" />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body style="margim: 0px; overflow-x: hidden;">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  
  <!--Menu nav Superior-->
  <?php include("../componentes/nav-bar-sup.php");?>    
  <div class="container-fluid">


    <div class="row mb-5">
      <div class="col-sm-4 col-md-3 col-lg-2 mb-3 text-center">
                        
        <!--Menu Lateral-->
        <?php include("../componentes/nav-lateral.php") ?>
            
      </div>


      <!--CORPO DO SITE PRINCIPAL-->
      <div class="col-sm-8 col-md-9 col-lg-10" style="background-color: rgb(255, 255, 255); height: 50vh;">

        <div class="produtos">
          <a href="?view=all">Mostrar todos os produtos</a>-----
          <a href="?#">Mostrar apenas disponiveis</a>
          <div class="col-12">
            <h3 style="text-align: left;"> - Rádios de UHF</h3>
          </div>
          <?php
            if(isset($_GET['view']) && $_GET['view'] == "all"){
              $estoque->listarEquipamentos("SELECT * FROM estoque WHERE tipo_equip='RADIO UHF'");
            }else{
              $estoque->listarEquipamentos("SELECT * FROM estoque WHERE tipo_equip='RADIO UHF' and qtd_equip>0");
            }
          ?>

          <div class="col-12 mt-5">
            <h3 style="text-align: left;"> - Rádios de VHF</h3>
          </div>
          <?php
            if(isset($_GET['view']) && $_GET['view'] == "all"){
              $estoque->listarEquipamentos("SELECT * FROM estoque WHERE tipo_equip='RADIO VHF'");
            }else{
              $estoque->listarEquipamentos("SELECT * FROM estoque WHERE tipo_equip='RADIO VHF' and qtd_equip>0");
            }
        
          ?>

          <!-- ATUALIZA O NUMERO DE RADIOS EM ESTOQUE -->
          <?php
            if(isset($_GET['id_equip']) && isset($_GET['qtd_equip']) && isset($_GET['qtd_equip']) && isset($_GET['salvar_eq'])){
              $estoque->updateEquipamento();
            }
          ?>
        </div>


      </div>


    </div>
        
        
  </div><!--Final do container-fluid-->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="submit" name="excluir" class="btn btn-danger">Continuar</button>
        </div>
      </div>
    </div>
  </div>

</body>
</html>