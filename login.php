<?php require_once('controlers/login.php'); ?>
		<form action="" class="form-signin" method="post">
			<h3 class="form-signin-heading">&Aacute;rea restrita.</h3>
			<h5 class="float-right">Por favor identifique-se:</h5>
				<input type="text" name="login" class="input-block-level" placeholder="Login" autofocus required />
				<input type="password" name="senha" class="input-block-level" placeholder="Senha" required />
				<label class="checkbox">
					<input type="checkbox" value="lembreme" /> Lembre-me
				</label>
				<input class="btn btn-large btn-primary btn-block" type="submit" value="Entrar" />
		</form>