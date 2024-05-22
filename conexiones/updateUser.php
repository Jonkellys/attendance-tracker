<?php
    require_once "./funciones.php";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $usuario = strClean($_POST['usuario']);
    $correo = strClean($_POST['correo']);

    $nombre = strClean($_POST['nombre']);
    $apellido = strClean($_POST['apellido']);
    $usuario = strClean($_POST['usuario']);
    $email = strClean($_POST['correo']);
    $genero = strClean($_POST['genero']);
    $codigo = strClean($_POST["codigo"]);

    $sql = $conn->prepare("UPDATE Usuarios SET UserName = '$usuario', UserEmail = '$correo' WHERE CuentaCodigo = '$codigo'");

    $updateUser = updateCuenta($nombre, $apellido, $usuario, $correo, $genero, $codigo);

    if($sql->execute()){
        echo "<script>new swal('Success', 'User updated successfully', 'success');</script>";
        echo '<script> $("#updateCard").load(location.href + " #updateCard"); </script>';
        $updateAdmin = updateCuenta($nombre, $apellido, $usuario, $correo, $genero, $codigo);
    }

?>
