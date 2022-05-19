
            <div class="card-body">
                    <h2 style="font-family:cursive;">Lista de Pedidos de: <?php echo $_SESSION["nombre"] ?></h2>

                    <table class="table table-dark table-striped">
                        <tr>
                            <th>Id Pedido</th>
                            <th>Fecha Pedido</th>
                            <th>Fecha Entrega</th>
                            <th>Direccion</th>
                            <th>Cedula Cliente</t>
                            <th>Estado</t>
                            <th></t>
                        </tr>
                        <?php
                            foreach ($this->datos as $valor){
                                $cod = $valor["Ped_Id_Pedido"];
                                echo "<tr>";
                                    echo  "<td>".$valor["Ped_Id_Pedido"]."</td>";
                                    echo  "<td>".$valor["Ped_Fecha_Pedido"]."</td>";
                                    echo  "<td>".$valor["Ped_Fecha_Entrega"]."</td>";
                                    echo  "<td>".$valor["Ped_Direccion"]."</td>";
                                    echo  "<td>".$valor["Ped_Usu_Cedula"]."</td>";
                                    echo  "<td>".$valor["Ped_Estado"]."</td>";
                                    echo  "<td>
                                    <a class='btn btn-primary' href='?controlador=pedido&accion=detallecliente&cod=$cod'>Detalle</a>
                                    </td>";
                                    echo "</tr>";
                            }
                        ?>
                    </table>
            </div>
   



