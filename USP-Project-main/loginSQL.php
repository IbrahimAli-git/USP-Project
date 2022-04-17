<?php
session_start();
$uname = $_POST["Username1"];
$pword = $_POST["Password1"];

$db = new SQLite3('C:\xampp\Data\USPdata.db');
$sql = "SELECT COUNT(*) as count FROM Users WHERE username = :user AND pword = :pass";
$stmt = $db->prepare($sql);
$stmt->bindParam(':user', $uname, SQLITE3_TEXT);
$stmt->bindParam(':pass', $pword, SQLITE3_TEXT);
$result = $stmt->execute();
$row = $result->fetchArray();
$count=$row['count'];
if($count > 0){
    $db = new SQLite3('C:\xampp\Data\USPdata.db');
    $sql = "SELECT userID FROM users WHERE username = :user AND pword = :pass";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':user', $uname, SQLITE3_TEXT);
    $stmt->bindParam(':pass', $pword, SQLITE3_TEXT);
    $result = $stmt->execute();
    $row = $result->fetchArray();

    $_SESSION["id"] = $row[0];

    header('location: HomePage.php');
}

else{
     header('location: login.html');
}
    