<?php
	require_once('models/cad_produtos.php');
	$erros = 0;
	$produto = array();
	
	if(@isset($_POST['salvar']) or @isset($_POST['editar'])){	
		$produto = array(
			  'produto' => mysql_real_escape_string(@$_POST['produto'])
			, 'marca' => mysql_real_escape_string(@$_POST['marca'])
			, 'modelo' => mysql_real_escape_string(@$_POST['modelo'])
			, 'lote' => mysql_real_escape_string(@$_POST['lote'])
			, 'cod_bar' => mysql_real_escape_string(@$_POST['cod_bar'])
			, 'validade' => converteData(mysql_real_escape_string(@$_POST['validade']))
			, 'id_fornecedor' => mysql_real_escape_string(@$_POST['fornecedor'])
			, 'preco_compra' => mysql_real_escape_string(@$_POST['preco_compra'])
		);
		
		foreach( $produto as $valor ) {
			if(empty($valor)) {
				$erros = 1;
				alerta("Preencha todos os campos corretamente!");
				break;
			}
		}
		
		if(@isset($_GET['editar']) or @isset($_GET['excluir']))
			$produto['id_produto'] = mysql_real_escape_string(@$_GET['editar']);
			
		if(!$erros){
			if(isset($_POST['salvar'])) 
				cadastrar_produto($produto);
			else if(isset($_POST['editar'])) 
				editar_produto($produto);
		}
	}else if(@isset($_GET['excluir'])){
		$produto = array('id_produto' => mysql_real_escape_string(@$_GET['excluir']));
		excluir_produto($produto);
	}
?>