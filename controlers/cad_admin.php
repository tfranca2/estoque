<?php
	require_once('models/cad_admin.php');
	$erros = 0;
	$usuario = array();
	
	if(@isset($_POST['salvar']) or @isset($_POST['editar'])){	
		$usuario = array(
			  'nome' => mysql_real_escape_string(@$_POST['nome'])
			, 'email' => mysql_real_escape_string(@$_POST['email'])
			, 'telefone' => mysql_real_escape_string(@$_POST['telefone'])
			, 'login' => mysql_real_escape_string(@$_POST['login'])
		);
		if(@isset($_POST['salvar'])){
			if(@isset($_POST['senha']) and @!empty($_POST['senha'])){
				$usuario['senha'] = md5(@$_POST['senha']);
			}else{
				$erros = 1;
				alerta("A senha n&atilde;o pode ser vazia!");
			}
		}		
		if(@$_POST['editar'])
			unset($usuario['login']);
			
		foreach( $usuario as $valor ) {
			if(empty($valor)) {
				$erros = 1;
				alerta("Preencha todos os campos corretamente!");
				break;
			}
		}
		
		$usuario['ativo'] = (!empty($_POST['ativo']))?1:0 ;
		if(@isset($_GET['editar']) or @isset($_GET['excluir']))
			$usuario['id_administrador'] = mysql_real_escape_string(@$_GET['editar']);
			
		
		if(@isset($_POST['editar'])){
			if(@isset($_POST['senha']) and @!empty($_POST['senha']))
				$usuario['senha'] = md5(@$_POST['senha']);
		}
			
		if(!$erros){
			if(isset($_POST['salvar']))
				cadastrar_usuario($usuario);
			else if(isset($_POST['editar']))
				editar_usuario($usuario);
		}
	}else if(@isset($_GET['excluir'])){
		$usuario = array('id_administrador' => mysql_real_escape_string(@$_GET['excluir']));
		excluir_usuario($usuario);
	}
?>