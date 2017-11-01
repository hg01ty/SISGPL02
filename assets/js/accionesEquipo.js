$(document).ready(function(){

 $('#addEquipo').on('submit',function(event){
 		event.preventDefault();
 		$.ajax({
 			url:"../registrarEquipo.php",
 			type:'POST',
 			dataType:'json',
 			data:$('#addEquipo').serialize(),
 			success:function(respuesta){
 				$('#addEquipo')[0].reset();
 				$('#equipoPersonal').html(respuesta.contenido);
 				$('#cargarPersonal').html(respuesta.personal);
				$('#responsableDoc').html(respuesta.responsable);
 				console.log(respuesta);
 				alertify.success('Personal añadido')
 				console.log('Personal agregado al equipo');
 			},
 			error:function(error){
 				console.log('error');
 			}
 		})
 });
});
$(document).on('click', '.edit', function(){  
    var id=$(this).attr('id');   
        $.ajax({  
          url:"../mostrarEquipoID.php",  
          method:"POST",  
          data:{id:id},  
          dataType:"json",  
          success:function(data){  
           // $('#mod_id').val(data.contenido.ID_PROYECTO);
           	$('#idPro').val(data.contenido.ID_PROYECTO);
           	$('#idEquipo').val(data.contenido.ID_EQUIPO);
            $('#tareaE').val(data.contenido.TAREA);
            $('#fechaEI').val(data.contenido.FECHA_I);
            $('#fechaEF').val(data.contenido.FECHA_F);
            console.log(data.contenido);
          }  
        });        
 });
$(document).ready(function(){
	$('#updateEquipo').on('submit',function(event){
      event.preventDefault();
      $.ajax({
        url:'../editarEquipo.php',
        type:'POST',
        dataType:'json',
        data:$('#updateEquipo').serialize(),
        success:function(data){
          $('#updateEquipo')[0].reset();
          $('#equipoPersonal').html(data.contenido);
          if(data.mensaje==1){
            alertify.success('Equipo Actualizado');
          setTimeout(()=>{
            $('#editEquipo').modal('hide');
          },2000);
        }

        },
        error:function(error){
          console.log(error);
        }
      }).fail(function(resp){
       console.log(resp.responseText);
      })
    });  
});

$(document).on('click', '.delete', function(){  
    var idE=$(this).attr('id');
    var idP=$(this).attr('data-persona');
    var idPr=$(this).attr('data-proyecto');
    console.log(idE+" "+idP+" "+idPr);
    alertify.confirm('',"Quiere eliminarlo de tu equipo?",
          function(){
            $.ajax({  
          url:"../eliminarEquipo.php",  
          method:"POST",  
          data:{id:idE,idP:idP,idPr:idPr},  
          dataType:"json",  
          success:function(data){    
            $('#equipoPersonal').html(data.contenido);
            $('#cargarPersonal').html(data.personal);
			$('#responsableDoc').html(data.responsable);
          }  
        });
            alertify.success('Personal eliminado');
            console.log('Personal eliminado')
          },
          function(){
            alertify.error('Cancelar');
            console.log('no quiero eliminar')
          });
  });

$(document).ready(function(){
	$('#addDoc').click(function(){
		alertify.prompt( 'Tipo de documento', '', 'Escribir tipo'
      , function(evt, value) {
          var index=parseInt($("#doc option:last-child").val())+1;
					$("#doc option:last-child").removeAttr('selected');
				    //alert(typeof(value));
				   //var valor=value;
  			if(value.trim() !=''){
  			 		//alert('No esta vacio');
  			 	alertify.success('Tu Agregaste: ' + value);
		      $('#doc').append('<option value="'+index+'">'+value+'</option>');
           $.ajax({  
          url:"../addTipoEntregable.php",  
          method:"POST",  
          data:{idTE:index,descripcion:value},  
          //dataType:"json",  
          /*success:function(data){    
            $('#equipoPersonal').html(data.contenido);
            $('#cargarPersonal').html(data.personal);
          }  */
        });
   			}else{
   				alertify.error('Agrega texto valido');
   			}

        }
      , function() { 
         	alertify.error('Cancel'); 
        });
	});
});

$(document).ready(function(){

 $('#addDocumento').on('submit',function(event){
    event.preventDefault();
    //alert('ENVIANDO ARCHIVO');
    var parametros= new FormData(this);
    $.ajax({
      url:"../registrarDocumento.php",
      type:'POST',
      dataType:'json',
      data:parametros,
      contentType:false,
      processData:false,
      cache:false,
      success:function(respuesta){
        $('#addDocumento')[0].reset();
        $('#showDocumentos').html(respuesta.contenido);
        //$('#cargarPersonal').html(respuesta.personal);
        console.log(respuesta);
        alertify.success('Documento añadido')
        $('#anadirDoc').modal('hide');
        console.log('Documento agregado al equipo');
      },
      error:function(error){
        console.log('error');
      }
    })
 });
});