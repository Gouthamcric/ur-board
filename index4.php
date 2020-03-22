<?php

session_start();
$x=$_REQUEST['type'];
 $con= mysqli_connect("localhost", "root", "", "db")or die(mysqli_errno($con));
        $querry='update tab set partner=concat(partner,"'.$x.'") where username="'.$_SESSION['id'].'"';
        $res= mysqli_query($con, $querry)or die(mysqli_errno($con));

?>