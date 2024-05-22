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

    $sql = "DELETE FROM personal WHERE PersonalCodigo = '$codigo'";

    $conn->query($sql);

    echo "<script>new swal('Success', 'Employee deleted successfully', 'success');</script>";
    echo '<script> window.location.href = "http://localhost/attendance-tracker/personal"; </script>';
  } 
  catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
  $conn = null;
?>

