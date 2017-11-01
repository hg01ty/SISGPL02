$(document).ready(function(){
	
	buscarPersonal();
	tabla();
	function tabla(){
        var parametros = {"action":"datos"};
          $.ajax({
            url:'../mostrarPer.php',       
            data: parametros,
             beforeSend: function(){
            },
            success:function(data){
             $("#dato").html(data).fadeIn();
              
            }
          })
      }
	$("#ModiPersonal").on('show.bs.modal',function(event){
		var button=$(event.relatedTarget);
		var id = button.data('id');	
		var nombre=button.data('nombre');	
		var apellido=button.data('apellido');
		var dni=button.data('dni');
		var edad=button.data('edad');
		var correo=button.data('correo');
		var direccion=button.data('direccion');
		var ocupacion=button.data('ocupacion');
		var usuario=button.data('usuario');
		var password=button.data('password');
		var modal=$(this);
		modal.find('.modal-body #codigo').val(id);
		modal.find('.modal-body #id').val(id);
		modal.find(".modal-body #nombre").val(nombre);
		modal.find(".modal-body #apellido").val(apellido);
		modal.find(".modal-body #dni").val(dni);
		modal.find(".modal-body #edad").val(edad);
		modal.find(".modal-body #correo").val(correo);
		modal.find(".modal-body #direccion").val(direccion);
		modal.find(".modal-body #ocupacion").val(ocupacion);
		modal.find(".modal-body #usuario").val(usuario);
		modal.find(".modal-body #password").val(password);
		
	});	
	$("#ModVerPersonal").on('show.bs.modal',function(event){
		var button=$(event.relatedTarget);
		var id = button.data('id');	
		var nombre=button.data('nombre');
		var apellido=button.data('apellido');
		var dni=button.data('dni');
		var edad=button.data('edad');
		var correo=button.data('correo');
		var direccion=button.data('direccion');
		var telefono=button.data('telefono');
		var ocupacion=button.data('ocupacion');
		var modal=$(this);
		modal.find('.modal-body #codigo').text(id);
		modal.find(".modal-body #nombre").text(nombre);
		modal.find(".modal-body #apellido").text(apellido);
		modal.find(".modal-body #dni").text(dni);
		modal.find(".modal-body #edad").text(edad);
		modal.find(".modal-body #correo").text(correo);
		modal.find(".modal-body #direccion").text(direccion);
		modal.find('.modal-body #telefono').text(telefono);
		modal.find('.modal-body #ocupacion').text(ocupacion);
	});

	function buscarPersonal(data){
		$.ajax({
			url: '../../PHP/buscarPersonal.php',
			type: 'POST',
			dataType: 'html',
			cache: false,
			data: {data:data},
		})
		.done(function(respuesta) {
			$("#dato").html(respuesta);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	}
	$(document).on('keyup','#buscar',function(){
			var valor=$(this).val();
			if(valor!=""){
				buscarPersonal(valor);
			}else{
				tabla();
			}
		}); 
    $(document).on('submit', '#registrarPer', function(event) {
      event.preventDefault();
	      $.ajax({
	      url: "../../PHP/registrarPer.php",
	      type: 'POST',
	      data: new FormData(this),
	      processData:false,
	      contentType:false,
	      beforeSend:function(data){
	      },
	      success:function(data){
	        if(data){
	          tabla();
	          limpiar();
	          $("#regPersonal").modal("hide");
	        }else{
	        	alert("no funciona");
	        }
	      }

	    })
	   
    });

	$(document).on('submit', '#ModifPersonal', function(event) {
		event.preventDefault();
		$.ajax({
          url:"../../PHP/actualizarPer.php",
          type: 'POST',
          data: new FormData(this),
          processData:false,
          cache:false,
          contentType:false,
          beforeSend:function(){
          //	$("#mensaje2").html("Actualizando...");
          },
          success:function(data){
          	if(data){	
          	}
          	tabla();
          	$("#ModiPersonal").modal("hide");
          }
		}).done(function(){

		}).always(function(){});
	});

	$("#modalElim").on("show.bs.modal",function(event){
		var button=$(event.relatedTarget);
		var id=button.data('id');
		console.log(id);
		var modal=$(this);
		modal.find(".modal-body #id").val(id);
		modal.find(".modal-title").text("eliminar: "+id);
	});

	$(document).on('submit', '#eliminaPer', function(event) {
		event.preventDefault();
		$.ajax({
			url:"../../PHP/eliminarPersonal.php",
			type:"POST",
			data:new FormData(this),
			cache:false,
			contentType:false,
			processData:false,
			success:function(data){		
				
			if(data){
				tabla();

				$("#modalElim").modal("hide");
			}
			}

		}).done(function(){

		}).always(function(){
		});	
	});

	$("#dni").keyup(function() {
		this.value = (this.value + '').replace(/[^0-9]/g, '');
	});

		function limpiar(){
	$("#nombre").val("");
	$("#apellido").val("");
	$("#dni").val("");
	$("#edad").val("");
	$("#correo").val("");
	$("#direccion").val("");
	$("#telefono").val("");
	$("#ocupacion").val("");
}

});
