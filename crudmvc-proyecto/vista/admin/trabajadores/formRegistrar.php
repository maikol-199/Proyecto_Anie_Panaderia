<div class="row">
  <div class="col-12">
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
          <h6 class="text-white text-capitalize ps-3">Registrar Trabajadores</h6>
        </div>
      </div>
      <div class="card-body">

        <form action="?controlador=trabajadores&accion=registrar" method="post" id="frmRegistrar">
          <div class="input-group input-group-outline my-3">
            <input type="number" class="form-control" name="Tra_Usu_Cedula" placeholder="Cédula (Se debe Registrar el trabajador con la Cédula del mismo)">
          </div>
          <div class="input-group input-group-outline my-3">
            <input type="text" class="form-control" name="Tra_Area" placeholder="Area de trabajo">
          </div>
          <div class="input-group input-group-outline my-3">
            <input type="text" class="form-control" name="Tra_Cargo" placeholder="Cargo del trabajador">
          </div>
          <div class="input-group input-group-static mb-4">
            <label for="exampleFormControlSelect1" class="ms-0">Sexo</label>
            <select class="form-control" name="Tra_sexo">
              <option value="Masculino">Masculino</option>
              <option value="Femenino">Femenino</option>
            </select>
          </div>
          <div class="input-group input-group-outline my-3">
            <input type="number" class="form-control" name="Tra_Salario" placeholder="Salario del trabajador">
          </div>
          <input type="submit" class="btn btn-primary" name="Aceptar"><br>
        </form>
      </div>
    </div>
  </div>
</div>