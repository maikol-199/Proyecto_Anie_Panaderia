<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Editar Productos</h6>
                </div>
            </div>
            <div class="card-body">


                <form action="?controlador=productos&accion=editar" method="post" id="frmEditar">
                    <div class="input-group input-group-outline my-3">
                    <label class="form-label"></label>
                    <input type="number" name="pro_id_producto" readonly value="<?php echo $this->datos["Pro_Id_Producto"]; ?>" class="form-control">
                    </div>

                    <div class="input-group input-group-outline my-3">
                    <label class="form-label"></label>
                    <input type="text" name="pro_nombre" value="<?php echo $this->datos["Pro_Nombre"]; ?>" class="form-control">
                    </div>
                    <div class="input-group input-group-outline my-3">
                    <label class="form-label"></label>
                    <input type="number" name="pro_precio" value="<?php echo $this->datos["Pro_Precio"]; ?>" class="form-control">
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
                    <label class="form-label"></label>
                    <input type="text" name="pro_detalle" value="<?php echo $this->datos["Pro_Detalle"]; ?>" class="form-control">
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Descripcion</label>
                        <input type="text" name="pro_descripcion" class="form-control">
                    </div>
                    <div class="input-group input-group-static mb-4">
                            <label for="exampleFormControlSelect1" class="ms-0">Estado Producto</label>
                            <select class="form-control" name="pro_estado" value="<?php echo $this->datos["Pro_Estado"]; ?>">
                                <option value="Interno">Interno</option>
                                <option value="Externo">Externo</option>
                            </select>
                        </div>
                    <input class="btn btn-primary" type="submit" name="Aceptar"><br>
                </form>

             </div>
        </div>
    </div>
</div>