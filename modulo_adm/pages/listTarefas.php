<?php
session_start();
include("../classes/class-tarefas.php");
include("../php/verifica_login.php");
$_SESSION['pg'] = "listTarefas"; 
$tarefas = new Tarefas();


include("../classes/class-log.php");
$log->cadLog("Acessou a página Lista de Tarefas");
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
            <form class="row g-3 justify-content-between" action="listTarefas.php" method="GET">
          
              <div class="col-8 col-md-3">
                <label for="data-inicial" class="form-label">Nome da Tarefa</label>
                <input type="text" class="form-control" id="nome" name="nome">
              </div>
              <div class="col-4 col-md-3 row justify-content-end justify-content-md-start mt-5">
                  <div class="col-auto">
                      <button type="submit" class="btn btn-primary">Pesquisar</button>
                  </div>
              </div>
              <div class="col-7 col-md-3 mt-5 text-end">
                  <div><a href="?mostrar=all">Mostrar tarefas finalizadas</a></div>
              </div>
              <div class="col-5 col-md-3 row justify-content-end mt-5">
                  <div class="col-auto">
                      <button type="button" class="btn btn-danger" onclick="location.href='cadTarefas.php'"><img src="../imgs/add-branco.png" width="20px"> Criar</button>
                  </div>
              </div>
            </form>

              <div class="col-12 row">

              <?php
                  if(isset($_SESSION['excluir_tarefa_realizado']) || isset($_SESSION['edit_tarefa_realizado'])){
                    if(isset($_SESSION['excluir_tarefa_realizado'])){ 
                      $oper = "Exclusão";
                    }elseif(isset($_SESSION['edit_tarefa_realizado'])){
                      $oper = "Edição";
                    }
              ?>
                  <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                    <strong>Feito!</strong> <?php echo $oper; ?> realizada com sucesso!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              <?php
                  }
                  unset($_SESSION['excluir_tarefa_realizado']);
                  unset($_SESSION['edit_tarefa_realizado']);
              ?>
                  <h1>...</h1>
              <!--TABELA-->
          
              <?php

                if(!isset($_GET['nome']) && !isset($_GET['mostrar'])){
                  $tarefas->listarTarefas("SELECT *,date_format(`data_tarefa`,'%d/%m/%Y - %H:%i') as `data_tarefa` FROM tarefas WHERE grau_conclusao<6 ORDER BY id_tarefa DESC");
                }
                if (isset($_GET['nome'])) {
                  $nome_tarefa = $_GET['nome'];
                  $tarefas->listarTarefas("SELECT *,date_format(`data_tarefa`,'%d/%m/%Y - %H:%i') as `data_tarefa` FROM tarefas WHERE nome_tarefa like '%$nome_tarefa%' ORDER BY id_tarefa DESC");
                }              
                if (isset($_GET['mostrar'])) {
                  $tarefas->listarTarefas("SELECT *,date_format(`data_tarefa`,'%d/%m/%Y - %H:%i') as `data_tarefa` FROM tarefas ORDER BY data_tarefa DESC");
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