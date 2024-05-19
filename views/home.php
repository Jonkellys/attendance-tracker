<!DOCTYPE html>
<html
  lang="en"
  class="light-style"
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

    <title><?php echo NOMBRE;?></title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <?php include "./modulos/links.php"; ?>

  </head>

  <style>
    .h-25r {
      height: 25rem !important;
    }
  </style>

  <body>
    <div class="container-xxl container-p-y">

      <div class="col-8 misc-wrapper card mx-auto p-3">
        
        <?php include "./modulos/logo.php"; ?>
      
        <div class="my-2">
          <img
            src="<?php echo media; ?>assets/img/illustrations/girl-doing-yoga-light.png"
            alt="girl-doing-yoga-light"
            class="h-25r w-100 my-auto"
          />
        </div>

        <div class="pt-3 w-100 h-auto">
          <a href="login">
            <button class="btn btn-primary btn-lg" type="button">
              <i class="menu-icon tf-icons bx bx-log-in"></i>
              Log in
            </button>
          </a>
        </div>
      </div>

    </div>

    <?php include "./modulos/scripts.php"; ?>

  </body>
</html>
