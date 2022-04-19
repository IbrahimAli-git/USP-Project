<?php
session_start();
if (isset($_SESSION['id'])) {


function getCareers(){
    $db = new SQLITE3('C:\xampp\Data\USPData.db');
    $sql = "SELECT careerName FROM Careers";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();

    $arrayResult = [];
    while ($row = $result->fetchArray()){ 
        $arrayResult [] = $row;
    }
    return $arrayResult; 
}

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="USP.style.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
  
  </head>

  <body class="bgColor">
	<header>
			<nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-#2dccccad border-bottom box-shadow mb-3 bg-primary">
					<div class="navbar-collapse collapse d-sm-inline-flex flex-sm-row-reverse">
					<div class="container">
                        <ul class="navbar-nav flex-grow-1">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="HomePage.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="PLACEHOLDER.php">Search</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="PLACEHOLDER.php">Login</a>
                        </li>
                    </ul>
                    </div>
				</div>
			</nav>
	</header>    
    </body>

    <div class="container">
        <br>
        <br>
        <br>
        <form action="createStorySQL.php" method="POST" autocomplete="off">

            <div class="form-group">
                <label class="control-label col-sm-2" for="title" >Title</label>
                <div class="col-sm-10"> 
                    <input type="title" class="form-control" id="title" placeholder="Enter title" name="title">
                </div>
            </div>

            <div class="form-group">
                <label for="control-label col-sm-2"></label>
                <div class="col-sm-10">
                    <h6>Enter text</h6>
                    <textarea class="form-control" name="body" id="text" cols="30" rows="10" style="width: 900px; border-color: blue;" ></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="control-label col-sm-2"></label>
                <div class="col-sm-10">
                <label for="subject">Subject of Story:</label>
                <select name="subject">
                <?php
                $result = getCareers();
                for ($i=0; $i<count($result); $i++):
                    ?>
                <option value="<?php echo $result[$i]['careerName'];?>">
                <?php echo $result[$i]['careerName'];?></option>
                <?php endfor;?>
            </select>
                </div>
            </div>
            <br>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10 ">
                    <button type="submit" class="btn btn-info">Create</button>
                </div>
            </div>
        </form>
    </div>

    <div class="fixed-bottom">

        <footer class="border-top  footer text-light bg-#2dccccad bg-primary">
          <div style=position:relative; right:80px top:20px>
            &copy; Copyright USP 2022
          </div>
    
        </footer>
    
      </div>

</body>

</html>
<?php
}

else {
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
</header>
<center> <h1> Sorry, you must be logged in to create your own stories for others to view! </h1> </center>
<br>
        <br>
        <br>


        <div class="fixed-bottom">

<footer class="border-top  footer text-light bg-#2dccccad bg-primary">
  <div style=position:relative; right:80px top:20px>
    &copy; Copyright USP 2022
  </div>

</footer>

</div>


</body>

</html>

<?php

}
?>