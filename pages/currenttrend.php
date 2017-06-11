<?php
session_start();
$id=$_SESSION['deptID'];
include_once($_SERVER['DOCUMENT_ROOT'].'/COLS1/dbconnect/dbconnect.php');



?>
<html>
<head>

<title>Check leave trend</title>

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
 <form method="post">
	<table>
	<tr>
	<td>Select Month:</td><td><select name="month"><option value="jan">January</option><option value="feb">February</option><option value="march">March</option><option value="april">April</option><option value="may">May</option><option value="june">June</option><option value="july">July</option><option value="aug">August</option><option value="sept">September</option><option value="oct">october</option><option value="nov">November</option><option value="dec">December</option></select></td>
	<td><input type="submit" name="go" value="Go"></td>
	</tr>
	</table>
	</form>
	<?php
	@$month=$_POST['month'];
   @$go=$_POST['go'];
   if(isset($go)){
   	if(@$month==jan){
		$q=mysql_query("select *from leavedetails where startDate like '%-01-%'");
		$arr=mysql_fetch_array($q);
		do{
			$detail=mysql_query("select *from staff where Id='{$arr['staffID']}'");
			$row=mysql_fetch_array($detail);
			if($row['departmentId']==$id){
				echo "<table border='1'><th>Staff No</th><th>Start Date</th><th>End Date</th><tr><td>".$row['staffno']."</td><td>".$arr['startDate']."</td><td>".$arr['endDate']."</td></tr></table>";
			}else{
				echo "Nobody on leave this month";
			}
		}while($arr=mysql_fetch_array($q));
	}
		if($month==feb){
		$q=mysql_query("select *from leavedetails where startDate like '%-02-%'");
		$arr=mysql_fetch_array($q);
		do{
			$detail=mysql_query("select *from staff where Id='{$arr['staffID']}'");
			$row=mysql_fetch_array($detail);
			if($row['departmentId']==$id){
				echo "<table border='1'><th>Staff No</th><th>Start Date</th><th>End Date</th><tr><td>".$row['staffno']."</td><td>".$arr['startDate']."</td><td>".$arr['endDate']."</td></tr></table>";
			}else{
				echo "Nobody on leave this month";
			}
		}while($arr=mysql_fetch_array($q));
	}
		if($month==march){
		$q=mysql_query("select *from leavedetails where startDate like '%-03-%'");
		$arr=mysql_fetch_array($q);
		do{
			$detail=mysql_query("select *from staff where Id='{$arr['staffID']}'");
			$row=mysql_fetch_array($detail);
			if($row['departmentId']==$id){
				echo "<table border='1'><th>Staff No</th><th>Start Date</th><th>End Date</th><tr><td>".$row['staffno']."</td><td>".$arr['startDate']."</td><td>".$arr['endDate']."</td></tr></table>";
			}else{
				echo "Nobody on leave this month";
			}
		}while($arr=mysql_fetch_array($q));
	}
		if($month==april){
		$q=mysql_query("select *from leavedetails where startDate like '%-04-%'");
		$arr=mysql_fetch_array($q);
		do{
			$detail=mysql_query("select *from staff where Id='{$arr['staffID']}'");
			$row=mysql_fetch_array($detail);
			if($row['departmentId']==$id){
				echo "<table border='1'><th>Staff No</th><th>Start Date</th><th>End Date</th><tr><td>".$row['staffno']."</td><td>".$arr['startDate']."</td><td>".$arr['endDate']."</td></tr></table>";
			}else{
				echo "Nobody on leave this month";
			}
		}while($arr=mysql_fetch_array($q));
	}	if($month==may){
		$q=mysql_query("select *from leavedetails where startDate like '%-05-%'");
		$arr=mysql_fetch_array($q);
		do{
			$detail=mysql_query("select *from staff where Id='{$arr['staffID']}'");
			$row=mysql_fetch_array($detail);
			if($row['departmentId']==$id){
				echo "<table border='1'><th>Staff No</th><th>Start Date</th><th>End Date</th><tr><td>".$row['staffno']."</td><td>".$arr['startDate']."</td><td>".$arr['endDate']."</td></tr></table>";
			}else{
				echo "Nobody on leave this month";
			}
		}while($arr=mysql_fetch_array($q));
	}	if($month==june){
		$q=mysql_query("select *from leavedetails where startDate like '%-06-%'");
		$arr=mysql_fetch_array($q);
		do{
			$detail=mysql_query("select *from staff where Id='{$arr['staffID']}'");
			$row=mysql_fetch_array($detail);
			if($row['departmentId']==$id){
				echo "<table border='1'><th>Staff No</th><th>Start Date</th><th>End Date</th><tr><td>".$row['staffno']."</td><td>".$arr['startDate']."</td><td>".$arr['endDate']."</td></tr></table>";
			}else{
				echo "Nobody on leave this month";
			}
		}while($arr=mysql_fetch_array($q));
	}	if($month==july){
		$q=mysql_query("select *from leavedetails where startDate like '%-07-%'");
		$arr=mysql_fetch_array($q);
		do{
			$detail=mysql_query("select *from staff where Id='{$arr['staffID']}'");
			$row=mysql_fetch_array($detail);
			if($row['departmentId']==$id){
				echo "<table border='1'><th>Staff No</th><th>Start Date</th><th>End Date</th><tr><td>".$row['staffno']."</td><td>".$arr['startDate']."</td><td>".$arr['endDate']."</td></tr></table>";
			}else{
				echo "Nobody on leave this month";
			}
		}while($arr=mysql_fetch_array($q));
	}	if($month==aug){
		$q=mysql_query("select *from leavedetails where startDate like '%-08-%'");
		$arr=mysql_fetch_array($q);
		do{
			$detail=mysql_query("select *from staff where Id='{$arr['staffID']}'");
			$row=mysql_fetch_array($detail);
			if($row['departmentId']==$id){
				echo "<table border='1'><th>Staff No</th><th>Start Date</th><th>End Date</th><tr><td>".$row['staffno']."</td><td>".$arr['startDate']."</td><td>".$arr['endDate']."</td></tr></table>";
			}else{
				echo "Nobody on leave this month";
			}
		}while($arr=mysql_fetch_array($q));
	}	if($month==sept){
		$q=mysql_query("select *from leavedetails where startDate like '%-09-%'");
		$arr=mysql_fetch_array($q);
		do{
			$detail=mysql_query("select *from staff where Id='{$arr['staffID']}'");
			$row=mysql_fetch_array($detail);
			if($row['departmentId']==$id){
				echo "<table border='1'><th>Staff No</th><th>Start Date</th><th>End Date</th><tr><td>".$row['staffno']."</td><td>".$arr['startDate']."</td><td>".$arr['endDate']."</td></tr></table>";
			}else{
				echo "Nobody on leave this month";
			}
		}while($arr=mysql_fetch_array($q));
	}	if($month==oct){
		$q=mysql_query("select *from leavedetails where startDate like '%-10-%'");
		$arr=mysql_fetch_array($q);
		do{
			$detail=mysql_query("select *from staff where Id='{$arr['staffID']}'");
			$row=mysql_fetch_array($detail);
			if($row['departmentId']==$id){
				echo "<table border='1'><th>Staff No</th><th>Start Date</th><th>End Date</th><tr><td>".$row['staffno']."</td><td>".$arr['startDate']."</td><td>".$arr['endDate']."</td></tr></table>";
			}else{
				echo "Nobody on leave this month";
			}
		}while($arr=mysql_fetch_array($q));
	}	if($month==nov){
		$q=mysql_query("select *from leavedetails where startDate like '%-11-%'");
		$arr=mysql_fetch_array($q);
		do{
			$detail=mysql_query("select *from staff where Id='{$arr['staffID']}'");
			$row=mysql_fetch_array($detail);
			if($row['departmentId']==$id){
				echo "<table border='1'><th>Staff No</th><th>Start Date</th><th>End Date</th><tr><td>".$row['staffno']."</td><td>".$arr['startDate']."</td><td>".$arr['endDate']."</td></tr></table>";
			}else{
				echo "Nobody on leave this month";
			}
		}while($arr=mysql_fetch_array($q));
	}	if($month==dec){
		$q=mysql_query("select *from leavedetails where startDate like '%-12-%'");
		$arr=mysql_fetch_array($q);
		do{
			$detail=mysql_query("select *from staff where Id='{$arr['staffID']}'");
			$row=mysql_fetch_array($detail);
			if($row['departmentId']==$id){
				echo "<table border='1'><th>Staff No</th><th>Start Date</th><th>End Date</th><tr><td>".$row['staffno']."</td><td>".$arr['startDate']."</td><td>".$arr['endDate']."</td></tr></table>";
			}else{
				echo "Nobody on leave this month";
			}
		}while($arr=mysql_fetch_array($q));
	}
   }
	?>
	
    </div>
    
    <div id="sidebar">
    	
    </div> <!-- end of sidebar -->
    
    <div class="cleaner"></div>
</div>

<div id="templatemo_footer_wrapper">
	<div id="templatemo_footer">
    	<div class="col_3">
        	<a href="leaves.php"><button> Back</button></a>
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