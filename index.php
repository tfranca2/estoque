<?php
	session_start();
	require_once('funcoes.php');
	require_once('models/crud.class.php');
	
	$pagina = array(
				  "login" => "login.php"
				, "cad_admin" => "cad_admin.php"
				, "cad_produtos" => "cad_produtos.php"
				, "cad_fornecedores" => "cad_fornecedores.php"
				, "lis_admin" => "lis_admin.php"
				, "lis_produtos" => "lis_produtos.php"
				, "lis_fornecedores" => "lis_fornecedores.php"
				, "menu" => "menu.php"
				, "logout" => "logout.php"
				//, "" => ""
			);
	$getp = @$_GET['pagina'];
	//unset($_GET);
	//unset($_POST);
?>
<!DOCTYPE HTML>
<html lang="pt-BR">
	<head>
		<meta charset="UTF-8">
		<title> Sistema de Estoque</title>
		<link rel="shortcut icon" href="img/favicon.ico" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="css/custom.css"/>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery-ui.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/bootstrap-dropdown.min.js"></script>
		<script type="text/javascript" src="js/bootbox.min.js"></script>
		<script type="text/javascript" src="js/bootstrap-select.js"></script>
	</head>
	<body>
		<div class="container">
			<?php
				if(@$_SESSION['login']){
					include $pagina['menu'];
					if(@$pagina[$getp])
						include $pagina[$getp];
					else
						include $pagina['lis_admin'];
				}else{
					include $pagina['login'];
				}
			?>
		</div>
	</body>
</html>