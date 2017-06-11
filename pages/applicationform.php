<?php
session_start();
@$date=$_POST['date'];
@$leavetype=$_POST['leave_type'];
@$sdate=$_POST['sdate'];
@$edate=$_POST['edate'];
@$contact=$_POST['contact'];
@$reason=$_POST['reason'];
@$userid=$_SESSION['Id'];
@$evidence=$_FILES['evidence'];
@$msg=NULL;
@$error=NULL;
@$apply=$_POST['apply'];

include_once($_SERVER['DOCUMENT_ROOT'].'/COLS1/dbconnect/dbconnect.php');
$staffQ=mysql_query("SELECT * FROM staff WHERE Id='$userid'");
$Srow=mysql_fetch_array($staffQ);
$no=$Srow['staffno'];
$sql="SELECT * FROM leavecategory";
$leavetypes=mysql_query($sql);
$row=mysql_fetch_array($leavetypes);

               $uploadpath = "../evidence/";
                   @$file = $_FILES['evidence']['tmp_name'];
                   @$uploadpath = $uploadpath.$_FILES['evidence']['name'];

if(isset($apply)){
		      foreach($_POST as $key=>$value)
			     {
			         $$key=$value;
			     }
	   				if((empty($date))||(empty($leavetype))||(empty($sdate))||(empty($edate))||(empty($contact))||(empty($reason)))
					   {
					    $error.="<p style=\"color:#e79258\">Fill all the fields </p>"; 	
					   }
					else{
					
				   $Qinsert="INSERT INTO leavedetails(staffID,dateApply,leaveId,startDate,endDate,contactNo,leaveReason,Evidence) VALUES('$userid','$date','$leavetype','$sdate','$edate','$contact','$reason','$uploadpath')";
                   if(move_uploaded_file($file,$uploadpath)){
                    
                   }else{
                       echo "Failed to upload";
                       echo $_FILES['evidence']['error'];
                   }
					mysql_query($Qinsert) or die(mysql_error());
					$msg.="<p style=\"color:#e79258\">Successful Application.Check soon.</p>";
					session_destroy();
						}
}

?>
<html>
<head>

<title>My application form</title>

<link href="http://localhost/COLS1/templatemo_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="http://localhost/COLS1/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="http://localhost/COLS1/jQuery/themes/base/jquery.ui.all.css">
 <script src="http://localhost/COLS1/jQuery/jquery.js"></script>
	<script src="http://localhost/COLS1/jQuery/ui/jquery.ui.core.js"></script>
	<script src="http://localhost/COLS1/jQuery/ui/jquery.ui.widget.js"></script>
	<script src="http://localhost/COLS1/jQuery/ui/jquery.ui.datepicker.js"></script>
	
	<script>
	$(function() {
		$( "#datepicker,#datepic,#datepick" ).datepicker(
		{
		dateFormat: "yy-mm-dd"
		}
		);
	});
	</script>
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
<script language="JavaScript">
				function appletPopUp(link, w, h) 
				{
					
					window.open(link,"def",settings='toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,copyhistory=0,width=' + w + ',height=' + h + ',left=' +100 +',top='+ 10);
					
				}
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
            <li><a href="http://localhost/COLS1/index.php">Home</a></li>
            
            <li><a href="history.php?no=<?php echo $no;?>">Check Leave History</a></li>
          <li><a href="http://localhost/COLS1/pages/logout.php">Log out</a></li>
        </ul>
        <br style="clear: left" />
    </div> <!-- end of templatemo_menu -->
</div> <!-- end of templatemo_menu_wrapper -->

<div id="templatemo_header_wrapper">
    <div id="templatemo_header" class="header_sub">
        <div id="templatemo_sitetitle_bar">
            <div id="site_title"><h1><a href="#"></a></h1></div>
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
if(strlen($error)>0){
	echo $error;
}
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
 <fieldset>
<legend>Applicant information</legend>
<table>
<tr>
<td><label>Name:</label></td><td>
<?php
echo $_SESSION['Fname'];
?>
</td>
<td>
<?php
echo $_SESSION['Mname'];
?></td>
<td>
<?php
echo $_SESSION['Lname'];

?>
</td>
</tr>
<tr>
<td><label>Staff No:</label></td><td><?php echo $_SESSION['staffno']; ?></td>
</tr>

</table>
<p><b>N/B</b>Please read about various types of leave before applying &nbsp;&nbsp;<a href="#">leave policy</a></p>
</fieldset>
	<!--<fieldset>
	<legend>Your Annual Leave Information</legend>
	<label>Total:</label><?php echo $statusR['Total_leave']." Days"; ?><br>
	<label>Taken:</label><?php echo $statusR['leave_taken']." Days"; ?><br>
	<label>Balance:</label><?php echo $statusR['leave_balance']." Days"; ?><br>
	</fieldset>-->
	<fieldset>
	<legend>Application Form</legend>
	<table>
	<tr>
	<td><label>Date:</label></td><td><input type="date" name="date" value="" id="datepicker"></td>
	</tr>
	<tr>
	<td><label>Leave Type:</label></td>
	<td>
	<select name="leave_type">
	    <?php while($row=mysql_fetch_array($leavetypes)):?>
        <option value="<?php echo $row['leaveID'];?>"><?php echo $row['category'];?></option>
        <?php endwhile;?>
	</select>
	</td>
	
	
	</tr>
	<tr>
	<td><label>Leave From:</label></td><td><input type="date" name="sdate" value="" id="datepick"></td>
	<td>Leave Ending:</td><td><input type="date" name="edate" value="" id="datepic"></td>
	</tr>
	<tr>
	<td><label>Contact No:</label></td><td><input type="int" name="contact" value=""></td>
	
	</tr>
	<tr>
	<td><label>Leave Reason:</label></td><td><textarea cols="36" rows="5" name="reason"></textarea></td>
	</tr>
	<tr>
	<td><label>Attach some evidence:</label></td><td><input type="file" name="evidence" ></td>
	</tr>
	</table>
	</fieldset>
	<fieldset id="submit">
	<legend> Submit Information</legend>
	<table>
	<tr>
	<td><input type="submit" name="apply" value="Apply"></td><td><input type="reset" name="reset" value="Reset"></td>
	
	</tr>
	</table>
	</fieldset>
	</form>
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
        	<a href="HOD_notification.php?staffno=<?php echo $_SESSION['staffno'];?>"><button> Notify HOD of the application</button></a>
            
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