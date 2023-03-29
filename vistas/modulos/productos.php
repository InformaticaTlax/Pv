<?php
//para bloquear los usuarios acceecn a perfiles donde no deberia accesar
if($_SESSION["perfil"] == "Vendedor"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
    <h1>
      
      Administrar Productos
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar productos</li>
    
    </ol>

  </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
            
          <button class="btn btn-primary" data-toggle="modal" data-target= "#modalAgregarProducto">
            Agregar producto
          </button>


        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped dt-responsive tablaProductos" width="100%">
            <thead>
              <tr>
                <th style="width:10px" > #</th>
                <th>Img</th>
                <th>codigo</th>
                <th>Descripcion</th>
                <th>Categoria</th>
                <th>Stock</th>
                <th>Precio de compra</th>
                <th>Precio de venta</th>
                <th>Agregado</th>
                <th>Acciones</th>
              </tr>
            </thead>
            
          </table>
        
          <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" id="perfilOculto">

        </div>
        
      </div>
      
    </section>
    
  </div>
  

<!-- Modal agregar producto -->
<div id="modalAgregarProducto" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    
        <form role="form" method="post" enctype="multipart/form-data">

        <!-- Cabeza del Modal -->

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Agergar Producto</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">

              <!-- Entrada para Seleccionar Categoria -->
              <div class="form-group">

                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                  <select class="form-control input-lg" id="nuevaCategoria" name="nuevaCategoria" required>
                    <option value="">Seleccionar Categoria</option>
                    <?php

                      $item = null;
                      $valor = null;

                      $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                      foreach($categorias as $key => $value) {

                        
                        echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';

                      }

                    
                    ?>
                    
                  </select>
                  
                </div>
              </div>
              <!-- Entrada para Codigo -->
              <div class="form-group">

                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-code"></i></span>
                  <input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar Codigo"  required>

                </div>
              </div>

              <!-- entrada para descripcion -->

              <div class="form-group">

                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeholder="Ingresar Descripcion" required>
                  
                </div>
              </div>

              
               <!-- entrada para Stock -->

               <div class="form-group">

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-check"></i></span>
                <input type="number" class="form-control input-lg" name="nuevoStock" min="-200" placeholder="Cantidad Disponible" required>
                
              </div>
              </div>

               <!-- entrada para Precio compra -->

              <div class="form-group row">
                
              <div class="col-xs-12 col-sm-6">

                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                  <input type="number" class="form-control input-lg" id="nuevoPrecioCompra" name="nuevoPrecioCompra" min="0" step="any" placeholder="Precio de Compra" required>
                  
                </div>
              </div>

              

              <!-- entrada para Precio de Venta -->

              
              <div class="col-xs-12 col-sm-6">

                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
                  <input type="number" class="form-control input-lg" id="nuevoPrecioVenta" name="nuevoPrecioVenta" min="0" step="any" placeholder="Precio de Venta" required>
                  
                </div>
                
                <br>
                <!-- Checkbox para porcentaje -->

                <div class="col-xs-6">

                  <div class="form-group">

                    <label>

                      <input type="checkbox" class="minimal porcentaje" checked>
                      Utilizar porcentaje

                    </label>

                  </div>

                </div>


                <!-- La entrada para porcentaje -->
                <div class="col-xs-6" style="padding:0">

                  <div class="input-group">

                    <input type="number" class="form-control input-lg nuevoPorcentaje"  min="0" value="25" required>

                    <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                  </div>

                </div>
              </div>  
            </div>



              <!-- Entrada para Foto -->
              <div class="form-group">

                <div class="panel">Subir Imagen</div>

                <input type="file" class="nuevaImagen" name="nuevaImagen">

                <p class="help-block" >Peso Maximo de la foto de 2 MB</p>

                <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

              </div>
              

            </div>
          </div>

          <!-- Pie del modal -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Guardar Producto</button>
          </div>
        </form>
            
        <?php
        
          $crearProducto = new ControladorProductos();
          $crearProducto -> ctrCrearProducto();

        ?>

    </div>

  </div>
</div>

<!-- Modal Editar producto -->
<div id="modalEditarProducto" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    
        <form role="form" method="post" enctype="multipart/form-data">

        <!-- Cabeza del Modal -->

          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Editar Producto</h4>
          </div>

          <div class="modal-body">
            <div class="box-body">

              <!-- Entrada para Seleccionar Categoria -->
              <div class="form-group">

                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                  <select class="form-control input-lg"  name="editarCategoria" readonly required>
                    <option id="editarCategoria" ></option>
                    
                  </select>
                  
                </div>
              </div>
              <!-- Entrada para Codigo -->
              <div class="form-group">

                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-code"></i></span>
                  <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo"  readonly required>

                </div>
              </div>

              <!-- entrada para descripcion -->

              <div class="form-group">

                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                  <input type="text" class="form-control input-lg" name="editarDescripcion" id="editarDescripcion" required>
                  
                </div>
              </div>

              
               <!-- entrada para Stock -->

               <div class="form-group">

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-check"></i></span>
                <input type="number" class="form-control input-lg" name="editarStock" id="editarStock" min="-200" required>
                
              </div>
              </div>

               <!-- entrada para Precio compra -->

              <div class="form-group row">
                
              <div class="col-xs-12 col-sm-6">

                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                  <input type="number" class="form-control input-lg" id="editarPrecioCompra" name="editarPrecioCompra" min="0" step="any"  required>
                  
                </div>
              </div>

              

              <!-- entrada para Precio de Venta -->

              
              <div class="col-xs-12 col-sm-6">

                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
                  <input type="number" class="form-control input-lg" id="editarPrecioVenta" name="editarPrecioVenta" min="0" step="any" readonly required>
                  
                </div>
                
                <br>
                <!-- Checkbox para porcentaje -->

                <div class="col-xs-6">

                  <div class="form-group">

                    <label>

                      <input type="checkbox" class="minimal porcentaje" checked>
                      Utilizar porcentaje

                    </label>

                  </div>

                </div>


                <!-- La entrada para porcentaje -->
                <div class="col-xs-6" style="padding:0">

                  <div class="input-group">

                    <input type="number" class="form-control input-lg nuevoPorcentaje"  min="0" value="25" required>

                    <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                  </div>

                </div>
              </div>  
            </div>



              <!-- Entrada para Foto -->
              <div class="form-group">

                <div class="panel">Subir Imagen</div>

                <input type="file" class="nuevaImagen" name="editarImagen">

                <p class="help-block" >Peso Maximo de la foto de 2 MB</p>

                <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                <input type="hidden" name="imagenActual" id="imagenActual">

              </div>
              

            </div>
          </div>

          <!-- Pie del modal -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
          </div>
        </form>
        <?php

            $editarProducto = new ControladorProductos();
            $editarProducto -> ctrEditarProducto();

        ?>

    </div>

  </div>
</div>
<?php

  $eliminarProducto = new ControladorProductos();
  $eliminarProducto -> ctrEliminarProducto();

?>