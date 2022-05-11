<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Editar Usuarios</h6>
                </div>
            </div>
            <div class="card-body">
                <table class="table align-items-center mb-0">
                    <form action="?controlador=usuarios&accion=editar" method="post" id="frmEditar">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label"></label>
                            <input type="number" readonly name="usu_cedula" value="<?php echo $this->datos["Usu_Cedula"]; ?>" class="form-control">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label"></label>
                            <input type="text" name="usu_nombre" value="<?php echo $this->datos["Usu_Nombre"]; ?>" class="form-control">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label"></label>
                            <input type="text" name="usu_apellido" value="<?php echo $this->datos["Usu_Apellido"]; ?>" class="form-control">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label"></label>
                            <input type="number" name="usu_telefono" value="<?php echo $this->datos["Usu_Telefono"]; ?>" class="form-control">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label"></label>
                            <input type="text" name="usu_usuario" value="<?php echo $this->datos["Usu_Usuario"]; ?>" class="form-control">
                        </div>
                        <div class="input-group input-group-static my-3">
                            <label>Fecha Registro</label>
                            <input type="datetime-local" name="usu_fecha" value="<?php echo $this->datos["Usu_Fecha"]; ?>" class="form-control">
                        </div>
                        <div class="input-group input-group-static my-3">
                            <label></label>
                            <input type="email" name="usu_email" value="<?php echo $this->datos["Usu_Email"]; ?>" class="form-control">
                        </div>
                        <div class="input-group input-group-static mb-4">
                            <label for="exampleFormControlSelect1" class="ms-0">Tipo Usuario</label>
                            <select class="form-control" name="usu_rol" value="<?php echo $this->datos["Usu_Rol"]; ?>">
                                <option value="Administrador">Administrador</option>
                                <option value="Trabajador">Trabajador</option>
                                <option value="Cliente">Cliente</option>
                            </select>
                        </div>
                        <input class="btn btn-primary" type="submit" name="Aceptar"> <br>
                    </form>
                </table>
            </div>
        </div>
    </div>
</div>
</form> 