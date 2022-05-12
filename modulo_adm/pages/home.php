<?php
session_start();
include("../php/conexao.php");
include("../php/verifica_login.php");
$_SESSION['pg'] = "home";
include("../classes/class-anotacoes.php");
$anotacoes = new Anotacoes();


include("../classes/class-log.php");
$log->cadLog("Acessou a página Home");

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modulo administrador - Master</title> 

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="shortcut icon" href="../imgs/favicon.ico" />
</head>
<body style="margim: 0px; overflow-x: hidden;">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    
    <!--Menu nav Superior-->
    <?php include("../componentes/nav-bar-sup.php");?>
    <div class="container-fluid">
    
    <div>

    <div class="row mb-5">

      <!--Menu Lateral-->
      <div class="col-sm-4 col-md-3 col-lg-2 mb-3 text-center">  
        <?php include("../componentes/nav-lateral.php") ?>
      </div> <!-- FIM Menu Lateral-->


      <!--CORPO DO SITE DIREITO-->
      <div class="col-sm-8 col-md-9 col-lg-10" style="background-color: rgb(255, 255, 255); height: 50vh;">
          
        <h1 style="text-align: center;">Bem vindo ao modo administrador!</h1>

        <?php
          $usuario_logado = $_SESSION['usuario_logado'];
          $sql = "SELECT * FROM funcionario WHERE login_func='$usuario_logado'";
          $result = mysqli_query($conexao, $sql);
          $info_func = mysqli_fetch_assoc($result);

          $id_func = $info_func['nome_func'];
          $_SESSION['nome_func_logado'] = $id_func;
        ?>
        <div class="container d-flex justify-content-center mb-4">
          <h4>Funcionário: <?php echo $_SESSION['nome_func_logado']; ?></h4>
        </div>

      <!--CARDS NOTAS-->
       <div class="row justify-content-sm-center">
        
        <?php
          if(isset($_SESSION['usuario_logado'])){
            $anotacoes->listarNotas("SELECT * FROM anotacoes WHERE criador_anotacao='$usuario_logado' AND visualizado_anotacao=0");
          }

        ?>
        <div class="col-auto">
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="../imgs/add-branco.png" width="20px" alt="Anotações"></button>
        </div>
        

      </div> <!--FIM CARDS NOTAS-->

      </div> <!--FIM CORPO DO SITE DIREITO-->

    </div>
        
        
    </div>


        </div><!--Final do container-fluid-->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Adicionar Anotação</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="row g-3 justify-content-between" action="../php/proc_notas.php" method="POST">
          <div class="row modal-body" id="modal-body">
          
            <div class="col-sm-9">
              <label for="data-inicial" class="form-label">Título</label>
              <input type="text" class="form-control" id="titulo_anotacao" name="titulo_anotacao">
            </div>
            <div class="col-md-3">
              <label for="qtd_itens" class="form-label">Cor</label>
                <select type="text" class="form-select bg-success text-light" id="cor_anotacao" name="cor_anotacao">
                  <option value="success" class="bg-success">Verde</option>
                  <option value="dark" class="bg-dark">Preto</option>
                  <option value="primary" class="bg-primary">Azul</option>
                  <option value="danger" class="bg-danger">Vermelho</option>
                  <option value="info" class="bg-info">Azul claro</option>
                  <option value="warning" class="bg-warning">Amarelo</option>
                  <option value="secondary" class="bg-secondary">Cinza</option>
                </select>
              </div>
            <div class="col-sm-12">
              <label for="data-inicial" class="form-label">Descrição</label>
              <input type="text" class="form-control" id="texto_anotacao" name="texto_anotacao">
            </div>
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="submit" name='cadastrar' class="btn btn-danger">Continuar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>