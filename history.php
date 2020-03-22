<?php
session_start();
if(!isset($_SESSION['id'])){
   
header('location: login.php?msg=kindly sign in first');
exit;
}
else
{ $now = time();
 if ($now > $_SESSION['expire']) {
    
            session_unset();
             session_destroy();
            echo "Your session has expired! <a href='login.php'>Login here</a>";
        }
        else {
?>
<html>
    <head>
        <title></title>
           <link rel='stylesheet' type='text/css' href='style.css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css"/>
    <script defersrc="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    </head>
    <body style="text-align: center;font-family: arial;font-size:24px" class="background-img">
         
<nav class="navbar is-light" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="https://bulma.io">
      <img src="logo.png" width="112" height="28">
    </a>

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="index.php">
        Home
      </a>

      <a class="navbar-item">
        Documentation
      </a>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          More
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item">
            About
          </a>
          <a class="navbar-item">
            Contact
          </a>
          <hr class="navbar-divider">
          <a class="navbar-item">
            Report an issue
          </a>
        </div>
      </div>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-primary" href="group.php">
            <strong>Group Board</strong>
          </a>
          <a class="button is-warning" href="index.php">
            Personal Borad
          </a>
            <a href="logout.php" class="button is-danger">
            Logout
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>
<?php

 $con= mysqli_connect("localhost", "root", "", "db")or die(mysqli_errno($con));
$querry="select count(*) from tab";
 $res= mysqli_query($con, $querry)or die(mysqli_error($con));
 
 $out=mysqli_fetch_array($res);
 $querry2='select * from tab where username="'.$_SESSION['id'].'"';
 $res2= mysqli_query($con, $querry2)or die(mysqli_error($con));
 
 $query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'db' AND TABLE_NAME = 'tab'";
$res3= mysqli_query($con, $query)or die(mysqli_error($con));
while($row = $res3->fetch_assoc()){
    $result[] = $row;
}
$columnArr = array_column($result, 'COLUMN_NAME');
$count=1;
$s=sizeof($columnArr);
if($s>1){
 while($out2=mysqli_fetch_array($res2)){
     
     for($i=3;$i<$s;$i++){
     if($out2[$i]!=NULL){   
    echo "<br><h1 style='font-size:large;color:red;font-weight:bold'>".$count.".".$columnArr[$i]."</h1><br>";   
    $iparr = explode ("*", $out2[$i]); 
    $count++;
       for($j=0;$j<sizeof($iparr);$j++){ if($j!=0){ echo  "".($j).".".$iparr[$j]."<br>";}}}
     }
}}
else{echo "Nothing to display :(";}
?>

    </body>
</html> 
<?php 
}}
?>