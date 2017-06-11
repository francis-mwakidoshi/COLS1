<?php
$id=$_GET['id'];
include($_SERVER['DOCUMENT_ROOT']."/COLS1/dbconnect/dbconnect.php");

$q=mysql_query("delete from staff where Id='$id'");
header('Location:http://localhost/COLS1/pages/modify.php');


?>