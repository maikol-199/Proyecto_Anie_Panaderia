<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Registrar Producto</h6>
                </div>
            </div>
            <div class="card-body">


                <form action="?controlador=productos&accion=registrar" method="post" id="Pro_Foto_Producto" enctype="multipart/form-data">
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Id Producto</label>
                        <input type="number" name="pro_id_producto" class="form-control">
                    </div>

                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Nombre Producto</label>
                        <input type="text" name="pro_nombre" class="form-control">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Precio</label>
                        <input type="number" name="pro_precio" class="form-control">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <select name="pro_cat_id_categoria" class="form-control">
                            <?php
                            foreach ($this->cat as $valor) {
                                echo "<option value='" . $valor["Cat_Id_Categoria"] . "'>" . $valor["Cat_Nombre"] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Detalle</label>
                        <input type="text" name="pro_detalle" class="form-control">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Descripcion</label>
                        <input type="text" name="pro_descripcion" class="form-control">
                    </div>
                    <div class="input-group input-group-static mb-4">
                        <label for="exampleFormControlSelect1" class="ms-0">Estado Producto</label>
                        <select class="form-control" name="pro_estado">
                            <option value="Interno">Interno</option>
                            <option value="Externo">Externo</option>
                        </select>
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label"></label>
                        <input type="file" name="Pro_Foto_Producto" class="form-control">
                    </div>
                    <input class="btn btn-primary" type="submit" name="Aceptar"><br>
                </form>

            </div>
        </div>
    </div>
</div>