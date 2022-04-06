

<main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-10 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                    <h4 class="text-black font-weight-bolder text-center mt-2 mb-0">Registro Pedido</h4>
                                </div>
                            </div>

                      <div class="card-body">


                <form action="?controlador=categoria&accion=registrar" method="post" id="frmRegistrar">
                    <div class="input-group input-group-outline my-3">
                    <label class="form-label">Id Pedido</label>
                    <input type="number" name="ped_id_pedido"  class="form-control">
                    </div>

                    <div class="input-group input-group-outline my-3">
                    <label class="form-label">Fecha Pedido</label>
                    <input type="datetime-local" name="ped_fecha_pedido" class="form-control">
                    </div>
                    <div class="input-group input-group-outline my-3">
                    <label class="form-label">Direccion</label>
                    <input type="text" name="ped_cat_descripcion" class="form-control">
                    </div>
                   
                    <input class="btn btn-primary" type="submit" name="Aceptar"><br>
                 </form>

                     </div>
                  </div>
                </div>
            </div>
        </div>
    </main>


