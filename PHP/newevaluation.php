<?php
$text = $_GET["comment"];
$user = $_GET["user"];
$title = $_GET["title"];
$q = $_GET["q"];
$star = $_GET["star"];
$mysqli = new mysqli("db", "root", "example", "WebShop");
$sql = "INSERT INTO Rezensionen(text, user, title, staerne, parent) VALUES ('$text', '$user', '$title', $star, $q)";
$mysqli->query($sql);
$sql = "SELECT * FROM Produkte";
if ($result = $mysqli->query($sql)) {
    while ($data = $result->fetch_object()) {
        $posts[] = $data;
    }
  }
$sql = "SELECT * FROM Rezensionen";
if ($result = $mysqli->query($sql)) {
    while ($data = $result->fetch_object()) {
      $rezes[] = $data;
    }
  }
  foreach( $posts as $post){
    if($post->id == $q){
        $count = $post->countevaluation;
        $count = $count + 1;
        foreach($rezes as $rez){
            if($rez->parent == $q){
                $sum = $sum + $rez->staerne;
            }
        }
        $be = $sum / $count;
        $sql = "UPDATE Produkte SET countevaluation = $count WHERE id = $q";
        $mysqli->query($sql);
        $sql = "UPDATE Produkte SET evaluation = $be WHERE id = $q";
        $mysqli->query($sql);
    }
  }
?>