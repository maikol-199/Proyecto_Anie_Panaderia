<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Consultar</h6>
                </div>
            </div>
            <div class="card-body">
                
                <form action="?controlador=provedores&accion=consultar" autocomplete="off" method="post" id="frmConsultar">
                    <div class="input-group input-group-outline my-3">
                    <label class="form-label">Id Proveedor</label>
                    <input type="number" name="codigo" id="codigo" class="form-control">
                    </div>

                </form>
                   <div id="resultado"></div>
             </div>
        </div>
    </div>
</div>