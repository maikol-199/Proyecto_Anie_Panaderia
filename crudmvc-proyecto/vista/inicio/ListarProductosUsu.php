



  <div class="album py-5 bg-light ">
    <div class="container" >
      <div class="row" >

    <?php foreach ($this->datos as $valor){
      $cod = $valor["Pro_Id_Producto"];
      $foto = $valor["Pro_Foto_Producto"];?>

        <div class="col-lg-4" >
          <div class="card shadow-sm">
         
          <?php echo "<img  src='public/assets/img/fotos_productos/$foto'>" ?>
               <div class="card-body" >
               
               <p class="card-text"><?php  echo  $valor["Pro_Nombre"]; ?></p>  
               <p class="card-text"><?php   echo $valor["Pro_Precio"]; ?></p>
               <p class="card-text"><?php   echo $valor["Pro_Descripcion"]; ?></p>
                       
                            
               <form action="" method="post" class="frmCarro">
                 <input type="number"  name="cantidad" class="form-control" placeholder="cantidad"><br>

                 <input type="hidden" name="id" value="<?php echo $valor["Pro_Id_Producto"];?>">
                 <input type="hidden" name="nombre" value="<?php echo $valor["Pro_Nombre"]; ?>">
                 <input type="hidden" name="foto" value="<?php echo $valor["Pro_Foto_Producto"]; ?>" >
                 
                 <input type="hidden" name="precio" value="<?php echo $valor["Pro_Precio"]; ?>" >

                <input type="submit" name="aceptar" value="Agregar" class="btn btn-primary">




                </form>

              <div class="d-flex justify-content-between align-items-center">


                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
    
      <?php  } ?>
      </div>
    </div>
  </div>  



        