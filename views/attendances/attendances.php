<?php 

  session_start(['name' => 'Sistema']);

  if(!isset($_SESSION['token']) || !isset($_SESSION['usuario'])) {
    unset($_SESSION['id']);
    unset($_SESSION['nombre']);
    unset($_SESSION['apellido']);
    unset($_SESSION['usuario']);
    unset($_SESSION['email']);
    unset($_SESSION['clave']);
    unset($_SESSION['tipo']);
    unset($_SESSION['genero']);
            
    session_destroy();
    header('Location: http://localhost/attendance-tracker/login');
  }

  $page = "attendance";
?>

<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Attendances | <?php echo NOMBRE;?></title>

    <meta name="description" content="" />

    <?php include "./modulos/links.php"; ?>


  </head>

  <body>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
  
      <?php include "./modulos/menu.php"?>

        <div class="layout-page">
          <div class="content-wrapper" id="place">
            <div class="">
              <div class="container-fluid flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Information / Attendances /</span> Attendances</h4>
                <div class="row">
                  <div class="col-md-12">
                    <ul class="nav nav-pills flex-column flex-md-row mb-3">
                      <li class="nav-item">
                        <a class="nav-link active" href="javascript:void(0);"> Attendances</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="records"> Records</a>
                      </li>
                    </ul>
                  </div>
                </div>
                
                <div class="demo-inline-spacing">
                  <button type="button" style="margin: 0% 1% 1% 1%;" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#PerAdd" aria-expanded="false" aria-controls="collapseAdminAdd">
                    <span class="tf-icons bx bx-user-plus"></span>   Add Attendance
                  </button>
                </div>

                <div class="card mb-4 mt-4">
                  <div class="collapse" id="PerAdd">
                    <div class="card ">
                      <div class="card-body form-resto">
                        <form action="<?php echo SERVERURL; ?>conexiones/asistReg.php" id="perForm" enctype="multipart/form-data" method="POST" data-form="save" class="FormularioAjax">
                          <div class="mb-3">
                            <div class="mt-2">
                              <label for="personlSelect" class="form-label">Employee:</label>
                              <select class="form-select" name="personal" id="personlSelect" aria-label="Default select example">
                                <option selected="" disabled>Choose the Employee</option>
                                <?php
                                  $servername = "localhost";
                                  $dbname = "sistema-asistencias";
                                  $username = "root";
                                  $password = "";
                                  $dia = date("d");

                                  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                  $sql = "SELECT * FROM personal WHERE PersonalEstado = 'Active' AND DAY(PersonalUltimaEntrada) != '$dia'";
                                  $result = $conn->query($sql);
                                  
                                  while ($rows = $result->fetch()) {
                                    echo'<option value="' . $rows['PersonalCodigo'] . '">' . $rows['PersonalNombre'] . '  ' . $rows['PersonalApellido'] . '</option>';
                                  };  
                                ?>
                              </select>
                            </div>
                          </div>

                          <div class="d-grid gap-2 col-lg-6 mx-auto">
                            <button class="btn btn-primary" id="btn" type="submit">Add Attendance</button>
                          </div>
                          <div id="respuesta" style="margin-top: 3%;" class="RespuestaAjax"></div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="collapse mt-3" id="salida">
                  <div class="card ">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Choose employee to set exit</h5>
                    </div>

                    <div class="card-body form-resto">
                      <form action="<?php echo SERVERURL; ?>conexiones/salida.php" id="perForm" enctype="multipart/form-data" method="POST" data-form="save" >
                        <div class="mb-3">
                          <div class="mt-2">
                            <label for="personlSelect" class="form-label">Employees:</label>
                            <select class="form-select" name="salida" id="personlSelect" aria-label="Default select example">
                              <option selected="" disabled>Choose...</option>
                              <?php
                                $servername = "localhost";
                                $dbname = "sistema-asistencias";
                                $username = "root";
                                $password = "";
                                $dia = date("d");
                                
                                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                $sql = "SELECT * FROM asistencias WHERE HOUR(AsistenciaSalida) = '00' AND DAY(AsistenciaFecha) = '$dia'";
                                $result = $conn->query($sql);
                                
                                while ($rows = $result->fetch()) {
                                  $hora = $rows['AsistenciaFecha'];
                                  echo'<option value="' . $rows['AsistenciaCodigo'] . '">' . $rows['AsistenciaNombre'] . ' - ' . 'Llegada: ' . date("h:i:s", strtotime($hora)) . '</option>';
                                };  
                              ?>
                            </select>
                          </div>
                        </div>

                        <div class="d-grid gap-2 col-lg-6 mx-auto">
                          <button class="btn btn-primary" id="btn" type="submit">Add exit time</button>
                        </div>
                        <div id="respuesta" style="margin-top: 3%;" class="RespuestaAjax"></div>
                      </form>
                    </div>
                  </div>
                </div>
                      
                <div class="card mb-4 mt-3">
                  <div class="card" style="padding: 0px 2%;">
                    <h5 class="card-header">Attendances List</h5>
                    <div class="table-responsive text-nowrap" style="overflow: hidden;">
                      <table class="table table-hover" style="margin-bottom: 2%;" id="asist">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Employee</th>
                            <th>Arrival</th>
                            <th>Exit</th>
                            <th>Delete</th>
                            <th>Add exit</th>
                          </tr>
                        </thead>
                      
                        <tbody class="table-border-bottom-0">
                          <?php
                            $servername = "localhost";
                            $dbname = "sistema-asistencias";
                            $username = "root";
                            $password = "";
                            $dias = date("d");
                            $num = 1;

                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $sql = "SELECT * FROM asistencias WHERE DAY(AsistenciaFecha) = '$dias' ORDER BY AsistenciaFecha ASC";
                            $result = $conn->query($sql);
                            
                            while ($rows = $result->fetch()) {
                              if($rows['AsistenciaSalida'] == "0000-00-00 00:00:00") {
                                $hora = "No exit yet";
                                $sal =  "<a href='asistencias?codigo=" . $rows['AsistenciaCodigo'] . "' class='btn btn-sm btn-info' data-bs-toggle='tooltip' data-bs-offset='0,4' data-bs-placement='top' data-bs-html='true' title='' data-bs-original-title='<span>Añadir Salida</span>'>
                                            <span class='tf-icons bx bx-log-out'></span>
                                          </a>";
                              } else {
                                $hora = $rows['AsistenciaSalida'];
                                $sal = "";
                              }

                              echo"<tr>
                                    <td> <strong>" . $num++ . "</strong></td>
                                    <td>" . $rows['AsistenciaNombre'] . "</td>
                                    <td>" . $rows['AsistenciaFecha']. "</td>
                                    <td>" . $hora . "</td>
                                    <td>
                                      <a class='btn btn-sm btn-danger' href= 'conexiones/eliminarAsist.php?codigo=" . $rows['AsistenciaCodigo'] . "'>
                                        <span class='tf-icons bx bx-trash'></span>
                                      </a>
                                    </td>
                                    <td>" . $sal . "</td>
                                  </tr>";  
                            };  
                          ?>
                        </tbody> 
                      </table>
                    </div>
                  </div>
                </div>  

                <?php
                  date_default_timezone_set("America/Caracas");
                  $servername = "localhost";
                  $dbname = "sistema-asistencias";
                  $username = "root";
                  $password = "";

                  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  $codigo = $_GET['codigo'];

                  if (isset($codigo)) {
                    $salida = date("Y-m-d h:i:s");
                    $sql = $conn->prepare("UPDATE asistencias SET AsistenciaSalida = '$salida' WHERE AsistenciaCodigo = '$codigo'");

                    if ($sql->execute()) {
                      echo '<script> window.location = "http://localhost/attendance-tracker/attendances"; </script>';
                    } else {
                      echo '<div class="alert alert-danger alert-dismissible" role="alert">
                              There was a problem, try again later.
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                    }
                  }
                ?>
              </div>  
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include "./modulos/scripts.php"; ?>
    <script src="<?php echo media; ?>assets/vendor/js/principal.js"></script>
    <script src="<?php echo media; ?>assets/datatables/asist.js"></script>

  </body>
</html>
