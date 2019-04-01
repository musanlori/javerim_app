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
        <!--Botonoes para las pestañas de la pantalla-->
        <div class="container">
          <div class="row justify-content-between ">
            <div class="col-6" ><a href="Agenda.html"><p class="h4 text-center">Listado de Materias</p></a></div>
            <div class="col-6 bg-primary" ><a href="MisAsesorias.html"><p class="h4 text-center text-dark">Mis Asesorias</p></a></div>
          </div>
        </div>
        <!--Encabezado de pestaña-->
        <div class="container">
            <div class="row bg-primary">
                <div class="col-6">
                    <p class="h1">Mis Asesorias</p>
                </div>
                <div class="col-6">
                    <p class="h1 text-right">+</p>
                </div>
            </div>
        </div>

        <!--Tabla con las asesorias Agendadas-->
        <div class="container">
            <table class="table table-responsive-sm table-bordered table-hover">
                <tbody>
                    <tr> 
                      <td>Nombre_Materia</td>
                      <td>Aqui_Va_el_Horario</td> 
                      <td>
                        <form action="editar.php">
                          <div class="form-group">
                            <button type="submit" class="btn btn-light">Editar</button>
                          </div>
                        </form>
                      </td>  
                      <td>
                        <form action="editar.php">
                          <div class="form-group">
                            <button type="submit" class="btn btn-light">Eliminar</button>
                          </div>
                        </form>
                      </td> 
                    </tr>
                    <tr> 
                      <td>Nombre_Materia</td>
                      <td>Aqui_Va_el_Horario</td> 
                       <td>
                        <form action="editar.php">
                          <div class="form-group">
                            <button type="submit" class="btn btn-light">Editar</button>
                          </div>
                        </form>
                      </td>  
                      <td>
                        <form action="editar.php">
                          <div class="form-group">
                            <button type="submit" class="btn btn-light">Eliminar</button>
                          </div>
                        </form>
                      </td> 
                    </tr>
                    <tr> 
                      <td>Nombre_Materia</td>
                      <td>Aqui_Va_el_Horario</td> 
                       <td>
                        <form action="editar.php">
                          <div class="form-group">
                            <button type="submit" class="btn btn-light">Editar</button>
                          </div>
                        </form>
                      </td>  
                      <td>
                        <form action="editar.php">
                          <div class="form-group">
                            <button type="submit" class="btn btn-light">Eliminar</button>
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