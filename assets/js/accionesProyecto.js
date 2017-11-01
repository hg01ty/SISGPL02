$(document).ready(function() {

  $('#anadirProyecto').on('submit',function(event){
  event.preventDefault()
  
  $.ajax({
    url:'../registrarProyecto.php',
    type:'POST',
    dataType:'json',
    data:$('#anadirProyecto').serialize(),
    success:function(data){
      $('#anadirProyecto')[0].reset();
      $('#mostrarDatos').html(data.contenido);
      if (data.mensaje==1) {
        alertify.success('Proyecto registrado');
        //$('#registroExito').slideDown().addClass('alert-success');
        // window.location.reload(true);
        setTimeout(()=>{
        //  $('#registroExito').slideUp().removeClass('alert-success');
          $('#registraProyecto').modal('hide');
            },2000);
      } else {
        $('#registroExito').show().addClass('alert-danger');
      }
    },
    error:function(error){
      console.log(error);
    }
  })
    .done(function(respuesta){
    })
    .fail(function(resp){
      console.log(resp.responseText);
    })  
    .always(function(){
    console.log('complete');    
    });
  
});
  
  $(document).on('click', '.editar', function(){  
    var id=$(this).attr('id');   
        $.ajax({  
          url:"../mostrarProyectoID.php",  
          method:"POST",  
          data:{id:id},  
          dataType:"json",  
          success:function(data){  
            $('#mod_id').val(data.contenido.ID_PROYECTO);
            $('#mod_code').val(data.contenido.CODIGO_PROYECTO);
            $('#mod_nombre').val(data.contenido.NOMBRE_PROYECTO);
            $('#mod_fechai').val(data.contenido.DATESTART);
            $('#mod_fechaf').val(data.contenido.DATEEND);
            $('#mod_monto').val(data.contenido.MONTO);
            $('#mod_des').val(data.contenido.DESCRIPCION_PROYECTO);
            $("select#mod_cate option")
            .each(function() { this.selected = (this.text == data.contenido.CATEGORIA); });
            $("select#mod_estado option")
            .each(function() { this.selected = (this.text == data.contenido.ESTADO); });
            console.log(data.contenido);
          }  
            });        
  }); 


  $(document).on('click', '.eliminar', function(){  
    var id=$(this).attr('id');
    console.log(id);
    alertify.confirm('',"Quiere eliminar este proyecto?",
          function(){
            $.ajax({  
          url:"../eliminarProyecto.php",  
          method:"POST",  
          data:{id:id},  
          dataType:"json",  
          success:function(data){    
            $('#mostrarDatos').html(data.contenido);
          }  
        });
            alertify.success('Proyecto eliminado');
            console.log('Proyecto eliminado')
          },
          function(){
            alertify.error('Cancelar');
            console.log('no quiero eliminar')
          });

    /*if(confirm("Estas seguro de eliminar esto?"))  
      {  
        $.ajax({  
          url:"../eliminarProyecto.php",  
          method:"POST",  
          data:{id:id},  
          dataType:"json",  
          success:function(data){    
            $('#mostrarDatos').html(data.contenido);
          }  
        });  
      }  */
  }); 

  $('#actualizarProyecto').on('submit',function(event){
      event.preventDefault();
      $.ajax({
        url:'../editarProyecto.php',
        type:'POST',
        dataType:'json',
        data:$('#actualizarProyecto').serialize(),
        success:function(data){
          $('#actualizarProyecto')[0].reset();
          $('#mostrarDatos').html(data.contenido);
          if(data.mensaje==1){
            alertify.success('Proyecto Actualizado');
         // $('#editarExito').slideDown().addClass('alert-success');
          setTimeout(()=>{
          //  $('#editarExito').slideUp().removeClass('alert-success');
            $('#modaledit').modal('hide');
          },2000);
        }

        },
        error:function(error){
          console.log(error);
        }
      })
      .done(function(respuesta){  
      })
      .fail(function(resp){
       console.log(resp.responseText);
      })
      .always(function(){
        console.log('complete');
      });
    });

  function mostrarDatos(query)
      {
        $.ajax({
          url:"../buscarProyecto.php",
          method:"POST",
          data:{query:query},
          success:function(data)
          {
           $('#mostrarDatos').html(data);
          }
        }).always(function(){
        console.log('complete');
      });
      }
      $('#search').keyup(function(){
        var search = $(this).val();
        if(search != '')
        {
        mostrarDatos(search);
        }
        else
        {
        mostrarDatos();
        }
      });
});
$(document).ready(function(){
    $('#montoP').on('input', function () { 
    this.value = this.value.replace(/[^0-9]/g,'');
});
  
})

 