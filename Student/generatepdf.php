<?php
//include connection file
include('connect.php');
include_once('libs/fpdf.php');
 $reciept_no=$_GET['reciept_no'];
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('New.jpg',10,-1,70);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(90);
    // Title
    $this->Cell(90,10,'Fees Recipt',1,0,'C');
    // Line break
    $this->Ln(40);
}
 
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$display_heading = array('reciept_no'=>'reciept_no', 'payment_id'=> 'payment_id', 'mobile'=> 'mobile', 'paid_amt'=> 'paid_amt','paid_date'=> 'paid_date','payment_status'=> 'payment_status',);
 
$result = mysqli_query($connect,"SELECT *FROM transaction_details where reciept_no='$reciept_no'") or die("database error:". mysqli_error($connect));
$header = mysqli_query($connect, "SHOW columns FROM transaction_details");
 
$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',10);
foreach($header as $heading) {
$pdf->Cell(30,10,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(30,10,$column,1);
}
$pdf->Output();
?>
