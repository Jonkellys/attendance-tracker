<?php
  require_once "./funciones.php";
    
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $email = strClean($_POST['email']);

  if($email == "") {
    echo '<div class="alert alert-danger alert-dismissible" role="alert">
            You must complete the field.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    exit(); 
  } else {
    $consulta = ejecutar_consulta_simple("SELECT CuentaEmail FROM cuentas WHERE CuentaEmail = '$email'");
    if($consulta->rowCount() != 1) {
      echo '<div class="alert alert-danger alert-dismissible" role="alert">
              The entered email is not registered in the system.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
      exit();
    }
  }

  $stmt = "SELECT * FROM cuentas WHERE CuentaEmail = '$email'";
  $result = $conn->query($stmt);

  while ($rows = $result->fetch()) {
    $codigo = $rows['CuentaCodigo'];
    $tipo = $rows['CuentaTipo'];
  }; 

  $token = bin2hex(random_bytes(50));

  $sql = $conn->prepare("INSERT INTO contrasenas(contrasenaEmail, contrasenaToken, CuentaCodigo, CuentaTipo) VALUES ('$email', '$token', '$codigo', '$tipo')");

  if($sql->execute()){
    echo '<div class="alert alert-success alert-dismissible" role="alert">
            Wait a moment...
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    echo '<script> window.location.href = "http://localhost/attendance-tracker/newPass?token=' . $token .'"; </script>';
  } else {
    echo '<div class="alert alert-danger alert-dismissible" role="alert">
            There was a problem, try again later.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
  }
        
?>