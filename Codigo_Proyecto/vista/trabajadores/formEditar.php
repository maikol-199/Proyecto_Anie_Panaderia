
<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Editar Trabajadores</h6>
                </div>
            </div>
            <div class="card-body">

                          <form action="?controlador=trabajadores&accion=editar" method="post">
                          <form>
                              <div class="input-group input-group-outline my-3">
                                <input type="number" class="form-control" name="tra_usu_cedula" 
                                value="<?php echo $this->datos["Tra_Usu_Cedula"];?>"
                                placeholder="Cedula del trabajador">
                              </div>
                              <div class="input-group input-group-outline my-3">
                                <input type="text" class="form-control" name="tra_area" 
                                value="<?php echo $this->datos["Tra_Area"];?>" 
                                placeholder="Area de trabajo">
                              </div>
                              <div class="input-group input-group-outline my-3">
                                <input type="text" class="form-control" name="tra_cargo"
                                value="<?php echo $this->datos["Tra_Cargo"];?>"
                                  placeholder="Cargo del trabajador">
                              </div>
                              <div class="input-group input-group-outline my-3">
                                <input type="text" class="form-control" name="tra_sexo" 
                                value="<?php echo $this->datos["Tra_Sexo"];?>"
                                placeholder="Sexo del tarbajador">
                              </div>
                              <div class="input-group input-group-outline my-3">
                                <input type="number" class="form-control" name="tra_salario"
                                value="<?php echo $this->datos["Tra_Salario"];?>" 
                                placeholder="Salario del tarbajador">
                              </div>
                              <input type="submit" name="Aceptar" class="btn btn-primary"><br>
                          </form>

                          
             </div>
        </div>
    </div>
</div>