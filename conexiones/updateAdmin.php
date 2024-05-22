<?php
    require_once "./funciones.php";

        try {

            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $nombre = strClean($_POST['nombre']);
            $apellido = strClean($_POST['apellido']);
            $genero = strClean($_POST['genero']);
            $codigo = strClean($_POST["codigo"]);

            $usuario = strClean($_POST['usuario']);
            $correo = strClean($_POST['correo']);
            
            $sql = $conn->prepare("UPDATE admins SET AdminUsuario = '$usuario', AdminEmail = '$correo'  WHERE CuentaCodigo = '$codigo'");

            if($sql->execute()){
                echo "<script>new swal('Success', 'Admin updated successfully', 'success');</script>";
                echo '<script> $("#updateCard").load(location.href + " #updateCard"); </script>';
                $updateAdmin = updateCuenta($nombre, $apellido, $usuario, $correo, $genero, $codigo);
            }
        } 
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;

?>
