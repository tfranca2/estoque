<?php
	require_once('models/login.php');
	require_once('funcoes.php');

	$login = @$_POST['login'];
	$senha = @$_POST['senha'];
	
	if(isset($login) and isset($senha)){
		if( !fazerLogin($login, $senha) )
			alerta("Login e/ou senha inv&aacute;lidos!");
		else
			header("Location: ?pagina=lis_admin");
	}
?>