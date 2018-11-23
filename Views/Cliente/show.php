
<!-- LISTA DE REGISTROS -->
<div class="container">
	<h2>Lista Clientes</h2>

	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
                <!--CAMPOS DE LA TABLA -->
				<tr>
					<th>Id</th>
					<th>Nombre</th>
					<th>Edad</th>
                    <th>Email</th>
					<th>Estatus</th>
					<th>Acciones</th>
                    <th></th>
				</tr>
				<tbody>
                    <!-- FUNCIÓN FOREACH PARA LLAMAR LA TABLA -->
					<?php foreach ($listaClientes as $cliente) {?>
					<tr>
                        <!-- MANDAR LLAMAR LOS DATOS DE LA TABLA -->
						<td> <a href="?controller=Cliente&&action=updateshow&&idCliente=<?php  echo $cliente->getIdCliente()?>"> <?php echo $cliente->getIdCliente(); ?></a> </td>
						<td><?php echo $cliente->getNombre(); ?></td>
						<td><?php echo $cliente->getEdad(); ?></td>
                        <td><?php echo $cliente->getEmail(); ?></td>
                        <!-- HACER VALIDACIÓN DEL ESTATUS, SI ES ON, SERÁ ACTIVO, DE LO CONTRARIO SERÁ INACTIVO -->
						<td><?php if ( $cliente->getEstatus()=='checked'):?>
							Activo
						<?php  else:?>
							Inactivo
						<?php endif; ?></td>
                        <!-- BOTÓN DE ACTUALIZAR DONDE MANDA A LLAMAR EL ID DEL CLIENTE -->
                        <td><a href="?controller=Cliente&&action=updateshow&&idCliente=<?php echo $cliente->getIdCliente() ?>">Actualizar</a> </td>
                        <!-- BOTÓN DE ELIMINAR DONDE MANDA A LLAMAR EL ID DEL CLIENTE -->
						<td><a href="?controller=Cliente&&action=deleteCliente&&idCliente=<?php echo $cliente->getIdCliente() ?>">Eliminar</a> </td>
					</tr>
					<?php } ?>
				</tbody>

			</thead>
		</table>

	</div>	

</div>