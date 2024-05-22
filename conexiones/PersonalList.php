<?php
    require_once "./funciones.php";

    date_default_timezone_set("America/Caracas");
        
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conect = new mysqli($servername, $username, $password, $dbname);

    $sel = "SELECT id FROM personal";
    $resultEst = mysqli_query($conect, $sel);
    $cantidad = mysqli_num_rows($resultEst);    

    require "../plantilla/assets/fpdf/fpdf.php";

        $pdf = new FPDF("L", "pt", array(1600, 700));
        $pdf->AddPage("landscape");
        $pdf->SetTitle("Employees Record " . date("d-m-Y"), false);

        $pdf->Image("../plantilla/assets/img/logo1.png", 30, 40, 45);
            $pdf->Cell(60);
            $pdf->SetFont('Arial', '', 24);
            $pdf->Write(80, 'Attendance Tracker');
            $pdf->SetFont('Arial', '', 18);
            $pdf->Cell(1100);
            $pdf->Write(70, "Date: " . date("d-m-Y"));
            $pdf->Ln(75);
            $pdf->Cell(700);
            $pdf->SetFont('Arial', 'B', 18);
            $pdf->Write("34", 'Employees Record');
            $pdf->Ln(85);

            if ($cantidad == 0) {
                $pdf->Write(10, "No employees saved");
            } else {

                $pdf->SetFont('Arial', 'B', 14);
                $pdf->Cell(35, 28, 'N', 1);
                $pdf->Cell(110, 28, 'Name', 1);
                $pdf->Cell(110, 28, 'Lastname', 1);
                $pdf->Cell(110, 28, 'Position', 1);
                $pdf->Cell(110, 28, 'Gender', 1);
                $pdf->Cell(260, 28, 'Address', 1);
                $pdf->Cell(160, 28, 'Phone', 1);
                $pdf->Cell(260, 28, 'Email', 1);
                $pdf->Cell(210, 28, 'Place of Birth', 1);
                $pdf->Cell(160, 28, 'Date of Birth', 1, 1);
            
                $pdf->SetFont("Arial", "", 14);
    
                $buscar = "SELECT * FROM personal";
                $resultado = $conn->query($buscar);
                $num = 1;
    
            while ($rows = $resultado->fetch()) {
                $pdf->Cell(35, 28, $num++, 1,);
                $pdf->Cell(110, 28, $rows['PersonalNombre'], 1);
                $pdf->Cell(110, 28, $rows['PersonalApellido'], 1);
                $pdf->Cell(110, 28, $rows['PersonalCargo'], 1);
                $pdf->Cell(110, 28, $rows['PersonalGenero'], 1);
                $pdf->Cell(260, 28, $rows['PersonalDireccion'], 1);
                $pdf->Cell(160, 28, $rows['PersonalTelefono'], 1);
                $pdf->Cell(260, 28, $rows['PersonalCorreo'], 1);
                $pdf->Cell(210, 28, $rows['PersonalLugarNac'], 1);
                $pdf->Cell(160, 28, $rows['PersonalFechaNac'], 1, 1);
            }; 
        }
            
        
        $pdf->Output();
    

?>