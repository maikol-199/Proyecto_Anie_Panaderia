$(function(){
    
        $("#frmRegistro").submit(function(){
            var url = $(this).attr("action");
            var datos = $(this).serialize();
            $.post(url,datos,function(e){
                Swal.fire(
                    '',
                    e.mensaje,
                    'success'
                  );
                  $('#frmRegistro').trigger("reset");
            },'json');

            return false;
        });
     
        $(document).on('click','.Eliminar', function(){
          var url = $(this).attr('href');
          // var elemeto =$(this);
          Swal.fire({
              title: 'Esta usted seguro?',
              text: "No podra recuperar la informacion !",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si eliminar!',
              cancelButtonTexT: 'No gracias'
            }).then((result) => {
              if (result.isConfirmed) {
                  $.get(url, '', function(e){
                      Swal.fire(
                          '',
                          '',
                          'success'
                        )
                      //   &(elemeto).closest("tr").remove();
                  },'json');
              }
            })
          return false;
      });
    
    
      $("#Pro_Id_Provedor").keyup(function(){
          var codigo =$(this).val();
          var url ="?controlador=provedores&accion=formConsultar"
          $.post(url,"Pro_Id_Provedor="+codigo,function(e){
              $("#resultado").html(e.valor);
          },'json');
        });
  });