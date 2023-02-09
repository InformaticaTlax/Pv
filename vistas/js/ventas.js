//cargar la tabla dinamica de productos

$.ajax({
    url: "ajax/datatable-ventas.ajax.php",
    success:function(respuesta){

        console.log("respuesta",respuesta);
    }
})


/*
$(document).ready(function () {
    $('.tablaProductos').DataTable({
        ajax: 'ajax/datatable-productos.ajax.php',
    });
});*/

$('.tablaVentas').DataTable({
    "ajax": "ajax/datatable-ventas.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "language": {

        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
});

/*=============================================
AGREGANDO PRODUCTOS A LA VENTA DESDE LA TABLA
=============================================*/

$(".tablaVentas tbody").on("click", "button.agregarProducto", function(){

	var idProducto = $(this).attr("idProducto");
    //console.log(idProducto);

	$(this).removeClass("btn-primary agregarProducto");

	$(this).addClass("btn-default");

	var datos = new FormData();
    datos.append("idProducto", idProducto);

     $.ajax({

     	url:"ajax/productos.ajax.php",
      	method: "POST",
      	data: datos,
      	cache: false,
      	contentType: false,
      	processData: false,
      	dataType:"json",
      	success:function(respuesta){

      	    var descripcion = respuesta["descripcion"];
          	var stock = respuesta["stock"];
          	var precio = respuesta["precio_venta"];

          	/*=============================================
          	EVITAR AGREGAR PRODUTO CUANDO EL STOCK ESTÁ EN CERO
          	=============================================*/

          	if(stock == 0){

      			swal({
			      title: "No hay stock disponible",
			      type: "error",
			      confirmButtonText: "¡Cerrar!"
			    });

			    $("button[idProducto='"+idProducto+"']").addClass("btn-primary agregarProducto");

			    return;

          	}

          	$(".nuevoProducto").append(

          	'<div class="row" style="padding:5px 15px">'+

			  '<!-- Descripción del producto -->'+
	          
	          '<div class="col-xs-6" style="padding-right:0px">'+
	          
	            '<div class="input-group">'+
	              
	              '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto="'+idProducto+'"><i class="fa fa-times"></i></button></span>'+

	              '<input type="text" class="form-control nuevaDescripcionProducto" idProducto="'+idProducto+'" name="agregarProducto" value="'+descripcion+'" readonly required>'+

	            '</div>'+

	          '</div>'+

	          '<!-- Cantidad del producto -->'+

	          '<div class="col-xs-3">'+
	            
	             '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" stock="'+stock+'" nuevoStock="'+Number(stock-1)+'" required>'+

	          '</div>' +

	          '<!-- Precio del producto -->'+

	          '<div class="col-xs-3 ingresoPrecio" style="padding-left:0px">'+

	            '<div class="input-group">'+

	              '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+
	                 
	              '<input type="text" class="form-control nuevoPrecioProducto" precioReal="'+precio+'" name="nuevoPrecioProducto" value="'+precio+'" readonly required>'+
	 
	            '</div>'+
	             
	          '</div>'+

	        '</div>') 

	        // SUMAR TOTAL DE PRECIOS

	        sumarTotalPrecios()

	        // AGREGAR IMPUESTO

	        //agregarImpuesto()

	        // AGRUPAR PRODUCTOS EN FORMATO JSON

	        //listarProductos()

	        // PONER FORMATO AL PRECIO DE LOS PRODUCTOS

	        //$(".nuevoPrecioProducto").number(true, 2);

      	}

     })

});

//cuando cargue la tabla  cada vez que navege en ella

$(".tablaVentas").on("draw.dt",function(){

	if(localStorage.getItem("quitarProducto") != null){
		
		var listaIdProductos = JSON.parse(localStorage.getItem("quitarProducto"));

		for(var i = 0; i < listaIdProductos.length; i++){

			$("button.recuperarBoton[idProducto='"+listaIdProductos[i]["idProducto"]+"']").removeClass('btn-default');
			$("button.recuperarBoton[idProducto='"+listaIdProductos[i]["idProducto"]+"']").addClass('btn-primary agregarProducto');

		}
	}
})


//quitar producto de la venta y recuperar boton
var idQuitarProducto = [];
localStorage.removeItem("quitarProducto");

$(".formularioVenta").on("click", "button.quitarProducto", function(){
		
    $(this).parent().parent().parent().parent().remove();

	var idProducto = $(this).attr("idProducto");

	//alamcenar en el localsrorage
	
	if(localStorage.getItem("quitarProducto") == null){

		idQuitarProducto = [];

	}else{

		idQuitarProducto.concat(localStorage.getItem("quitarProducto"))
	}

	idQuitarProducto.push({"idProducto":idProducto});

	localStorage.setItem("quitarProducto", JSON.stringify(idQuitarProducto));

	$("button.recuperarBoton[idProducto='"+idProducto+"']").removeClass('btn-default');

	$("button.recuperarBoton[idProducto='"+idProducto+"']").addClass('btn-primary agregarProducto');

	if($(".nuevoProducto").children().length == 0){
		
		$("#nuevoTotalVenta").val(0);
		
	}else{

		// SUMAR TOTAL DE PRECIOS
    	sumarTotalPrecios()


	}

})

//agregando producto desde el boton para dispositivos
var numProducto = 0;

$(".btnAgregarProducto").click(function(){

	numProducto ++;

	var datos = new FormData();
	datos.append("traerProductos", "ok");

	$.ajax({

		url:"ajax/productos.ajax.php",
      	method: "POST",
      	data: datos,
      	cache: false,
      	contentType: false,
      	processData: false,
      	dataType:"json",
      	success:function(respuesta){
      	    
      	    	$(".nuevoProducto").append(

          	'<div class="row" style="padding:5px 15px">'+

			  '<!-- Descripción del producto -->'+
	          
	          '<div class="col-xs-6" style="padding-right:0px">'+
	          
	            '<div class="input-group">'+
	              
	              '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto><i class="fa fa-times"></i></button></span>'+

	              '<select class="form-control nuevaDescripcionProducto" id="producto'+numProducto+'" idProducto name="nuevaDescripcionProducto" required>'+

	              '<option>Seleccione el producto</option>'+

	              '</select>'+  

	            '</div>'+

	          '</div>'+

	          '<!-- Cantidad del producto -->'+

	          '<div class="col-xs-3 ingresoCantidad">'+
	            
	            '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" stock nuevoStock required>'+

	          '</div>' +

	          '<!-- Precio del producto -->'+

	          '<div class="col-xs-3 ingresoPrecio" style="padding-left:0px">'+

	            '<div class="input-group">'+

	              '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+
	                 
	              '<input type="text" class="form-control nuevoPrecioProducto" precioReal="" name="nuevoPrecioProducto" readonly required>'+
	 
	            '</div>'+
	             
	          '</div>'+

	        '</div>');


	        // AGREGAR LOS PRODUCTOS AL SELECT 

	         respuesta.forEach(funcionForEach);

	         function funcionForEach(item, index){

	         	if(item.stock != 0){

					$("#producto"+numProducto).append(

						'<option idProducto="'+item.id+'" value="'+item.descripcion+'">'+item.descripcion+'</option>'
		         	)
		         }
				 //Sumar total de precios
				 sumarTotalPrecios()
	         }
		}
	})
})
//selcionar prodcuto


$(".formularioVenta").on("change", "select.nuevaDescripcionProducto", function(){

	var nombreProducto = $(this).val();
	//console.log("nombreProducto", nombreProducto);
	var nuevoPrecioProducto = $(this).parent().parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");

	var nuevaCantidadProducto = $(this).parent().parent().parent().children(".ingresoCantidad").children(".nuevaCantidadProducto");
	//console.log("nuevoPrecioProducto", nuevoPrecioProducto);

    var datos = new FormData();
	datos.append("nombreProducto", nombreProducto);

	$.ajax({

		url:"ajax/productos.ajax.php",
		 method: "POST",
		 data: datos,
		 cache: false,
		 contentType: false,
		 processData: false,
		 dataType:"json",
		 success:function(respuesta){
			//console.log("respuesta", respuesta);
			$(nuevaCantidadProducto).attr("stock", respuesta["stock"]);
			$(nuevoPrecioProducto).val(respuesta["precio_venta"]);
			$(nuevoprecioProducto).attr("precioReal", respuesta["precio_venta"]);
		 
		}
	})
})

//modificar Cantidad

$(".formularioVenta").on("change", "input.nuevaCantidadProducto", function(){

	var precio = $(this).parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");
	
	
	var precioFinal = $(this).val() * precio.attr("precioReal");
	//console.log("$(this).val()", $(this).val());

	precio.val(precioFinal);

	//si esto es superior a lo que hay en estock salga una alerta suave
	if(Number($(this).val()) > Number($(this).attr("stock"))){

		$(this).val(1);
		//regresar el precio inicial
		var precioFinal = $(this).val() * precio.attr("precioReal");
		
		precio.val(precioFinal);
		
		sumarTotalPrecios();
		
		swal({
			title: "La cantidad supera el Stock",
			text: "¡Sólo hay "+$(this).attr("stock")+" unidades!",
			type: "error",
			confirmButtonText: "¡Cerrar!"
		  });
	}
	//suma total precios
	sumarTotalPrecios()
})

//sumar todos los precionas
function sumarTotalPrecios(){

	var precioItem = $(".nuevoPrecioProducto");
	var arraySumaPrecio = []; 


	for(var i = 0; i < precioItem.length; i++){

		 arraySumaPrecio.push(Number($(precioItem[i]).val()));
		 
	}
	//console.log("arraySumaPrecio", arraySumaPrecio);

	//sumar total precios
	function sumaArrayPrecios(total, numero){

		return total + numero;

	}

	var sumaTotalPrecio = arraySumaPrecio.reduce(sumaArrayPrecios);
	
	$("#nuevoTotalVenta").val(sumaTotalPrecio);
	$("#totalVenta").val(sumaTotalPrecio);
	$("#nuevoTotalVenta").attr("total",sumaTotalPrecio);


}