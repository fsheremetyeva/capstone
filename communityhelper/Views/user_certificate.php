<?php
include('fpdf181/fpdf.php');
$total_time_minutes = 0;
foreach($data['graph'] as $volorg)
{
  $total_time_minutes += $volorg['time'];
}
$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image('Assets/Images/Logo.jpg', 10, 6, 30);
$pdf->Ln(50);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10, $_SESSION['name'] . ': ');
$pdf->Ln(20);
$pdf->SetFont('Arial','',12);
$pdf->Write(12, 'Thanks for participating on Community Helper. As of ' . date('F j Y') . ', you have indicated you have volunteered a total of ' . $total_time_minutes . ' minutes.');
foreach($data['graph'] as $volorg)
{
  $pdf->Ln(20);
  $pdf->Write(12, $volorg['organization'] . ' - ' . $volorg['time'] . ' (mins)');
  $total_time_minutes += $volorg['time'];
}
$pdf->Output();
