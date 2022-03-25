$(function () {

    $("#frmRegistrar").submit(function () {
        var url = $(this).attr("action");
        var datos = $(this).serialize();

        $.post(url, datos, function (e) {

            Swal.fire(
                e.alt,
                e.mensaje,
                e.icono
            );
            $('#frmRegistrar').trigger("reset");
        }, 'json');

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

});



