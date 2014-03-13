<?php
	require_once('models/cad_fornecedores.php');
	$erros = 0;
	$usuario = array();
	
	if(@isset($_POST['salvar']) or @isset($_POST['editar'])){	
		$usuario = array(
			  'fornecedor' => mysql_real_escape_string(@$_POST['fornecedor'])
			, 'end_fornecedor' => mysql_real_escape_string(@$_POST['endereco'])
			, 'cnpj_cpf' => mysql_real_escape_string(@$_POST['cnpj'])
			, 'cid_fornecedor' => mysql_real_escape_string(@$_POST['cidade'])
			, 'bair_fornecedor' => mysql_real_escape_string(@$_POST['bairro'])
			, 'cep_fornecedor' => mysql_real_escape_string(@$_POST['cep'])
			, 'tel_fornecedor' => mysql_real_escape_string(@$_POST['telefone'])
			, 'email_fornecedor' => mysql_real_escape_string(@$_POST['email'])
		);
		
		foreach( $usuario as $valor ) {
			if(empty($valor)) {
				$erros = 1;
				alerta("Preencha todos os campos corretamente!");
				break;
			}
		}
		
		if(@isset($_GET['editar']) or @isset($_GET['excluir']))
			$usuario['id_fornecedor'] = mysql_real_escape_string(@$_GET['editar']);
			
		if(!$erros){
			if(isset($_POST['salvar']))
				cadastrar_fornecedor($usuario);
			else if(isset($_POST['editar']))
				editar_fornecedor($usuario);
		}
	}else if(@isset($_GET['excluir'])){
		$usuario = array('id_fornecedor' => mysql_real_escape_string(@$_GET['excluir']));
		excluir_fornecedor($usuario);
	}
?>