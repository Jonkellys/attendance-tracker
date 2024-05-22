<?php
    require_once "./funciones.php";

    $servername = "localhost";
    $dbname = "sistema-asistencias";
    $username = "root";
    $password = "";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $codigo = strClean($_POST["codigo"]);

    $sql = "DELETE FROM Usuarios WHERE CuentaCodigo = '$codigo'";
    $stmt = "DELETE FROM cuentas WHERE CuentaCodigo = '$codigo'";

    $conn->query($sql);
    $conn->query($stmt);

    echo "<script>new swal('Success', 'User deleted successfully', 'success');</script>";
    echo '<script> window.location.href = "http://localhost/attendance-tracker/users"; </script>';
      

?>

