			<div class="form">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Nome</th>
							<th>E-mail</th>
							<th>Telefone</th>
							<th>Login</th>
							<th>Ativo</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
							$crud = new crud('administradores');
							$result = $crud->selecionar('','');
							if($result){
								foreach($result as $user){
									?>
									<tr>
										<td><?php echo $user['nome']; ?></td>
										<td><?php echo $user['email']; ?></td>
										<td><?php echo $user['telefone']; ?></td>
										<td><?php echo $user['login']; ?></td>
										<td><img src="img/<?php
										if($user['ativo']) echo "save";
										else echo "drop";?>.gif" alt=""/></td>
										<td>
											<a href="?pagina=cad_admin&editar=<?php echo $user['id_administrador']; ?>" class="btn btn-warning">editar</a>
											<a href="?pagina=cad_admin&excluir=<?php echo $user['id_administrador']; ?>" class="btn btn-danger">excluir</a>
										</td>
									</tr>
								<?php
								}
							}else{
							?>
								<tr>
									<td colspan="6">Sem registros para exibir</td>
								</tr>
							<?php
							}
						?>
					</tbody>
				</table>
			</div>