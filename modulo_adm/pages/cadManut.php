<?php
session_start();
include("../php/verifica_login.php");
$_SESSION['pg'] = "cadManut"; 
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


    <div class="row mt-3">
        
      <div class="col-sm-4 col-md-3 col-lg-2 mb-3 text-center">
      <!--Menu Lateral-->
      <?php include("../componentes/nav-lateral.php") ?>
      </div>

      <!--CORPO DO SITE PRINCIPAL-->
      <div class="col-sm-8 col-md-9 col-lg-10" style="background-color: rgb(255, 255, 255); height: 80vh;">
                        
        <div class="container">

        <?php
          $id_servico = "";
          if(isset($_GET['id_servico'])){
            $id_servico = "?id_servico=". $_GET['id_servico'];
          }
          $inputoff = ""; 
          if($_SESSION['usuario_logado'] !== "MAYLON") : $inputoff = "readonly"; endif;
        ?>
          <form class="row g-3" method="POST" action="../php/proc_manut.php<?php echo $id_servico; ?>">

          <div class="col-md-4">
              <label for="numero_serie_servico" class="form-label">Número de Série</label>
              <input <?php echo $inputoff; ?>  tabindex="1" value="<?php if(isset($_GET['numero_serie_servico'])) : echo $_GET['numero_serie_servico']; endif; ?>" type="text" class="form-control" id="numero_serie_servico" name="numero_serie_servico" required>
            </div>
            <div class="col-md-8">
              <label for="defeito_servico" class="form-label">Problema</label>
              <input <?php echo $inputoff; ?>  tabindex="3" value="<?php if(isset($_GET['defeito_servico'])) : echo $_GET['defeito_servico']; endif; ?>" type="text" class="form-control" id="defeito_servico" name="defeito_servico" required>
            </div>
            <div class="col-md-4">
              <label for="modelo_servico" class="form-label">Modelo</label>
              <select disable  tabindex="2" type="text" class="form-select" id="modelo_servico" name="modelo_servico">
                <?php
                  if(isset($_GET['modelo_servico'])) : echo "<option selected>" . $_GET['modelo_servico'] . "</option>"; endif;
                ?>
                <option>PRO5150</option>
                <option>EP450</option>
                <option>DEP450</option>
                <option>DEP250</option>
                <option>DGP5050</option>
                <option>DGP8050</option>
                <option>DGP8050E</option>
                <option>DGP8550</option>
                <option>DGP8050EX</option>
                <option>DGP8550EX</option>
              </select>
            </div>
            <div class="col-md-8">
              <label for="solucao_servico" class="form-label">Solução</label>
              <input <?php echo $inputoff; ?>  tabindex="4" value="<?php if(isset($_GET['solucao_servico'])) : echo $_GET['solucao_servico']; endif; ?>" type="text" class="form-control" id="solucao_servico" name="solucao_servico" required>
            </div>

            <div class="col-md-9 row justify-content-end mt-5">
                
                <div class="col-auto">

                <?php
                  if(isset($_GET['modo']) && $_GET['modo'] == 'editar' && $_SESSION['usuario_logado'] == "MAYLON") :
                  ?>
                          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="definirDadosModal('Confimação', 'Tem certeza que deseja excluir a Tarefa?')">Excluir</button>
                          <button type='submit' name='salvar' class='btn btn-primary '>Salvar</button>



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
          if(isset($_SESSION['cad_manut_realizado'])) :
          ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sucesso!</strong> A Manutenção foi cadastrada com sucesso.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php 
          elseif(isset($_SESSION['cad_manut_erro'])) :
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>ERRO!</strong> Nao foi possivel cadastrar a manutenção, tente novamente.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
            endif;
            unset($_SESSION['cad_manut_realizado']);
            unset($_SESSION['cad_manut_erro']);
          ?>
        </div>
              
        </div>
    </div>      
    </div><!--Final do container-fluid-->




  </body>
</html>