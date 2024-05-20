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

  $page = "attendances";
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

    <title>Records | <?php echo NOMBRE;?></title>

    <meta name="description" content="" />

    <?php include "./modulos/links.php"; ?>

  </head>

  <body>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        <?php include "./modulos/userMenu.php"?>

        <div class="layout-page">
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Information / Attendances /</span> Records</h4>
              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link" href="userAsistencias"> Attendances</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="javascript:void(0);"> Records</a>
                      </li>
                  </ul>
                </div>
              </div>

              <div class="card align-center col-lg-11 mt-4">
                <div class="card-body">
                  <h5 class="card-title">Create a Record</h5>
                  <form action="<?php echo SERVERURL; ?>conexiones/reporteMes.php" enctype="multipart/form-data" method="POST">
                    <div class="mt-2">
                      <label class="form-label" for="basic-default-fullname">Since:</label>
                      <input class="form-control" required name="inicio" type="date" id="desde">
                    </div>
                    <div class="mt-2">
                      <label class="form-label" for="basic-default-company">Until:</label>
                      <input class="form-control" required name="fin" type="date" id="hasta">
                    </div>
                    <div class="mt-2">
                      <label class="form-label" for="basic-default-company">Employee:</label>
                      <select class="form-select" required name="persona" >
                        <option selected="" value="Todos">All Employees</option>
                          <?php
                            $servername = "localhost";
                            $dbname = "sistema-asistencias";
                            $username = "root";
                            $password = "";

                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $sql = "SELECT * FROM personal";
                            $result = $conn->query($sql);
                                  
                            while ($rows = $result->fetch()) {
                              echo'<option value="' . $rows['PersonalCodigo'] . '">' . $rows['PersonalNombre'] . '  ' . $rows['PersonalApellido'] . '</option>';
                            };  
                          ?>
                      </select>
                    </div>
                    <div class="card-footer d-grid gap-6 col-lg-4 mx-auto">
                      <button class="btn btn-md rounded-pill btn-danger" type="submit"><i class='bx bxs-file-pdf'></i> Generate PDF</button>
                    </div>  
                  </form>
                </div>
              </div>
            
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- / Layout wrapper -

    <?php include "./modulos/scripts.php"; ?>
  </body>
</html>
