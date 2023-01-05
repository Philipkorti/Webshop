<?php
session_start();
$q = $_GET['q'];
$count = $_GET['count'];
$count--;
echo $count;
array_splice($_SESSION['products'], $q, 1);
?>