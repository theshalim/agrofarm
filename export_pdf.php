<?php
require 'config.php';
require '../libs/fpdf/fpdf.php'; // Make sure this path is correct

class PDF extends FPDF {
    function Header() {
        $this->SetFont('Arial','B',14);
        $this->Cell(0,10,'কর্মচারী তালিকা',0,1,'C');
        $this->Ln(5);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);

// Table Header
$pdf->Cell(10,10,'ID',1);
$pdf->Cell(40,10,'নাম',1);
$pdf->Cell(30,10,'পরিসেবা',1);
$pdf->Cell(30,10,'বেতন',1);
$pdf->Cell(40,10,'যোগদানের তারিখ',1);
$pdf->Cell(30,10,'অবস্থা',1);
$pdf->Ln();

// Fetch data
$stmt = $conn->query("SELECT * FROM employees ORDER BY id DESC");
$pdf->SetFont('Arial','',11);

while ($row = $stmt->fetch()) {
    $pdf->Cell(10,10,$row['id'],1);
    $pdf->Cell(40,10,$row['name'],1);
    $pdf->Cell(30,10,$row['service_type'],1);
    $pdf->Cell(30,10,$row['remuneration'],1);
    $pdf->Cell(40,10,$row['joining_date'],1);
    $pdf->Cell(30,10,$row['status'],1);
    $pdf->Ln();
}

$pdf->Output();
