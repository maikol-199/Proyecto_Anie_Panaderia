<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Editar Pedidos</h6>
                </div>
            </div>
            <div class="card-body">
                <table class="table align-items-center mb-0">
                    <form action="?controlador=pedido&accion=editar" method="post" id="frmEditar">
                    <div class="input-group input-group-outline my-3">
                            <label class="form-label"></label>
                            <input type="number" name="ped_id_pedido" readonly value="<?php echo $this->datos["Ped_Id_Pedido"]; ?>" class="form-control">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label"></label>
                            <input type="date" name="ped_fecha_pedido" value="<?php echo $this->datos["Ped_Fecha_Pedido"]; ?>" class="form-control">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label"></label>
                            <input type="date" name="ped_fecha_entrega" value="<?php echo $this->datos["Ped_Fecha_Entrega"]; ?>" class="form-control">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label"></label>
                            <input type="text" name="ped_direccion" value="<?php echo $this->datos["Ped_Direccion"]; ?>" class="form-control">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label"></label>
                            <input type="text" name="ped_estado" value="<?php echo $this->datos["Ped_Estado"]; ?>" class="form-control">
                        </div>
                       
                        <input class="btn btn-primary" type="submit" name="Aceptar"> <br>
                    </form>
                </table>
            </div>
        </div>
    </div>
</div>