<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT'].'/COLS1/dbconnect/dbconnect.php');
$status=mysql_query("SELECT * FROM leavestatus");
//$arr=mysql_fetch_array($status);

$agent=mysql_query("SELECT * FROM staff,leavestatus WHERE staff.Id=leavestatus.staffID");
$agentarr=mysql_fetch_array($agent);

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

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
           
			<li><a href="http://localhost/COLS1/pages/plogout.php" class="selected">Log out</a>  
                
            </li>
            
          
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
 <a href="approvals.php"><button style="margin-left:-100px;">Back</button></a></br>
 <p style="font-size:14px;">Send a message to All  leave applicants.</p>
  <table border="1px">
  <tr><th>Name:</th><th> leaveStatus</th><th> Task</th></tr>
  <?php
  do{
    $phone=$agentarr['telephone'];

  	echo "<tr><td>".$agentarr['Fname']." ".$agentarr['Mname']." ". $agentarr['Lname']."</td><td>".$agentarr['HODApproval']."</td><td><a href=\"http://localhost/COLS1/pages/gateway.php?phone=$phone\">send</a></td></tr>";
  }while($agentarr=mysql_fetch_array($agent));
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
    	Copyright &copy <?php echo date("Y"); ?> <a href="#">ONLINE LEAVE APPLICATION</a> | Designed by Francis Mwakidoshi
    </div>
</div>

</body>
</html>