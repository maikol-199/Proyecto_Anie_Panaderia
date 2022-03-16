
<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Registro</h6>
                </div>
            </div>
            <div class="card-body">
                <table class="table align-items-center mb-0">
                    <form action="?controlador=usuarios&accion=registrar" method="post" id="frmRegistrar">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Cedula</label>
                            <input type="number" name="usu_cedula" class="form-control">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Nombres</label>
                            <input type="text" name="usu_nombre" class="form-control">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Apellidos</label>
                            <input type="text" name="usu_apellido" class="form-control">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Telefono</label>
                            <input type="number" name="usu_telefono" class="form-control">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Usuario</label>
                            <input type="text" name="usu_usuario" class="form-control">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Contraseña</label>
                            <input type="password" name="usu_contraseña" class="form-control">
                        </div>
                        <div class="input-group input-group-static my-3">
                            <label>Fecha Registro</label>
                            <input type="datetime-local" name="usu_fecha" class="form-control">
                        </div>
                        <div class="input-group input-group-static my-3">
                            <label>Email</label>
                            <input type="email" name="usu_email" class="form-control">
                        </div>
                        <div class="input-group input-group-static mb-4">
                            <label for="exampleFormControlSelect1" class="ms-0">Tipo Usuario</label>
                            <select class="form-control" name="usu_rol">
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


