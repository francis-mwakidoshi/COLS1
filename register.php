<?php
session_start();
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
@$msg=NULL;
$error=NULL;
include_once('dbconnect/dbconnect.php');
$Qinsert="INSERT INTO staff(Fname,Mname,Lname,staffno,departmentId,gender,position,address,email,telephone,username,password) VALUES('$Fname','$Mname','$Lname','$staff','$dept','$gender','$position','$address','$email','$tel','$Uname','$Pswd')";

if(isset($register)){
foreach($_POST as $key=>$value)
			     {
			         $$key=$value;
			     }
	   				if((empty($Fname))||(empty($Mname))||(empty($Lname))||(empty($staff))||(empty($dept))||(empty($gender))||(empty($position))||(empty($address))||(empty($email))||(empty($tel))||(empty($Uname))||(empty($Pswd)))
					   {
					    $error.="<p style=\"color:#e79258\">Fill all the fields </p>"; 	
					   }
					else{
      
                    mysql_query($Qinsert);
					$msg.="<p style=\"color:#e79258\">Staff  Successfully registered.</p>";
					session_destroy();
					}
}
	
$sql="SELECT * FROM departments";
$departments=mysql_query($sql);

?>
<html>
<head>
<meta />
<title>Register Staff</title>

<link href="templatemo_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen" />

<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>

<link rel="stylesheet" type="text/css" href="ddsmoothmenu.css" />

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
            
			<li><a href="http://localhost/COLS1/pages/plogout.php" class="selected">Log out</a> </li> 
                
            
          
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
	<a href="http://localhost/COLS1/pages/Mstaff.php"><button style="margin-left:-180px; ">Back</button></a>
	
	
    	<h3> STAFF REGISTRATION PAGE</h3> 
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
		<table >
		<tr >
		<td style="width:100px;"><label ">First Name:</label></td><td><input type="text" name="fname" value="" pattern="^[A-Z][a-zA-Z -]+$"></td><td style="width:100px;"><label>Middle Name:</label></td><td><input type="text" name="mname" value=""></td>
		<td style="width:100px;"><label>Last Name:</label></td><td><input type="text" name="lname" value=""></td>
		</tr>
		<tr>
		<td><label>Staff No:</label></td><td><input type="text" name="staffn" value=""></td>
		</tr>
		<tr>
		<td><label>Department:</label></td>
		<td>
		<select name="dept">
	    <?php while($row=mysql_fetch_array($departments)):?>
        <option value="<?php echo $row['deptID'];?>"><?php echo $row['deptName'];?></option>
        <?php endwhile;?>
	   </select>
	     </td>
		</tr>
		<tr>
		<td><label>Gender:</label></td><td><select name="gender">
		<option  value=""></option>
		<option  value="female"> Female</option>
		<option  value="male"> Male</option>
		</select></td>
		</tr>
		<tr>
		<td><label>Position:</label></td><td><input type="text" name="pstn" value=""></td>
		</tr>
		<tr>
		<td><label>Address:</label></td><td><input type="text" name="address" value=""></td>
		</tr>
		<tr>
		<td><label>Email:</label></td><td><input type="text" name="mail" value="" pattern="^[a-zA-Z][0-9A-Za-z_]+(.[0-9A-Za-z_]+)*@[0-9A-Za-z_]+(.[0-9a-zA-Z]+)*.[a-zA-Z]{2,4}$"></td>
		</tr>
		<tr>
		<td><label>Telephone No:</label></td><td><input type="text" name="telno" value=""></td>
		</tr>
		
		<tr>
		<td><label>Username:</label></td><td><input type="text" name="uname" value=""></td>
		</tr>
		<tr>
		<td><label>Password:</label></td><td><input type="text" name="pswd" value=""></td>
		</tr>
		<tr>
		<td><input type="submit" name="register" value="Register"></td><td><input type="reset" name="reset" value="Reset"></td>
		</tr>
		</table>
		
		</form>
	<table style="margin-left:-200px; margin-top:-300px; margin-bottom:300px;">
	<tr><td><a href="http://localhost/COLS1/register.php"><button>New staff</button></a></td></tr>
	<tr><td><a href="http://localhost/COLS1/pages/modify.php"><button> Modify staff details</button> </a></td></tr>
	<tr><td><a href="http://localhost/COLS1/pages/password.php"><button>change password</button></a></td></tr>
	</table>
    </div>
    <div class="col_2 float_l">
	
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