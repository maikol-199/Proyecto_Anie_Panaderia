<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Editar Proveedores</h6>
                </div>
            </div>
            <div class="card-body">
                <table class="table align-items-center mb-0">
                    <form action="?controlador=provedores&accion=editar" method="post" id="frmEditar">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label"></label>
                            <input type="number" name="pro_id_provedor" readonly value="<?php echo $this->datos["Pro_Id_Provedor"]; ?>" class="form-control">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label"></label>
                            <input type="text" name="pro_telefono" value="<?php echo $this->datos["Pro_Telefono"]; ?>" class="form-control">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label"></label>
                            <input type="email" name="pro_correo" value="<?php echo $this->datos["Pro_Correo"]; ?>" class="form-control">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label"></label>
                            <input type="text" name="pro_razon_social" value="<?php echo $this->datos["Pro_Razon_Social"]; ?>" class="form-control">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label"></label>
                            <input type="text" name="pro_direccion" value="<?php echo $this->datos["Pro_Direccion"]; ?>" class="form-control">
                        </div>
                        <input class="btn btn-primary" type="submit" name="Aceptar"> <br>
                    </form>
                </table>
            </div>
        </div>
    </div>
</div>