

                <h2 style="font-family:cursive">Listado de Productos por Detalle</h2>

                <table  style="font-family:cursive" class="table table-success table-striped">
                    <tr>
                        
                        <th>Nombre</th>
                        <th>Precio</th>         
                        <th>Detalle</th>
                        <th>Descripcion</th>
                    </tr>

                    <?php
                        foreach ($this->datos as $valor){
                            $cod = $valor["Pro_Id_Producto"];
                            $foto = $valor["Pro_Foto_Producto"];
                           // $can =$a["Ped_Pro_Cantidad"];
                            echo "<tr>";
                               // echo  "<td>".$valor["Pro_Id_Producto"]."</td>";
                                echo  "<td>".$valor["Pro_Nombre"]."</td>";
                                echo  "<td>".$valor["Pro_Precio"]."</td>";
                               // echo  "<td>".$valor["Pro_Cat_Id_Categoria"]."</td>";
                                echo  "<td>".$valor["Pro_Detalle"]."</td>";
                               // echo  "<td>".$valor["Pro_Descripcion"]."</td>";
                                echo  "<td>".$valor["Pro_Descripcion"]."</td>";
                                //echo  "<td>".$valor["Ped_Pro_Cantidad"]."</td>";
                                echo  "<td><img  style='float: right'src='public/assets/img/fotos_productos/$foto' width='30%'</td>";
                            echo "</tr>";
                        }
                    ?>
                </table>


          