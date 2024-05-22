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

    <title>Update | <?php echo NOMBRE;?></title>
    <meta name="description" content="" />
    <?php include "./modulos/links.php"; ?>
  </head>

  <body>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
  
      <?php include "./modulos/menu.php"?>
      
        <div class="layout-page">
          <div class="content-wrapper" id="place">
            <?php
              $servername = "localhost";
              $dbname = "sistema-asistencias";
              $username = "root";
              $password = "";
                          
              $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        
              $codigo = $_GET['codigo'];
                          
              $sql = $conn->prepare("SELECT * FROM personal WHERE PersonalCodigo = '$codigo'");
              $sql->execute();
              $data = $sql->fetch(PDO::FETCH_OBJ);
            ?>

            <div class="">
              <div class="container-fluid flex-grow-1 container-p-y">
                <h4 class="fw-bold mt-4">Update information of "<?php echo $data->PersonalNombre; ?> <?php echo $data->PersonalApellido; ?>"</h4>
                <div class="row g-0 card" style="flex-direction: row;">
                  <div class="col-md-4">
                    <img class="card-img card-img-left" src="<?php echo media; ?>assets/img/edit.svg">
                    <div class="d-grid gap-2 col-lg-6 mx-auto">
                      <a href="employees" class="btn btn-outline-secondary">Return</a>
                    </div>
                  </div>

                  <div class="col-md-8">
                    <div class="card-body">
                      <div class="nav-align-top mb-4">
                        <ul class="nav nav-tabs" role="tablist">
                          <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#verDatosPerfil" aria-controls="verDatosPerfil" aria-selected="true">
                              <i class="menu-icon tf-icons bx bx-show"></i>
                              Information
                            </button>
                          </li>
                          <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#editarDatosPerfil" aria-controls="editarDatosPerfil" aria-selected="false">
                              <i class="menu-icon tf-icons bx bx-edit"></i>  
                              Update
                            </button>
                          </li>
                        </ul>

                        <div class="tab-content">
                          <div class="tab-pane fade show active" id="verDatosPerfil" role="tabpanel">
                            <div class="col-lg-6">                    
                              <div class="mb-4">
                                <div class="mt-1">
                                  <div class="list-group list-group-flush" style="width: max-content;">
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action"><strong style="margin-right: 10px;">Name: </strong><?php echo $data->PersonalNombre; ?></a>
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action"><strong style="margin-right: 10px;">Lastname: </strong><?php echo $data->PersonalApellido; ?></a>
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action"><strong style="margin-right: 10px;">Gender: </strong><?php echo $data->PersonalGenero; ?></a>
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action"><strong style="margin-right: 10px;">Phone: </strong><?php echo $data->PersonalTelefono; ?></a>
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action"><strong style="margin-right: 10px;">Email: </strong><?php echo $data->PersonalCorreo; ?></a>
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action"><strong style="margin-right: 10px;">Address: </strong><?php echo $data->PersonalDireccion; ?></a>
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action"><strong style="margin-right: 10px;">Place of Birth: </strong><?php echo $data->PersonalLugarNac; ?></a>
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action"><strong style="margin-right: 10px;">Date of Birth: </strong><?php echo $data->PersonalFechaNac; ?></a>
                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action"><strong style="margin-right: 10px;">Status: </strong><?php echo $data->PersonalEstado; ?></a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="tab-pane fade" id="editarDatosPerfil" role="tabpanel">
                            <h4>Update Information</h4>
                            <form action="<?php echo SERVERURL; ?>conexiones/updatePersonal.php" enctype="multipart/form-data" method="POST" data-form="update" class="FormularioAjax">
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="nombreper" class="form-label">Name:</label>
                                  <input type="text" name="nombre" class="form-control" autocapitalize="on" value="<?php echo $data->PersonalNombre; ?>" placeholder="Cambiar Nombre"/>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="apellidoper" class="form-label">Lastname:</label>
                                  <input type="text" name="apellido" class="form-control" autocapitalize="on" value="<?php echo $data->PersonalApellido; ?>" placeholder="Cambiar Apellido"/>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="generoper" class="form-label">Gender:</label>
                                  <div class="form-check mt-0">
                                    <input name="genero" class="form-check-input" type="radio" value="Female" id="femeninoPerAdd" checked="">
                                    <label class="form-check-label" for="femenino"> Female </label>
                                  </div>
                                  <div class="form-check">
                                    <input name="genero" class="form-check-input" type="radio"  value="Male" id="masculinoPerAdd">
                                    <label class="form-check-label" for="masculino"> Male </label>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="telefonoper" class="form-label">Phone:</label>
                                  <input type="text" name="telefono" class="form-control" autocapitalize="on"  value="<?php echo $data->PersonalTelefono; ?>" placeholder="Cambiar Teléfono"/>
                                </div>
                                <div class="mb-1">
                                  <div class="form-check">
                                    <input class="form-check-input" value="Doesn't have phone" name="noTel"  value="" type="checkbox" id="noTelf" />
                                    <label class="form-check-label" for="noTelf"> Doesn't have phone </label>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="correoper" class="form-label">Email:</label>
                                  <input type="email" name="correo" class="form-control" value="<?php echo $data->PersonalCorreo; ?>" placeholder="Cambiar Correo"/>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="direccionper" class="form-label">Address:</label>
                                    <input type="text" name="direccion" class="form-control" autocapitalize="on" value="<?php echo $data->PersonalDireccion; ?>" placeholder="Cambiar Dirección"/>
                                  </div>
                                </div>
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="lugarper" class="form-label">Place of Birth:</label>
                                  <input type="text" name="lugarNac" class="form-control" autocapitalize="on" value="<?php echo $data->PersonalLugarNac; ?>" placeholder="Ingresar Lugar of Birth" />
                                </div>
                              </div>
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="fechaper" class="form-label">Date of Birth:</label>
                                  <input class="form-control" name="fechaNac" type="date"  value="<?php echo $data->PersonalFechaNac; ?>" id="html5-date-input">
                                </div>
                              </div>
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="estadoper" class="form-label">Status:</label>
                                  <select class="form-select" name="estado" id="estadoper">
                                    <option value="<?php echo $data->PersonalEstado; ?>" selected id="activo"><?php echo $data->PersonalEstado; ?></option>
                                    <?php
                                      if($data->PersonalEstado == "Active") {
                                        echo '
                                          <option value="Medical Permit" id="medico">Medical Permit</option>
                                        ';
                                      } else {
                                        echo '
                                          <option value="Active" id="activo" >Active</option>
                                        ';
                                      }
                                    ?>
                                  </select>
                                </div>
                              </div>
                                    
                              <div class="d-grid gap-2 col-lg-6 mx-auto">
                                <input type="hidden" name="codigo" value="<?php echo $data->PersonalCodigo; ?>">
                                  <button type="submit" class="btn btn-primary">Update</button>
                              </div>
                              <div id="respuesta" style="margin-top: 3%;" class="RespuestaAjax"></div>
                            </form>
                          </div>                    
                        </div>
                      </div>

                    </div>
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

  </body>
</html>
