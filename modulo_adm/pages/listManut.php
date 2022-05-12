<?php
session_start();
include("../classes/class-manutencao.php");
include("../php/verifica_login.php");
$_SESSION['pg'] = "listManut"; 
$tarefas = new Servicos();

include("../classes/class-log.php");
$log->cadLog("Acessou a página Lista de Manutenções");
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
            <form class="row g-3 justify-content-between" action="listManut.php" method="GET">
          
              <div class="col-md-3">
                <label for="n" class="form-label">Número de Série</label>
                <input type="text" class="form-control" id="n" name="n">
              </div>
              <div class="col-md-3 mt-5">
                <button type="submit" class="btn btn-primary">Pesquisar</button>
              </div>

              <div class="col-md-3">
              <script>
                function alterarQuantidadeItens(){
                  var select = document.getElementById('qtd_itens');
                  var text = select.options[select.selectedIndex].value;
                  window.location.href='listManut.php?itens=' + text;
                }
              </script>
              <label for="qtd_itens" class="form-label">Itens na página</label>
                <select type="text" class="form-select" id="qtd_itens" onchange="alterarQuantidadeItens();">
                  <option value="all">Selecione</option>
                  <option value="50">50</option>
                  <option value="100">100</option>
                  <option value="200">200</option>
                  <option value="300">300</option>
                  <option value="all">Tudo</option>
                </select>
              </div>
              <div class="col-md-3 mt-5">
                  <div class="d-flex justify-content-end">
                      <?php
                        $btn_off = ""; 
                        if($_SESSION['usuario_logado'] !== "MAYLON") : $btn_off = "disabled"; endif;
                      ?>
                      <button <?php echo $btn_off ?> type="button" class="btn btn-danger" onclick="location.href='cadManut.php'"><img src="../imgs/add-branco.png" width="20px"> Criar</button>
                  </div>
              </div>

            </form>


            
              <div class="col-12 row">

              <?php
                  if(isset($_SESSION['excluir_manut_realizado']) || isset($_SESSION['edit_manut_realizado']) || isset($_SESSION['edit_manut_erro']) || isset($_SESSION['excluir_manut_erro'])){
                    if(isset($_SESSION['excluir_manut_realizado'])){ 
                      $oper = "<strong>Feito!</strong> Exclusão realizada com sucesso!";
                      $cor_d = 'success';
                    }elseif(isset($_SESSION['edit_manut_realizado'])){
                      $oper = "<strong>Feito!</strong> Edição realizada com sucesso!";
                      $cor_d = 'success';
                    }if(isset($_SESSION['excluir_manut_erro'])){ 
                      $oper = "<strong>Erro!</strong> Exclusão não realizada!";
                      $cor_d = 'danger';
                    }elseif(isset($_SESSION['edit_manut_erro'])){
                      $oper = "<strong>Erro!</strong> Edição não realizada!";
                      $cor_d = 'danger';
                    }
              ?>
                  <div class="alert alert-<?php echo $cor_d; ?> alert-dismissible fade show mt-5" role="alert">
                    <?php echo $oper; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              <?php
                  }
                  unset($_SESSION['excluir_manut_realizado']);
                  unset($_SESSION['edit_manut_realizado']);
                  unset($_SESSION['excluir_manut_erro']);
                  unset($_SESSION['edit_manut_erro']);
              ?>

              <!--TABELA-->
          
              <?php
                $qtd_itens = 50;
                if(isset($_GET['itens'])){
                  if($_GET['itens']=='all'){
                    $qtd_itens = 1000;
                  }else{
                    $qtd_itens = $_GET['itens'];
                  }
                }

                if(!isset($_GET['n']) ){
                  $tarefas->listarManut("SELECT *,date_format(`data_servico`,'%d/%m/%Y - %H:%i') as `data_servico` FROM servicos ORDER BY id_servico DESC LIMIT $qtd_itens");
                }
              
              
                if (isset($_GET['n'])) {
                  $numero_serie_servico = $_GET['n'];
                  $tarefas->listarManut("SELECT *,date_format(`data_servico`,'%d/%m/%Y - %H:%i') as `data_servico` FROM servicos WHERE numero_serie_servico like '%$numero_serie_servico%' ORDER BY id_servico DESC");


                }
                ?>
                  



               
      </div>
                
                </div>
            
            </div>
          </div>

    

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
            <button type="button" class="btn btn-primary" onclick=location.href=linkAtual()>Continuar</button>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      $(window).on('load',function(){
        //$('#exampleModal').modal('show');
      });
    </script>

  </div><!--Final container-fluid-->
  </body>
</html>