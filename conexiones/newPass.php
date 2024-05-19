<?php
    require_once "./funciones.php";
    
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $token = strClean($_POST['token']);

    $pass = strClean($_POST['pass']);
    $newpass = strClean($_POST['newpass']);
    $password = password_hash($pass, PASSWORD_DEFAULT);

    if($pass == "" || $newpass == "") {
        echo '<div class="alert alert-danger alert-dismissible" role="alert">
                You must complete all fields.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        exit(); 
    }

    if(strlen($pass) < 8){
        echo '<div class="alert alert-danger alert-dismissible" role="alert">
                The password must be at least 8 characters long.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        exit();
    }
    
    if($pass != $newpass){
        echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                The passwords don't match.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        exit();
    }  

    $stmt = "SELECT * FROM contrasenas WHERE contrasenaToken = '$token' LIMIT 1";
    $result = $conn->query($stmt);

    while ($rows = $result->fetch()) {
        $email = $rows['contrasenaEmail'];
        $tipo = $rows['CuentaTipo'];
        $codigo = $rows['CuentaCodigo'];
    }; 

    if($tipo == "Administrador") {
        $sql = $conn->prepare("UPDATE admins SET AdminClave = '$password' WHERE CuentaCodigo = '$codigo'");
    } else {
        $sql = $conn->prepare("UPDATE Usuarios SET UserClave = '$password'  WHERE CuentaCodigo = '$codigo'");
    }

    $pdate = updatePass($password, $codigo);

    if($sql->execute()){
        echo '<div class="alert alert-success" role="alert">
                Password updated correctly.
            </div>';
        echo '<script> window.location.href = "http://localhost/attendance-tracker/login"; </script>';
    } else{
        echo '<div class="alert alert-danger alert-dismissible" role="alert">
                There was a problem, try again later.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }

?>