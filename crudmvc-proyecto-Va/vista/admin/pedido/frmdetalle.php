<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Productos</h6>
                </div>
            </div>
            <div class="card-body">

                <h2>Listado de Productos por Detalle</h2>

                <table class="table align-items-center mb-0">
                    <tr>
                        <th>Id Producto</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Categoria</th>
                        <th>Detalle</th>
                        <th>Estado</th>
                        <th>Cantidad</th>
                        
                        <th>Foto Producto</th>
                        <th></th>
                    </tr>

                    <?php
                        foreach ($this->datos as $valor){
                            $cod = $valor["Pro_Id_Producto"];
                            $foto = $valor["Pro_Foto_Producto"];
                           // $can =$a["Ped_Pro_Cantidad"];
                            echo "<tr>";
                                echo  "<td>".$valor["Pro_Id_Producto"]."</td>";
                                echo  "<td>".$valor["Pro_Nombre"]."</td>";
                                echo  "<td>".$valor["Pro_Precio"]."</td>";
                                echo  "<td>".$valor["Pro_Cat_Id_Categoria"]."</td>";
                                echo  "<td>".$valor["Pro_Detalle"]."</td>";
                               // echo  "<td>".$valor["Pro_Descripcion"]."</td>";
                                echo  "<td>".$valor["Pro_Estado"]."</td>";
                                //echo  "<td>".$valor["Ped_Pro_Cantidad"]."</td>";
                                echo  "<td><img src='public/assets/img/fotos_productos/$foto' width='50%'</td>";
                            echo "</tr>";
                        }
                    ?>
                </table>


            </div>
        </div>
    </div>
</div>