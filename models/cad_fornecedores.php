<?php
	require_once('crud.class.php');

	function cadastrar_fornecedor($fornecedor){
		$campos = "`".implode("`, `", array_keys($fornecedor))."`";
		$valores = "'".implode("', '", $fornecedor)."'";

		$crud = new crud('fornecedores');	
		$crud->inserir($campos,$valores);
		header('location: ?pagina=lis_fornecedores');
	}
	
	function editar_fornecedor($fornecedor){
		$id = $fornecedor['id_fornecedor'];
		unset($fornecedor['id_fornecedor']);
		$campos = array_keys($fornecedor);
		$valores = array_values($fornecedor);

		for($i=0;$i<count($fornecedor);$i++)
			@$camposvalores .= " `".$campos[$i]."` = '".$valores[$i]."',";
		$camposvalores = substr($camposvalores, 0, strlen($camposvalores)-1);
		
		$crud = new crud('fornecedores');
		$crud->atualizar($camposvalores, "MD5(`id_fornecedor`)='".MD5($id)."'");
		header('location: ?pagina=lis_fornecedores');
	}
	
	function excluir_fornecedor($fornecedor){
		if(!empty($fornecedor['id_fornecedor'])){
			$crud = new crud('fornecedores');
			$crud->deletar("MD5(`id_fornecedor`)='".MD5($fornecedor['id_fornecedor'])."'");
			header('location: ?pagina=lis_fornecedores');
		}
	}
?>