//cargar la tabla dinamica de productos
/*
$.ajax({
    url: "ajax/datatable-productos.ajax.php",
    success:function(respuesta){

        console.log("respuesta",respuesta);
    }
})*/


/*
$(document).ready(function () {
    $('.tablaProductos').DataTable({
        ajax: 'ajax/datatable-productos.ajax.php',
    });
});*/

$('.tablaProductos').DataTable({
    "ajax": "ajax/datatable-productos.ajax.php",
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

//Capturando categoria para asignar codigo
$("#nuevaCategoria").change(function(){

    var idCategoria = $(this).val();

    var datos = new FormData();
    datos.append("idCategoria", idCategoria);

    $.ajax({

        url:"ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success:function(respuesta){

            //esta funcion es para agregar codigo
            if(!respuesta){
                var nuevoCodigo = idCategoria+"01";
                $("#nuevoCodigo").val(nuevoCodigo);

            }else{
                var nuevoCodigo = Number(respuesta["codigo"]) + 1;
                $("#nuevoCodigo").val(nuevoCodigo);

            }
  
            
                  
        }
  
        })
  
  })

  //agregando precio de venta
  $("#nuevoPrecioCompra").change(function(){

    if($(".porcentaje").prop("checked")){
        
        var valorPorcentaje = $(".nuevoPorcentaje").val();
        
        
        var porcentaje = Number(($("#nuevoPrecioCompra").val()*valorPorcentaje/100))+Number($("#nuevoPrecioCompra").val());
        
        
        $("#nuevoPrecioVenta").val(porcentaje);
        $("#nuevoPrecioVenta").prop("readonly",true);

    
    }
  })

  //Cambio de porcentaje de la casilla

  $(".nuevoPorcentaje").change(function(){

    if($(".porcentaje").prop("checked")){
        
        var valorPorcentaje = $(".nuevoPorcentaje").val();
        
        
        var porcentaje = Number(($("#nuevoPrecioCompra").val()*valorPorcentaje/100))+Number($("#nuevoPrecioCompra").val());
        
        
        $("#nuevoPrecioVenta").val(porcentaje);
        $("#nuevoPrecioVenta").prop("readonly",true);

    }

  })

  $(".porcentaje").on("ifUnchecked",function(){

    $("#nuevoPrecioVenta").prop("readonly",false);
  
})

$(".porcentaje").on("ifChecked",function(){

    $("#nuevoPrecioVenta").prop("readonly",true);
  
})