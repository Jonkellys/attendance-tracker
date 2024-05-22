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

    <title>Delete Admin | <?php echo NOMBRE;?></title>

    <meta name="description" content="" />

    <?php include "./modulos/links.php"; ?>


  </head>

  <body>
    <?php              
      $servername = "localhost";
      $dbname = "sistema-asistencias";
      $username = "root";
      $password = "";
                          
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $codigo = $_GET['codigo'];
                          
      $sql = $conn->prepare("SELECT * FROM admins WHERE CuentaCodigo = '$codigo'");
      $sql->execute();
      $data = $sql->fetch(PDO::FETCH_OBJ);

      $sql = $conn->prepare("SELECT * FROM cuentas WHERE CuentaCodigo = '$codigo'");
      $sql->execute();
      $data1 = $sql->fetch(PDO::FETCH_OBJ);
    ?>

    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
  
        <?php include "./modulos/menu.php"?>

        <div class="layout-page">
          <div class="content-wrapper" id="place">
            <div class="pt-5">

              <div class="card mx-auto mt-5 col-8">
                <div class="card" style="padding: 0px 2%;">
                  <h5 class="card-header pb-0">Information to delete</h5>
                  <div class="container-fluid flex-grow-1 container-p-y">
                    <div class="list-group list-group-flush">
                      <a href="javascript:void(0);" class="list-group-item list-group-item-action"><strong style="margin-right: 10px;">Name: </strong><?php echo $data1->CuentaNombre; ?></a>
                      <a href="javascript:void(0);" class="list-group-item list-group-item-action"><strong style="margin-right: 10px;">Lastname: </strong><?php echo $data1->CuentaApellido; ?></a>
                      <a href="javascript:void(0);" class="list-group-item list-group-item-action"><strong style="margin-right: 10px;">Username: </strong><?php echo $data->AdminUsuario; ?></a>
                      <a href="javascript:void(0);" class="list-group-item list-group-item-action"><strong style="margin-right: 10px;">Email: </strong><?php echo $data->AdminEmail; ?></a>
                      <a href="javascript:void(0);" class="list-group-item list-group-item-action"><strong style="margin-right: 10px;">Gender: </strong><?php echo $data1->CuentaGenero; ?></a>
                    </div>
                    
                    <form action='<?php echo SERVERURL; ?>conexiones/eliminarAdmin.php' enctype='multipart/form-data' method='POST' data-form='delete' class='FormularioAjax d-flex flex-row justify-content-center'>
                      <input value='<?php echo $data->CuentaCodigo; ?>' name='codigo' type='hidden' />
                      <button class='btn btn-danger mt-3' type='submit'><span class='tf-icons bx bx-trash'></span> Delete</button>
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

    <?php include "./modulos/scripts.php"; ?>
    <script src="<?php echo media; ?>assets/vendor/js/principal.js"></script>

  </body>
</html>
