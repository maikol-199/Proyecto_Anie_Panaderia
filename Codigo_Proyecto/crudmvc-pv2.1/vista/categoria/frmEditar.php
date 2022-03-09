<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Editar Categoria</h6>
                </div>
            </div>
            <div class="card-body">


                <form action="?controlador=categoria&accion=editar" method="post" id="frmEditar" >
                    <div class="input-group input-group-outline my-3">
                    <label class="form-label"></label>
                    <input type="number" name="cat_id_categoria" value="<?php echo $this->datos["Cat_Id_Categoria"];?>"  class="form-control">
                    </div>

                    <div class="input-group input-group-outline my-3">
                    <label class="form-label"></label>
                    <input type="text" name="cat_nombre" value="<?php echo $this->datos["Cat_Nombre"];?>" class="form-control">
                    </div>
                    <div class="input-group input-group-outline my-3">
                    <label class="form-label"></label>
                    <input type="text" name="cat_descripcion" value="<?php echo $this->datos["Cat_Descripcion"];?>" class="form-control">
                    </div>
                   
                    <input class="btn btn-primary" type="submit" name="Aceptar"><br>
                </form>

             </div>
        </div>
    </div>
</div>