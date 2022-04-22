<?php
session_start();
include("../php/conexao.php");
include("../php/verifica_login.php");
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
    <link rel="shortcut icon" href="../imgs/logo_icon.png" />
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
              <h1 style="text-align: center;">Estoque</h1>

              <div class="produtos">
          <div class="produto_item" onclick="window.location.href = 'pgs/ep450.html'">
            <img src="../imgs/radios/ep450.png" alt="">
            <h5>EP450<br/> UHF: 5 <br/> VHF: 4 </h5>
          </div>
          <div class="produto_item" onclick="window.location.href = 'pgs/dep450.html'">
            <img src="../imgs/radios/dep450.jpg" alt="">
            <h5>DEP450<br/> UHF: 5 <br/> VHF: 4 </h5>
          </div>
          <div class="produto_item" onclick="window.location.href = 'pgs/pro5150.html'">
            <img src="../imgs/radios/pro5150.png" alt="">
            <h5>PRO5150<br/> UHF: 5 <br/> VHF: 4 </h5>
          </div>
          <div class="produto_item" onclick="window.location.href = 'pgs/dgp4150.html'">
            <img src="../imgs/radios/DGP4150.webp" alt="">
            <h5>DGP4150<br/> UHF: 5 <br/> VHF: 4 </h5>
          </div>
          <div class="produto_item" onclick="window.location.href = 'pgs/dgp5050.html'">
            <img src="../imgs/radios/dgp5050.jpg" alt="">
            <h5>DGP5050<br/> UHF: 5 <br/> VHF: 4 </h5>
          </div>
          <div class="produto_item" onclick="window.location.href = 'pgs/dgp5550.html'">
            <img src="../imgs/radios/DGP5550.jpg" alt="">
            <h5>DGP5550<br/> UHF: 5 <br/> VHF: 4 </h5>
          </div>
          <div class="produto_item" onclick="window.location.href = 'pgs/dgp8050e.html'">
            <img src="../imgs/radios/dgp8050e.jpg" alt="">
            <h5>DGP8050E<br/> UHF: 5 <br/> VHF: 4 </h5>
          </div>
          <div class="produto_item" onclick="window.location.href = 'pgs/dgp8550e.html'">
            <img src="../imgs/radios/dgp8550e.jpg" alt="">
            <h5>DGP8550E<br/> UHF: 5 <br/> VHF: 4 </h5>
          </div>
          <div class="produto_item" onclick="window.location.href = 'pgs/dgp8050ex.html'">
            <img src="../imgs/radios/dgp8050ex.jpg" alt="">
            <h5>DGP8050EX<br/> UHF: 5 <br/> VHF: 4 </h5>
          </div>
          <div data-bs-toggle="modal" data-bs-target="#exampleModal" class="produto_item" onclick="definirDadosModal('Confimação', 'Tem certeza que deseja excluir a Tarefa?')">
            <img src="../imgs/radios/dgp8550ex.jpg" alt="">
            <h5>DGP8550EX<br/> UHF: 5 <br/> VHF: 4 </h5>
          </div>
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="">Excluir</button>
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