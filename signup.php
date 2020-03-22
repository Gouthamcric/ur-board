<?php
if(isset($_POST['email'])){
    $con= mysqli_connect("localhost", "root", "", "db")or die(mysqli_errno($con));

     //   $out= mysqli_fetch_array($res)or die(mysqli_errno($con));
        $email=$_POST['email'];
        $pass=$_POST['password'];
        $repass=$_POST['password2'];
        if($pass!=$repass)
        {
            header('location: signup.php?msg=password not matched');
        }
               else{ $querry='insert into user(username,password) values("'.$email.'","'.$pass.'")';
        $res= mysqli_query($con, $querry)or die(mysqli_errno($con));
               header('location: login.php?msg=successfully signed up');}
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
                            <h5>SIGN-IN</h5>
                        </div>
                        <form method="post">
                        <div class="panel-body">
                            <div>
							<label style="color: black">Email ID</label>
							<input type="email" class="form-control"
								name="email" placeholder="Email ID">
						</div>
						<div>
							<label style="color: black">Password (6 or more characters)</label>
							<input type="password" class="form-control" name="password" placeholder="password" required="true">
						</div>
						<div>
							<label style="color: black">Re-enter Password</label>
							<input type="password" name="password2" class="form-control" placeholder="re-password" required="true">
						</div>
                            <br>
                            <button class="btn btn-danger">Sign Up</button>
                            <?php if(isset($_GET['msg'])){ echo '<br><p style="color:red">*'.$_GET['msg'].'*</p>';} ?>
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