<?php
session_start();
$msg=null;
$id=$_GET['id'];
$lid=$_GET['lid'];


include_once($_SERVER['DOCUMENT_ROOT'].'/COLS1/dbconnect/dbconnect.php');



$q=mysql_query("SELECT * FROM leavedetails WHERE staffID='$id' AND Id='$lid'");
$result=mysql_fetch_assoc($q);
$leave=mysql_query("SELECT * FROM leavecategory WHERE leaveID='{$result['leaveId']}'");
$leaverow=mysql_fetch_array($leave);
$staff=mysql_query("SELECT * FROM staff WHERE Id='{$result['staffID']}'");
$staffrow=mysql_fetch_array($staff);
$status_check=mysql_query("SELECT * FROM leavestatus WHERE staffID='$lid'");
$status_value=mysql_fetch_array($status_check);
$status_array=mysql_num_rows($status_check);
   
	$_SESSION['staffID']=$result['staffID'];
	
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HOD approval</title>

<link href="http://localhost/COLS1/templatemo_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="http://localhost/COLS1/nivo-slider.css" type="text/css" media="screen" />

<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>

<link rel="stylesheet" type="text/css" href="http://localhost/COLS1/ddsmoothmenu.css" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js">

/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "templatemo_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>
  
</head>
<body>

<div id="templatemo_menu_wrapper">
    <div id="templatemo_menu" class="ddsmoothmenu">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="http://localhost/COLS1/pages/HODlogin.php">Logout</a></li>
            
        
          
        </ul>
        <br style="clear: left" />
    </div> <!-- end of templatemo_menu -->
</div> <!-- end of templatemo_menu_wrapper -->

<div id="templatemo_header_wrapper">
    <div id="templatemo_header" class="header_sub">
        <div id="templatemo_sitetitle_bar">
            <div id="site_title"><h1><a href=""></a></h1></div>
            <div id="templatemo_search">
               
                 
            </div>
            <div class="cleaner"></div>
        </div>
    </div> <!-- end of header -->
</div> <!-- end of header_wrapper -->

<div id="templatemo_main">
	
    <div id="content">
	
	<?php
	if(strlen($msg)>0){
		echo $msg;
	}
	if($status_array <= 0){
		
$decline="unchecked";
	$approve="unchecked";
	$pending="unchecked";
	if(isset($_POST['submit'])){
	$approvalstatus=$_POST['approve'];
	$leaveid=$result['Id'];
	
		if($approvalstatus=="declined"){
		$insertS="INSERT INTO leavestatus(staffID,HODApproval) VALUES('$id','$approvalstatus')";
		mysql_query($insertS);
			$decline="declined";
			$msg.="<p style=\"color:#e79258\">Application declined</p>";
			
		}elseif($approvalstatus=="approved"){
		$insertS="INSERT INTO leavestatus(staffID,HODApproval) VALUES('$id','$approvalstatus')";
		mysql_query($insertS);
			$approve="approved";
			$msg.="<p style=\"color:#e79258\">Application Approved</p>";
		}else{
		$insertS="INSERT INTO leavestatus(staffID,HODApproval) VALUES('$id','$approvalstatus')";
		mysql_query($insertS);
			$msg.="<p style=\"color:#e79258\">Application pending approval</p>";
		}

		echo $msg;
		
	}
	?>
	<h3>Leave Application Details</h3>
	
	<table>
	<tr>
	<td>Staff Name:-</td><td><?php  echo $staffrow['Fname']."   ".$staffrow['Mname']."  ".$staffrow['Lname']?></td>
	</tr>
	<tr>
	<td>Staff Number:-</td><td><?php echo $staffrow['staffno']?></td>
	</tr>
	<tr>
	<td><label>Date Applied:-</label></td><td><?php  echo $result['dateApply']?></td>
	</tr>
	<tr>
	<td><label>Start Date:-</label></td><td><?php  echo $result['startDate']?></td>
	</tr>
	<tr>
	<td><label>Expiry Date:-</label></td><td><?php  echo $result['endDate']?></td>
	</tr>
	<tr>
	<td><label>Leave Type:-</label></td><td><?php  echo $leaverow['category']?></td>
	</tr>
	<tr>
	<td><label>Reason for application:-</label></td><td><?php  echo $result['leaveReason']?></td>
	</tr>
	<tr>
	<td><label>Contact Number:-</label></td><td><?php  echo $result['contactNO']?></td>
	</tr>
	<tr>
	<td><label>Evidence:-</label></td><td><a href="<?php  echo $result['Evidence']?>">Evidence</a></td>
	</tr>
	</table>
	<form method="post">
	<fieldset>
	<legend>Verification and Approval</legend>
	<table>
	<tr>
	<td>Departmental Head Approval:</td><td><input type="radio" name="approve" value="declined">Declined</td><td><input type="radio" name="approve" value="approved">Approved</td><td><input type="radio" name="approve" value="Pending Approval">Pending Approval</td>
	</tr>
	
	<tr height="50px"></tr>
	
	</table>
	
	</fieldset>
	<fieldset id="submit">
	<legend>Submission</legend>
	<table>
	<tr>
	<td><input type="submit" name="submit" value="Submit the Approval Status"></td><td><input type="reset" name="reset" value="Reset">
	</td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</tr>
	<tr>
	<td><a href="http://localhost/COLS1/pages/information.php">Back</a></td>
	</tr>
	<!--<tr> 
	<td></td><td><img src="http://localhost/COLS1/images/print-button1.png"></img></td><td><a href="http://localhost/COLS1/pdf.php">Print the leave sheet </a></td>
	</tr>-->
	</table>
	</fieldset>
	</form>

	<?php
	}else{
	?>
	<a href="PO_notification.php?status=<?php echo $_SESSION['staffID'];?>"><button style="margin-left:-100px;">Notify P.O</button></a>

	<?php
		echo " The leave application has been ".$status_value['HODApproval'];
		}

	?>
	
    </div>
    
    <div id="sidebar">
    	
    </div> <!-- end of sidebar -->
    
    <div class="cleaner"></div>
</div>

<div id="templatemo_footer_wrapper">
	<div id="templatemo_footer">
    	<div class="col_3">
        	
        </div>
        <div class="col_3">
        	<a href="PO_notification.php?status=<?php echo $_SESSION['staffID'];?>"><button>Notify P.O</button></a>
            
        </div>
        <div class="col_3 col_l">
					
        </div>
        <div class="cleaner"></div>
    </div>
</div>

<div id="templatemo_cr_bar_wrapper">
	<div id="templatemo_cr_bar">
    	Copyright &copy <?php echo date("Y"); ?> <a href="#">ONLINE LEAVE APPLICATION</a> | Designed by Francis Mwakidoshi
</div>

</body>
</html>