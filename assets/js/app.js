$(document).on('submit','.autenticar',function(event){
	event.preventDefault()
	
	$.ajax({
		url:'PHP/login.php',
		type:'POST',
		dataType:'json',
		data:$(this).serialize(),
		beforeSend:function(){
			$('.send').val('Validando...');
		},
		success:function(respuesta){
			console.log(respuesta);
		if (!respuesta.error) {
			if(respuesta.tipo_usuario=='ADMIN'){
				location.href='PHP/admin'
			}
			else if(respuesta.tipo_usuario=='JEFE'){
				location.href='PHP/user'
			}
		}
		else{
			alertify.error('Datos incorrectos');
		}
		}
	})
	.fail(function(resp){
		console.log(resp.responseText);
	})	
	.always(function(){
		console.log('complete');		
	})

	
});

$(document).on('submit','#registrar',function(event){
	event.preventDefault();

	$.ajax({
		url:'PHP/registrar.php',
		type:'POST',
		dataType:'json',
		data:$(this).serialize(),
		beforeSend:function(){
			$('#wait').show();
		},
		success:function(respuesta){
			$('#wait').css('display','none');
		if (respuesta!=null) {
			if(respuesta==2){
				alertify.error('Existe RUC y usuario registrado');
				$('#usu').val(" ");
				$('#ruc').val(" ");
			}else if(respuesta==1){
				alertify.error('Existe RUC registrado');
				$('#existeRuc').addClass('has-error');
				$('#ruc').val(" ");
			}else{
				alertify.error('Existe usuario registrado');
				$('#existeUsuario').addClass('has-error');
				$('#usu').val(" ");
			}
		}else{
			alertify.success('Registro exitoso!!!');
			$('#registrar')[0].reset();
			$('#registro').modal('hide');
			$('#existeUsuario').removeClass('has-error');
			$('#existeRuc').removeClass('has-error');
		}
		console.log(respuesta);
		}
	})
	.fail(function(resp){
		console.log(resp.responseText);
	})	
	.always(function(){
		console.log('complete');		
	});
});

$(document).ready(function(){
	$('#right').click(function(){
		$('#authUser').show();
		$('#authAdmin').hide();
	});
	$('#left').click(function(){
		$('#authUser').hide();
		$('#authAdmin').show();
	});
});


$(document).ready(function(){
		$('#ruc').on('input', function () { 
    this.value = this.value.replace(/[^0-9]/g,'');

});
	
})