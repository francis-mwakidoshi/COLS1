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
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(100,20,'Leave History report',0,0,'U');
$pdf->Image('images/templatemo_logo.png',10,6,50);
$pdf->Ln();
$pdf->Cell(8.5);
$pdf->Ln();
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(20,5,'AppNO',1,0,'C');
$pdf->Cell(20,5,'Date Applied',1,0,'C');
$pdf->Cell(20,5,'Start Date',1,0,'C');
$pdf->Cell(20,5,'End Date',1,0,'C');
$pdf->Cell(20,5,'Leave Type',1,0,'C');
$pdf->Cell(40,5,'Leave Reason',1,0,'C');
$pdf->Cell(25,5,'HOD Approval',1,0,'C');
$pdf->Cell(25,5,'Hod Approval',1,0,'C');
$pdf->Ln();
$Q2=mysql_query("SELECT *FROM staff WHERE staffno='$no'");
$array=mysql_fetch_assoc($Q2);
$query=mysql_query("SELECT * FROM leavedetails WHERE staffID='{$array['Id']}'")or die(mysql_error());
$row=mysql_fetch_array($query);
$y=0;

do{
    $y=$y+1;
$leaveR=mysql_query("SELECT * FROM leavestatus WHERE staffID='{$row['Id']}'")or die(mysql_error());
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
   /* echo"<tr><td>".$y."</td><td>".$row['dateApply']."</td><td>".$row['startDate']."</td><td>".$row['endDate']."</td><td>".$Lrow['category']."</td><td>".$row['leaveReason']."</td><td>".$app."</td><td>".$app1."</td></tr>";*/
	
$pdf->SetFont('Arial','B',6);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(20,5,$y,1,0,'C');
$pdf->Cell(20,5,$row['dateApply'],1,0,'C');
$pdf->Cell(20,5,$row['startDate'],1,0,'C');
$pdf->Cell(20,5,$row['endDate'],1,0,'C');
$pdf->Cell(20,5,$Lrow['category'],1,0,'C');
$pdf->Cell(40,5,$row['leaveReason'],1,0,'C');
$pdf->Cell(25,5,$app,1,0,'C');
$pdf->Cell(25,5,$app1,1,0,'C');
$pdf->Ln();
}while($row=mysql_fetch_assoc($query));


$pdf->SetY(5);
    // Arial italic 8
    $pdf->SetFont('Arial','I',8);
    // Page number
    $pdf->Cell(0,10,'Page '.$pdf->PageNo().'/{nb}.leave history sheet ',0,0,'C');
$pdf->AliasNbPages();

$pdf->SetFont('Times','',12);
//$pdf->Image('user.png',10,50,200);
$pdf->Output();
?>