<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Trabajadores</h6>
                </div>
            </div>
            <div class="card-body">
                    <a class="btn btn-primary" href="?controlador=trabajadores&accion=frmRegistrar">Registrar trabajadores</a>
                    <a class="btn btn-primary" href="?controlador=trabajadores&accion=frmConsultar">Consultar Trabajadores</a>
                    <h2>Listado de trabajadores</h2>
                    <table class="table align-items-center mb-0">
                        <tr>
                            <th>Cedula trabajador</th>
                            <th>Area </th>
                            <th>Cargo</th>
                            <th>Sexo </th>
                            <th>Salario</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php
                            foreach ($this->datos as $valor){
                                $cod = $valor["Tra_Usu_Cedula"];
                                echo "<tr>";
                                    echo  "<td>".$valor["Tra_Usu_Cedula"]."</td>";
                                    echo  "<td>".$valor["Tra_Area"]."</td>";
                                    echo  "<td>".$valor["Tra_Cargo"]."</td>";
                                    echo  "<td>".$valor["Tra_Sexo"]."</td>";
                                    echo  "<td>".$valor["Tra_Salario"]."</td>";
                                    echo  "<td>
                                        <a class='btn btn-primary' href='?controlador=trabajadores&accion=frmEditar&cod=$cod'>Editar</a>
                                        </td>";
                                    echo  "<td>
                                        <a href='?controlador=trabajadores&accion=eliminar&cod=$cod'class='eliminar btn btn-danger'>Eliminar</a>
                                        </td>";
                                echo "</tr>";
                            }
                        ?>
                    </table>
            </div>
        </div>
    </div>
</div>