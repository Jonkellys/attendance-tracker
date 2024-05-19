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

    <title>Reset Password | <?php echo NOMBRE;?></title>
    <meta name="description" content="" />
    <?php include "./modulos/links.php"; ?>

  </head>

  <body>
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
          
          <div class="card">
            <div class="card-body">

              <?php include "./modulos/logo.php"; ?>
              
              <h4 class="mb-2 mt-2">Forgot your password? 🔒</h4>
              <p class="mb-4">Enter your Email to continue.</p>

              <form action="<?php echo SERVERURL; ?>conexiones/recovery.php" enctype="multipart/form-data" method="POST" data-form="recovery" class="FormularioAjax">
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Enter your email"
                    autofocus
                    autocomplete="off"
                  />
                </div>
                <button type="submit" class="btn btn-primary d-grid w-100">Send</button>
                <div id="respuesta" style="margin-top: 3%;" class="RespuestaAjax"></div>
              </form>

              <div class="text-center">
                <a href="login" class="d-flex align-items-center justify-content-center">
                  <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                  Back to Login
                </a>
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
