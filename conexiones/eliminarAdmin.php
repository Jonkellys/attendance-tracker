<?php
    require_once "./funciones.php";

  try {
    $servername = "localhost";
    $dbname = "sistema-asistencias";
    $username = "root";
    $password = "";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $codigo = strClean($_POST["codigo"]);
    // $codigo = $_GET['codigo'];

    $consulta = ejecutar_consulta_simple("SELECT * FROM admins");

    if($consulta->rowCount() == 1) {
      echo "<script>new swal('Error', 'You need at least 1 Admin', 'error');</script>";
      exit();
    } else {

      $sql = "DELETE FROM admins WHERE CuentaCodigo = '$codigo'";
      $stmt = "DELETE FROM cuentas WHERE CuentaCodigo = '$codigo'";

      $conn->query($sql);
      $conn->query($stmt);
      
      echo "<script>new swal('Success', 'Admin deleted successfully', 'success');</script>";
      echo '<script> window.location.href = "http://localhost/attendance-tracker/admins"; </script>';
    }
  } 
  catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
  $conn = null;
?>

