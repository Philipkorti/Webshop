<?php
session_start();
$q = $_GET['q'];
$pid = $_GET['pid'];
$mysqli = new mysqli("db", "root", "example", "WebShop");
$sql = 'SELECT * FROM Rezensionen';
if ($result = $mysqli->query($sql)) {
  while ($datab = $result->fetch_object()) {
      $rezes[] = $datab;
  }
}

foreach($rezes as $rez){
    if($q == $rez->id){
        $count = $rez->likes;
    $count++;
    $sql = "UPDATE Rezensionen SET likes = $count WHERE id = $rez->id";
    $mysqli->query($sql);
    $sql = "INSERT INTO Likes(UserID, ProduktID, RezensionID) VALUES (".$_SESSION['userid'].", $pid, $rez->id)";
    $mysqli->query($sql);
    }
}
?>