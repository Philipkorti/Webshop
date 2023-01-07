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
$check = true;
foreach($users as $user) {
    if($user->Email == $username){
        if(password_verify($password, $user->Password)){
            $_SESSION['userid'] = $user->id;
            if($angemeldet){
                setcookie('user', $_SESSION['userid'], time() + (86400*30), '/');
            }
            echo "Angemeldet";
            $check = false;
        }
    }
}
if($check == 1){
    echo "User oder Passwort ist falsch";
}
?>