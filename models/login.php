<?php
	require_once('crud.class.php');
	require_once('conexao.class.php');
	@session_start();
	
	
	function fazerLogin($login, $senha){
			$crud = new crud("administradores");
			$result = $crud->selecionar("","MD5(`login`) = '".MD5($login)."' AND ativo = 1 LIMIT 1 ");
			if(MD5($senha)==$result[0]['senha']){
				inicializaSession($result);
				return true;
			} else {
				return false;
			}
		
	}
	
	function inicializaSession($result){
		$_SESSION['id_administrador'] = $result[0]['id_administrador'];
		$_SESSION['nome'] = $result[0]['nome'];
		$_SESSION['email'] = $result[0]['email'];
		$_SESSION['telefone'] = $result[0]['telefone'];
		$_SESSION['login'] = $result[0]['login'];
		$_SESSION['senha'] = $result[0]['senha'];
		$_SESSION['ativo'] = $result[0]['ativo'];
	}
?>