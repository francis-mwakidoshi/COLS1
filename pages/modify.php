<?php
session_start();
ob_start();
@$Fname=$_POST['fname'];
@$Mname=$_POST['mname'];
@$Lname=$_POST['lname'];
@$staff=$_POST['staffn'];
@$dept=$_POST['dept'];
@$gender=$_POST['gender'];
@$position=$_POST['pstn'];
@$address=$_POST['address'];
@$email=$_POST['mail'];
@$tel=$_POST['telno'];
@$Uname=$_POST['uname'];
@$Pswd=$_POST['pswd'];
@$register=$_POST['register'];
@$choice=$_POST['search'];
@$go=$_POST['go'];
include($_SERVER['DOCUMENT_ROOT']."/COLS1/dbconnect/dbconnect.php");
$q=mysql_query("SELECT *FROM staff");
$results=mysql_fetch_assoc($q);

if(isset($go)){
    if($choice==department){
	header("location:http://localhost/COLS1/pages/modifychoice.php");
}elseif($choice==staffno){
	header("location:http://localhost/COLS1/pages/staffchoice.php");
}	
	}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Staff Modification Details</title>


<link href="http://localhost/COLS1/templatemo_style.css" rel="stylesheet" type="text/css" />
<script src="http://localhost/COLS1/jQuery/jquery.js"></script>
<link rel="stylesheet" href="http://localhost/COLS1/nivo-slider.css" type="text/css" media="screen" />

<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}

</script>

 <script type="text/javascript">
       $(document).ready(function() {
           $(".delete").click(function() {
                var conf = confirm("Are you sure you want to delete this employee?");
                if(conf) {
                    window.location.href='http://localhost/COLS1/pages/delete.php';
                    return true;
                } else {
                    window.location.href ="http://localhost/COLS1/pages/modify.php";
                    return false;
                }
           });
       });

   </script>
      

  
<link rel="stylesheet" type="text/css" href="http://localhost/COLS1/ddsmoothmenu.css" />

<script type="text/javascript" src="http://localhost/COLS1/js/jquery.min.js"></script>
<script type="text/javascript" src="http://localhost/COLS1/js/ddsmoothmenu.js">

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
            
             <li><a href="http://localhost/COLS1/pages/plogout.php" class="selected">Log out</a>   
            </li>
          
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
	<a href="http://localhost/COLS1/pages/Mstaff.php"><button style="margin-left:-180px; ">Back</button></a>
    	<form method="post">
		<table>
		<tr><td style="color:#ff10cc;">Search:</td><td><select name="search" ><option value=""></option><option value="department">Department</option><option value="staffno">Staff No:</option></select></td><td><input type="submit" name="go" value="Go"></td></tr>
		</table> 
		</form>
		
	<?php


echo "<table border=1>";
echo "<td>First Name</td><td>Middle Name </td><td>Last Name</td><td>Staff No</td><td>Department</td><td>Position</td><td>Adress</td><td>Email</td><td>Telephone Number</td><td>Actions</td>";
do{
$q1=mysql_query("select *from departments where deptID='{$results['departmentId']}'");
$a=mysql_fetch_array($q1);
		echo "<tr>";
			echo "<td>".$results['Fname']."</td><td>".$results['Mname']."</td><td>".$results['Lname']."</td><td>".$results['staffno']."</td><td>".$a['deptName']."</td><td>".$results['position']."</td><td>".$results['address']."</td><td>".$results['email']."</td><td>".$results['telephone']."</td><td>
        <a href=http://localhost/COLS1/pages/edit1.php?id=".$results['Id'].">Edit</a>&nbsp;&nbsp;&nbsp;
        <a href=delete.php?id=".$results['Id']." class='delete' >Delete</a></td>";
		echo "</tr>";
}while($results=mysql_fetch_assoc($q));

echo "</table>";

?>
<table style="margin-left:-200px; margin-top:-200px; margin-bottom:200px;">
	<tr><td><a href="http://localhost/COLS1/register.php"><button>New staff</button></a></td></tr>
	<tr><td><a href="http://localhost/COLS1/pages/modify.php"><button> Modify staff details</button> </a></td></tr>
	<tr><td><a href="http://localhost/COLS1/pages/password.php"><button>change password</button></a></td></tr>
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
    	Copyright &copy 2016 <a href="#">ONLINE LEAVE APPLICATION</a> | Designed by Francis Mwakidoshi
    </div>
</div>

</body>
</html>
<?php
ob_end_flush();
?>