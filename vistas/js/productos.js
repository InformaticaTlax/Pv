//cargar la tabla dinamica de productos

$.ajax({
    url: "ajax/datatable-productos.ajax.php",
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

$('.tablaProductos').DataTable({
    "ajax": "ajax/datatable-productos.ajax.php"
});