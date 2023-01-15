<?php
$mysqli = new mysqli("db", "root", "example", "WebShop");
$sql = "SELECT * FROM User";
if ($result = $mysqli->query($sql)) {
    while ($data = $result->fetch_object()) {
        $users[] = $data;
    }
}
session_start();
$_SESSION['userid'] = $_COOKIE['user'];
$_SESSION['products'] = array('0');
if(isset($_SESSION['userid']) || isset($_COOKIE['user'])){
    foreach($users as $user){
        if($user->id == $_SESSION['userid']){
            if($user->Rechte == "Admin")
            echo "<a class='dropdown-item' href='./manageproducts.php'>Admin</a>";
        }
    }
    echo "<a class='dropdown-item' href='#' onclick='showorders()'>Bestellungen</a>
    <a class='dropdown-item' href='#' onclick='logout()'>Abmelden</a>
    ";
    
}else{
    echo "<a class='dropdown-item' href='#' onclick='login()'>Anmelden</a>";
}

?>