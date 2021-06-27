<?php

include_once('../php/tfpdf.php');
include('../config/config.php');

class PDF extends tFPDF {

    function Header() {
        $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
        $pdf->SetFont('DejaVu','',14);
        $pdf->Write(10,"Reporte de inventarios Cafe Tacuba");
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    }

}

$pdf = new tFPDF('L','mm','A4');
$pdf->AddPage();
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',14);

$sql = "SELECT product.id, category.name AS category, product.name, stock FROM product 
        INNER JOIN category ON category_id = category.id";
$result = $conn->query($sql);


$pdf->Write(10,"Reporte de inventarios Cafe Tacuba");
$pdf->Cell(80);
$pdf->Write(10,date("l jS \of F Y"));
$pdf->Ln(15);
if ($result->num_rows > 0) {
    $w = array(10, 65, 125, 20);
    $pdf->Cell(10,12,'ID',1);
    $pdf->Cell(65,12,'Categoria',1);
    $pdf->Cell(125,12,'Nombre del producto',1);
    $pdf->Cell(20,12,'Stock',1);
    $pdf->Ln();
    $pdf->SetFont('DejaVu','',14);
    while ($row = $result -> fetch_assoc()) {
        $pdf->Cell($w[0],6,$row['id'],1);
        $pdf->Cell($w[1],6,$row['category'],1);
        if (strlen($row['name']) > 45)
            $pdf->Cell($w[2],6,substr($row['name'],0,45),1);
        else
            $pdf->Cell($w[2],6,$row['name'],1);
        $pdf->Cell($w[3],6,number_format($row['stock']),1);
        $pdf->Ln();
    }
    $pdf->Output();
}
?>