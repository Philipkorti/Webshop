<?php
$fname = $_GET['fname'];
$lname = $_GET['lname'];
$email = $_GET['email'];
$pass = $_GET['pass'];
$address = $_GET['address'];
$address2 = $_GET['address2'];
$city = $_GET['city'];
$state = $_GET['state'];
$plz = $_GET['plz'];
$password = password_hash($pass, PASSWORD_DEFAULT);
$mysqli = new mysqli("db", "root", "example", "WebShop");
$sql = "INSERT INTO User(FirstName, LastName, Email,Password, Address, Address2, City, State, PLZ, Rechte) VALUES ('$fname', '$lname', '$email', '$password', '$address', '$address2', '$city', '$state', $plz, 'User')";
$mysqli->query($sql);
?>