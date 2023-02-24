<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Crear venta
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Crear venta</li>
      </ol>
    </section>

    
    <section class="content">

      <div class="row">

        <!-- formulario -->

        <div class="col-lg-5 col-xs-12">

          <div class="box box-success">

          <div class="box-header with-border"></div>

          <form role="form" method="post" class="formularioVenta">
          
            <div class="box-body">

              <div class="box">
              
                <?php
                    $item= "id";
                   $valor= $_GET["idVenta"];
                    $venta = ControladorVentas::ctrMostrarVentas($item, $valor);

                    //var_dump($venta);
                    $itemUsuario = "id";
                    $valorUsuario = $venta["id_vendedor"];

                    $vendedor = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                ?>
               
              <!-- Entrada del vendedor --> 

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-user"></i></span>

                    <input type="text" class="form-control" id="nuevoVendedor" value="<?php echo $venta[""];?>" readonly>

                    <input type="hidden"  name="idVendedor" value="<?php echo $_SESSION["id"];?>">
                    

                  </div>

                </div>

                <!-- Entrada del codigo de la venta -->
                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    
                    <?php
                      

                      if(!$ventas){
                        echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="10001" readonly>';
                        
                      }else{

                        foreach($ventas as $key => $value)  {

                        }
                        $codigo = $value["codigo"] +1;
                        echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="'.$codigo.'" readonly>';
                        

                      }
                    
                    ?>

                                          

                  </div>

                </div>

                <!-- Entrada del cliente -->

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-user"></i></span>

                    <select class="form-control" id="seleccionarCliente" name="seleccionarCliente" required>

                    <option value="">Seleccionar Cliente</option>
                    <?php

                      $item = null;
                      $valor = null;

                      
                      $categorias = ControladorClientes::ctrMostrarClientes($item, $valor);

                       foreach ($categorias as $key => $value) {

                         echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                       }

                    ?>

                    </select>
                    
                    <span class="input-group-addon"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar Cliente</button></span>

                  </div>

                </div>
                <!-- Entrada Agregar producto -->
                
                <div class="form-group row nuevoProducto">

                
                </div>
                <input type="hidden" id="listaProductos" name="listaProductos">
                <!-- boton para agregar producto -->

                <button type="button" class="btn btn-default hidden-lg btnAgregarProducto"> Agregar producto</button>
                <hr>
                <div class="row">
                  <!-- entrada impuestos y total-->

                  <div class="col-xs-8 pull-right">

                    <table class="table">
                      <thead>
                        <tr>

                          <th>Impuestos</th>
                          <th>Total</th>

                        </tr>
                      </thead>
                      
                      <tbody>

                        <tr>
                          <td style="width: 50%" >

                          <div class="input-group">
                            <input type="number" class="form-control input-lg" min="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" total = "" placeholder="00000" required>

                            <input type="hidden" name="nuevoPrecioImpuesto" id="nuevoPrecioImpuesto" required>

                            <input type="hidden" name="nuevoPrecioNeto" id="nuevoPrecioNeto" required>

                            <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                          
                          </div>  

                          </td>

                          <td style="width: 50%">
                          
                            <div class="input-group">

                            <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                            <input type="text" class="form-control input-lg" id="nuevoTotalVenta" name="nuevoTotalVenta" total="" placeholder="00000" readonly required>
                            
                            <input type="hidden" name="totalVenta" id="totalVenta">

                            </div>

                          </td>

                        </tr>

                      </tbody>

                    </table>

                  </div>

                </div>

                <hr>
                <!-- entrada metodo de pago -->

                <div class="form-group row">
                  <div class="col-xs-6" style="padding-right:0px">

                    <div class="input-group">

                      <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" required>
                        <option value="">Seleccione Metodo de Pago</option>
                        <option value="Efectivo">Efectivo</option>
                        <option value="TC">Tarjeta Credito</option>
                        <option value="TD">Tarjeta Debito</option>
                      </select>

                    </div>
                  </div>
                  
                  <div class="cajasMetodoPago"></div>

                  <input type="hidden" name="listaMetodoPago" id="listaMetodoPago">
                
                </div>
                <br>
                               
              </div>

            </div>
              <div class="box-footer">
              
                <button type="submit" class="btn btn-primary pull-right" >Guardar Venta</button>

              </div>
          </form>

          <?php 
          
            $guardarVenta = new ControladorVentas();
            $guardarVenta -> ctrCrearVenta();
          ?>
          </div>  

        </div>
        
         
        <!-- La tabla de Productos -->
        <div class="col-lg-7 hidden-md hidden-sm hidden--xs">

          <div class="box box-warning">

            <div class="box-header with-border"></div>

            <div class="box-body">

              <table class="table table-bordered table-striped dt-responsive tablaVentas">

              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Imagen</th>
                  <th>Codigo</th>
                  <th>Descripcion</th>
                  <th>Stock</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              
              </table>

            </div>

          </div>

        </div>  

      </div>
      

    </section>
    
  </div>
  
  <!--=====================================
MODAL AGREGAR cliente
======================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar categoría</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE del cliente -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Ingresar nombre" required>

              </div>

            </div>
            <!-- ENTRADA PARA EL DOCUEMNTO ID -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="number" min="0" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Ingresar documento" required>

              </div>

            </div>
          <!-- ENTRADA PARA EL email -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email"  class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar Email" required>

              </div>

            </div>
            <!-- ENTRADA PARA EL telefono -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" min="0" class="form-control input-lg" name="nuevoTelefono" placeholder="246-xxx-xx-xx" data-inputmask="'mask':'(999) 999-9999'" data-mask required>

              </div>

            </div>
  
           <!-- ENTRADA PARA la Direccion -->
            
           <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" min="0" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar direccion" required>

              </div>

            </div>

             <!-- ENTRADA PARA La fecha de nacimiento -->
            
             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" min="0" class="form-control input-lg" name="nuevaFechaNacimiento" placeholder="Fecha de nacimiento" data-inputmask="'alias':'yyyy/mm/dd'" data-mask required>

              </div>

            </div>
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Cliente</button>

        </div>

      </form>

      <?php
        $crearCliente = new ControladorClientes();
        $crearCliente -> ctrCrearCliente();
      ?>

    </div>

  </div>

</div>