<?php
	require_once('controlers/cad_produtos.php');
	require_once('models/crud.class.php');
	
	if(@isset($_GET['editar'])){
		$editar = MD5($_GET['editar']);
		$crud = new crud('produtos');
		$result = $crud->selecionar('',"MD5(`id_produto`)='".$editar."' LIMIT 1");
		
	} else if(@isset($_GET['excluir'])){
		$excluir = MD5($_GET['excluir']);
	}
?>

<script>
	$(function() {
		//$( "#datepicker" ).datepicker();
		//$( "#format" ).change(function() {
			//$( "#datepicker" ).datepicker( "option", "dateFormat", "dd/mm/yy" );
		//});
	});
</script>

			<form action="" method="post" class="form">
				<div class="delimiter">
					<label>  <input type="text" name="produto" <?php @printf('value="%s"',$result[0]['produto']); ?> placeholder="Produto:" class="input-block-level" /> </label>
					<label>  <input type="text" name="marca" <?php @printf('value="%s"',$result[0]['marca']); ?> placeholder="Marca:" class="input-block-level" /> </label>
					<label>  <input type="text" name="modelo" <?php @printf('value="%s"',$result[0]['modelo']); ?> placeholder="Modelo:" class="input-block-level" /> </label>
					<label>  <input type="text" name="lote" <?php @printf('value="%s"',$result[0]['lote']); ?> placeholder="Lote:" class="input-block-level" /> </label>
					<label>  <input type="text" name="cod_bar" <?php @printf('value="%s"',$result[0]['cod_bar']); ?> placeholder="C&oacute;digo de barras:" class="input-block-level" /> </label>
					<label>  <input type="text" name="validade" <?php @printf('value="%s"',converteData($result[0]['validade'])); ?> placeholder="Validade:" id="datepicker" class="input-block-level" /> </label>
					<label>  <input type="text" name="preco_compra" <?php @printf('value="%s"',$result[0]['preco_compra']); ?> placeholder="Pre&ccedil;o da compra:" id="datepicker" class="input-block-level" /> </label>
					<label>Fornecedor:
					<select name="fornecedor" id="fornecedor" class="selectpicker"><option value=""></option>
					 <?php
					$crud = new crud('fornecedores');
					$for = $crud->selecionar("`id_fornecedor`,`fornecedor`","");
					foreach($for as $forn){
						if(@$forn['id_fornecedor'] == @$result[0]['id_fornecedor'])
							echo "\n\t\t\t".'<option value="'.$forn['id_fornecedor'].'" selected>'.$forn['fornecedor'].'</option>';		
						else
							echo "\n\t\t\t".'<option value="'.$forn['id_fornecedor'].'">'.$forn['fornecedor'].'</option>';
					}
					?>
					</select> </label>
					<script type="text/javascript">
					  $(document).ready(function(e) {
						  //$('.selectpicker').selectpicker();
					  });
					</script>
					<input type="reset" name="cancelar" value="Cancelar" class="btn btn-danger btn-block" onclick='location.href="?pagina=lis_produtos"' />
					<input type="submit" name="<?php echo (@$result[0]['produto'])?"editar":"salvar"; ?>" value="Salvar" class="btn btn-large btn-success btn-block" />
				</div>
			</form>