<?php require("navbar.html"); 
    session_start();
    session_destroy();
    header('Location: index.php');
    exit;
    
?>


