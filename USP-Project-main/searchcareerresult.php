<?php
$career = $_POST["career"];
$careerstrip = str_replace(' ', '', $career);
$careerlower = strtolower($careerstrip);
function getcareer ($career){
    $db = new SQLITE3('C:\xampp\Data\USPData.db');
    $sql = "SELECT careerName, careerID FROM Careers WHERE careerType = :career";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':career', $career, SQLITE3_TEXT);
    $result = $stmt->execute();

    $arrayResult = [];
    while ($row = $result->fetchArray()){ 
        $arrayResult [] = $row;
    }
    return $arrayResult;
}

?>
<!DOCTYPE html>

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
       
			<nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-#2dccccad border-bottom box-shadow mb-3 bg-primary">
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
</div>
<body>
  <center>  <h1> Showing results for: <?php echo $career;?> </h1> </center>

    <?php
                    $result = getcareer($careerlower);
                    for ($i=0; $i<count($result); $i++):
                        ?>
                        <center> <?php echo $result[$i]['careerName']?> </center>
                        <center><form action="viewcareer.php" method="POST" autocomplete="off">
                        <input type="hidden" name="id" value="<?php echo $result[$i]['careerID'];?>" />
                        <button type="submit" class="btn btn-primary btn-block mb-3" style="height: 40px ; width: 100px">View</button>
                    </form> </center>
                        <?php endfor;?>
                </table>    
            </div>
        </div>

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