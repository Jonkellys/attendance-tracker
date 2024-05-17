<?php
    require_once "./funciones.php";
    
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $email = strClean($_POST['email']);

    if($email == "") {
        echo '<div class="alert alert-danger alert-dismissible" role="alert">
                Debes introducir un correo.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        exit(); 
    } else {
        $consulta = ejecutar_consulta_simple("SELECT CuentaEmail FROM cuentas WHERE CuentaEmail = '$email'");
        if($consulta->rowCount() != 1) {
            echo '<div class="alert alert-danger alert-dismissible" role="alert">
            El correo ingresado no está registrado en el sistema.
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
                     Espere un momento...
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>';
            echo '<script> window.location.href = "http://localhost/sistema-asistencias/newPass?token=' . $token .'"; </script>';
            
            // $to = $email ;
            // $subject = "Recuperar contraseña" ;
            // $msg = "Hola, haz click en este <a style='color: #696cff;' href=\'newPass?token=" . $token . "\'>link</a> para recuperar tu contraseña";
            // $msg = wordwrap($msg , 160);
            // $headers = "From: info@asistencias.com";
            // mail($to, $subject, $msg, $headers);
            

            // echo '<div class="alert alert-success alert-dismissible" role="alert">
            //         Hemos enviado un correo a <p style="color: #696cff;">' . $email . '</p>
            //         Ingresa a tu correo y haz click en el link para recuperar tu contraseña.
            //         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            //     </div>';
        } else{
            echo '<div class="alert alert-danger alert-dismissible" role="alert">
                    Hubo un error intente de nuevo.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
        
?>