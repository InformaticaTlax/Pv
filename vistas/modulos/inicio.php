<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pagina de Inicio
        <small>Panel de Control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Tablero</li>
      </ol>
    </section>

    
    <section class="content">

    <div class="row">
      
      <?php

        include "inicio/cajas-superiores.php"

      ?>
    </div>    
    <div class="row">
      <div class="col-lg-12">
        <?php
        
        include "reportes/grafico-ventas.php";

        ?>

      </div>

      <div class="col-lg-6">
        <?php
        
        include "reportes/productos-mas-vendidos.php";

        ?>

      </div>

      <div class="col-lg-6">
        <?php
        
        include "inicio/productos-recientes.php";

        ?>

      </div>
    </div>  
     
    </section>
    
  </div>
  