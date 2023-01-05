<?php
session_start();
$password = $_GET['password'];
$username = $_GET['username'];
$angemeldet = $_GET['angemeldet'];
$mysqli = new mysqli("db", "root", "example", "WebShop");
$sql = 'SELECT * FROM User';
if ($result = $mysqli->query($sql)) {
  while ($datab = $result->fetch_object()) {
      $users[] = $datab;
  }
}

foreach($users as $user) {
    if($user->UserName == $username){
        if($user->password == $password){
            $_SESSION['userid'] = $user->id;
            if($angemeldet){
                setcookie('user', $_SESSION['userid'], time() + (86400*30), '/');
            }
        }
    }
}
?>