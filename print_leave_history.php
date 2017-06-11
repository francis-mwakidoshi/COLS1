<?php
require('fpdf/fpdf.php');
$no=$_GET['no'];
include_once($_SERVER['DOCUMENT_ROOT'].'/COLS1/dbconnect/dbconnect.php');
$pdf = new FPDF();
 $pdf->Image('images/templatemo_logo.png',10,6,30);
    // Arial bold 15
 $pdf->SetFont('Times','B',20);
    // Move to the right
 $pdf->Cell(40);
$pdf->Ln();
$data = $result;
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(100,20,'Leave Application report',0,0,'U');
$pdf->Image('images/templatemo_logo.png',10,6,50);
$pdf->Ln();
$pdf->Cell(8.5);
$pdf->Ln();
$Q2=mysql_query("SELECT *FROM staff WHERE staffno='$no'");
$array=mysql_fetch_assoc($Q2);
$query=mysql_query("SELECT *FROM leavedetails WHERE staffID='{$array['Id']}'")or die(mysql_error());
$row=mysql_fetch_array($query);
$y=0;

echo"<table id='tcustomers' style=\"text-align:center;border:1px solid #000000; padding:10px; \">";
echo"<tr bgcolor=#c0c0c0><th> App NO</th> <th>Date Applied</th> <th>Start Date </th> <th>End Date </th> <th>Leave Type </th> <th>Leave reason </th> <th>HOD Approval </th> <th>PO approval </th></tr>";

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(100,20,'Member distribution',0,0,'U');
$pdf->Image('../public/images/header1.png',10,6,50);
$pdf->Ln();
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(20,5,'Name',1,0,'C');
$pdf->Cell(20,5,'Userame',1,0,'C');
$pdf->Cell(40,5,'Email',1,0,'C');
$pdf->Cell(20,5,'Phone number',1,0,'C');
$pdf->Cell(20,5,'ID Card Number',1,0,'C');
$pdf->Cell(20,5,'Country',1,0,'C');
$pdf->Ln();

do{
$y=$y+1;
$leaveR=mysql_query("SELECT *FROM leavestatus WHERE leaveId='{$row['Id']}'")or die(mysql_error());
$leaveA=mysql_fetch_assoc($leaveR);
$num1=mysql_num_rows($leaveR);
if($num1<=0){
	$app="pending approval";
	$app1="pending approval";
}else{
	$app=$leaveA['HODApproval'];
	$app1=$leaveA['POApproval'];
	
}
$leave=mysql_query("SELECT *FROM leavecategory WHERE leaveID='{$row['leaveId']}'");
$Lrow=mysql_fetch_array($leave);
    echo"<tr><td>".$y."</td><td>".$row['dateApply']."</td><td>".$row['startDate']."</td><td>".$row['endDate']."</td><td>".$Lrow['category']."</td><td>".$row['leaveReason']."</td><td>".$app."</td><td>".$app1."</td></tr>";
	
$pdf->SetFont('Arial','B',6);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(20,5,$y,1,0,'C');
$pdf->Cell(20,5,$row['2'],1,0,'C');
$pdf->Cell(40,5,$row['startDate'],1,0,'C');
$pdf->Cell(20,5,$row['endDate'],1,0,'C');
$pdf->Cell(20,5,$Lrow['category'],1,0,'C');
$pdf->Cell(20,5,$row['leaveReason'],1,0,'C');
$pdf->Cell(20,5,$app,1,0,'C');
$pdf->Cell(20,5,$app1,1,0,'C');
$pdf->Ln();
}while($row=mysql_fetch_assoc($query));
echo"</table>";


$pdf->Output('leave_history.pdf');
?>