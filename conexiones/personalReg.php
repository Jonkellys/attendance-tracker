<?php

    require_once "./funciones.php";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $set = $conn->prepare("SET @@SQL_MODE = REPLACE(@@SQL_MODE, 'NO_ZERO_DATE', '');");
            $set->execute();

            $stmt = $conn->prepare("INSERT INTO personal(PersonalNombre, PersonalApellido, PersonalCargo, PersonalFechaNac, PersonalLugarNac, PersonalGenero, PersonalDireccion, PersonalTelefono, PersonalCorreo, PersonalCodigo, PersonalEstado, PersonalUltimaEntrada) 
            VALUES(:nombre, :apellido, :cargo, DATE_FORMAT(:fechaNac, '%Y-%m-%d'), :lugarNac, :genero, :direccion, :telefono, :correo, :codigo, :estado, :ultima)");

            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':cargo', $cargo);
            $stmt->bindParam(':fechaNac', $fechaNac);
            $stmt->bindParam(':lugarNac', $lugarNac);
            $stmt->bindParam(':genero', $genero);
            $stmt->bindParam(':direccion', $direccion);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':codigo', $codigo);
            $stmt->bindParam(':estado', $estado);
            $stmt->bindParam(':ultima', $ultima);
            
            $nombre = strClean($_POST["name"]);
            $apellido = strClean($_POST["apellido"]);
            $cargo = strClean($_POST["cargo"]);
            $fechaNac = strClean($_POST["fechaNac"]);
            $lugarNac = strClean($_POST["lugarNac"]);
            $genero = strClean($_POST["genero"]);
            $direccion = strClean($_POST["direccion"]);
            $telefono = strClean($_POST["telefono"]);
            $correo = strClean($_POST["correo"]);
            $ultima = $salida = date("0000-00-00 00:00:00");

            $noT = strClean($_POST["noTel"]);
            $estado = "Active";

            if($telefono == "") {
                $telefono = $noT;
            }

            if($nombre == "" || $apellido == "" || $cargo == "" || $lugarNac == "" || $direccion == "" || $correo == "") {
                echo '<div class="alert alert-danger alert-dismissible" role="alert">
                        You must complete all fields.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                exit(); 
            }

            $consulta1 = ejecutar_consulta_simple("SELECT PersonalCorreo FROM personal WHERE PersonalCorreo = '$correo'");
            if($consulta1->rowCount()>=1) {
                echo '<div class="alert alert-danger alert-dismissible" role="alert">
                        The entered email is already registered in the system.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                exit();
            }

            $consulta2= ejecutar_consulta_simple("SELECT id FROM personal");
            $numero = ($consulta2->rowCount())+1;

            $codigo = generar_codigo_aleatorio("E", 7, $numero);

            if($stmt->execute()){
                echo "<script>new swal('Success', 'Employee added successfully', 'success');</script>";
                echo '<script> window.location.href = "http://localhost/attendance-tracker/personal"; </script>';
            }
        } 
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }

?>
