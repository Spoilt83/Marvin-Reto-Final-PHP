$(document).ready(function(){
	$('#form-palabra').submit(function(){
		var existePalabra=false;
		var x=0;
		while(x<palabras.length){
			var palabraOrigen=$('#palabra-origen').val();
			
			//Verificar si la palabra ingresada existe
			if(palabraOrigen==palabras[x]){
				existePalabra=true;
			}
			
			x++;
		}
		
		if(existePalabra==false){
			$('#msj-error').html(''+
				'<div class="alert alert-danger alert-dismissible" role="alert">'+
					'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
					'<strong>'+
						'La palabra ingresada no existe'+
					'</strong>'+
				'</div>'+
			'')
			
			return false
		}
		
		return true;
	})
})