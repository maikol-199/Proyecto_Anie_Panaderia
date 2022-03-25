<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Pagos</h6>
                </div>
            </div>
            <div class="card-body">
                    <a class="btn btn-primary" href="?controlador=pago&accion=frmRegistrar">Registrar Pago</a>
                    <a class="btn btn-primary" href="?controlador=pago&accion=frmConsultar">Consultar Pagos</a>
                    <h2>Listado de Pagos</h2>

                    <table class="table align-items-center mb-0">
                        <tr>
                            <th>Id Pago</th>
                            <th>Forma de Pago</th>
                            <th>Valor</th>
                            <th>Comprobante</t>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php
                            foreach ($this->datos as $valor){
                                $cod = $valor["Pag_Id_Pago"];
                                echo "<tr>";
                                    echo  "<td>".$valor["Pag_Id_Pago"]."</td>";
                                    echo  "<td>".$valor["Pag_Forma_Pago"]."</td>";
                                    echo  "<td>".$valor["Pag_Valor"]."</td>";
                                    echo  "<td>".$valor["Pag_Comprobante"]."</td>";
                                    echo  "<td>
                                        <a class='btn btn-primary' href='?controlador=pago&accion=frmEditar&cod=$cod'>Editar</a>
                                        </td>";
                                    echo  "<td>
                                        <a href='?controlador=pago&accion=eliminar&cod=$cod'class='eliminar btn btn-danger'>Eliminar</a>
                                        </td>";
                                echo "</tr>";
                            }
                        ?>
                    </table>
            </div>
        </div>
    </div>
</div>