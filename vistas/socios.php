<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <?php include("header.php");?>
    <title>Socios</title>
       
  </head>
    
  <body> 
     <header>
     <h3 class='text-center'></h3>
     </header>    
<!-- Page Wrapper -->
  <div id="wrapper">

    <?php include("mainmenu.php");?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
          <?php include("navbar.php");?>      
    
    <div class="container caja">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">            
                <button id="btnNuevo" type="button" class="btn btn-info" data-toggle="modal" style="position: absolute;right: 50px"><i class="material-icons">library_add</i></button>    
                </div>    
            </div>    
        </div>    
        <br>  
        <div class="row">
            <div class="col-lg-12">
            <div class="table-responsive">        
                <table id="tablaSocios" class="table table-striped table-bordered table-condensed" style="width:100%" >
                    <thead class="text-center">
                        <tr>
                            <th>Nro. Socio</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Dni</th>                                
                            <th>Fecha Nac.</th>  
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>                           
                    </tbody>        
                </table>               
            </div>
            </div>
        </div>  
    </div>   
    <br>
    <!--Modal para CRUD-->
    <div class="modal fade" id="modalSocios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <form id="formSocios">    
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group">
                        <label for="" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre">
                        </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group">
                        <label for="" class="col-form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido">
                        </div> 
                        </div>    
                    </div>
                    <div class="row"> 
                        <div class="col-lg-6">
                        <div class="form-group">
                        <label for="" class="col-form-label">DNI</label>
                        <input type="text" class="form-control" id="dni">
                        </div>               
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group">
                        <label for="" class="col-form-label">Fecha de Nacimiento</label>
                        <input type="text" class="form-control" id="fecha_nac">
                        </div>
                        </div>  
                    </div>
                      
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                </div>
            </form>    
            </div>
          </div>
        </div>  
    </div>
  </div>
        <!-- /.container-fluid -->

  </div>
      <!-- End of Main Content -->

      <!-- Footer -->
        <?php include("footer.php");?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
      
    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="assets/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/popper/popper.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="assets/datatables/datatables.min.js"></script>    
     
    <script type="text/javascript" src="socios.js"></script>  
    
    
  </body>
</html>
