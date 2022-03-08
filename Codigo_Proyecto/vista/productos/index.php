<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Productos</h6>
                </div>
            </div>
            <div class="card-body">



                <a class="btn btn-primary" href="?controlador=productos&accion=frmRegistrar">Registrar Productos</a>
                <h2>Listado de Productos</h2>

                <table class="table align-items-center mb-0">
                    <tr>
                        <th>Id Producto</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Categoria</th>
                        <th>Detalle</th>
                        <th>Descripcion</th>
                        <th>Estado</th>
                        <th></th>
                        <th></th>
                    </tr>

                    <?php
                        foreach ($this->datos as $valor){
                            $cod = $valor["Pro_Id_Producto"];
                            echo "<tr>";
                                echo  "<td>".$valor["Pro_Id_Producto"]."</td>";
                                echo  "<td>".$valor["Pro_Nombre"]."</td>";
                                echo  "<td>".$valor["Pro_Precio"]."</td>";
                                echo  "<td>".$valor["Pro_Cat_Id_Categoria"]."</td>";
                                echo  "<td>".$valor["Pro_Detalle"]."</td>";
                                echo  "<td>".$valor["Pro_Descripcion"]."</td>";
                                echo  "<td>".$valor["Pro_Estado"]."</td>";
                                echo  "<td>
                                    <a href='?controlador=productos&accion=frmEditar&cod=$cod'>Editar</a>
                                    </td>";
                                echo  "<td>
                                    <a href='?controlador=productos&accion=eliminar&cod=$cod'>Eliminar</a>
                                    </td>";
                            echo "</tr>";
                        }
                    ?>
                </table>


            </div>
        </div>
    </div>
</div>