<?php
ob_start();
@$uname=$_POST['Usern'];
@$pswd=$_POST['pswd'];
@$submit=$_POST['submit'];
include_once($_SERVER['DOCUMENT_ROOT'].'/COLS1/dbconnect/dbconnect.php');
$qtable="SELECT *FROM personelofficer WHERE  username='$uname'";
$query=mysql_query($qtable);
$row=mysql_fetch_array($query);
$msg=NULL;
$error=NULL;
if($submit){
foreach($_POST as $key=>$value)
	     {
	         $$key=$value;
	     }
	   if((empty($uname))||(empty($pswd)))
		   {
		    $error.="<p style=\"color:#e79258\">Fill all the fields </p>"; 	
		   }
			else{
					if(($row['username']==$uname)&&($row['password']==$pswd)){
					header('location:http://localhost/COLS1/pages/Mstaff.php');
					}else
					{
						$msg.= "<p style=\"color:#e79258\"> Wrong login credentials.please try again</p>";
					}
                }

}


?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>personel officer login</title>
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
 if(strlen($error)>0){
 	echo $error;
 }
 ?>
  <p style="color:#d2d74b;margin-left:-50px;">personel officer login page</p>
  <h3>LOGIN</h3>
<form name="login" method="post" action="#" >
<table>

<tr><td><label>Username:</label></td><td><input type="text" name="Usern" value=""/></td></tr>
<!--<tr><td><label>Department:</label></td><td><input type="text" name="dept" value=""/></td></tr>-->
<tr><td><label>Password:</label></td><td><input type="password" name="pswd" value=""/></td></tr>

<tr><td><input type="submit" name="submit" value="Login"/></td>
<td><input type="reset" name="reset" value="Reset"/></td></tr>

</table>
</form>


	
    </div>
    
    <div id="sidebar">
    <table>
    <ul>
	<tr><td width="200px;"><li style="list-style:none; font-size:14px; "><a href="stafflogin.php"><b style="color:#ece453;"><button>Staff</button></b></a></li></td></tr>
	
	<tr><td width="200px;"><li style="list-style:none; font-size:14px; "><a href="HODlogin.php"><b style="color:#ece453;"><button>HOD</button></b></a></li></td></tr>
	
	<tr><td width="200px;"><li style="list-style:none; font-size:14px; "><a href="personellogin.php"><b style="color:#ece453;"><button>Personel Officer</button></b></a></li></td></tr>
		</ul>
	</table>	
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