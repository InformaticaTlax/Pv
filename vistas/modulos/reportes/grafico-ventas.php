<?php

error_reporting(0);
    
    if(isset($_GET["fechaInicial"])){

        

        $fechaInicial =$_GET["fechaInicial"];
        $fechaFinal =$_GET["fechaFinal"];

      }else{
        
        $fechaInicial =null;
        $fechaFinal =null;

      }


      $respuesta = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal);

      $arrayFechas = array();
      $arrayVentas = array();

      //var_dump($respuesta);
      foreach($respuesta as $key => $value){

        //var_dump($value);
        //var_dump($value["fecha"]);


        #capturamos solo el año, mes y dia
        $fecha = substr($value["fecha"],0,7);
        //var_dump($fecha);

        #introducimos las fechas en el arrayfechas
        array_push($arrayFechas, $fecha);

        #capturamos las ventas
        $arrayVentas = array($fecha => $value["total"]);


        #introducimos las ventas en al $arrayVentas
        //array_push($arrayVentas, $ventas);
        //var_dump($arrayVentas);

        foreach($arrayVentas as $key => $value){

            $sumaPagoMes[$key] += $value; 

        }
      }
      //var_dump($sumaPagoMes);

     $noRepetirFechas = array_unique($arrayFechas);

     //var_dump($noRepetirFechas);
      


?>
<!--=====================================
GRÁFICO DE VENTAS
======================================-->


<div class="box box-solid bg-teal-gradient">
	
	<div class="box-header">
		
 		<i class="fa fa-th"></i>

  		<h3 class="box-title">Gráfico de Ventas</h3>

	</div>

	<div class="box-body border-radius-none nuevoGraficoVentas">

		<div class="chart" id="line-chart-ventas" style="height: 250px;"></div>

  </div>

</div>

<script>
	
 var line = new Morris.Line({
    element          : 'line-chart-ventas',
    resize           : true,
    data             : [

    <?php
    if($noRepetirFechas != null){

        foreach($noRepetirFechas as $key ){

            echo "{ y: '".$key."', ventas: ".$sumaPagoMes[$key]." },";

        }
        echo "{ y: '".$key."', ventas: ".$sumaPagoMes[$key]." }";
    
    }else{

            echo "{ y: '0', ventas: '0' }";
     
         }    

    ?>
    ],
    xkey             : 'y',
    ykeys            : ['ventas'],
    labels           : ['Ventas '],
    lineColors       : ['#efefef'],
    lineWidth        : 2,
    hideHover        : 'auto',
    gridTextColor    : '#fff',
    gridStrokeWidth  : 0.4,
    pointSize        : 4,
    pointStrokeColors: ['#efefef'],
    gridLineColor    : '#efefef',
    gridTextFamily   : 'Open Sans',
    preUnits         : '$ ',
    gridTextSize     : 10
  });

</script>