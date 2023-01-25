<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Clientes
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Cliente</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">
          
          Agregar Cliente

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Nombre</th>
           <th>Docuemnto ID</th>
           <th>Email</th>
           <th>Telefono</th>
           <th>Direccion</th>
           <th>Fecha de Nacimiento</th>
           <th>Total de compras</th>
           <th>Ultima compra</th>
           <th>Ingreso al Sistema</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>
          
        <?php
        
          $item = null;
          $valor = null;
          
          $clientes = ControladorClientes::ctrMostarClientes($item, $valor);
          //var_dump($clientes);
          foreach($clientes as $key => $value){
            echo '<tr>

                  <td>'.($key+1).'</td>

                  <td>'.$value["nombre"].'</td>

                  <td>'.$value["documento"].'</td>
                  <td>'.$value["email"].'</td>
                  <td>'.$value["telefono"].'</td>
                  <td>'.$value["direccion"].'</td>
                  <td>'.$value["fecha_nacimiento"].'</td>
                  <td>'.$value["compras"].'</td>
                  <td>0000-00-00 00:00:00</td>
                  <td>'.$value["fecha"].'</td>

                  <td>

                  <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarCliente" data-toggle="modal" data-target="#modalEditarCliente" idCliente="'.$value["id"].'"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarCliente" idCliente="'.$value["id"].'"><i class="fa fa-times"></i></button>

                      </div>   

                  </td>

                </tr>

                
                </tr>';
          }

        ?>

          

        </tbody>

       </table>

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


<!--=====================================
MODAL editar Cliente
======================================-->

<div id="modalEditarCliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar cliente</h4>

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

              <input type="text" class="form-control input-lg" name="editarCliente" id="editarCliente" required>
              <input type="hidden" id="idCliente" name="idCliente">
              </div>

            </div>
            <!-- ENTRADA PARA EL DOCUEMNTO ID -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="number" min="0" class="form-control input-lg" name="editarDocumentoId" id="editarDocumentoId"  required>

              </div>

            </div>
          <!-- ENTRADA PARA EL email -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email"  class="form-control input-lg" name="editarEmail" id="editarEmail"  required>

              </div>

            </div>
            <!-- ENTRADA PARA EL telefono -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" min="0" class="form-control input-lg" name="editarTelefono" id="editarTelefono"  data-inputmask="'mask':'(999) 999-9999'" data-mask required>

              </div>

            </div>
  
           <!-- ENTRADA PARA la Direccion -->
            
           <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" min="0" class="form-control input-lg" name="editarDireccion" id="editarDireccion"   required>

              </div>

            </div>

             <!-- ENTRADA PARA La fecha de nacimiento -->
            
             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" min="0" class="form-control input-lg" name="editarFechaNacimiento" id="editarFechaNacimiento"  data-inputmask="'alias':'yyyy/mm/dd'" data-mask required>

              </div>

            </div>
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Cambios</button>

        </div>

      </form>

      

    </div>

  </div>

</div>


