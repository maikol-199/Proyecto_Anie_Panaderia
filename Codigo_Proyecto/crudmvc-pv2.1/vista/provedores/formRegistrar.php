<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Registro Proveedores</h6>
                </div>
            </div>
            <div class="card-body">
                <table class="table align-items-center mb-0">
                    <form action="?controlador=provedores&accion=registrar" method="post" id="frmRegistrar">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Id Proveedor</label>
                            <input type="number" name="Pro_Id_Provedor" class="form-control">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Telefono</label>
                            <input type="numeric" name="Pro_Telefono" class="form-control">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Correo</label>
                            <input type="email" name="Pro_Correo" class="form-control">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Razon Social</label>
                            <input type="text" name="Pro_Razon_Social" class="form-control">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Direccion</label>
                            <input type="text" name="Pro_Direccion" class="form-control">
                        </div>
                        <input class="btn btn-primary" type="submit" name="Aceptar"> <br>
                    </form>
                </table>
            </div>
        </div>
    </div>
</div>