<?php
    require_once "./funciones.php";
    
    date_default_timezone_set("America/Caracas");

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = $conn->prepare("INSERT INTO asistencias(AsistenciaCodigo, PersonalCodigo, AsistenciaFecha, AsistenciaSalida, AsistenciaNombre) VALUES(:codigo, :personal, :fecha, :salida, :nombre)");
            $sql->bindParam(":codigo", $codigo);
            $sql->bindParam(":personal", $personal);
            $sql->bindParam(":fecha", $fecha);
            $sql->bindParam(":salida", $salida);
            $sql->bindParam(":nombre", $nombre);

            $personal = strClean($_POST['personal']);
            $salida = date("0000-00-00 00:00:00");

            $consulta= ejecutar_consulta_simple("SELECT id FROM asistencias");
            $numero = ($consulta->rowCount())+1;
            $codigo = generar_codigo_aleatorio("A", 7, $numero);

            $fecha = date("Y-m-d h:i:s");

            $stmt = "SELECT * FROM personal WHERE PersonalCodigo = '$personal'";
            $result = $conn->query($stmt);

            while ($rows = $result->fetch()) {
                $nombre = $rows['PersonalNombre'] . ' ' . $rows['PersonalApellido'];
                $cedula = $rows['PersonalCedula'];
            };  

            $ultima = $conn->prepare("UPDATE personal SET PersonalUltimaEntrada = '$fecha' WHERE PersonalCodigo = '$personal'");
            $ultima->execute();

            if($sql->execute()){
                echo '<div class="alert alert-success alert-dismissible" role="alert">
                        Attendance registered correctly.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    echo '<script> window.location = "http://localhost/attendance-tracker/attendances"; </script>';
            } else{
                echo '<div class="alert alert-danger alert-dismissible" role="alert">
                There was a problem, try again later.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
        } 
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    
?>
