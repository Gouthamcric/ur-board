
<!DOCTYPE html>
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
    <link rel="stylesheet" type="text/css" href="newcss.css">
    
   <script type="text/javascript">
     
    $(document).ready(function(){
       var i=1;
           $('#add').click(function(){
      
        var type=$('#add_input').val()+"%"+i;
  //    var type=document.getElementById('mydiv3').value;
     $('#add_input').replaceWith('<input class="input" id="add_input" type="text" />');
        $.ajax({
                     url:"index2.php",
                     method:"POST",
                     data:{type:type},
                     dataType:"text",
                     success:function(data)
                      {
                        $('#mydiv3').append(data);
                      }
                     });
    i++;
    });
       $('#add2').click(function(){
      
        var type=$('#add_input2').val();
  //    var type=document.getElementById('mydiv3').value;
     $('#add_input2').replaceWith('<input class="input" id="add_input2" type="text" />');
        $.ajax({
                     url:"index4.php",
                     method:"POST",
                     data:{type:type},
                     dataType:"text",
                     success:function(data)
                      {
                        alert(type+" added");
                      }
                     });
    i++;
    });
    });
    </script>
    </head>
    <body>
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
      <a class="navbar-item">
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
          
          <a class="button is-warning" href="index.php">
            Personal Borad
          </a>
            
            <a href="ghistory.php" class="button is-black">
            Group History
          </a>
            
            <a href="logout.php" class="button is-danger">
            Logout
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>
    <div class="columns">
          <div class="column is-three-quarters">
            <div class="card">
              <div class="card-content">
              
                  <div class="level">
                    <!-- Left side -->
                    <div class="level-left is-marginless">
                      <div class="level-item">
                        <p class="number">1</p>
                        Plan Name
                      </div>
                    </div>

                    <!-- Right side -->
                    <div class="level-right">
                      <div class="level-item">
                        <div class="field">
                          <div class="control has-icons-left ">
                            <input class="input" id="add_input" type="text" />
                            <span class="icon is-small is-left">
                              <i class="fa fa-dollar-sign"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                  <div class="control">
                    <button id="add" class="button is-large is-fullwidth is-primary is-outlined" required="true"  >
                      +
                    </button>
                  </div>
                  </div>
              </div>
                </div>
          <div class="column is-three-quarters">
            <div class="card">
              <div class="card-content">
              
                  <div class="level">
                    <!-- Left side -->
                    <div class="level-left is-marginless">
                      <div class="level-item">
                        <p class="number">2</p>
                        Add Member
                      </div>
                    </div>

                    <!-- Right side -->
                    <div class="level-right">
                      <div class="level-item">
                        <div class="field">
                          <div class="control has-icons-left ">
                            <input class="input" id="add_input2" type="text" />
                            <span class="icon is-small is-left">
                              <i class="fa fa-dollar-sign"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                  <div class="control">
                    <button id="add2" class="button is-large is-fullwidth is-primary is-outlined" required="true"  >
                      +
                    </button>
                  </div>
                  </div>
              </div>
                </div>
              
          </div>     
          </div>
        
        
    </div>
    <section class="section"> 
      <h1 class="title ">Plans</h1>
      <br>
      
<div id="mydiv3"  class="columns is-multiline">
  
</div>
</section>
   

  <script type="text/javascript">
  function s(e){
      
    var type=$('#sub_input'+e).val();
    var count=1;
 $('#sub'+e).append("*"+type+"<br>");
 $('#sub_input'+e).val('');
  count++;
  };
  
  function f(g)
  {var type=$('#sub'+g).text()+"%"+$('#plan'+g).text();
      
        $.ajax({
                     url:"index3.php",
                     method:"POST",
                     data:{type:type},
                     dataType:"text",
                     success:function(data)
                      {
                   //     $('#mydiv3').append(data);
                   alert("saved!");
                      }
                     });
      
  }
</script>
    </body>
</html>
<?php 
}}
