
<style>
  
  .cnt_cnt{
    box-shadow: 2px 3px 1px gray;
    width: 35vw;
    height: 600px;
    margin: 5px;
    
  }

</style>
<div style="margin-top:150px;margin:auto; background-color: whitesmoke;box-shadow:2px 3px 5px gray">

  <section class="py-5 text-center container" >
    <div   class="row py-lg-5 contenedor">
      
   <img style="width: 30% ; height: 10% ;border-radius: 50%;margin:auto" src="public/logoani/PB.PNG" alt="" > 
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light ">Productos</h1>
        <p class="lead text-muted">La empresa ani Pasteleria Ofrece a sus clientes una amplia variedad de productos.</p>
        <hr>
        <hr>
        <p class="lead text-muted">Apostamos por la innovación y el desarrollo de nuevos productos, diferenciales, que destaquen tanto por su sabor y calidad como por su fórmula innovadora. También trabajamos en descubrir productos funcionales que nos ayuden.</p>
      </div>
    </div>
  </section>
  <hr>
  <hr>
</div>



  
<div  class="row" >

<?php foreach ($this->datos as $valor){ 
  
   $foto = $valor["Pro_Foto_Producto"];
  ?>
    <div style="width: 30%;" class=" col-lg-4" >
    <div class="cnt_cnt card shadow-sm">
      
       
        <?php echo "<img style='width='40%' height='225' '; src='public/assets/img/fotos_productos/$foto'>" ?> 
       
           <div class="card-body" >
           
          <h4> <p class="card-title"><?php  echo  $valor["Pro_Nombre"]; ?></p>  </h4>
           <p class="card-text"><?php   echo $valor["Pro_Precio"]; ?></p>
           <p class="card-text"><?php   echo $valor["Pro_Descripcion"]; ?></p>
                   
                        
           <form  action="" method="post" class="frmCarro">
             <input type="number" required  name="cantidad" class="form-control" placeholder="cantidad"><br>

             <input type="hidden"  name="id" value="<?php echo $valor["Pro_Id_Producto"];?>">
             <input type="hidden" name="nombre" value="<?php echo $valor["Pro_Nombre"]; ?>">
             <input type="hidden" name="descripcion" value="<?php echo $valor["Pro_Descripcion"]; ?>">
             <input type="hidden" name="foto" value="<?php echo $valor["Pro_Foto_Producto"]; ?>" >
             
             <input type="hidden" name="precio" value="<?php echo $valor["Pro_Precio"]; ?>" >

            <input type="submit" name="aceptar" value="Añadir al carrito" class="btn btn-danger">

            </form>

        
          </div>
        </div>
      </div>
    

  <?php  } ?>
  

  </div>



  
        