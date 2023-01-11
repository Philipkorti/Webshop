<?php
$title=$_POST['title'];
$price = $_POST['price'];
$stueck = $_POST['stueck'];
$beschreibung = $_POST['beschreibung'];
$id = $_GET["p"];
$mysqli = new mysqli("db", "root", "example", "WebShop");
$sql = "UPDATE Produkte SET Name = '$title', price = $price, inStock =  $stueck, description = '$beschreibung' WHERE id = $id";
$mysqli->query($sql);
header('Location: ./../index.html');
?>