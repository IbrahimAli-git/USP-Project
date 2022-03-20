<?php

function createUser(){

    $created = false;//this variable is used to indicate the creation is successfull or not
    $db = new SQLite3('C:\xampp\Data\newDb.db'); // db connection - get your db file here. Its strongly advised to place your db file outside htdocs. 
    
    //$stmt = $db->prepare('SELECT UserName, userId, firstName, Role FROM User WHERE UserName=:usrname AND Password=:password AND Status="active"');
    
    
    
    $sql = 'INSERT INTO User(UserName, userId, firstName, lastName, Password) VALUES (:userName, :uID, :fName, :lName, :pwd)';

    $stmt = $db->prepare($sql); //prepare the sql statement

    //give the values for the parameters
    $stmt->bindParam(':uID', $_POST['uid'], SQLITE3_TEXT); //we use SQLITE3_TEXT for text/varchar. You can use SQLITE3_INTEGER or SQLITE3_REAL for numerical values
    $stmt->bindParam(':userName', $_POST['uname'], SQLITE3_TEXT); 
    $stmt->bindParam(':fName', $_POST['fname'], SQLITE3_TEXT);
    $stmt->bindParam(':lName', $_POST['lname'], SQLITE3_TEXT);
    $stmt->bindParam(':pwd', $_POST['pwd'], SQLITE3_TEXT);

    //execute the sql statement
    $stmt->execute();

    //the logic
    if($stmt){
        $created = true;
    }

    return $created;
}