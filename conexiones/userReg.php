<?php

require_once "./funciones.php";

    
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("INSERT INTO Usuarios(UserName, UserEmail, UserClave, CuentaCodigo) 
            VALUES(:usuario, :email, :clave, :codigo)");

            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':clave', $password);
            $stmt->bindParam(':codigo', $codigo);

            
            $usuario = strClean($_POST["usuario"]);
            $email = strClean($_POST["email"]);
            $clave = strClean($_POST["clave"]);
            $confirmar = strClean($_POST["confirmar"]);
            $password = password_hash($clave, PASSWORD_DEFAULT);

            $nombre = strClean($_POST["nombre"]);
            $apellido = strClean($_POST["apellido"]);
            $tipo = strClean($_POST["tipo"]);
            $genero = strClean($_POST["genero"]);

            if($usuario == "" || $email == "" || $clave == "" || $confirmar == "" || $nombre == "" || $apellido == "") {
                echo '<div class="alert alert-danger alert-dismissible" role="alert">
                        You must complete all fields.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                exit();
            }

            if(strlen($clave) < 8){
                echo '<div class="alert alert-danger alert-dismissible" role="alert">
                        The password must be at least 8 characters long.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                exit();
            }
            
            if($clave != $confirmar){
                echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                        The passwords don't match.
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                exit();
            }  

            $consulta2 = ejecutar_consulta_simple("SELECT UserName FROM Usuarios WHERE UserName = '$usuario'");
                if($consulta2->rowCount()>=1) {
                    echo '<div class="alert alert-danger alert-dismissible" role="alert">
                            The entered username is already registered in the system.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    exit();
                }
            
            $consulta3 = ejecutar_consulta_simple("SELECT UserEmail FROM Usuarios WHERE UserEmail = '$email'");
            if($consulta3->rowCount()>=1) {
                echo '<div class="alert alert-danger alert-dismissible" role="alert">
                        The entered email is already registered in the system.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                exit();
            }

            $consulta4= ejecutar_consulta_simple("SELECT id FROM cuentas");
            $numero = ($consulta4->rowCount())+1;

            $codigo = generar_codigo_aleatorio("AO", 7, $numero);

            $tipo = "Usuario";

            $guardarCuenta = crearCuenta($codigo, $nombre, $apellido, $usuario, $password, $email, $tipo, $genero);

            if($stmt->execute()){
                echo '<div class="alert alert-success alert-dismissible" role="alert">
                        User added successfully.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    echo '<script> window.location.href = "http://localhost/attendance-tracker/users"; </script>';
            } 
        } 
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
      }
?>