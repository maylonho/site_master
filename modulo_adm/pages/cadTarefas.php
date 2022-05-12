<?php
session_start();
include("../classes/class-tarefas.php");
include("../php/verifica_login.php");
$_SESSION['pg'] = "cadTarefas"; 
$tarefas = new Tarefas();

include("../classes/class-log.php");
$log->cadLog("Acessou a página Cadastro de Tarefas");
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Modulo administrador - Master Radios</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  
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

      <!--CORPO DO SITE PRINCIPAL-->
      <div class="col-sm-8 col-md-9 col-lg-10" style="background-color: rgb(255, 255, 255); height: 80vh;">
                        
        <div class="container">

        <?php
          $id_tarefa = "";
          if(isset($_GET['id_tarefa'])){
            $id_tarefa = "?id_tarefa=". $_GET['id_tarefa'];
          }
        ?>
          <form class="row g-3" method="POST" action="../php/proc_tarefas.php<?php echo $id_tarefa; ?>">

          <div class="col-md-9">
              <label for="nome_tarefa" class="form-label">Nome da Tarefa</label>
              <input value="<?php if(isset($_GET['nome_tarefa'])) : echo $_GET['nome_tarefa']; endif; ?>" type="text" class="form-control" id="nome_tarefa" name="nome_tarefa" required>
            </div>
            <div class="col-md-3">
              <label for="urgencia_tarefa" class="form-label">Prioridade</label>
              <select type="text" class="form-select" id="urgencia_tarefa" name="urgencia_tarefa">
                <?php
                  if(isset($_GET['urgencia_tarefa'])) : echo "<option selected>" . $_GET['urgencia_tarefa'] . "</option>"; endif;
                ?>
                <option>Leve</option>
                <option>Moderada</option>
                <option>Alta</option>
                <option>Urgente</option>
              </select>
            </div>
            <div class="col">
              <label for="descricao_tarefa" class="form-label">Descrição da Tarefa</label>
              <input value="<?php if(isset($_GET['descricao_tarefa'])) : echo $_GET['descricao_tarefa']; endif; ?>" type="text" class="form-control" id="descricao_tarefa" name="descricao_tarefa" required>
            </div>

            <?php
              if(isset($_SESSION['edit_tarefa_erro'])){
                echo $_SESSION['edit_tarefa_erro'];
              }
              unset($_SESSION['edit_tarefa_erro']);

              if(isset($_GET['finalizado_tarefa']) && $_GET['finalizado_tarefa']!="") :
            ?>
            <div class="row mt-4">
              <h5>Finalizado por: <?php echo $_GET['finalizado_tarefa']; ?></h5>
            </div>
            <?php
              endif;
            ?>
            <div class="row justify-content-end mt-5">
                
                <div class="col-auto">

                <?php
                  if(isset($_GET['modo']) && $_GET['modo'] == 'editar') :
                    $btn_off = ""; 
                    if($_SESSION['usuario_logado'] !== "ADMIN") : $btn_off = "disabled"; endif;
                  ?>
                    <button <?php echo $btn_off ?> type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="definirDadosModal('Confimação', 'Tem certeza que deseja excluir a Tarefa?')">Excluir</button>
                    <button type='submit' name='salvar' class='btn btn-primary '>Salvar</button>

                    <?php 
                      $finaliza_off = "";
                      if (mb_strpos($_GET['finalizado_tarefa'], $_SESSION['usuario_logado']) !== false && $_SESSION['usuario_logado'] !== "ANIBAL") {
                        $finaliza_off = "disabled";
                      }
                    ?>
                    <button <?php echo $finaliza_off; ?> type='submit' name='finalizar' class='btn btn-success '>Finalizar</button>



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


                  <?php 
                  elseif(!isset($_GET['modo'])) :
                    ?>
                    <button type='submit' name='cadastrar' class='btn btn-primary '>Cadastrar</button>
                    <?php 
                    endif;
                  ?>

                  </div>
            </div>
          </form>

          
          <?php
          if(isset($_SESSION['cad_tarefa_realizado'])) :
          ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sucesso!</strong> A Tarefa foi cadastrada com sucesso.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php 
          elseif(isset($_SESSION['cad_tarefa_erro'])) :
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>ERRO!</strong> Nao foi possivel cadastrar a tarefa, tente novamente.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
            endif;
            unset($_SESSION['cad_tarefa_realizado']);
            unset($_SESSION['cad_tarefa_erro']);
          ?>

          <?php
            if(isset($_GET['modo']) && $_GET['modo'] == 'editar'){
            $id_tarefa_coment = $_GET['id_tarefa'];
          ?>
          <form class="row g-3" method="POST" action="../php/proc_tarefas.php?id_tarefa=<?php echo $id_tarefa_coment; ?>">
            <div class="col-md-4">
              <input type="text" placeholder="Adicionar comentário" class="form-control" id="comentario_tarefa" name="comentario_tarefa">
            </div>
            <div class="col-md-4">
            <button type='submit' name='comentar' class='btn btn-primary '>Comentar</button>
            </div>
          </form>
          <?php
              $tarefas->listarComentTarefas("SELECT *,date_format(`data_comentario`,'%d/%m/%Y - %H:%i') as `data_comentario` FROM comentario_tarefas WHERE id_tarefa='$id_tarefa_coment' ORDER BY id_comentario DESC");
            }
          ?>
        </div>
              
        </div>
    </div>      
    </div><!--Final do container-fluid-->




  </body>
</html>