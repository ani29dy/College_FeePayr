<?php

$conn = mysqli_connect("localhost","root","","collegefeepayr");

// Include autoloader 
require_once 'dompdf/autoload.inc.php'; 
 
// Reference the Dompdf namespace 
use Dompdf\Dompdf; 
 
$reciept_no = $_GET['reciept_no'];
$sql = "select * from transaction_details where reciept_no='$reciept_no'";
$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($res);
 

// Instantiate and use the dompdf class 
$dompdf = new Dompdf();

ob_start();
require('FeeReciept.php');
$data = ob_get_contents();
ob_get_clean();

// Load HTML content 
$dompdf->loadHtml($data); 
 
// (Optional) Setup the paper size and orientation 
$dompdf->setPaper('A4', 'portrait'); 
 
// Render the HTML as PDF 
$dompdf->render(); 
 
// Output the generated PDF to Browser 
$dompdf->stream('FeeReciept.pdf',array('Attachment'=>0));




?>