<?php
$msg=null;
$id=$_GET['id'];

include_once($_SERVER['DOCUMENT_ROOT'].'/COLS1/dbconnect/dbconnect.php');



$q=mysql_query("select * from leavedetails where staffID='$id'");
$result=mysql_fetch_assoc($q);
$leave=mysql_query("SELECT *FROM leavecategory WHERE leaveID='{$result['leaveId']}'");
$leaverow=mysql_fetch_array($leave);
$staff=mysql_query("SELECT *FROM staff WHERE Id='{$result['staffID']}'");
$staffrow=mysql_fetch_array($staff);
$hodapproval=$_POST['decline'];
$ceoapproval=$_POST['ceodecline'];
$submit=$_POST['submit'];
if(isset($submit)){
	$insert=mysql_query("INSERT INTO leavestatus(HODApproval,CEOApproval) VALUES('$hodapproval','$ceoapproval') WHERE staffID='{$staffrow['Id']}'");
	exit;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Agency Template, About Us</title>
<meta name="keywords" content="agency, about us, model girls, company, free website template, CSS, HTML, templatemo" />
<meta name="description" content="Agency Template, About Us, Company Page, fashion models, free template by templatemo.com" />
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
            
            
                <li><a href="http://localhost/COLS1/pages/clogout.php" class="selected">Log out</a>
          </li>
          
        </ul>
        <br style="clear: left" />
    </div> <!-- end of templatemo_menu -->
</div> <!-- end of templatemo_menu_wrapper -->

<div id="templatemo_header_wrapper">
    <div id="templatemo_header" class="header_sub">
        <div id="templatemo_sitetitle_bar">
            <div id="site_title"><h1><a href="http://www.templatemo.com">Free CSS Templates</a></h1></div>
            <div id="templatemo_search">
               
            </div>
            <div class="cleaner"></div>
        </div>
    </div> <!-- end of header -->
</div> <!-- end of header_wrapper -->

<div id="templatemo_main">
	
    <div id="content">
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
	</table>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
	<fieldset>
	<legend>Verification and Approval</legend>
	<table>
	<tr>
	<td>CEO Approval:</td><td><input type="radio" name="decline" value="declined">Declined</td><td><input type="radio" name="decline" value="approved">Approved</td><td><input type="radio" name="decline" value="Pending Approval">Pending Approval</td>
	</tr>
	
	<tr height="50px"></tr>
	
	<tr>
	<td>Departmental Stamp/Signature:</td><td>..............................</td><td>Departmental Stamp/Signature:</td><td>..............................</td>
	</tr>
	</table>
	
	</fieldset>
	<fieldset id="submit">
	<legend>Submission</legend>
	<table>
	<tr>
	<td><input type="submit" name="submit" value="Submit the Approval Status"></td><td><input type="reset" name="reset" value="Reset"></td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</tr>
	<tr>
	<td></td><td><img src="http://localhost/COLS1/images/print-button1.png"></img></td><td><a href="#"><button>Print the leave sheet</button> </a></td>
	</tr>
	</table>
	</fieldset>
	</form>
	<?php
	
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
        	
            
        </div>
        <div class="col_3 col_l">
					
        </div>
        <div class="cleaner"></div>
    </div>
</div>

<div id="templatemo_cr_bar_wrapper">
	<div id="templatemo_cr_bar">
    	Copyright &copy 2016 <a href="#">ONLINE LEAVE APPLICATION</a> | Designed by Francis Mwakidoshi
    </div>
</div>

</body>
</html>