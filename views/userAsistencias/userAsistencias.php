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
    header('Location: http://localhost/sistema-asistencias/login');
  }
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

    <title>Asistencias | <?php echo NOMBRE;?></title>

    <meta name="description" content="" />

    <?php include "./modulos/links.php"; ?>

  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo" style="padding: 4%;">
            <a href="javascript:void(0);" class="app-brand-link">
            <span style="width: 18%; height: 25%;" class="app-brand-logo demo">
              <img style="width: 100%; height: 100%;" src="<?php echo media; ?>assets/img/logo1.png" alt="">
            </span>
            <h5 class="demo menu-text fw-bolder ms-2" style="width: fit-content; margin-top: 8%;"><?php echo NOMBRE; ?></h5>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item">
        <a href="userHome" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Inicio</div>
        </a>
      </li>

      <!-- Layouts -->
      
      <li class="menu-header small text-uppercase">
          <span class="menu-header-text">Información</span>
      </li>
      <li class="menu-item">
        <a href="userPersonal" class="menu-link">
          <i class="menu-icon tf-icons bx bx-group"></i>
          <div data-i18n="Personal">Personal</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="userAsistencias" class="menu-link">
          <i class="menu-icon tf-icons bx bx-calendar"></i>
          <div data-i18n="Registros">Asistencias</div>
        </a>
      </li>

      <?php include "./modulos/logout.php"; ?>
    </ul>  
  </aside>

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Layout Demo -->
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Información / Asistencias /</span> Asistencias</h4>
              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link active" href="javascript:void(0);"> Asistencias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="userRegistros"> Registros</a>
                      </li>
                  </ul>
                </div>
              </div>

              <div class="demo-inline-spacing">
                  <button type="button" style="margin: 0% 1% 1% 1%;" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#PerAdd" aria-expanded="false" aria-controls="collapseAdminAdd">
                    <span class="tf-icons bx bx-user-plus"></span>   Agregar Asistencia
                  </button>
              </div>

              <div class="card mb-4 mt-4">
                <div class="collapse" id="PerAdd">
                  <div class="card ">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h4 class="mb-0">Introducir datos</h4>
                    </div>
                    <div class="card-body form-resto">
                      <form action="<?php echo SERVERURL; ?>conexiones/asistReg.php" id="perForm" enctype="multipart/form-data" method="POST" data-form="save" class="FormularioAjax">
                      <div class="mb-3">
                        <div class="mt-2">
                          <label for="personlSelect" class="form-label">Personal:</label>
                          <input type="hidden" name="tipo" value="<?php echo $_SESSION['tipo']; ?>">
                          <select class="form-select" name="personal" id="personlSelect" aria-label="Default select example">
                            <option selected="" disabled>Seleciona al Personal</option>
                            <?php
                            $servername = "localhost";
                            $dbname = "sistema-asistencias";
                            $username = "root";
                            $password = "";
                            $num = 1;

                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $sql = "SELECT * FROM personal WHERE PersonalEstado = 'Activo'";
                            $result = $conn->query($sql);
                            
                            while ($rows = $result->fetch()) {
                              echo'<option value="' . $rows['PersonalCodigo'] . '">' . $rows['PersonalNombre'] . '  ' . $rows['PersonalApellido'] . '</option>';
                            };  
                          ?>
                          </select>
                        </div>
                      </div>
                      <div class="d-grid gap-2 col-lg-6 mx-auto">
                        <button class="btn btn-primary" id="btn" type="submit">Añadir Asistencia</button>
                      </div>
                      <div id="respuesta" style="margin-top: 3%;" class="RespuestaAjax"></div>
                    </form>
                  </div>
                  </div>
                </div>
              </div>

              <div class="card mb-4 mt-4">
                <div class="card" style="padding: 0px 2%;">
                  <h5 class="card-header">Lista de Personal</h5>
                  <div class="table-responsive text-nowrap" style="overflow: hidden;">
                    <table class="table table-hover" style="margin-bottom: 2%;" id="asist">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Personal</th>
                          <th>Llegada</th>
                          <th>Salida</th>
                          <th>Añadir Salida</th>
                        </tr>
                      </thead>
                      <tbody class="table-border-bottom-0">
                        <?php
                          $servername = "localhost";
                          $dbname = "sistema-asistencias";
                          $username = "root";
                          $password = "";
                          $dia = date("d");

                          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                          $sql = "SELECT * FROM asistencias WHERE DAY(AsistenciaFecha) = '$dia' ORDER BY AsistenciaFecha ASC";
                          $result = $conn->query($sql);

                            if($rows['AsistenciaSalida'] == "0000-00-00 00:00:00") {
                              $hora = "No hay registro de salida";
                              $sal =  "<a href='asistencias?codigo=" . $rows['AsistenciaCodigo'] . "' class='btn btn-sm btn-info' data-bs-toggle='tooltip' data-bs-offset='0,4' data-bs-placement='top' data-bs-html='true' title='' data-bs-original-title='<span>Añadir Salida</span>'>
                                          <span class='tf-icons bx bx-log-out'></span>
                                        </a>";
                            } else {
                              $hora = $rows['AsistenciaSalida'];
                              $sal = "";
                            }

                          while ($rows = $result->fetch()) {
                            echo"<tr>
                                  <td> <strong>" . $num++ . "</strong></td>
                                  <td>" . $rows['AsistenciaNombre'] . "</td>
                                  <td>" . $rows['AsistenciaFecha'] . "</td>
                                  <td>" . $hora . "</td>
                                  <td>" . $sal . "</td>
                                  </tr>";
                          };  
                        ?>
                      </tbody>                      
                    </table>
                  </div>
                </div>
              </div>  

              <!--/ Layout Demo -->
            </div>
            <!-- / Content -->


            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <?php include "./modulos/scripts.php"; ?>

    <script src="<?php echo media; ?>assets/vendor/js/principal.js"></script>
    <script src="<?php echo media; ?>assets/datatables/asist.js"></script>
  </body>
</html>
