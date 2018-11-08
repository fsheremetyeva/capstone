<?php
include('fpdf181/fpdf.php');
$total_time_minutes = 0;
foreach($data['graph'] as $volorg){
  $total_time_minutes += $volorg['time'];
}
$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image('Assets/Images/cert-bg.png', 0, 0, 210, 300);
$pdf->Image('Assets/Images/Logo.png', 10, 6, 30);
//$pdf->Ln(50);
$pdf->SetFont('Times','B',26);
$pdf->SetX(-100);
$pdf->Cell(50, 5, 'Volunteer Certificate', 0, 0);
$pdf->Ln(30);
$pdf->SetFont('Times','BUI',16);
$pdf->Cell(40,10, $_SESSION['name']);
$pdf->Ln(20);
$pdf->SetFont('Arial','',12);
$pdf->Write(12, 'Thanks for participating on Community Helper. As of ' . date('F j Y') . ', you have indicated you have volunteered a total of ' . $total_time_minutes . ' minutes.');
$pdf->SetTextColor(27, 113, 179);
$pdf->SetFont('Times','I',12);
foreach($data['graph'] as $volorg){
  $pdf->Ln(20);
  $pdf->Write(12, $volorg['organization'] . ' - ' . $volorg['time'] . ' (mins)');
  $total_time_minutes += $volorg['time'];
}
$pdf->Output();
