<?php
$msg=null;
$id=$_GET['id'];
@$Fname=$_POST['fname'];
@$Mname=$_POST['mname'];
@$Lname=$_POST['lname'];
@$staff=$_POST['staffn'];
@$dept=$_POST['dept'];

@$position=$_POST['pstn'];
@$address=$_POST['address'];
@$email=$_POST['mail'];
@$tel=$_POST['telno'];

@$update=$_POST['update'];

include($_SERVER['DOCUMENT_ROOT']."/COLS1/dbconnect/dbconnect.php");

if(isset($_POST['update'])){
	foreach($_POST as $key=>$value)
	{
		$$key=$value;
	}
	//validation
	if(empty($Fname)||empty($Mname)||empty($Lname)||empty($staff)||empty($dept)||empty($position)||empty($address)||empty($email)||empty($tel))
	{
		$mgs.="Please fill in all the details";
	}
	else{
		$update=mysql_query("UPDATE staff SET Fname='$Fname',Mname='$Mname',Lname='$Lname',staffno='$staff',departmentId='$dept',position='$position',address='$address',email='$email',telephone='$tel' WHERE Id='$id'")or die(mysql_error());
		if($update)
		{
			header('Location:http://localhost/COLS1/pages/modify.php');
		}else{
            echo "an error occured while updating";
        }
	}
	
	
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit staff details</title>


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

function myFunction() {
    alert("successful updated")
}


   </script>
      

  
<link rel="stylesheet" type="text/css" href="http://localhost/COLS1/ddsmoothmenu.css" />

<script type="text/javascript" src="http://localhost/COLS1/js/jquery.min.js"></script>
<script type="text/javascript" src="http://localhost/COLS1/js/ddsmoothmenu.js">



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
                <form action="#" method="get">
    <input type="text" value="" name="keyword" id="keyword" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
    <input type="submit" name="Search" value="" alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
                </form>
            </div>
            <div class="cleaner"></div>
        </div>
    </div> <!-- end of header -->
</div> <!-- end of header_wrapper -->

<div id="templatemo_main">
	
    <div id="content">
<?php
$q=mysql_query("select * from staff where Id='$id'");
$result=mysql_fetch_assoc($q);


$sql="SELECT * FROM departments";
$departments=mysql_query($sql);
?>
<h3> Edit Staff Details</h3> 
		<form method="post" action="">
		<table >
		<tr >
		<td style="width:100px;"><label>First Name:</label></td><td>
		<input type="text" name="fname" value="<?php echo $result['Fname']; ?>"></td>
		<td style="width:100px;"><label>Middle Name:</label></td>
		<td><input type="text" name="mname" value="<?php echo $result['Mname']; ?>"></td>
		<td style="width:100px;"><label>Last Name:</label></td>
		<td><input type="text" name="lname" value="<?php echo $result['Lname']; ?>"></td>
		</tr>
		<tr>
		<td><label>Staff No:</label></td><td>
		<input type="text" name="staffn" value="<?php echo $result['staffno']; ?>"></td>
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
		<td><label>Position:</label></td><td><input type="text" name="pstn" value="<?php echo $result['position']; ?>"></td>
		</tr>
		<tr>
		<td><label>Address:</label></td><td><input type="text" name="address" value="<?php echo $result['address']; ?>"></td>
		</tr>
		<tr>
		<td><label>Email:</label></td><td><input type="text" name="mail" value="<?php echo $result['email']; ?>"></td>
		</tr>
		<tr>
		<td><label>Telephone No:</label></td><td><input type="text" name="telno" value="<?php echo $result['telephone']; ?>"></td>
		</tr>
		
		<tr>
		<td><input type="submit" name="update" value="Update" onclick="myFunction()"></td><td><input type="reset" name="reset" value="Reset"></td>
		</tr>
		</table>
		
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
<?php
ob_end_flush();
?>