
<?php
    require_once "./funciones.php";

    date_default_timezone_set("America/Caracas");
        
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $inicio = strClean($_POST['inicio']);
    $fin = strClean($_POST['fin']);
    $persona = strClean($_POST['persona']);

    $fechaInicio = strtotime($inicio);
    $fechaFin = strtotime($fin);
    
    $sql = $conn->prepare("SELECT * FROM personal WHERE PersonalCodigo = '$persona'");
    $sql->execute();
    $data = $sql->fetch(PDO::FETCH_OBJ);

    $mesI = date("m", $fechaInicio);
    $mesF = date("m", $fechaFin);

    switch ($mesI) {
        case '01':
            $nombreMesI = "January";
            break;
        case '02':
            $nombreMesI = "February";
            break;
        case '03':
            $nombreMesI = "March";
            break;
        case '04':
            $nombreMesI = "April";
            break;
        case '05':
            $nombreMesI = "May";
            break;
        case '06':
            $nombreMesI = "June";
            break;
        case '07':
            $nombreMesI = "July";
            break;
        case '08':
            $nombreMesI = "August";
            break;
        case '09':
            $nombreMesI = "September";
            break;
        case '10':
            $nombreMesI = "October";
            break;
        case '11':
            $nombreMesI = "November";
            break;
        case '12':
            $nombreMesI = "December";
            break;
    }

    if ($mesF == "01") {
        $nombreMesF = "January";
    } else if ($mesF == "02") {
        $nombreMesF = "February";
    } else if($mesF == "03") {
        $nombreMesF = "March";
    } else if ($mesF == "04") {
        $nombreMesF = "April";
    } else if ($mesF == "05") {
        $nombreMesF = "May";
    } else if ($mesF == "06") {
        $nombreMesF = "June";
    } else if ($mesF == "07") {
        $nombreMesF = "July";
    } else if ($mesF == "08") {
        $nombreMesF = "August";
    } else if ($mesF == "09") {
        $nombreMesF = "September";
    } else if ($mesF == "10") {
        $nombreMesF = "October";
    } else if ($mesF == "11") {
        $nombreMesF = "November";
    } else if ($mesF == "12") {
        $nombreMesF = "December";
    }

    require "../plantilla/assets/fpdf/fpdf.php";

    $pdf = new FPDF("P", "mm", "letter");
    $pdf->AddPage("Landscape");
    $pdf->SetTitle("Attendances Record", false);

    $pdf->Image("../plantilla/assets/img/logo1.png", 10, 8, 12);
    $pdf->Cell(15);
    $pdf->SetFont('Arial', '', 24);
    $pdf->Write(10, 'Attendance Tracker');
    $pdf->SetFont('Arial', '', 12);

    $pdf->Ln(18);
    $pdf->Cell(5);
    if ($persona == "Todos") {
        $pdf->Write(10, "Employee: All");
    } else {
        $pdf->Write(10, "Employee: " . $data->PersonalNombre . " " . $data->PersonalApellido);
    }
    $pdf->Ln(5);
    $pdf->Cell(5);
    $pdf->Write(10, "Since: " . date("d-m-Y", $fechaInicio) . " - Until: " . date("d-m-Y", $fechaFin));

    $pdf->Ln(15);
    $pdf->Cell(100);
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Write(0, 'Attendance Record');
    $pdf->Ln(15);
     
    

    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(18);
    $pdf->Cell(10, 9, 'N', 1);
    $pdf->Cell(60, 9, 'Name and Lastname', 1);
    $pdf->Cell(40, 9, 'Position', 1);
    $pdf->Cell(30, 9, 'Date', 1);
    $pdf->Cell(25, 9, 'Arrival', 1);
    $pdf->Cell(25, 9, 'Exit', 1);
    $pdf->Cell(25, 9, 'Total Hours', 1, 1);
    
    $pdf->SetFont("Arial", "", 9);

$hasta = date("Y-m-d", strtotime("+1 day", strtotime($fin))) . " 00:00:00";

    if ($persona == "Todos") {
        $buscar = "SELECT * FROM asistencias WHERE AsistenciaFecha BETWEEN '$inicio' AND '$hasta'";
    } else {
        $buscar = "SELECT * FROM asistencias WHERE PersonalCodigo = '$persona' AND AsistenciaFecha BETWEEN '$inicio' AND '$hasta'";
    }
    
    $resulta = $conn->query($buscar);
    $num = 1;
    
    while ($rows = $resulta->fetch()) {
        $entradaF = strtotime($rows['AsistenciaFecha']);
        $salidaF = strtotime($rows['AsistenciaSalida']);
    $car = $rows['PersonalCodigo'];

        $carDat = $conn->prepare("SELECT * FROM personal WHERE PersonalCodigo = '$car'");
        $carDat->execute();
        $cargo = $carDat->fetch(PDO::FETCH_OBJ);

        $pdf->Cell(18);
        $pdf->Cell(10, 9, $num++, 1);
        $pdf->Cell(60, 9, $rows['AsistenciaNombre'], 1);
        $pdf->Cell(40, 9, $cargo->PersonalCargo, 1);
        $pdf->Cell(30, 9, date("m-d-Y",  $entradaF), 1);
        $pdf->Cell(25, 9, date("h:i:s", $entradaF), 1);
        $pdf->Cell(25, 9, date("h:i:s", $salidaF), 1);
        $pdf->Cell(25, 9, date("h:i:s", $salidaF) - date("h:i:s", $entradaF), 1, 1);
    }
        
    $pdf->Output();
    

?>
