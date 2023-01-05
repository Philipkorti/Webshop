<?php
session_start();
if(isset($_SESSION['userid']) || isset($_COOKIE['user'])){
    echo "<a class='dropdown-item' href='./addProduct.html'>Neues Produkt</a>
    <a class='dropdown-item' href='#' onclick='showorders()'>Bestellungen</a>
    <a class='dropdown-item' href='#' onclick='logout()'>Logout</a>
    ";
    $_SESSION['userid'] = $_COOKIE['user'];
    $_SESSION['products'] = array('0');
}else{
    echo "<a class='dropdown-item' href='#' onclick='login()'>Login</a>";
}

?>