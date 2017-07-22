<?php
session_start();
//$id=$_SESSION['deptID'];
include_once($_SERVER['DOCUMENT_ROOT'].'/COLS1/dbconnect/dbconnect.php');
$query=mysql_query("SELECT * FROM staff ");
$row=mysql_fetch_array($query);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link href="http://localhost/COLS1/templatemo_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="http://localhost/COLS1/nivo-slider.css" type="text/css" media="screen" />

<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>
<script language="JavaScript">
				function appletPopUp(link, w, h) 
				{
					
					window.open(link,"def",settings='toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,copyhistory=0,width=' + w + ',height=' + h + ',left=' +100 +',top='+ 10);
					
				}
				</script>
				
				 

<link rel="stylesheet" type="text/css" href="http://localhost/COLS1/ddsmoothmenu.css" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js">



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
            
            <li><a href="#">Application Policy</a>
                
          </li>
		  <li><a href="http://localhost/COLS1/pages/HODlogin.php" class="selected">Log out</a>  </li>
          
        </ul>
        <br style="clear: left" />
    </div> <!-- end of templatemo_menu -->
</div> <!-- end of templatemo_menu_wrapper -->

<div id="templatemo_header_wrapper">
    <div id="templatemo_header" class="header_sub">
        <div id="templatemo_sitetitle_bar">
            <div id="site_title"><h1><a href="#"></a></h1></div>
            
            <div class="cleaner"></div>
        </div>
    </div> <!-- end of header -->
</div> <!-- end of header_wrapper -->

<div id="templatemo_main">
	
    <div id="content">
	<h5>Department staff and their leave History</h5>
<table border="2">
<th>StaffId</th><th>Staff Name</th><th>Position</th><th>Leave history</th>
<?php 

do{	
$no=$row['staffno'];
echo"<tr><td>".$row['staffno']."</td><td>".$row['Fname']." ".$row['Mname']."</td><td>".$row['position']."</td><td>
<a href=\"history1.php?no=$no\"><img src=\"http://localhost/COLS1/images/file1.png\"/></a></td></tr>";
}while($row=mysql_fetch_array($query));
?>

</table>
 </div>
    
    <div id="sidebar">
    	
    </div> <!-- end of sidebar -->
    
    <div class="cleaner"></div>
</div>

<div id="templatemo_footer_wrapper">
	<div id="templatemo_footer">
    	<div class="col_3">
        	<a href="http://localhost/COLS1/pages/information.php"><button>back</button></a>
        </div>
        <div class="col_3">
        	
            <a href="leaves.php"><button>Check Current leave trend</button></a>
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
</div>

</body>
</html>