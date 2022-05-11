<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Proveedores</h6>
                </div>
            </div>
            <div class="card-body">


                    <a class="btn btn-primary" href="?controlador=provedores&accion=frmRegistrar">Registrar Proveedores</a>
                    <a class="btn btn-primary" href="?controlador=provedores&accion=frmConsultar">Consultar Proveedores</a> <br>
                    <h2>Listado de Proveedores</h2>

                    <table class="table align-items-center mb-0">
                        <tr>
                            <th>Id Proveedor</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th>Razon Social</th>
                            <th>Direccion</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php
                            foreach ($this->datos as $valor){
                                $cod = $valor["Pro_Id_Provedor"];
                                echo "<tr>";
                                    echo  "<td>".$valor["Pro_Id_Provedor"]."</td>";
                                    echo  "<td>".$valor["Pro_Telefono"]."</td>";
                                    echo  "<td>".$valor["Pro_Correo"]."</td>";
                                    echo  "<td>".$valor["Pro_Razon_Social"]."</td>";
                                    echo  "<td>".$valor["Pro_Direccion"]."</td>";
                                    echo  "<td>
                                        <a class='btn btn-primary' href='?controlador=provedores&accion=frmEditar&cod=$cod'>Editar</a>
                                        </td>";
                                    echo  "<td>
                                        <a href='?controlador=provedores&accion=eliminar&cod=$cod' class='eliminar btn btn-danger'>Eliminar</a>
                                        </td>";
                                echo "</tr>";
                            }
                        ?>
                    </table>

                    
            </div>
        </div>
    </div>
</div>