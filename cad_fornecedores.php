<?php
	require_once('controlers/cad_fornecedores.php');
	
	if(@isset($_GET['editar'])){
		$editar = MD5($_GET['editar']);
		$crud = new crud('fornecedores');
		$result = $crud->selecionar('',"MD5(`id_fornecedor`)='".$editar."' LIMIT 1");
		
	} else if(@isset($_GET['excluir'])){
		$excluir = MD5($_GET['excluir']);
	}
?>
			<form action="" method="post" class="form">
				<div class="delimiter">
					<label>  <input type="text" name="codigo" <?php @printf('value="%s"',$result[0]['id_fornecedor']); ?> placeholder="C&oacute;digo:" disabled class="input-block-level" /> </label>
					<label>  <input type="text" name="fornecedor" <?php @printf('value="%s"',$result[0]['fornecedor']); ?> placeholder="Fornecedor:" class="input-block-level" /> </label>
					<label>  <input type="text" name="cnpj" <?php @printf('value="%s"',$result[0]['cnpj_cpf']); ?> placeholder="CNPJ/CPF:" class="input-block-level" /> </label>
					<label>  <input type="text" name="cidade" <?php @printf('value="%s"',$result[0]['cid_fornecedor']); ?> placeholder="Cidade:" class="input-block-level" /> </label>
					<label>  <input type="text" name="endereco" <?php @printf('value="%s"',$result[0]['end_fornecedor']); ?> placeholder="Endere&ccedil;o:" class="input-block-level" /> </label>
					<label>  <input type="text" name="bairro" <?php @printf('value="%s"',$result[0]['bair_fornecedor']); ?> placeholder="Bairro:" class="input-block-level" /> </label>
					<label>  <input type="text" name="cep" <?php @printf('value="%s"',$result[0]['cep_fornecedor']); ?> placeholder="CEP:" id="datepicker" class="input-block-level" /> </label>
					<label>  <input type="text" name="telefone" <?php @printf('value="%s"',$result[0]['tel_fornecedor']); ?> placeholder="Telefone:" id="datepicker" class="input-block-level" /> </label>
					<label>  <input type="text" name="email" <?php @printf('value="%s"',$result[0]['email_fornecedor']); ?> placeholder="E-mail:" id="datepicker" class="input-block-level" /> </label>
					<input type="reset" name="cancelar" value="Cancelar" class="btn btn-danger btn-block" onclick='location.href="?pagina=lis_produtos"' />
					<input type="submit" name="<?php echo (@$result[0]['fornecedor'])?"editar":"salvar"; ?>" value="Salvar" class="btn btn-large btn-success btn-block" />
				</div>
			</form>