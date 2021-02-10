<?php
session_start();
if($_SESSION["logged_in"] == 0){
  header("Location: ../views/login.php");
}
// var_dump($_SESSION);
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
    <link rel="stylesheet" href="css/style.css">
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
          <form action="../actions/logout_action.php" method="post">
            <li class="nav-item">          
              <button id=logOutButton type="submit" class="btn btn-primary" >logout</button>
            </li>
          </form>
          
           <!--<li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
        </form>
      </div>
    </nav>
    <br>
    <br>
    <div class="container">
      <article>
        <h2 id=tasktitle >Tasks</h2>
        <span class="custom-switch">
          <input type="checkbox" class="custom-control-input" id="customSwitch1" onclick = "dateSort()">
          <label class="custom-control-label" for="customSwitch1">Sort By Date</label>
        </span>
        <span id= switch class="custom-switch">
          <input type="checkbox" class="custom-control-input" id="customSwitch2" onclick = "hideSort()">
          <label class="custom-control-label" for="customSwitch2">Filter Completed Tasks</label>
        </span>
      </article>
      <br>
      <ul id="list" class="list-group">
      </ul>
      <br>
      <br>
      <div>
        <form>
          <div class="form-group">
            <input type="text" class="form-control" id="inputText" aria-describedby="emailHelp" placeholder="Task Name" oninput="storeCurrentState()" required/>
          </div>
          <div class="form-group">
            <input type="date" class="form-control" id="inputDate" placeholder="Date" oninput="storeCurrentState();" required/>
          </div>
          <button id=taskbutton type="button" class="btn btn-primary">Create Task</button>
        </form>
       
      </div>

    
    
    </div> 
  </body>

</html>