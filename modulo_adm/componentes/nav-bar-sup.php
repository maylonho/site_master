<?php

if ($_SESSION['pg'] == 'home') {
  $pg1 = "active";
}elseif ($_SESSION['pg'] == 'estoque') {
  $pg2 = "active";
}elseif ($_SESSION['pg'] == 'listTarefas') {
  $pg3 = "active";
}elseif ($_SESSION['pg'] == 'listManut') {
  $pg4 = "active";
}elseif ($_SESSION['pg'] == 'cadTarefas') {
  $pg5 = "active";
}elseif ($_SESSION['pg'] == 'cadManut') {
  $pg6 = "active";
}


$ocultar_elemento = ""; 
if($_SESSION['usuario_logado'] !== "MAYLON") : $ocultar_elemento = "d-none"; endif;

?>
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-secondary">
  <div class="container-fluid">
    <img src="../imgs/master_sgi.png" width="150px"/>  
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php echo $pg1;?>" aria-current="page" href="home.php">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $pg2;?>" aria-current="page" href="estoque.php">ESTOQUE</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             TAREFAS
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item <?php echo $pg5;?>" href="cadTarefas.php">Cadastrar Tarefa</a></li>
            <li><a class="dropdown-item <?php echo $pg3;?>" href="listTarefas.php">Listar Tarefas</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            MANUTENÇÃO
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

            <li><a class="dropdown-item <?php echo $ocultar_elemento ." ". $pg6;?>" href="cadManut.php">Cadastrar Manutenção</a></li>
            <li><a class="dropdown-item <?php echo $pg4;?>" href="listManut.php">Listar Manutenção</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex text-light" action="../php/logoff.php">
        <labe>Olá <?php echo $_SESSION['usuario_logado']; ?></label>
        <button class="btn btn-outline-light" type="submit">Sair</button>
      </form>
    </div>
  </div>
</nav>