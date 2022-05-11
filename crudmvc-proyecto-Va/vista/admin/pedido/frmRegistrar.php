<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Registrar Pedidos</h6>
                </div>
            </div>
            <div class="card-body">

            <form action="?controlador=pedido&accion=registrar" method="post" id="frmRegistrar">
                    
                    <div class="input-group input-group-outline my-3">
                    Fecha Pedido
                    <input type="datetime-local" name="ped_fecha_pedido" class="form-control">
                    </div>

                    <div class="input-group input-group-outline my-3">
                    Fecha de Entrega
                    <input type="datetime-local" name="ped_fecha_entrega" class="form-control">
                    </div>

                    <div class="input-group input-group-outline my-3">
                    Direccion
                    <input type="text" name="ped_direccion" class="form-control">
                    </div>
                   
                    <input class="btn btn-primary" type="submit" name="Aceptar"><br>
                 </form>
             </div>
        </div>
    </div>
</div>