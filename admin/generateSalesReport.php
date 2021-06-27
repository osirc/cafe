<?php

include_once('../php/tfpdf.php');
include('../config/config.php');

class PDF extends tFPDF {

    function header() {
        $this->SetFont('Arial','B',13);
        $this->Ln(20);
    }

    function footer() {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    }

}

$pdf = new tFPDF('L','mm','A4');
$pdf->AddPage();
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',14);

$pdf->Write(10,"Reporte de ventas diarias Cafe Tacuba");
$pdf->Cell(120);
$pdf->Write(10,date("l jS \of F Y"));
$pdf->Ln(15);

$sql = "SELECT product.name, category.name AS category, ticket.price , SUM(amount) AS product_sales , SUM(ticket.price * amount) AS sales 
    FROM ticket INNER JOIN product ON product_id = product.id INNER JOIN category ON category_id = category.id GROUP BY product.name";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $w = array(125, 50, 30, 30, 30);
    $pdf->Cell(125,12,'Nombre del producto',1);
    $pdf->Cell(50,12,'Categoria',1);
    $pdf->Cell(30,12,'Precio',1);
    $pdf->Cell(30,12,'Ventas',1);
    $pdf->Cell(30,12,'Subtotal',1);
    $pdf->Ln();
    $pdf->SetFont('DejaVu','',14);
    while ($row = $result -> fetch_assoc()) {
        if (strlen($row['name']) > 40)
            $pdf->Cell($w[0],6,substr($row['name'],0,40),1);
        else
            $pdf->Cell($w[0],6,$row['name'],1);
        $pdf->Cell($w[1],6,$row['category'],1);
        $pdf->Cell($w[2],6,$row['price'],1);
        $pdf->Cell($w[3],6,$row['product_sales'],1);
        $pdf->Cell($w[3],6,$row['sales'],1);
        $pdf->Ln();
    }
    $pdf->Output();
}



if ($result->num_rows > 0) {
    $w = array(8, 65, 110, 15);
    $pdf->Cell(8,12,'ID',1);
    $pdf->Cell(65,12,'Categoria',1);
    $pdf->Cell(110,12,'Nombre del producto',1);
    $pdf->Cell(15,12,'Stock',1);
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