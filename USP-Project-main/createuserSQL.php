<?php
session_start();
function createUser($uname, $pword){
    $db = new SQLite3('C:\xampp\Data\USPData.db');
    $sql = 'INSERT INTO users(username, pword) VALUES (:user, :pass)';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':user', $uname, SQLITE3_TEXT);
    $stmt->bindParam(':pass', $pword, SQLITE3_TEXT);


    $stmt->execute();
}

function getID($uname, $pword){
    $db = new SQLite3('C:\xampp\Data\USPdata.db');
    $sql = "SELECT userID FROM users WHERE username = :user AND pword = :pass";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':user', $uname, SQLITE3_TEXT);
    $stmt->bindParam(':pass', $pword, SQLITE3_TEXT);
    $result = $stmt->execute();
    $row = $result->fetchArray();

    return $row[0];
}

$allfields = true;
$uname = $_POST["Username1"];
if($uname == "" ){
    $allfields = false;
}
$pword = $_POST["Password1"];
if($pword == "" ){
    $allfields = false;
}

if($allfields == true) {
    createUser($uname, $pword);
    $_SESSION["id"] = getID($uname, $pword);
    header("Location: usercreated.php");
    exit;

    
}
else {
    // redirects to error screen
    header("Location: createuser.html");
    exit;
}

