<?php
session_start();
require('fpdf/fpdf.php');
$id=$_SESSION['staffID'];

include_once($_SERVER['DOCUMENT_ROOT'].'/COLS1/dbconnect/dbconnect.php');
$get=mysql_query("SELECT * FROM staff WHERE Id='$id'")or die(mysql_error());
$res=mysql_fetch_array($get);
$status=mysql_query("SELECT* FROM leavedetails WHERE staffID='$id'");
$statusarr=mysql_fetch_array($status);
$leaves=mysql_query("SELECT *FROM leavecategory WHERE leaveID='{$statusarr['leaveId']}'");
$leavearr=mysql_fetch_array($leaves);
$approval=mysql_query("SELECT* FROM leavestatus WHERE leaveId='{$statusarr['Id']}'");
$app=mysql_fetch_array($approval);



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
$pdf->Cell(10.5);
$pdf->SetTextColor(6,6,9);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(25,10,'Staff Name:',0,0,'C');
$pdf->SetTextColor(0,0,9);
$pdf->Cell(25,10,$res[1],0,0,'C');
$pdf->Cell(25,10,$res[2],0,0,'C');
$pdf->Ln();
$pdf->Cell(10.5);
$pdf->Cell(25,10,'staff No:',0,0,'C');
$pdf->Cell(45,10,$res[4],0,0,'C');
$pdf->Ln();
$pdf->Cell(10.5);
$pdf->Cell(25,10,'Date applied:',0,0,'C');
$pdf->Cell(45,10,$statusarr[2],0,0,'C');
$pdf->Ln();
$pdf->Cell(10.5);
$pdf->Cell(25,10,'Start date:',0,0,'C');
$pdf->Cell(45,10,$statusarr[3],0,0,'C');
$pdf->Ln();
$pdf->Cell(10.5);
$pdf->Cell(25,10,'End date:',0,0,'C');
$pdf->Cell(45,10,$statusarr[4],0,0,'C');
$pdf->Ln();
$pdf->Cell(10.5);
$pdf->Cell(25,10,'leave type:',0,0,'C');
$pdf->Cell(45,10,$leavearr['category'],0,0,'C');
$pdf->Ln();
$pdf->Cell(10.5);
$pdf->Cell(25,10,'Leave Reason:',0,0,'C');
$pdf->Cell(45,10,$statusarr[6],0,0,'C');
$pdf->Ln();
$pdf->Cell(10.5);
$pdf->Cell(25,10,'contact No:',0,0,'C');
$pdf->Cell(45,10,$statusarr[7],0,0,'C');
$pdf->Ln();
$pdf->Cell(10.5);
$pdf->Cell(25,10,'HOD Approval:',0,0,'C');
$pdf->Cell(45,10,$app[2],0,0,'C');
$pdf->Ln();
$pdf->Cell(10.5);
$pdf->Cell(25,10,'Personel Officer Approval:',0,0,'C');
$pdf->Cell(45,10,$app[3],0,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->Cell(10.5);
$pdf->SetTextColor(1,0,0);


$pdf->Ln();
$pdf->Ln();$pdf->Ln();$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->Cell(10.5);
$pdf->SetTextColor(1,0,0);
$pdf->Cell(55,10,'HOD signature: ..............',0,0,'C');
$pdf->Cell(55,10,'HOD stamp: ..............',0,0,'C');
$pdf->Ln();

$pdf->SetY(5);
    // Arial italic 8
    $pdf->SetFont('Arial','I',8);
    // Page number
    $pdf->Cell(0,10,'Page '.$pdf->PageNo().'/{nb}.leave approval sheet ',0,0,'C');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
//$pdf->Image('user.png',10,50,200);
$pdf->Output();
?>