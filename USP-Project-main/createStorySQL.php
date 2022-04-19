<?php
session_start();
$title = $_POST["title"];
$text = $_POST["body"];
$subject = $_POST["subject"];
$uid = $_SESSION["id"];


function submitStory($title, $text, $uid, $cid) {
    $db = new SQLite3('C:\xampp\Data\USPData.db');
    $sql = 'INSERT INTO Stories(storytext, storytitle, userID, careerID) VALUES (:stext, :stitle, :usid, :cid)';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':stext', $text, SQLITE3_TEXT);
    $stmt->bindParam(':stitle', $title, SQLITE3_TEXT);
    $stmt->bindParam(':usid', $uid, SQLITE3_TEXT);
    $stmt->bindParam(':cid', $cid, SQLITE3_TEXT);


    $stmt->execute();

}

function getSubjectID($name) {
    $db = new SQLite3('C:\xampp\Data\USPData.db');
    $sql = "SELECT careerID FROM Careers WHERE careerName = :cname";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':cname', $name, SQLITE3_TEXT);
    $result = $stmt->execute();
    $row = $result->fetchArray();

    $id = $row[0];
    return $id;
}

function getStoryID($title) {
    $db = new SQLite3('C:\xampp\Data\USPData.db');
    $sql = "SELECT storyID FROM Stories WHERE storyTitle = :title";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':title', $title, SQLITE3_TEXT);
    $result = $stmt->execute();
    $row = $result->fetchArray();
    $id = $row[0];
    return $id;
}


$cid = getSubjectID($subject);


submitStory($title, $text, $uid, $cid);

$idofstory = getStoryID($title);
$_SESSION["idofstory"] = $idofstory;

header('location: storycreated.php');
exit;