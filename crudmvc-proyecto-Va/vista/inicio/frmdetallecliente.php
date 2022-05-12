<h2 class="lpu" style="font-family:Arial, Helvetica, sans-serif">Detalle de Productos</h2>

<table style="font-family:'Times New Roman', Times, serif" class=" table-striped">
    <tr class="trs" style="text-align:center;">

        <th>Nombre</th>
        <th>Precio</th>
        <th>Detalle</th>
        <th>Descripcion</th>
        <th>Imagen</th>
    </tr>

    <?php
    foreach ($this->datos as $valor) {
        $cod = $valor["Pro_Id_Producto"];
        $foto = $valor["Pro_Foto_Producto"];
        // $can =$a["Ped_Pro_Cantidad"];
        echo "<tr class='trr'>";
        // echo  "<td>".$valor["Pro_Id_Producto"]."</td>";
        echo  "<td>" . $valor["Pro_Nombre"] . "</td>";
        echo  "<td>" . $valor["Pro_Precio"] . "</td>";
        // echo  "<td>".$valor["Pro_Cat_Id_Categoria"]."</td>";
        echo  "<td>" . $valor["Pro_Detalle"] . "</td>";
        // echo  "<td>".$valor["Pro_Descripcion"]."</td>";
        echo  "<td>" . $valor["Pro_Descripcion"] . "</td>";
        //echo  "<td>".$valor["Ped_Pro_Cantidad"]."</td>";
        echo  "<td><img  style='float: right'src='public/assets/img/fotos_productos/$foto' width='100%'</td>";
        echo "</tr>";
    }
    ?>
    <style>
        .lpu {
            text-shadow: 2px 3px 5px gray;
            text-align: center;
        }

        .trs th {
            box-shadow: 2px 3px 4px maroon; 
            width: 200px;
            height: 50px;
        }

        .trr td {
            text-align: center;   
            box-shadow: 2px 3px 4px maroon; 
        }
    </style>
</table>