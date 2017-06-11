<?php
$no=$_GET['no'];
include_once($_SERVER['DOCUMENT_ROOT'].'/COLS1/dbconnect/dbconnect.php');
$Q2=mysql_query("SELECT *FROM staff WHERE staffno='$no'");
$array=mysql_fetch_array($Q2);
$query=mysql_query("SELECT *FROM leavedetails WHERE staffID='{$array['Id']}'")or die(mysql_error());
$row=mysql_fetch_array($query);

$i=0;
$numrows=mysql_num_rows($query);
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
if($numrows<=0){
	echo "no results";
}else
{
	?>
<table border="1">
<th>App No:</th><th>Date Applied:</th><th>start date</th><th>End date</th><th>leave type</th><th>leave Reason</th>
 <th>HOD approval</th><th>P.O approval</th>
<?php


do{
	
$leaveR=mysql_query("SELECT * FROM leavedetails WHERE leaveId='{$row['Id']}'")or die(mysql_error());
$leaveA=mysql_fetch_array($leaveR);
$num=mysql_num_rows($leaveR);
if($num<=0){
	$app="pending approval";
	$app1="pending approval";
}else{
	$app=$leaveA['HODApproval'];
	$app1=$leaveA['POApproval'];
	
}
$i=$i+1;

$leave=mysql_query("SELECT *FROM leavecategory WHERE leaveID='{$row['leaveId']}'");
$Lrow=mysql_fetch_array($leave);
echo"<tr><td>".$i."</td><td>".$row['dateApply']."</td><td>".$row['startDate']."</td><td>".$row['endDate']."</td><td>".$Lrow['category']."</td><td>".$row['leaveReason']."</td><td>".$app."</td><td>".$app1."</td></tr>";
}while($row=mysql_fetch_array($query));
}
 ?>

</table>
<a href="http://localhost/COLS1/leave_trend.php?no=<?php echo $no;?>"><button style="margin-top:20px;margin-right:200px;">Print Leave details</button></a>
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