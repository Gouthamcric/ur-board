<?php
session_start();
echo $_SESSION['id'];
 $x=$_REQUEST['type'];
 $iparr = explode ("%", $x);
 $con= mysqli_connect("localhost", "root", "", "db")or die(mysqli_errno($con));
 
$querry='insert into tab('.$iparr[1].',username,partner) values("'.$iparr[0].'","'.$_SESSION['id'].'","'.$_SESSION['id'].'")';
$res= mysqli_query($con, $querry)or die(mysqli_error($con));
?>
