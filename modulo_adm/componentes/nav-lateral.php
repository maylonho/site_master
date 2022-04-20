<?php
if ($_SESSION['pg'] == 'home') {
    $pg = "active";
}elseif ($_SESSION['pg'] == 'cadContas') {
    $pg1 = "active";
}elseif ($_SESSION['pg'] == 'listProdutos') {
    $pg2 = "active";
}elseif ($_SESSION['pg'] == 'cadManut') {
    $pg3 = "active";
}elseif ($_SESSION['pg'] == 'listManut') {
    $pg4 = "active";
}elseif ($_SESSION['pg'] == 'estoque') {
    $pg5 = "active";
}


?>

<nav id="navbarVertical" class="navbar navbar-light bg-light">
                
    <nav class="nav nav-pills flex-column">
    
                        
    <ul class="nav flex-column nav-pills mt-3 mx-3">
    <li class="nav-item">
        <a class="nav-link <?php echo $pg;?>" href="home.php">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo $pg5;?>" href="estoque.php">Estoque</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo $pg1;?>" href="cadTarefas.php">Cadastrar Tarefa</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo $pg2;?>" href="listTarefas.php">Listar Tarefas</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo $pg3;?>" href="cadManut.php">Cadastrar Manut.</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo $pg4;?>" href="listManut.php">Listar Manut.</a>
    </li>
    </ul>
        
    </nav>

    <!--
    <nav class="nav nav-pills flex-column">
    
                        
    <ul class="nav flex-column nav-pills mt-3 mx-3">
    <li class="nav-item">
        <a class="nav-link <?php echo $pg;?>" href="home">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo $pg5;?>" href="estoque">Estoque</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo $pg1;?>" href="cadastrar-tarefas">Cadastrar Tarefa</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo $pg2;?>" href="listar-tarefas">Listar Tarefas</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo $pg3;?>" href="cadastrar-manutencao">Cadastrar Manut.</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo $pg4;?>" href="listar-manutencao">Listar Manut.</a>
    </li>
    </ul>
        
    </nav>

    -->

</nav>


