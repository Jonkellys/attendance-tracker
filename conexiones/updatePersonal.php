<?php
    require_once "./funciones.php";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = $conn->prepare("UPDATE personal SET PersonalNombre = :nombre, PersonalApellido = :apellido, PersonalFechaNac = DATE_FORMAT(:fecha, '%Y-%m-%d'), PersonalLugarNac = :lugar, PersonalGenero = :genero, PersonalDireccion = :direccion, PersonalTelefono = :telefono, PersonalCorreo = :correo, PersonalEstado = :estado WHERE PersonalCodigo = :codigo");
    $sql->bindParam(":nombre", $nombre);
    $sql->bindParam(":apellido", $apellido);
    $sql->bindParam(":fecha", $fechaNac);
    $sql->bindParam(":lugar", $lugarNac);
    $sql->bindParam(":genero", $genero);
    $sql->bindParam(":direccion", $direccion);
    $sql->bindParam(":telefono", $telefono);
    $sql->bindParam(":correo", $correo);
    $sql->bindParam(":estado", $estado);
    $sql->bindParam(":codigo", $codigo);

    $nombre = strClean($_POST['nombre']);
    $apellido = strClean($_POST['apellido']);
    $genero = strClean($_POST['genero']);
    $telefono = strClean($_POST['telefono']);
    $correo = strClean($_POST['correo']);
    $direccion = strClean($_POST['direccion']);
    $lugarNac = strClean($_POST["lugarNac"]);
    $fechaNac = strClean($_POST["fechaNac"]);
    $estado = strClean($_POST["estado"]);
    $codigo = strClean($_POST["codigo"]);

    $noT = strClean($_POST["noTel"]);
    
    if($telefono == "") {
        $telefono = $noT;
    }

    if($sql->execute()){
        echo '<div class="alert alert-success alert-dismissible" role="alert">
                Information updated correctly.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        echo '<script> window.location.href = "http://localhost/attendance-tracker/employees"; </script>';
    } else{
        echo '<div class="alert alert-danger alert-dismissible" role="alert">
                There was a problem, try again later.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }

?>
