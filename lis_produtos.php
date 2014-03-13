			<div class="form">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Produto</th>
							<th>Marca</th>
							<th>Modelo</th>
							<th>Lote</th>
							<th>C&oacute;d. de Barras</th>
							<th>Validade</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
							$crud = new crud('produtos');
							$result = $crud->selecionar("
									`id_produto`, `produto`,`marca`,`modelo`, `lote`, `cod_bar`,
									DATE_FORMAT(`validade`, '%d/%m/%Y') AS validade
							",'');
							if($result){
								foreach($result as $prod){
									?>
									<tr>
										<td><?php echo $prod['produto']; ?></td>
										<td><?php echo $prod['marca']; ?></td>
										<td><?php echo $prod['modelo']; ?></td>
										<td><?php echo $prod['lote']; ?></td>
										<td><?php echo $prod['cod_bar']; ?></td>
										<td><?php echo $prod['validade']; ?></td>
										<td>
											<a href="?pagina=cad_produtos&editar=<?php echo $prod['id_produto']; ?>" class="btn btn-warning">editar</a>
											<a href="?pagina=cad_produtos&excluir=<?php echo $prod['id_produto']; ?>" class="btn btn-danger">excluir</a>
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