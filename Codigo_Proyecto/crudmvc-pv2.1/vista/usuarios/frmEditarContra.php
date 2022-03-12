<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Editar Contraseña</h6>
                </div>
            </div>
            <div class="card-body">
                <table class="table align-items-center mb-0">
                    <form action="?controlador=usuarios&accion=editarContra" method="post" id="frmEditar">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Contraseña Anterior</label>
                            <input type="text" name="con_actual" class="form-control">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Nueva Contraseña</label>
                            <input type="text" name="con_nueva" class="form-control">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Confirmar Contraseña</label>
                            <input type="text" name="con_confirmar" class="form-control">
                        </div>
                        
                        <input class="btn btn-primary" type="submit" name="Aceptar"> <br>
                    </form>
                </table>
            </div>
        </div>
    </div>
</div>

