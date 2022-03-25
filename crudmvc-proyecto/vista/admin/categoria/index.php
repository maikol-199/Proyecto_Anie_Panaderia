<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Categorias</h6>
                </div>
            </div>
            <div class="card-body">



                <a class="btn btn-primary" href="?controlador=categoria&accion=frmRegistrar">Registrar Categoria</a>
                <a class="btn btn-primary" href="?controlador=categoria&accion=frmConsultar">Consultar Categoria</a> 
                <a class="btn btn-primary" href="?controlador=categoria&accion=reporteCategoria">Reportes</a> <br>
                <h2>Listado de Categoria</h2>

                <table class="table align-items-center mb-0">
                    <tr>
                        <th>Id categoria</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th></th>
                        <th></th>
                    </tr>

                    <?php
                    foreach ($this->datos as $valor) {
                        $cod = $valor["Cat_Id_Categoria"];
                        echo "<tr>";
                        echo  "<td>" . $valor["Cat_Id_Categoria"] . "</td>";
                        echo  "<td>" . $valor["Cat_Nombre"] . "</td>";
                        echo  "<td>" . $valor["Cat_Descripcion"] . "</td>";
                        echo  "<td>
                      <a class='btn btn-primary' href='?controlador=categoria&accion=frmEditar&cod=$cod'>Editar</a>
                      </td>";
                        echo  "<td>
                      <a href='?controlador=categoria&accion=eliminar&cod=$cod' class='eliminar btn btn-danger'>Eliminar</a>
                      </td>";
                        echo "</tr>";
                    }
                    ?>
                </table>



            </div>
        </div>
    </div>
</div>