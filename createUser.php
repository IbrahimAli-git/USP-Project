<?php 
require("navbar.html");
include_once("createUserSQL.php");

$errorfname = $errorlname = $erroruname = $erroruid = $errorpwd = "";
$allFields = "yes";

if (isset($_POST['submit'])){

    if ($_POST['fname']==""){
        $errorfname = "First name is mandatory";
        $allFields = "no";
    }
    if ($_POST['lname']==null){
        $errorlname = "Last name is mandatory";
        $allFields = "no";
    }
    if ($_POST['uname']==""){
        $erroruname = "Username is mandatory";
        $allFields = "no";
    }
    if ($_POST['uid']==""){
        $erroruid = "User ID is mandatory";
        $allFields = "no";
    }
    if ($_POST['pwd']==""){
        $errorpwd = "Default password mandatory";
        $allFields = "no";
    }

    if($allFields == "yes")
    {
        $createUser = createUser();
        header('Location: userCreationSummary.php?createUser='.$createUser);
    }
}



?>

	<div class="container bgColor">
        	<main role="main" class="pb-3">
            <h2>Create User</h2><br>

            <div class="row">
            <div class="col-6">
                <form method="post">
                   <div class="form-group col-md-6">
                        <label class="control-label labelFont">First Name</label>
                        <input class="form-control" type="text" name = "fname">
                        <span class="text-danger"><?php echo $errorfname; ?></span>
                   </div>

                   <div class="form-group col-md-6">
                        <label class="control-label labelFont">Last Name</label>
                        <input class="form-control" type="text" name = "lname">
                        <span class="text-danger"><?php echo $errorfname; ?></span>
                   </div>

                   <div class="form-group col-md-6">
                        <label class="control-label labelFont">User Name</label>
                        <input class="form-control" type="text" name = "uname">
                        <span class="text-danger"><?php echo $erroruname; ?></span>
                   </div>

                   <div class="form-group col-md-6">
                        <label class="control-label labelFont">User ID</label>
                        <input class="form-control" type="text" name = "uid">
                        <span class="text-danger"><?php echo $erroruid; ?></span>
                   </div>

                   <div class="form-group col-md-6">
                        <label class="control-label labelFont">Default Password</label>
                        <input class="form-control" type="password" name = "pwd">
                        <span class="text-danger"><?php echo $errorpwd; ?></span>
                   </div>

                   <div class="form-group col-md-4">
                        <input class="btn btn-primary" type="submit" value="Create User" name ="submit">
                   </div>
                </form>
            </div>
        </div>


            
		</main>
	</div>