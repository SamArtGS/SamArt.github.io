<?php
    header('Content-Type: text/html; charset=UTF-8');
    session_start();
    //Si existe la sesión "cliente"..., la guardamos en una variable.
    if (!isset($_SESSION['medico'])){
        header('Location: IniciarSesion.php');//Aqui lo redireccionas al lugar que quieras.
        die();
      }

      if(!isset($_GET['id'])){
        header('Location: ListaPaciente.php');
        die();
      }
      $id = $_GET['id'];
      $enlace = mysqli_connect("slh.chjrd0648elz.us-west-2.rds.amazonaws.com", "proteco", "proteco123", "clinicaslh");

                        if (!$enlace) {
                               echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
                               echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
                               echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
                               exit;
                        }
?>

<!DOCTYPE HML>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icons.png" />
    <link rel="icon" type="image/png" href="assets/img/favicons.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Clínica San Luis Huexotla</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
      <link href="assets/css/material-kit.css" rel="stylesheet"/>
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="azul" data-image="bg2.JPG">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
                <a class="simple-text">
                    <a class="simple-text">
                        <?php
                            

                            $query = "SELECT Nombre, ApellidoPat FROM PACIENTE WHERE idPACIENTE=$id";
                            $result = mysqli_query($enlace, $query);
                            $row = mysqli_fetch_array($result);
                            echo $row['Nombre'] . " " .$row['ApellidoPat'];
                            ?>
                    </a>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="dashboard.php?id=<?php echo $id; ?>">
                            <i class="material-icons">dashboard</i>
                            <p>Vista General</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="DatosPaciente.php?id=<?php echo $id; ?>">
                            <i class="material-icons">person</i>
                            <p>Datos personales</p>
                        </a>
                    </li>
                    <li>
                        <a href="HistoriaClinica.php?id=<?php echo $id; ?>">
                            <i class="material-icons">fingerprint</i>
                            <p>Historia Clínica</p>
                        </a>
                    </li>
                    <li>
                        <a href="Diagnosticos.php?id=<?php echo $id; ?>">
                            <i class="material-icons">accessibility_new</i>
                            <p>Diagnósticos</p>
                        </a>
                    </li>
                    
                    <li>
                        <a href="Archivos.php?id=<?php echo $id; ?>">
                            <i class="material-icons">folder_shared</i>
                            <p>Archivos</p>
                        </a>
                    </li>
                    <li>
                        <a href="CitasPaciente.php?id=<?php echo $id; ?>">
                            <i class="material-icons text-gray">access_time</i>
                            <p>Citas programadas</p>
                        </a>
                    </li>
                   
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> ⚕︎ Clínica San Luis Huexotla</a>
                    </div>
                    <div class="collapse navbar-collapse" id="navigation-example-2">
                        <ul class="nav navbar-nav navbar-right">
                              <li>
                                  <a href="ListaPaciente.php">
                                    <i class="material-icons text-gray">table_chart</i>
                                      Tabla general
                                  </a>
                              </li>
                              <li>
                                  <a href="Calendario.php">
                                        <i class="material-icons text-gray">insert_invitation</i>
                                      Calendario
                                  </a>
                              </li>
                             
                              <li class="dropdown">
                                  <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="material-icons text-gray">face</i>
                                          Perfil
                                      
                                  </a>
                                  <ul class="dropdown-menu">
                                      <li class="dropdown-header">
                                          Médico
                                      </li>
                                      <li>
                                          <a href="#pablo">Datos médicos</a>
                                      </li>
                                      <li>
                                        
                                          <a href="#pablo">Configuración página</a>
                                          
                                      </li>
                                      <li class="divider"></li>
                                      <li>
                                        
                                        <a href="index.php">Cerrar Sesión</a></li>
                                  </ul>
                              </li>
                         </ul>
                         <form class="navbar-form navbar-right" role="search">
                            
                        </form>
                      </div><!-- /.navbar-collapse -->

                        
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            
                                <a class="btn btn-danger pull-right" href="DatosPaciente.php?id=<?php echo $id; ?>">
                                    <i class="material-icons">close</i> Descartar cambios
                                </a>
                             
                        <form action="EditarPaciente.php?id=<?php echo $id; ?>" method="post">

                                <button type="submit" class="btn btn-success pull-right"><i class="material-icons">check</i> Salvar cambios</button>
                            

                            <div class="card">
                                <div class="card-header" data-background-color="orange">
                                    <h4 class="title">Edición de datos personales del paciente</h4>
                                    <p class="category">Puedes editar únicamente las casillas señaladas. Para alterar datos sensibles por favor contacte al administrador</p>
                                </div>
                                <div class="card-content">
                                     
                                    

                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group label-floating">
                                                    <label class="control-label" style="font-size: 12px !important">Nombre</label>
                                                    <?php
                                                            $query = "SELECT Nombre FROM PACIENTE WHERE idPACIENTE=$id";
                                                            $result = mysqli_query($enlace, $query);
                                                            if(!$result){
                                                                echo "NA";
                                                            }
                                                            $row = mysqli_fetch_array($result);
                                                            ?>
                                                            <input type="text" name="nombres" class="form-control" value="<?php echo $row[0]; ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label" style="font-size: 12px !important">Apellido Paterno</label>
                                                    <?php
                                                            $query = "SELECT ApellidoPat FROM PACIENTE WHERE idPACIENTE=$id";
                                                            $result = mysqli_query($enlace, $query);
                                                            if(!$result){
                                                                echo "NA";
                                                            }
                                                            $row = mysqli_fetch_array($result);
                                                            ?>
                                                            <input type="text" name="apellidopat" class="form-control" value="<?php echo $row[0]; ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label" style="font-size: 12px !important">Apellido Materno</label>
                                                    <?php
                                                            $query = "SELECT ApellidoMat FROM PACIENTE WHERE idPACIENTE=$id";
                                                            $result = mysqli_query($enlace, $query);
                                                            if(!$result){
                                                                echo "NA";
                                                            }
                                                            $row = mysqli_fetch_array($result);
                                                            ?>
                                                            <input type="text" name="apellidomat" class="form-control" value="<?php echo $row[0]; ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                       <div class="row">
                                            <div class="col-md-2">
                                                <?php
                                                            $query = "SELECT Sexo FROM PACIENTE WHERE idPACIENTE=$id";
                                                            $result = mysqli_query($enlace, $query);
                                                            if(!$result){
                                                                echo "NA";
                                                            }
                                                            $row = mysqli_fetch_array($result);
                                                            if($row[0]="Hombre"){
                                                                print("<select class='selectpicker form-group' data-style='select-with-transition'  title='Sexo' data-size='2' name='sexo'>
                                                <option value='Hombre' selected>Hombre</option>
                                                <option value='Mujer'>Mujer</option>");
                                                            }else{
                                                                print("<select class='selectpicker form-group' data-style='select-with-transition'  title='Sexo' data-size='2' name='sexo'>
                                                <option value='Hombre' >Hombre</option>
                                                <option value='Mujer' selected>Mujer</option>");
                                                            }
                                                        ?>
                                                
                                                
                                              </select>
                                            </div>
                                            <div class="col-lg-3"   align="center">
                                                <?php
                                                            $query = "SELECT TipoSangre FROM PACIENTE WHERE idPACIENTE=$id";
                                                            $result = mysqli_query($enlace, $query);
                                                            if(!$result){
                                                                echo "NA";
                                                            }
                                                            $row = mysqli_fetch_array($result);
                                                        ?>
                                              <select class="selectpicker form-group" value="<?php echo $row[0]?>" data-style="select-with-transition" title="Tipo de sangre" data-size="8" name="tiposangre">
                                                <option value='<?php echo $row[0]?>' selected disabled><?php echo $row[0]?></option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                              </select>
                                              </div>
                                            
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label" style="font-size: 12px !important">Fecha de Nacimiento</label>
                                                    <?php
                                                            $query = "SELECT FechaNacimiento FROM PACIENTE WHERE idPACIENTE=$id";
                                                            $result = mysqli_query($enlace, $query);
                                                            if(!$result){
                                                                echo "NA";
                                                            }
                                                            $row = mysqli_fetch_array($result);
                                                            ?>
                                                            <input type="text" name="fechanacimiento" class="form-control" value="<?php echo $row[0]; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label" style="font-size: 12px !important">Teléfono</label>
                                                    <?php
                                                            $query = "SELECT Telefono FROM PACIENTE WHERE idPACIENTE=$id";
                                                            $result = mysqli_query($enlace, $query);
                                                            if(!$result){
                                                                echo "NA";
                                                            }
                                                            $row = mysqli_fetch_array($result);
                                                            ?>
                                                            <input type="number" name="telefono" class="form-control" value="<?php echo $row[0];?>" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label" style="font-size: 12px !important">Dirección</label>
                                                    <?php
                                                            $query = "SELECT Direccion FROM PACIENTE WHERE idPACIENTE=$id";
                                                            $result = mysqli_query($enlace, $query);
                                                            if(!$result){
                                                                echo "NA";
                                                            }
                                                            $row = mysqli_fetch_array($result);
                                                            ?>
                                                            <input type="text" class="form-control" name="direccion" value="<?php echo $row[0]; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label" style="font-size: 12px !important">Ciudad</label>
                                                    <?php
                                                            $query = "SELECT Ciudad FROM PACIENTE WHERE idPACIENTE=$id";
                                                            $result = mysqli_query($enlace, $query);
                                                            if(!$result){
                                                                echo "NA";
                                                            }
                                                            $row = mysqli_fetch_array($result);
                                                            ?>
                                                            <input type="text" class="form-control" name="ciudad" value="<?php echo $row[0]; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label" style="font-size: 12px !important">Estado</label>
                                                    <?php
                                                            $query = "SELECT Estado FROM PACIENTE WHERE idPACIENTE=$id";
                                                            $result = mysqli_query($enlace, $query);
                                                            if(!$result){
                                                                echo "NA";
                                                            }
                                                            $row = mysqli_fetch_array($result);
                                                            ?>
                                                            <input type="text" class="form-control" name="estado" value="<?php echo $row[0]; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label" style="font-size: 12px !important">Código Postal</label>
                                                    <?php
                                                            $query = "SELECT CP FROM PACIENTE WHERE idPACIENTE=$id";
                                                            $result = mysqli_query($enlace, $query);
                                                            if(!$result){
                                                                echo "NA";
                                                            }
                                                            $row = mysqli_fetch_array($result);
                                                            ?>
                                                            <input type="number" class="form-control" name="cp" value="<?php echo $row[0]; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label" style="font-size: 12px !important">Estado Civil</label>
                                                    <?php
                                                            $query = "SELECT EstadoCivil FROM PACIENTE WHERE idPACIENTE=$id";
                                                            $result = mysqli_query($enlace, $query);
                                                            if(!$result){
                                                                echo "NA";
                                                            }
                                                            $row = mysqli_fetch_array($result);
                                                            ?>
                                                            <input type="text" class="form-control" name="EstadoCivil" value="<?php echo $row[0]; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label" style="font-size: 12px !important">Religión</label>
                                                    <?php
                                                            $query = "SELECT Religion FROM PACIENTE WHERE idPACIENTE=$id";
                                                            $result = mysqli_query($enlace, $query);
                                                            if(!$result){
                                                                echo "NA";
                                                            }
                                                            $row = mysqli_fetch_array($result);
                                                            ?>
                                                            <input type="text" class="form-control" name="religion" value="<?php echo $row[0]; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label" style="font-size: 12px !important">Lugar de Nacimiento</label>
                                                    <?php
                                                            $query = "SELECT LugarNacim FROM PACIENTE WHERE idPACIENTE=$id";
                                                            $result = mysqli_query($enlace, $query);
                                                            if(!$result){
                                                                echo "NA";
                                                            }
                                                            $row = mysqli_fetch_array($result);
                                                            ?>
                                                            <input type="text" class="form-control" name="lugarnacimiento" value="<?php echo $row[0]; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="clearfix"></div>
                                    
                                </div>
                            </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="assets/js/arrive.min.js"></script>
  <script src="assets/js/bootstrap-selectpicker.js" type="text/javascript"></script>
<!--  PerfectScrollbar Library -->
<script src="assets/js/perfect-scrollbar.jquery.min.js"></script>





<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Material Dashboard javascript methods -->
<script src="assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

    });
</script>

  <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="assets/js/bootstrap-selectpicker.js" type="text/javascript"></script>

  <!--  Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/  -->
  <script src="assets/js/bootstrap-tagsinput.js"></script>

  <!--  Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="assets/js/jasny-bootstrap.min.js"></script>

</html>