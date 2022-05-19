<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Pedidos</h6>
                </div>
            </div>
            <div class="card-body">
                    <a class="btn btn-primary"  href="#">Registrar Pedidos</a>
                    <h2>Listado de Pedidos</h2>

                    <table class="table align-items-center mb-0">
                        <tr>
                            <th>Id Pedido</th>
                            <th>Fecha Entrega</th>
                            <th>Direccion</th>
                            <th>Cedula Cliente</t>
                            <th>Estado</t>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php
                            foreach ($this->datos as $valor){
                                $cod = $valor["Ped_Id_Pedido"];
                                echo "<tr>";
                                    echo  "<td>".$valor["Ped_Id_Pedido"]."</td>";
                                    echo  "<td>".$valor["Ped_Fecha_Entrega"]."</td>";
                                    echo  "<td>".$valor["Ped_Direccion"]."</td>";
                                    echo  "<td>".$valor["Ped_Usu_Cedula"]."</td>";
                                    echo  "<td>".$valor["Ped_Estado"]."</td>";
                                    echo  "<td>
                                        <a class='btn btn-primary' href='?controlador=pedido&accion=frmEditar&cod=$cod'>Editar</a>
                                        </td>";
                                    echo  "<td>
                                        <a href='?controlador=pedido&accion=eliminar&cod=$cod'class='eliminar btn btn-danger'>Eliminar</a>
                                        </td>";
                                    echo  "<td>
                                        <a class='btn btn-primary' href='?controlador=pedido&accion=detalle&cod=$cod'>Detalle</a>
                                        </td>";
                                echo "</tr>";
                            }
                        ?>
                    </table>
            </div>
        </div>
    </div>
</div>