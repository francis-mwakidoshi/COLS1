<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT'].'/COLS1/dbconnect/dbconnect.php');

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
            <div id="site_title"><h1><a href="http://www.templatemo.com">Free CSS Templates</a></h1></div>
            <div id="templatemo_search">
                <form action="#" method="get">
                  <input type="text" value="Search" name="keyword" id="keyword" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
                  <input type="submit" name="Search" value="" alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
                </form>
            </div>
            <div class="cleaner"></div>
        </div>
    </div> <!-- end of header -->
</div> <!-- end of header_wrapper -->

<div id="templatemo_main">
	
    <div id="content">
	<button style="margin-left:-100px; color:#e9c170;"><a href="http://localhost/COLS1/pages/HODlogin.php">Back</a></button>
<?php
$query="SELECT *FROM leavedetails";
$result=mysql_query($query);
$res=mysql_fetch_assoc($result);


echo "<table border=1>";
echo "<th>Name</th><th>Staff No:</th><th>Department</th><th>View Leave</th>";
do{
$staff=mysql_query("SELECT *FROM staff WHERE Id='{$res['staffID']}'");
$staffrow=mysql_fetch_array($staff);
$Qdept=mysql_query("SELECT *FROM departments WHERE deptID='{$staffrow['departmentId']}'");
$deptrow=mysql_fetch_array($Qdept);

	echo "<tr>";
echo "<td>".$staffrow['Fname']."</td><td>".$staffrow['staffno']."</td><td>".$deptrow['deptName']."</td>
	 <td><a href=checkleave.php?id=".$res['staffID'].">Check</a>&nbsp;&nbsp;&nbsp;</td>";
echo "</tr>";
 
 

}while($res=mysql_fetch_assoc($result));
echo "</table>";
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
        	
            <div class="footer_social_button">
                <a href="#"><img src="http://localhost/COLS1/images/facebook-32x32.png" alt="facebook" title="facebook" /></a>
                <a href="#"><img src="http://localhost/COLS1/images/flickr-32x32.png" alt="flickr" title="flickr" /></a>
                <a href="#"><img src="http://localhost/COLS1/images/twitter-32x32.png" alt="twitter" title="twitter" /></a>
                <a href="#"><img src="http://localhost/COLS1/images/youtube-32x32.png" alt="youtube" title="youtube" /></a>
                <a href="#"><img src="http://localhost/COLS1/images/rss-32x32.png" alt="rss" title="rss" /></a>
			</div>
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