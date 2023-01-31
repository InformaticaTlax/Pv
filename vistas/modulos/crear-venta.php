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
          
          <div class="box-body">

            <form role="form" method="post">

              <div class="box">
               
              <!-- Entrada del vendedor --> 

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" id="nuevoVendedor" name="nuevoVendedor" value="Usuario Administrador" readonly>

                  </div>

                </div>

                <!-- Entrada del vendedor -->
                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <input type="text" class="form-control" id="nuevoVenta" name="nuevoVenta" value="10002343" readonly>                      

                  </div>

                </div>

                <!-- Entrada del cliente -->

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-user"></i></span>

                    <select class="form-control" id="seleccionarCliente" name="seleccionarCliente" required>

                    <option value="">Seleccionar Cliente</option>

                    </select>
                    
                    <span class="input-group-addon"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar Cliente</button></span>

                  </div>

                </div>
                <!-- Entrada Agregar producto -->
                <div class="form-group row nuevoProducto">

                  <!-- descripcion del  producto -->

                  <div class="col-xs-6" style="padding-right:0px">

                    <div class="input-group">

                      <span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button></span>

                      <input type="text" class="form-control" id="agregarProducto" name="agregarProducto" placeholder="Descripcion del procducto" required>

                    </div>
                
                  </div>

                  <!-- Cantidad del  producto -->
                  <div class="col-xs-3">

                    <input type="number" class="form-control" id="nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" placeholder="0" required>

                  </div>

                  <!-- precio del producto -->

                  <div class="col-xs-3" style="padding-left:0px">
                    <div class="input-group">
                    
                      <input type="number" min="1" class="form-control" id="nuevoPrecioProducto" name="nuevoPrecioProducto" placeholder="00000" readonly required>

                      <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                    
                    </div>  

                  </div>

                </div>

                <!-- boton para agregar producto -->

                <button type="button" class="btn btn-default hidden-lg"> Agregar producto</button>
                <hr>
                <div class="row">

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
                            <input type="number" class="form-control" min="0" id="nuevoImpuesto de Venta" name="nuevoImpuesto de Venta" placeholder="0" required>

                            <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                          
                          </div>  

                          </td>

                          <td style="width: 50%">
                          
                            <div class="input-group">

                            <input type="number" min="1" class="form-control" id="nuevoTotalVenta" name="nuevoTotalVenta" placeholder="00000" readonly required>
                            <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                            </div>

                          </td>

                        </tr>

                      </tbody>

                    </table>

                  </div>

                </div>
                
              </div>

            </form>

          </div>
          
          </div>  

        </div>
        
         
        <!-- La tabla de Productos -->
        <div class="col-lg-7 hidden-md hidden-sm hidden--xs">
          <div class="box box-warning">

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