<html>

<head>
	<title>Home</title>
	<meta charset="utf-8">
</head>

<body>
	<?php
	$url = (isset($_GET['url'])) ? $_GET['url'] : 'home';
	$url = array_filter(explode('/', $url));
	

	$file = $url[0] . '.php';

	if ($url[0] == "home") {
		include "home.php";
	}
	elseif ($url[0] == "estoque") {
		include "estoque.php";
	}
	elseif ($url[0] == "cadastrar-manutencao") {
		include "cadManut.php";
	}
	elseif ($url[0] == "cadastrar-tarefas") {
		include "cadTarefas.php";
	}
	elseif ($url[0] == "listar-manutencao") {
		include "listManut.php";
	}
	elseif ($url[0] == "listar-tarefas") {
		include "listTarefas.php";
	}
	else {
		include '404.php';
	}
	?>
</body>

</html>