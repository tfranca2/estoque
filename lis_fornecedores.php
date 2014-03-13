			<div class="form">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>C&oacute;digo</th>
							<th>Fornecedor</th>
							<th>CNPJ/CPF</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
							$crud = new crud('fornecedores');
							$result = $crud->selecionar('','');
							if($result){
								foreach($result as $forn){
									?>
									<tr>
										<td><?php echo $forn['id_fornecedor']; ?></td>
										<td><?php echo $forn['fornecedor']; ?></td>
										<td><?php echo $forn['cnpj_cpf']; ?></td>
										<td>
											<a href="?pagina=cad_fornecedores&editar=<?php echo $forn['id_fornecedor']; ?>" class="btn btn-warning">editar</a>
											<a href="?pagina=cad_fornecedores&excluir=<?php echo $forn['id_fornecedor']; ?>" class="btn btn-danger">excluir</a>
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