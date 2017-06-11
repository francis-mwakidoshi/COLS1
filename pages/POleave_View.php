<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT'].'/COLS1/dbconnect/dbconnect.php');
			
$query="SELECT Fname,Lname,Mname,deptName,leavedetails.Id,staffID, (SELECT COUNT(*) FROM leavedetails WHERE staffID=staff.Id) AS count FROM leavedetails,staff,departments WHERE staff.Id = leavedetails.staffID AND departments.deptID = staff.departmentId ";
//$query.=" WHERE Id IN(SELECT DISTINCT staffID FROM leavedetails)";
//die($query);
$result=mysql_query($query) or die(mysql_error());
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
		  <li><a href="http://localhost/COLS1/pages/personellogin.php" class="selected">Log out</a>  </li>
          
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
<!--<form method="post">
		<table>
		<tr><td style="color:#ff10cc;">Search:</td><td><select name="search" ><option value=""></option><option value="department">Department</option><option value="staffno">Staff No:</option><option value="month">Month:</option><option value="leavetype">Leave Type:</option></select></td><td><input type="submit" name="go" value="Go"></td></tr>
		</table> 
		</form>
		<?php
		$go=$_POST['go'];
		$value=$_POST['search'];
		if(isset($go)){
			if($value==department){
			$q=mysql_query('select *from departments')or die(mysql_error());
			$row2=mysql_fetch_array($q);
	          ?>
	                <form method="post">
					<label>Enter Department:</label>
					<select name="dept">
					<?php 
					do{
					?>
                      <option value="<?php echo $row2['deptID'];?>"><?php echo $row2['deptName'];?></option>
                     <?php
					 }while($row2=mysql_fetch_array($q));
					 ?>
		             </select>
					 <input type="submit" name="submit"value="Go">
					</form>
	            <?php
				$dept1=$_POST['dept'];
				if(isset($_POST['submit'])){
					if($dept1=='1'){
				
                      ?>

					  
					  <?php
					}
				}
			}elseif($value==staffno){
				?>
				<form method="post">
					<label>Enter staffno:</label>
					<input type="text" name="staffN" value="">
					<input type="submit" name="submit"value="Go">
					</form>
				<?php
			}elseif($value==month){?>
			<form method="post">
			<table>
			<tr>
			<td>Select Month:</td><td><select name="month"><option value=""></option><option value="jan">January</option><option value="feb">February</option><option value="march">March</option><option value="april">April</option><option value="may">May</option><option value="june">June</option><option value="july">July</option><option value="aug">August</option><option value="sept">September</option><option value="oct">october</option><option value="nov">November</option><option value="dec">December</option></select></td>
			<td><input type="submit" name="go" value="Go"></td>
			</tr>
			</table>
			</form>
	        <?php
			}elseif($value==leavetype){
			
	          $q1=mysql_query('select *from leavecategory')or die(mysql_error());
			$row1=mysql_fetch_array($q1);
	          ?>
	                <form method="post">
					<label>Enter Department:</label>
					<select name="dept">
					<?php 
					do{
					?>
                      <option value="<?php echo $row1['leaveID'];?>"><?php echo $row1['category'];?></option>
                     <?php
					 }while($row1=mysql_fetch_array($q1));
					 ?>
		             </select>
					 <input type="submit" name="submit"value="Go">
					</form>
			<?php
			}
		}
		?>
		-->
<table border=1>
<th>Name</th>
<th>Staff No:</th>
<th>Department</th>
<th>No. of Applications</th>
<th>View Leave</th>
<?php while($row=mysql_fetch_array($result)):?>
<tr>
<td><?php echo $row['Fname']." ".$row['Mname']. " ". $row['Lname'];?></td>
<td><?php echo  $row['staffID'];?></td>
<td><?php echo  $row['deptName'];?></td>
<td><?php echo $row['count'];?></td>
<td><a href="POapproval.php?no=<?php echo $row['Id']."& app= ".$row['count']."& staff_id= ".$row['staffID'];?>">Check</a></td>
</tr>
<?php endwhile;?>
</table>
    </div>
    
    <div id="sidebar">
    	
    </div> <!-- end of sidebar -->
    
    <div class="cleaner"></div>
</div>

<div id="templatemo_footer_wrapper">
	<div id="templatemo_footer">
    	<div class="col_3">
        	<a href="http://localhost/COLS1/pages/approvals.php"><button >Back</button></a>
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