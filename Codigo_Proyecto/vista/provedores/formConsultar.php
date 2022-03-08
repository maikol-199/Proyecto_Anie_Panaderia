<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Consultar</h6>
                </div>
            </div>
            <div class="card-body">
                <table class="table align-items-center mb-0">
                    <form action="?controlador=provedores&accion=consultar" method="post" id="formConsultar">
                        <div class="input-group input-group-outline my-3">
                            <input type="number" name="Pro_Id_Provedor" id="Pro_Id_Provedor" class="form-control">
                        </div>

                    </form>
                    <div id="resultado"></div>
                </table>
            </div>
        </div>
    </div>
</div>