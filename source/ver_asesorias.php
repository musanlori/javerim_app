<!DOCTYPE html>
<html>
    <head>
        <title>javerin_sc_II</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie-edge">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    </head>
    <body>
        <!-- Empieza el Contenido -->
        <!--Botones para las pestañas de la pantalla-->
        <div class="container">
          <div class="row justify-content-between ">
            <div class="col-6 bg-primary" ><a href="Agenda.html"><p class="h4 text-center text-dark">Listado de Materias</p></a></div>
            <div class="col-6" ><a href="MisAsesorias.html"><p class="h4 text-center">Mis Asesorias</p></a></div>
          </div>
        </div>
         <!--Encabezado de la pestaña-->
        <div class="container">
            <div class="row bg-primary">
                <div class="col-12">
                    <p class="h1">Listado de Materias</p>
                </div>
            </div>
        </div>
        <!--Targetas-->
        <div class="container">
          <div class="row">       
            <div class="col-md">        
                <div class="card text-center">
                  <div class="card-body">
                    <img class="card-img-top" src="../img/algebra.jpg" height="250" alt="">
                    <h4 class="card-title">algebra</h4>
                    <p class="card-text"> asesores para temas de algebra </p>
                    <a href="#" class="btn btn-primary">Entrar</a>
                  </div>
                </div>          
            </div>
      
            <div class="col-md">        
                <div class="card text-center">
                  <div class="card-body">
                    <img class="card-img-top" src="../img/algebra.jpg" height="250" alt="">
                    <h4 class="card-title">Física</h4>
                    <p class="card-text"> asesores para temas de Física </p>
                    <a href="#" class="btn btn-primary">Entrar</a>
                  </div>
                </div>          
            </div>
            
            <div class="col-md">        
                <div class="card text-center">
                  <div class="card-body">
                      <img class="card-img-top" src="../img/algebra.jpg" height="250" alt="">
                      <h4 class="card-title">cálculo</h4>
                      <p class="card-text"> asesores para temas de cálculo </p>
                    <a href="#" class="btn btn-primary">Entrar</a>
                  </div>
                </div>          
            </div>      
          </div>
        </div>
        <!--Tabla con la lista de asesores disponibles para cada materia-->
        <div class="container">
                <table class="table table-responsive-sm table-bordered table-hover">
                  <thead> 
                    <tr> 
                      <th>img</th> 
                      <th>Nombre</th>
                      <th>Horario</th>
                      <th>calificacion</th>
                      <th> </th>
                    </tr> 
                  </thead>
                  <tbody>
                    <tr> 
                      <td>Foto</td>
                      <td>Fulanito_de_tal</td> 
                      <td>Todo el dia</td>
                      <td>5-estrellas</td>
                      <td>
                        <form action="agrega.php">
                          <div class="form-group">
                            <button type="submit" class="btn btn-light">Agregar</button>
                          </div>
                        </form>
                      </td> 
                    </tr>
                    <tr> 
                        <td>Foto</td>
                        <td>Fulanito_de_tal</td> 
                        <td>Todo el dia</td>
                        <td>5-estrellas</td>
                        <td>
                          <form action="agrega.php">
                            <div class="form-group">
                              <button type="submit" class="btn btn-light">Agregar</button>
                            </div>
                          </form>
                        </td>  
                    </tr>
                    <tr> 
                        <td>Foto</td>
                        <td>Fulanito_de_tal</td> 
                        <td>Todo el dia</td>
                        <td>5-estrellas</td>
                        <td>
                          <form action="agrega.php">
                            <div class="form-group">
                              <button type="submit" class="btn btn-light">Agregar</button>
                            </div>
                          </form>
                        </td>  
                    </tr>

                  </tbody>
                </table>
             </div> 
        <!-- Termina el Contenido -->
        <script src="../js/jquery-3.3.1.slim.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
