<!DOCTYPE html>
<?php
session_start();
//if (isset($_SESSION['id']))
?>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="USP.style.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>

<body class="bgColor">

  <header>

    <nav
      class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-#2dccccad border-bottom box-shadow mb-3 bg-primary">
      <div class="navbar-collapse collapse d-sm-inline-flex flex-sm-row-reverse">
        <div class="container">
          <ul class="navbar-nav flex-grow-1">
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="HomePage.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="SearchBar1.html">Search</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="login.html">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="jumbotron text-center" style="background-color:#00FFFF;">
    <h3>USP Careers Service</h3>
    <br>
    <h3>Home Page</h3>
  </div>
</header>

  <div class=" container">
      <div class="row">
        <div class="col-sm-4">
          <div class="form-outline">
            <form action="SearchPage.html" method="POST" autocomplete="off"></form>
          </div>
          <br>
          <div>
            <a href="SearchBar1.html"class="btn btn-primary">
                Search for stories or careers.
            </a>
          </div>
          </form>
        </div>
        <div class="col-sm-4" style="position: relative; left: 400px;">
          <div class="form-outline">

            <form action="login.html" method="POST" autocomplete="off">

          </div>
          <br>
          <div>
            <a href="login.html" class="btn btn-primary">
                Login or create an account.
            </a>
          </div>
          </form>
        </div>
      </div>
    </div>


    <br><br><br><br><br><br>


    <div class="fixed-bottom">

      <footer class="border-top  footer text-light bg-#2dccccad bg-primary">
        <div style=position:relative; right:80px top:20px>
          &copy; Copyright USP 2022
        </div>

      </footer>

    </div>


</body>

</html>
