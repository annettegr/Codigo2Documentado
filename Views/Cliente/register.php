

    <!-- FORMULARIO DE REGISTRO -->
<div class="container">
  <h2>Registro de Cliente</h2>
  <form action="?controller=Cliente&&action=addCliente" method="POST">
    <div class="form-group">
        <!-- CAMPOS A LLENAR -->
      <label for="text">Nombres:</label>
      <input type="text" class="form-control" id="nombre" placeholder="Ingrese su Nombre" name="nombre">
    </div>

    <div class="form-group">
      <label for="text">Edad:</label>
      <input type="text" name="edad" class="form-control" placeholder="Ingrese edad">
    </div>
      <div class="form-group">
          <label for="text">Email:</label>
          <input type="text" name="email" class="form-control" placeholder="Ingrese Email">
      </div>

      <!-- CHECKBOX PARA EL ESTATUS -->
    <div class="check-box">
      <label>Activo <input type="checkbox" name="estatus">  </label>
    </div>
      <!--BOTÓN DE ENVIAR INFORMACIÓN -->
    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
</div>