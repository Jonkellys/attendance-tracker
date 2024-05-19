<!DOCTYPE html>

<html
  lang="en"
  class="light-style customizer-hide"
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

    <title>Recover Password | <?php echo NOMBRE;?></title>
    <meta name="description" content="" />
    <?php include "./modulos/links.php"; ?>

  </head>

  <body>

  <?php
    $token = $_GET['token'];

    if(!$token) {
      echo '<script> window.location = "http://localhost/attendance-tracker/login" </script>';
    }
  ?>

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
          
          <div class="card">
            <div class="card-body">
              <?php include "./modulos/logo.php"; ?>

              <h4 class="mt-3" style="margin-bottom: 3%;">Recover Password</h4>

              <form action="<?php echo SERVERURL; ?>conexiones/newPass.php" enctype="multipart/form-data" method="POST" data-form="save" class="FormularioAjax">
                <input type="hidden" name="token" value="<?php echo $token; ?>">
                <div class="mb-3">
                  <label for="pass" class="form-label">New Password</label>
                  <input
                    type="password"
                    class="form-control"
                    name="pass"
                    placeholder="Enter your new password"
                    autofocus
                  />
                </div>

                <div class="mb-3">
                  <label for="newpass" class="form-label">Confirm Password</label>
                  <input
                    type="password"
                    class="form-control"
                    name="newpass"
                    placeholder="Confirm your password"
                    autofocus
                  />
                </div>
                <button type="submit" class="btn btn-primary d-grid w-100">Send</button>
                <div id="respuesta" style="margin-top: 3%;" class="RespuestaAjax"></div>
              </form>
              
            </div>
          </div>
          
        </div>
      </div>
    </div>

    <?php include "./modulos/scripts.php"; ?>
    <script src="<?php echo media; ?>assets/vendor/js/principal.js"></script>

  </body>
</html>
