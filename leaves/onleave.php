<?php
session_start();
$depid=$_SESSION['deptID'];
$get_month=$_GET['month'];

include_once($_SERVER['DOCUMENT_ROOT'].'/COLS1/dbconnect/dbconnect.php');
if($get_month=nov){
		$month=mysql_query("SELECT * FROM leavestatus WHERE leaveId = (SELECT Id FROM leavedetails WHERE startDate LIKE '%-11-%')")or die(mysql_error());
$arr=mysql_fetch_array($month);
if($arr['HODApproval']==approved){
				
			$no=$arr['staffID'];
			$qu=mysql_query("SELECT *FROM staff WHERE Id='$no' AND departmentId='$depid'");
			$row=mysql_fetch_array($qu);
			$num=mysql_num_rows($qu);
			if($num<=0){
				echo "No employees on leave this month";
			}else{
				echo $row['Fname']." ".$row['Lname']." ".$row['staffno']."<br>";
			}
}
}
if($get_month=feb){
		$month=mysql_query("SELECT * FROM leavestatus WHERE leaveId = (SELECT Id FROM leavedetails WHERE startDate LIKE '%-02-%')")or die(mysql_error());
$arr=mysql_fetch_array($month);
if($arr['HODApproval']==approved){
				
			$no=$arr['staffID'];
			$qu=mysql_query("SELECT *FROM staff WHERE Id='$no' AND departmentId='$depid'");
			$row=mysql_fetch_array($qu);
			$num=mysql_num_rows($qu);
			if($num<=0){
				echo "No employees on leave this month";
			}else{
				echo $row['Fname']." ".$row['Lname']." ".$row['staffno']."<br>";
			}
}
}




  	
	



?>