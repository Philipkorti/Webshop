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
    echo "<div class='alert alert-danger' role='alert'>
    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-exclamation-circle' viewBox='0 0 16 16'>
  <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
  <path d='M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z'/>
</svg>
    User oder Passwort ist falsch
    </div>
    ";
}
?>