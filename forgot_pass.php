<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if(isset($_POST['email'])){
   
 $con= mysqli_connect("localhost", "root", "", "db")or die(mysqli_errno($con));
   $querry="select * from user";
        $res= mysqli_query($con, $querry)or die(mysqli_errno($con));
           $email=$_POST['email'];
           $count= mysqli_num_rows($res);
        $i=0;
        $f=0;
        while($i!=$count)
        {   $out= mysqli_fetch_array($res)or die(mysqli_errno($con));
       
            if($email==$out['username'])
        {       
           $pass=$out['password'];
                $f=1;
      }
     
                $i++;
}
if($f==1){    
            require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
 $mail = new PHPMailer;
 $mail->IsSMTP();       
 $mail->Host = 'tls://smtp.gmail.com:587';   
 $mail->Port = 587;       
 $mail->SMTPAuth = true;      
 $mail->Username = 'goutham.n@vitap.ac.in';    
 $mail->Password = 'gnq316gnq316';     
 $mail->SMTPSecure = 'tls';      
 $mail->From = 'gouthamnatarajancric@gmail.com';   
 $mail->FromName = 'Goutham Natarajan';   
 $mail->AddAddress($email, 'Goutham');  
 $mail->WordWrap = 50;      
 $mail->IsHTML(true);              
 $mail->Subject = 'Password Details|UR-BOARD';   
 $mail->Body = 'Your password is '.$pass;
 if($mail->Send())        
 {
     
    header('location: login.php?msg=Password sent to your registered mail');
  $message = 'ok';
 
 }
 else
 { header('location: forgot_pass.php?msg=Unexpected error try again :(');
 
 }
 echo $message;
 }
           else{
                header('location: forgot_pass.php?msg=No record found with given email address :(');
           }

        }



 ?>
<html>
    <head>
        <title></title>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
         <link type='text/css' href='newcss.css' rel='stylesheet'>
    </head>
    <body class="background-img">
             
               
            <nav class="navbar navbar-inverse">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#stu">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="login.php" class="navbar-brand">UR-BOARD</a>
                    </div>
                    <div class="collapse navbar-collapse" id="stu">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="https://www.linkedin.com/in/goutham-natarajan-777bb118a/"><span class="glyphicon glyphicon-user"></span> About Us</a></li>
              
                    </ul>
                        </div>
                    
                </div>
         
                
            </nav>
        
        <div class="container">
            
            <div class="row ">
                <div class="col-xs-4 col-xs-offset-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h5>FORGOT PASSWORD</h5>
                        </div>
                        <form method="post">
                        <div class="panel-body">
                            <input type="email" class="form-control" name="email" placeholder="Registered email address">
                          
                            
                       
                            <br>
                            <div>
                            <button class="btn btn-primary">Submit</button>
                            <?php if(isset($_GET['msg'])){ echo '<br><p style="color:red">'.$_GET['msg'].'</p>';} ?>
                            </div>
                        </div>
                            </form>
                    </div>
                </div>
            </div>
        </div> 
        
             <footer>
            <div class="container">
                <center>
                    <p>Copyright © VIT-AP. All Rights Reserved | Contact Us: +919340554408</p>
                </center>
            </div>
        </footer>

    </body>
</html>