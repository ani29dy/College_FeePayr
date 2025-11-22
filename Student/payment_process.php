<?php
session_start();
 $conn=mysqli_connect("localhost","root","","collegefeepayr");
	if(isset($_POST['mobile'])){
	$sem = $_POST['sem'];
	$added_on=date('Y-m-d h:i:s');
    $mobile=$_POST['mobile'];
    $amt_to_pay=$_POST['amt_to_pay'];
    
    $receipt_no=uniqid("apkfee");
	$payment_status="Success";
    $payment_id=uniqid("CF");
	
	$query1="insert into transaction_details values('$receipt_no','$mobile','$sem','$amt_to_pay',
	'$added_on','$payment_status','$payment_id')";
	mysqli_query($conn,$query1) or die ('Couldn\'t perfrom query');		

	$updateQuery = "update fees set total_fees_paid =total_fees_paid + '$amt_to_pay' where mobile = '$mobile' and sem = '$sem'";
	mysqli_query($conn, $updateQuery) or die("Could not execute Query");

	$updateQuery2 = "update fees set total_fees_remaining = total_sem_fees - total_fees_paid where mobile = '$mobile' and sem = '$sem'";
	mysqli_query($conn, $updateQuery2) or die("Could not execute Query");
}
?>