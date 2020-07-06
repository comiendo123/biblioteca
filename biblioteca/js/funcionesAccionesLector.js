function ListarReservaLibro(){
	var parametros = {
		"dbusqueda": $("#txtbusqueda").val()
	};

	$.ajax({
		data: parametros,
		url: 'listarStockLibros.php',
		type: 'POST',
		dataType='json',
		beforeSend: function(){
			$("#ListLibros").html("Procesando");
		},
		
		success: function(datos){
			$("#ListLibros").html(datos);
		}	});


}


function ListarLibrosReservados(){
	var parametros = {
		"dbusqueda": $("#txtbusqueda").val()
		
	};

	$.ajax({
		data: parametros,
		url: 'listarLibrosReservados.php',
		type: 'POST',
		beforeSend: function(){
			$("#ListaLRS").html("Procesando");
		},
		success: function(datos){
			ListarReservaLibro();
			$("#ListaLRS").html(datos);
		}
	});


}



