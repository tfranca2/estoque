<?php
	require_once('controlers/cad_admin.php');
	
	if(@isset($_GET['editar'])){
		$editar = MD5($_GET['editar']);
		$crud = new crud('administradores');
		$result = $crud->selecionar('',"MD5(`id_administrador`)='".$editar."' LIMIT 1");
		
	} else if(@isset($_GET['excluir'])){
		$excluir = MD5($_GET['excluir']);
	}
?>
			<form action="" method="post" class="form">
				<div class="delimiter">
					<label>  <input type="text" name="nome" <?php @printf('value="%s"',$result[0]['nome']); ?> placeholder="Nome:" class="input-block-level" /> </label>
					<label>  <input type="text" name="email" <?php @printf('value="%s"',$result[0]['email']); ?> placeholder="E-mail:" class="input-block-level" /> </label>
					<label>  <input type="text" name="telefone" <?php @printf('value="%s"',$result[0]['telefone']); ?> placeholder="Telefone:" class="input-block-level" /> </label>
					<label>  <input type="text" name="login" <?php @printf('value="%s"',$result[0]['login']); echo (@$result[0]['login'])?" disabled ":""; ?> placeholder="Login:" class="input-block-level" /> </label>
					<label>  <input type="password" name="senha" placeholder="Senha:" class="input-block-level" /> </label>
					<label class="checkbox">
						<input type="checkbox" name="ativo" <?php 
						if(@isset($_GET['editar']))
							echo (@$result[0]['ativo'])?" checked ":"";
						else
							echo " checked ";
						
						?> />Ativo</label>
					<br />
					<input type="reset" name="cancelar" value="Cancelar" class="btn btn-danger btn-block" onclick='location.href="index.php"' />
					<input type="submit" name="<?php echo (@$result[0]['login'])?"editar":"salvar"; ?>" value="Salvar" class="btn btn-large btn-success btn-block" />
				</div>
			</form>