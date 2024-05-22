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

  $page = "employees";
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

    <title>Employees | <?php echo NOMBRE;?></title>
    <meta name="description" content="" />
    <?php include "./modulos/links.php"; ?>

  </head>

  <body>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        <?php include "./modulos/menu.php"?>

        <div class="layout-page">
          <div class="content-wrapper">
            <div class="container-fluid flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Information / </span> Employees</h4>
              
              <div class="demo-inline-spacing">
                <button type="button" style="margin: 0% 1% 1% 1%;" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#PerAdd" aria-expanded="false" aria-controls="collapseAdminAdd">
                  <span class="tf-icons bx bx-user-plus"></span>   Add Employee
                </button>
                <a class="btn btn-md btn-info" href="conexiones/PersonalList.php" target="_blank"><i class='bx bxs-file-pdf'></i>   Generate Employees Record</a>
              </div>

              <div class="card mt-4">
                <div class="collapse" id="PerAdd">
                  <div class="card ">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h4 class="mb-0">Employee Information</h4>
                    </div>
                    <div class="card-body form-resto">
                      <form action="<?php echo SERVERURL; ?>conexiones/personalReg.php" autocomplete="off" id="perForm" enctype="multipart/form-data" method="POST" data-form="save" class="FormularioAjax">
                      
                      <div class="row mb-3">
                        <label for="nombrePerAdd" class="form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="name" autocapitalize="words" onkeypress="return letras(event)" id="nombrePerAdd" class="form-control" placeholder="Enter Name" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="apellidoPerAdd" class="form-label">Lastname</label>
                        <div class="col-sm-10">
                          <input type="text" name="apellido" autocapitalize="words" onkeypress="return letras(event)" id="apellidoPerAdd" class="form-control" placeholder="Enter Lastname" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="cedulaPerAdd" class="form-label">Position</label>
                        <div class="col-sm-10">
                          <input type="text" name="cargo" onkeypress="return letras(event)" class="form-control" placeholder="Enter Position" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <div class="row-md">
                          <label for="genero" class="form-label">Gender</label>
                          <div class="form-check mt-0">
                            <input name="genero" class="form-check-input" type="radio" value="Female" id="femeninoPerAdd" checked="">
                            <label class="form-check-label" for="femenino"> Female </label>
                          </div>
                          <div class="form-check">
                            <input name="genero" class="form-check-input" type="radio" value="Male" id="masculinoPerAdd">
                            <label class="form-check-label" for="masculino"> Male </label>
                          </div>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="telefonoPerAdd" class="form-label">Phone</label>
                        <div class="col-sm-10">
                          <input type="text" onkeypress="return numeros(event)" name="telefono" id="telefonoPerAdd" class="form-control" placeholder="Enter Phone" />
                        </div>
                        <div class="mt-2">
                          <div class="form-check">
                            <input class="form-check-input" value="Doesn't have phone" name="noTel" value="" type="checkbox" id="noTelf" />
                            <label class="form-check-label" for="noTelf"> Doesn't have phone </label>
                          </div>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="correoPerAdd" class="form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" name="correo" id="correoPerAdd" class="form-control" placeholder="Enter Email" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="direccionPerAdd" class="form-label">Address</label>
                        <div class="col-sm-10">
                          <input type="text" name="direccion" autocapitalize="on" id="direccionPerAdd" class="form-control" placeholder="Enter Address" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="fechanacPerAdd" class="form-label">Date of Birth</label>
                        <div class="col-sm-10">
                          <input class="form-control" name="fechaNac" type="date" value="" id="html5-date-input">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="lugarnacPerAdd" class="form-label">Place of Birth</label>
                        <div class="col-sm-10">
                          <input type="text" name="lugarNac" onkeypress="return letras(event)" autocapitalize="words" id="correoAdminAdd" class="form-control" placeholder="Enter Place of Birth" />
                        </div>
                      </div>

                      <br>
                      <div class="d-grid gap-2 col-lg-6 mx-auto">
                        <button class="btn btn-primary" id="btn" type="submit">Add Employee</button>
                      </div>
                      <div id="respuesta" style="margin-top: 3%;" class="RespuestaAjax"></div>
                    </form>
                  </div>
                  </div>
                </div>
              </div>

              <div class="card mt-4">
                <div class="card" style="padding: 0px 2%;">
                  <h5 class="card-header">Employees List</h5>
                  <div class="table-responsive text-nowrap" style="overflow: hidden;">
                    <table class="table table-hover" style="margin-bottom: 2%;" id="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Lastname</th>
                          <th>Position</th>
                          <th>Status</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody class="table-border-bottom-0">
                        <?php
                          $servername = "localhost";
                          $dbname = "sistema-asistencias";
                          $username = "root";
                          $password = "";
                          $num = 1;

                          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                          $sql = "SELECT * FROM personal";
                          $result = $conn->query($sql);

                          while ($rows = $result->fetch()) {
                            echo"<tr>
                                  <td> <strong>" . $num++ . "</strong></td>
                                  <td>" . $rows['PersonalNombre'] . "</td>
                                  <td>" . $rows['PersonalApellido'] . "</td>
                                  <td>" . $rows['PersonalCargo'] . "</td>
                                  <td>" . $rows['PersonalEstado'] . "</td>
                                  <td class='mt-0'>
                                    <a class='btn btn-sm btn-info' href='editar?codigo=" . $rows['PersonalCodigo'] . "'>
                                      <span class='tf-icons bx bx-edit'></span>
                                    </a>
                                    
                                    <a class='btn btn-sm btn-danger' href='deletePersonal?codigo=" . $rows['PersonalCodigo'] . "'>
                                      <span class='tf-icons bx bx-trash'></span>
                                    </a>

                                  </td>
                                </tr>";
                          };  
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>  

            </div>
          </div>
        </div>
      </div>

      
    </div>

    <?php include "./modulos/scripts.php"; ?>
    <script src="<?php echo media; ?>assets/vendor/js/principal.js"></script>
    <script src="<?php echo media; ?>assets/datatables/config.js"></script>
    <script>
      function letras(e) {
        tecla = (document.all) ? e.keyCode : e.which;

        if (tecla == 8) {
          return true;
        }

        if (tecla == 32) {
          return true;
        }

        patron = /[A-Za-z]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);
      }

      function numeros(e) {
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==8){
          return true;
        }

        if (tecla == 32) {
          return true;
        }

        patron =/[0-9]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);
      }
    </script>
    
  </body>
</html>