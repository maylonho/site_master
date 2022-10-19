<?php
session_start();
include("../php/conexao.php");
include("../php/verifica_login.php");
include("../classes/class-estoque.php");
$estoque = new Estoque();
$_SESSION['pg'] = "estoque"; 

include("../classes/class-log.php");
$log->cadLog("Acessou a página Estoque");
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

        <?php
          // Codigo para pegar a url completa
          //$url = "http://" . $_SERVER['SERVER_NAME'] . 
          //$_SERVER['REQUEST_URI'];

          if(!isset($_SESSION['var_estoq_view'])) : $_SESSION['var_estoq_view'] = "disp"; endif;
          if(!isset($_SESSION['var_estoq_modo'])) : $_SESSION['var_estoq_modo'] = "bloco"; endif;

          if(isset($_GET['view'])) : $_SESSION['var_estoq_view'] = $_GET['view']; endif;
          if(isset($_GET['modo'])) : $_SESSION['var_estoq_modo'] = $_GET['modo']; endif;

        ?>
        <div class="row mt-2">
          <div class="col-8">
            <a class="me-2" id="mostrar_tudo" href="?view=all&modo=<?php echo $_SESSION['var_estoq_modo']; ?>">Mostrar todos os produtos</a>
            <a id="mostrar_disp" href="?view=disp&modo=<?php echo $_SESSION['var_estoq_modo']; ?>">Mostrar apenas disponiveis</a>
          </div>
          <div class="col-4 d-flex justify-content-end">
            <a class="me-2" href="?view=<?php echo $_SESSION['var_estoq_view']; ?>&modo=lista"><img src="../imgs/lista.png" width="30px"></a>
            <a href="?view=<?php echo $_SESSION['var_estoq_view']; ?>&modo=bloco"><img src="../imgs/blocos.png" width="30px"></a>
          </div>
        </div>

        <div class="produtos">
          
          <div class="col-12">
            <h3 style="text-align: left;"> - Rádios de UHF</h3>
          </div>
          <?php
            if($_SESSION['var_estoq_view'] == "all"){
              if($_SESSION['var_estoq_modo'] == "bloco"){
                $estoque->listarEquipamentosBloco("SELECT * FROM estoque WHERE tipo_equip='RADIO UHF'");
              }else{
                $estoque->listarEquipamentosLista("SELECT * FROM estoque WHERE tipo_equip='RADIO UHF'");
              }
            }
            else{
              if($_SESSION['var_estoq_modo'] == "bloco"){
                $estoque->listarEquipamentosBloco("SELECT * FROM estoque WHERE tipo_equip='RADIO UHF' and qtd_equip>0");
              }else{
                $estoque->listarEquipamentosLista("SELECT * FROM estoque WHERE tipo_equip='RADIO UHF' and qtd_equip>0");
              }
            }

          ?>

          <div class="col-12 mt-5">
            <h3 style="text-align: left;"> - Rádios de VHF</h3>
          </div>
          <?php
            if($_SESSION['var_estoq_view'] == "all"){
              echo "<script>$('#mostrar_tudo').hide();</script>";
              if($_SESSION['var_estoq_modo'] == "bloco"){
                $estoque->listarEquipamentosBloco("SELECT * FROM estoque WHERE tipo_equip='RADIO VHF'");
              }else{
                $estoque->listarEquipamentosLista("SELECT * FROM estoque WHERE tipo_equip='RADIO VHF'");
              }
            }
            else{
              echo "<script>$('#mostrar_disp').hide();</script>";
              if($_SESSION['var_estoq_modo'] == "bloco"){
                $estoque->listarEquipamentosBloco("SELECT * FROM estoque WHERE tipo_equip='RADIO VHF' and qtd_equip>0");
              }else{
                $estoque->listarEquipamentosLista("SELECT * FROM estoque WHERE tipo_equip='RADIO VHF' and qtd_equip>0");
              }
            }
        
          ?>

          <div class="col-12 mt-5">
            <h3 style="text-align: left;"> - Acessórios</h3>
          </div>
          <?php
            if($_SESSION['var_estoq_view'] == "all"){
              echo "<script>$('#mostrar_tudo').hide();</script>";
              if($_SESSION['var_estoq_modo'] == "bloco"){
                $estoque->listarEquipamentosBloco("SELECT * FROM estoque WHERE tipo_equip='ACESSORIO' order by nome_equip");
              }else{
                $estoque->listarEquipamentosLista("SELECT * FROM estoque WHERE tipo_equip='ACESSORIO' order by nome_equip");
              }
            }
            else{
              echo "<script>$('#mostrar_disp').hide();</script>";
              if($_SESSION['var_estoq_modo'] == "bloco"){
                $estoque->listarEquipamentosBloco("SELECT * FROM estoque WHERE tipo_equip='ACESSORIO' and qtd_equip>0 order by nome_equip");
              }else{
                $estoque->listarEquipamentosLista("SELECT * FROM estoque WHERE tipo_equip='ACESSORIO' and qtd_equip>0 order by nome_equip");
              }
            }
        
          ?>

          <!-- ATUALIZA O NUMERO DE RADIOS EM ESTOQUE -->
          <?php
            if(isset($_GET['id_equip']) && isset($_GET['qtd_equip']) && isset($_GET['salvar_eq'])){
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