<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Registrar Pago</h6>
                </div>
            </div>
            <div class="card-body">

                <form action="?controlador=pago&accion=registrar" method="post" id="frmRegistrar">

                    <div class="input-group input-group-outline my-3">
                    <label class="form-label">Id Pago</label>
                    <input type="number" name="pag_id_pago"  class="form-control">
                    </div>

                    <div class="input-group input-group-outline my-3">
                    <label class="form-label">Forma de Pago</label>
                    <input type="text" name="pag_forma_pago" class="form-control">
                    </div>

                    <div class="input-group input-group-outline my-3">
                    <label class="form-label">Valor</label>
                    <input type="text" name="pag_valor" class="form-control">
                    </div>

                    <div class="input-group input-group-outline my-3">
                    <label class="form-label"></label>
                    <input type="text" name="pag_comprobante" class="form-control">
                    </div>
                   
                    <input class="btn btn-primary" type="submit" name="Aceptar"><br>
                </form>
             </div>
        </div>
    </div>
</div>