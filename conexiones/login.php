<?php

    require_once "./funciones.php";
    date_default_timezone_set("America/Caracas");

    if ($_SERVER["REQUEST_METHOD"] == "POST"){  
      $usuarioLogin = strClean($_POST['usuario']);
      $passwordLogin = strClean($_POST['password']);
      $passwordHash = password_hash($passwordLogin, PASSWORD_DEFAULT);
      $claveLogin = password_verify($passwordLogin, $passwordHash);

      if($usuarioLogin == "" || $passwordLogin == "") {
        echo '<div class="alert alert-danger alert-dismissible" role="alert">
                You must complete all fields.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        exit(); 
      }

      $iniciar = iniciarSesion($usuarioLogin);

      if($iniciar->rowCount()==1) {
        $row = $iniciar->fetch(PDO::FETCH_ASSOC);
        
        if($row['CuentaUsuario'] == $usuarioLogin && password_verify($passwordLogin, $row['CuentaClave'])) {

          echo '<div class="alert alert-success alert-dismissible" role="alert">
                  Loging in...
                </div>';

          session_start(['name' => 'Sistema']);

          $_SESSION['id'] = $row['id'];
          $_SESSION['nombre'] = $row['CuentaNombre'];
          $_SESSION['apellido'] = $row['CuentaApellido'];
          $_SESSION['usuario'] = $row['CuentaUsuario'];
          $_SESSION['email'] = $row['CuentaEmail'];
          $_SESSION['clave'] = $row['CuentaClave'];
          $_SESSION['tipo'] = $row['CuentaTipo'];
          $_SESSION['genero'] = $row['CuentaGenero'];
          $_SESSION['codigo'] = $row['CuentaCodigo'];
          $_SESSION['token'] = md5(uniqid(mt_rand(), true));
          $_SESSION["acceso"]= date("Y-n-j h:i:s"); 

          if($row['CuentaTipo'] == "Admin") {
            $url = "http://localhost/attendance-tracker/dashboard";
          } else {
            $url = "http://localhost/attendance-tracker/userHome";
          }

          echo '<script> window.location = "' . $url . '" </script>';
        
        } else {
            echo '<div class="alert alert-danger alert-dismissible" role="alert">
                ¡Error!     The password is wrong.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
          }
        
      } else {
        echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                ¡Error!     The username doesn't exists.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
      }
      
    }
    
?>