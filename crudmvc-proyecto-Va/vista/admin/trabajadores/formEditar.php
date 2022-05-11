
<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Editar Trabajadores</h6>
                </div>
            </div>
            <div class="card-body">
                <table class="table align-items-center mb-0">
                    <form action="?controlador=trabajadores&accion=editar" method="post" id="frmEditar">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label"></label>
                            <input type="number" readonly class="form-control" name="tra_usu_cedula" 
                                value="<?php echo $this->datos["Tra_Usu_Cedula"];?>">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label"></label>
                            <input type="text" class="form-control" name="tra_area" 
                                value="<?php echo $this->datos["Tra_Area"];?>">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label"></label>
                            <input type="text" class="form-control" name="tra_cargo"
                                value="<?php echo $this->datos["Tra_Cargo"];?>">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label"></label>
                            <input type="text" class="form-control" name="tra_sexo" 
                                value="<?php echo $this->datos["Tra_Sexo"];?>">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label"></label>
                            <input type="number" class="form-control" name="tra_salario"
                                value="<?php echo $this->datos["Tra_Salario"];?>">
                        </div>
                        <input class="btn btn-primary" type="submit" name="Aceptar"> <br>
                    </form>
                </table>
            </div>
        </div>
    </div>
</div>