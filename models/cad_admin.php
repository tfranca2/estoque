<?php
	require_once('crud.class.php');

	function cadastrar_usuario($usuario){
		$crud = new crud('administradores');	
		if($crud->selecionar("login","MD5(`login`)='".MD5($usuario['login'])."'")){
			alerta("Usu&aacute;rio j&aacute; cadastrado!");
		}else{
			$keys = array_keys($usuario);
			
			$campos = "`".implode("`, `", $keys)."`";
			$valores = "'".implode("', '", $usuario)."'";
			
			$crud->inserir($campos,$valores);
			header('location: ?pagina=lis_admin');
		}
	}
	
	function editar_usuario($usuario){
		$id = $usuario['id_administrador'];
		unset($usuario['id_administrador']);
		$campos = array_keys($usuario);
		$valores = array_values($usuario);

		for($i=0;$i<count($usuario);$i++)
			@$camposvalores .= " `".$campos[$i]."` = '".$valores[$i]."',";
		$camposvalores = substr($camposvalores, 0, strlen($camposvalores)-1);
		
		$crud = new crud('administradores');
		$crud->atualizar($camposvalores, "MD5(`id_administrador`)='".MD5($id)."'");
		header('location: ?pagina=lis_admin');
	}
	
	function excluir_usuario($usuario){
		if(!empty($usuario['id_administrador'])){
			$crud = new crud('administradores');
			$crud->deletar("MD5(`id_administrador`)='".MD5($usuario['id_administrador'])."'");
			header('location: ?pagina=lis_admin');
		}
	}
?>