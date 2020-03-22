<?php
 $x=$_REQUEST['type'];
 $iparr = explode ("%", $x); 
 $con= mysqli_connect("localhost", "root", "", "db")or die(mysqli_errno($con));
$querry='alter table tab add '.$iparr[0].'  varchar(100)';
$res= mysqli_query($con, $querry)or die(mysqli_error($con));
echo '<div class="column is-12-tablet is-6-desktop is-3-widescreen">
    <div class="notification is-primary has-text">
      <p id="plan'.$iparr[1].'" class="title is-1">'.$iparr[0].'</p>
<div class="subtitle is-4">
      <input class="input" id="sub_input'.$iparr[1].'" type="text" />
          <br>
      <button id="add_sub'.$iparr[1].'" class="button is-small is-danger is-outlined" onclick="s('.$iparr[1].')">ADD</button>
        </div>
<p class="subtitle is-4" id="sub'.$iparr[1].'"></p>
   
</div>
     <button id="save'.$iparr[1].'" class="button is-small is-danger is-outlined" onclick="f('.$iparr[1].')" style="padding-left:-50px">Save</button> 
  </div>
  ' ;
?>

