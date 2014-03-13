<?php
	require_once('crud.class.php');

	function cadastrar_produto($produto){
		$campos = "`".implode("`, `", array_keys($produto))."`";
		$valores = "'".implode("', '", $produto)."'";

		$crud = new crud('produtos');	
		$crud->inserir($campos,$valores);
		header('location: ?pagina=lis_produtos');
	}
	
	function editar_produto($produto){
		$id = $produto['id_produto'];
		unset($produto['id_produto']);
		$campos = array_keys($produto);
		$valores = array_values($produto);

		for($i=0;$i<count($produto);$i++)
			@$camposvalores .= " `".$campos[$i]."` = '".$valores[$i]."',";
		$camposvalores = substr($camposvalores, 0, strlen($camposvalores)-1);
		$crud = new crud('produtos');
		$crud->atualizar($camposvalores, "MD5(`id_produto`)='".MD5($id)."'");
		header('location: ?pagina=lis_produtos');
	}
	
	function excluir_produto($produto){
		if(!empty($produto['id_produto'])){
			$crud = new crud('produtos');
			$crud->deletar("MD5(`id_produto`)='".MD5($produto['id_produto'])."'");
			header('location: ?pagina=lis_produtos');
		}
	}
?>