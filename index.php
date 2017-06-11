<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ONLINE LEAVE APPLICATION SYSTEM </title>

<link href="templatemo_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="css/orman.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />	

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

<link rel="stylesheet" href="css/slimbox2.css" type="text/css" media="screen" /> 
<script type="text/JavaScript" src="js/slimbox2.js"></script> 
  
</head>
<body>

<div id="templatemo_menu_wrapper">
    <div id="templatemo_menu" class="ddsmoothmenu">
        <ul>
            <li><a href="index.php" class="selected">Home</a></li>
            
            <!--<li><a href="#">Application policy</a></li>-->
          
        </ul>
        <br style="clear: left" />
    </div> 
</div> 

<div id="templatemo_header_wrapper">
    <div id="templatemo_header" class="header_home">
        <div id="templatemo_sitetitle_bar">
            <div id="site_title"><h1><a href="#"></a></h1></div>
            <div id="templatemo_search">
               
            </div>
            <div class="cleaner"></div>
        </div>
        <div id="templatemo_mid">
            <div id="slider-wrapper">
        
                <div id="slider" class="nivoSlider">
                    <img src="images/slider/01.jpg" alt="Model 1" title="Apply for leave online." />
                    <a href="#"><img src="images/slider/02.jpg" alt="Model 2" title="Martenity leave and partenity leave." /></a>
                    <img src="images/slider/03.jpg" alt="Model 3" />
                    <img src="images/slider/04.jpg" alt="Model 4" title="leave approval folder." />
                </div>
                
            
            </div>
                <script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
				<script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
                <script type="text/javascript">
                $(window).load(function() {
                    $('#slider').nivoSlider({
                        controlNav:false,
                     directionNavHide: false
                    });
                });
                </script>
    
            <div id="mid_left">
                <div id="mid_title">
                    Online leave application system allows workers to apply for leave online and forward for approval by their respective CEOs,managers or "BOSS" and by the personel officer. </div>
                <div id="learn_more"><a href="#"></a></div>
            </div>
            <div class="cleaner"></div>
            
        </div>
    </div> 
</div> 

<div id="templatemo_main">
<!--<image src="images/arrow.png" id="img"></image> -->
<table border="2px">
<tr>
<td><img src="http://localhost/COLS1/images/button.png"></img></td><td width="100px">
<a href="http://localhost/COLS1/pages/stafflogin.php">Staff</a></td>
 <td><img src="http://localhost/COLS1/images/button.png"></img></td>
<td width="200px" ><a href="http://localhost/COLS1/pages/personellogin.php">Personel Officer</a></td><td><img src="http://localhost/COLS1/images/button.png"></img></td>
<td width="200px"><a href="http://localhost/COLS1/pages/HODlogin.php">Head of Department</a></td>
</tr>
</table>

	<div class="col_3 fp_rp">
    	
    </div>
    <div class="cleaner"></div>
</div>

<div id="templatemo_footer_wrapper">
	<div id="templatemo_footer">
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
<?php
ob_end_flush();
?>