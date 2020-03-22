<?php
$con= mysqli_connect("localhost", "root", "", "db")or die(mysqli_errno($con));
$querry2='select * from tab where partner like "%gou@gmail.com%"';
$res2= mysqli_query($con, $querry2)or die(mysqli_error($con));
while($out2=mysqli_fetch_array($res2)){

    echo $out2[2];
}
    

?>