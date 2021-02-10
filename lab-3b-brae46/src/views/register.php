<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>IT210 Lab 3</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"><!-- Links to stylesheets -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>  
    <link rel="stylesheet" href="../css/style.css">
  </head>

  <body>
    <header>
      <!--<h1>IT210 Lab 2</h1>-->
    </header>
    <nav class="navbar navbar-expand-lg navbarbackground">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a id= navtitle class="nav-link" href="#">IT210 Lab 3 <span class="sr-only">(current)</span></a>
          </li>
        </form>
      </div>
    </nav>
    <br>
    <br>
    <div class="container">
      <article>
        <h2 id=tasktitle >Create Account</h2>
      </article>
      <br>
      <ul id="list" class="list-group">
      </ul>
      <div>
        <form action="/actions/register_action.php" method="post">
          <div class="form-group">
            <input type="text" class="form-control" name = "username" id="inputUsername" aria-describedby="emailHelp" placeholder="Username" required/>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name = "password" id="inputPassword" aria-describedby="emailHelp" placeholder="Password" required/>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name = "confirmation_password" id="inputConfPassword" aria-describedby="emailHelp" placeholder="Confirm Password" required/>
          </div>
          <button id=taskbutton type="submit" class="btn btn-primary" >Create Account</button>
        </form>
        <br>
        <form action="../views/login.php" method="post"><!--button doesnt do anything -->
          <button id=logInButton type="submit" class="btn btn-primary">Log In</button>
        </form>
        <?php
            echo $_SESSION["error"];
            session_unset();
        ?>
      </div>
    </div> 
  </body>

</html>
