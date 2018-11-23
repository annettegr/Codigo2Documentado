
<!--FORMULARIO PARA ACTUALIZAR -->

<div class="container">
	<h2>Actualizar Cliente</h2>
    <!-- A DÓNDE SE REDIRIGIRÁ EL FORMULARIO -->
	<form action="?controller=Cliente&&action=editCliente" method="POST">
		<input type="hidden" name="idCliente" value="<?php echo $cliente->getIdCliente() ?>" >
		<!--CAMPOS A LLENAR -->
        <div class="form-group">
			<label for="text">Nombre</label>
			<input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $cliente->getNombre() ?>">
		</div>
		<div class="form-group">
			<label for="text">Edad</label>
			<input type="text" name="edad" id="edad" class="form-control" value="<?php echo $cliente->getEdad(); ?>">
		</div>
        <div class="form-group">
            <label for="text">Email</label>
            <input type="text" name="email" id="email" class="form-control" value="<?php echo $cliente->getEmail(); ?>">
        </div>
        <!-- CHECKBOX PARA EL ESTATUS -->
		<div class="check-box">
			<label>Activo <input type="checkbox" name="estatus" <?php echo $cliente->getEstatus() ?>></label>
		</div>
        <!--BOTÓN DE ENVIAR INFORMACIÓN -->
		<button type="submit" class="btn btn-primary">Actualizar</button>

	</form>
</div>