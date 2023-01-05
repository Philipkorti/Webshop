<?php
session_start();
$streat = $_GET['streat'];
$vilage = $_GET['vilage'];
$address = $_GET['address'];
$country = $_GET['country'];
$currency = $_GET['currency'];

$mysqli = new mysqli("db", "root", "example", "WebShop");
$sql = "INSERT INTO Bestellungen(user, Bezahloption, PZLOrt, Straße, Land, AdressZusatz) VALUES (".$_SESSION['userid'].", '$currency', '$vilage', '$streat', '$country', '$address')";
$mysqli->query($sql);
$sql ="SELECT * FROM Bestellungen ORDER BY id DESC Limit 1";
if ($result = $mysqli->query($sql)) {
    while ($data = $result->fetch_object()) {
        $orders[] = $data;
    }
  }
  foreach($orders as $order) {
    for ($i=0; $i < count($_SESSION['products']) ; $i++) {
        $pid = $_SESSION['products'][$i][0];
        $sql = "INSERT INTO BestellungProdukte(produktid, bestellungsid, stueckb) VALUES ($pid, $order->id, ".$_SESSION['products'][$i][1].")";
        $mysqli->query($sql);
    }
  }
$sql = "SELECT * FROM Produkte";
if ($result = $mysqli->query($sql)) {
  while ($data = $result->fetch_object()) {
      $posts[] = $data;
  }
}
foreach($posts as $post) {
  for($i = 0; $i < count($_SESSION['products']); $i++) {
    if($_SESSION['products'][$i][0] == $post->id) {
      $stueck = $post->inStock;
      $stueck = $stueck - $_SESSION['products'][$i][1];
      $sql = "UPDATE Produkte SET inStock = $stueck WHERE id = $post->id";
      $mysqli->query($sql);
    }
  }
}
array_splice($_SESSION['products'], 1, count($_SESSION['products'])-1);
echo "";
?>