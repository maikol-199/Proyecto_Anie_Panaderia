$(function () {

    $("#frmRegistrar").submit(function (e) {
        e.preventDefault();
        var url = $(this).attr("action");
        var datos = $(this).serialize();

        if(frmRegistroU()){
            //respuesta del formulario de registro de usuario            
            $.ajax({
                data: datos,
                url: url,
                dataType: 'json',
                type: 'post',
                // se ejecuta antes de enviar el form
                beforeSend: function () {
                    Swal.fire({
                        title: "Cargando..",
                        text: " ",
                        buttons: false,
                        closeOnClickOutside:false,
                        closeOnEsc:false,
                        allowEnterKey:false
                    })
                },
                success: function (data) {               
                    if(data.error == 0){
                        Swal.fire(
                            data.alt,
                            data.mensaje,
                            data.icono
                        ).then((result) => {
                            if (result.isConfirmed) {
                                location.href="?controlador=inicio&accion=frmLogin"
                            }
                          });
                    }        
                }
            });
        }       

        return false;

    });

    $("#frmLogin").submit(function () {
        var url = $(this).attr("action");
        var datos = $(this).serialize();

        $.post(url, datos, function (e) {
         if (e.icono == "error") {
    
            Swal.fire(
                e.alt,
                e.mensaje,
                e.icono
            );
        }else{
            window.location = "?controlador=inicio&accion=index";
        }
           
    }, 'json');

        return false;
    });

    $(document).on('click', '.eliminar',function(){
        var url  = $(this).attr("href");
        var elemento =$(this);

        Swal.fire({
            title: 'Esta seguro de eliminar este Registro?',
            text: "Esta Accion es Irreversible!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar',
            cancelButtonText:'Cancelar'
          }).then((result) => {
            if (result.isConfirmed) {

                $.get(url,  '', function(e){

                    Swal.fire(
                        '',
                        e.mensaje,
                        'success'
                      )
                      $(elemento).closest("tr").remove();

                },'json'); 
            }
          })

        return false;
    });

    $('#Pro_Foto_Producto').submit(function(){
        var url = $(this).attr("action");
        $.ajax({
            url: url,
            data: new FormData(this),
            processData: false,
            contentType: false,
            dataType: 'json',
            type: 'post',
            success: function(e){
                Swal.fire(
                    e.alt,
                    e.mensaje,
                    e.icono
                );

                $('#Pro_Foto_Producto').trigger("reset");
            }
           
        });
        
        //var url    = "?controlador=categoria&accion=consultar";
        return false; 
    });

    $('#codigo').keyup(function(){
           var codigo = $(this).val();
           var url = $('#frmConsultar').attr("action");
           
           //var url    = "?controlador=categoria&accion=consultar";

           if (codigo.length > 0) {

            $.post(url, "codigo="+codigo, function(e){
                $("#resultado").html(e.tabla);
            } ,'json');


           }else{
            $("#resultado").html("");
           }
            
    });

    $(document).ready(function(){
        $("#frmConsultar").keypress(function(e){
        if (e.which == 13) {
             return false;
        }
   });
});





    $("#frmEditar").submit(function(){
        var url = $(this).attr("action");
        var datos = $(this).serialize();

        $.post(url, datos, function(e) {

            Swal.fire(
                '',
                e.mensaje,
                e.icono
            );
           // $('#frm').trigger("reset");
        }, 'json');

        return false;

    });

    localStorage.removeItem("Console/Mode");
    localStorage.removeItem("Console");
    localStorage.removeItem("showThisQuery");
    localStorage.removeItem("favoriteTables");
    localStorage.removeItem("NavigationWidth");
   
    var icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24"  fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16"> <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" /> </svg>' 
      
    $("#carro").html(icon + 'Carrito'+ " " +localStorage.length);

    $(document).on('submit', '.frmCarro',function(){
      var cantidad = $(this).find('input[name="cantidad"]').val();
      var id       = $(this).find('input[name="id"]').val();
      var nombre   = $(this).find('input[name="nombre"]').val();
      var descripcion   = $(this).find('input[name="descripcion"]').val();
      var foto   = $(this).find('input[name="foto"]').val();
      var precio   = $(this).find('input[name="precio"]').val();
     

      var producto = {'cantidad': cantidad, 'img': foto, 'nombre': nombre ,'descripcion': descripcion , 'precio': precio};
      //localStorage.setItem(id, cantidad);
      localStorage.setItem(id, JSON.stringify(producto));


      
       $("#carro").html(icon + 'Carrito'+ " " +localStorage.length);

      for (i = 0; i <= localStorage.length-1; i++){
           key = localStorage.key(i);
           console.log(key+" " +localStorage.getItem(key));
      }
      return false;
    });

    $(document).on('click', '.eICarrito', function(){
        var id = $(this).attr('data-id');
        localStorage.removeItem(id);
        mostrar();
        $("#carro").html(icon + 'Carrito'+localStorage.length);
    });

    $("#frmRegistrarPedido").submit(function () {
        var url = $(this).attr("action");
        var datos = $(this).serialize();

        var id = [];
        var cantidad = [];


        for (i = 0;  i <= localStorage.length-1; i++){
            id_i = localStorage.key(i);
            r  = localStorage.getItem(id_i);
            v  = JSON.parse(r);
            id[i] = id_i;
            cantidad[i] = v.cantidad;
        }
        console.log(id);
        
        id = JSON.stringify(id);
        cantidad = JSON.stringify(cantidad);
        $.post(url, "id="+id+"&cantidad="+cantidad+"&"+datos, function(e) {

           

            Swal.fire({
                title: '',
                text: "Pedido Exitoso",
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar!'
              }).then((result) => {
                if (result.isConfirmed) {
                    localStorage.clear();
                    window.location = "?controlador=pedido&accion=listarPedidos";
                }
              })
           
        }, 'json');

       

       
        

        return false;
    });

});
//localStorage.clear();

function mostrar(){
    var contenido = "";
    var acum = 0;
    for (i = 0;  i <= localStorage.length-1; i++){
        id = localStorage.key(i);
       console.log(id);
        r = localStorage.getItem(id);
        v = JSON.parse(r);
        console.log(id+" " +localStorage.getItem(id));
           
        item = 
        
              '<div class="card mb-3" style="max-width: 1300px; border: 2px solid; background-color: lavenderblush">'+
            '<div class="row g-0">'+
               '<div class="col-md-4">'+
               ' <img style="width: 100%; height:336px; "  src="public/assets/img/fotos_productos/'+v.img+'" width="100%" alt="">'+
        
                '</div>'+
                '<div class="col-md-8">'+
                '<div class="card-body">'+
                    '<h3 class="card-title " style="font-family:cursive;">'+v.nombre+'</h3><br>'+
                    '<h5 class="card-text " style="font-family:cursive;">Precio $ '+v.precio+'</h5><br>'+
                    '<h5 class="card-text" style="font-family:cursive;">Cantidad: '+v.cantidad+'</h5><br>'+
                    '<h6 class="card-text " style="font-family:cursive;">'+v.descripcion+'</h6>'+
                    '<h5 class="card-text" style="text-align:right; font-family:cursive;">Subtotal: '+(v.cantidad*v.precio)+'</h5>'+
                    '<input type="submit" style="font-family:cursive; " name="eliminar" value="Eliminar" class="eICarrito btn btn-primary btn-lg active" data-id="'+id+'">'+
                    
                    '</div>'+
                '</div>'+
            '</div>'+
            '</div>'+
    '<hr>';
        
      contenido = contenido +" "+ item;
      acum = acum + (v.cantidad*v.precio);
    }

    document.getElementById("detalle").innerHTML = contenido;
    document.getElementById("total").innerHTML = 'Total: $'+acum;



    
    
}




    
    





