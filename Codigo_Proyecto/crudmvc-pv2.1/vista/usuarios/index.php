<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Usuarios</h6>
                </div>
            </div>
            <div class="card-body">


                    <a class="btn btn-primary" href="?controlador=usuarios&accion=frmRegistrar">Registrar Usuarios</a>
                    <a class="btn btn-primary" href="?controlador=usuarios&accion=frmConsultar">Consultar</a> <br>
                    <h2>Listado de Usuarios</h2>

                    <table class="table align-items-center mb-0">
                        <tr>
                            <th>Cedula</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Telefono</th>
                            <th>Usuario</th>
                            <th>Fecha Registro</th>
                            <th>Rol</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php
                            foreach ($this->datos as $valor){
                                $cod = $valor["Usu_Cedula"];
                                echo "<tr>";
                                    echo  "<td>".$valor["Usu_Cedula"]."</td>";
                                    echo  "<td>".$valor["Usu_Nombre"]."</td>";
                                    echo  "<td>".$valor["Usu_Apellido"]."</td>";
                                    echo  "<td>".$valor["Usu_Telefono"]."</td>";
                                    echo  "<td>".$valor["Usu_Usuario"]."</td>";
                                    echo  "<td>".$valor["Usu_Fecha"]."</td>";
                                    //echo  "<td>".$valor["Usu_Email"]."</td>";
                                    echo  "<td>".$valor["Usu_Rol"]."</td>";
                                    echo  "<td>
                                        <a href='?controlador=usuarios&accion=frmEditar&cod=$cod'>Editar</a>
                                        </td>";
                                    echo  "<td>
                                        <a href='?controlador=usuarios&accion=eliminar&cod=$cod'class='eliminar'>Eliminar</a>
                                        </td>";
                                echo "</tr>";
                            }
                        ?>
                    </table>

         
                    </div>
                </div>
            </div>
        </div>