<?php
session_start();
$q = $_GET['q'];
$userid = $_GET['userid'];
$count = $_GET['count'];
$stueck = $_GET['stueck'];
$check = true;
if(isset($_SESSION['products'])){
    for($i = 0; $i < count($_SESSION['products']); $i++){
        if($_SESSION['products'][$i][0] == $q){
            $check = false;
            $num = $i;
        }
        }
        if($check){
            array_push($_SESSION['products'], array($q, $stueck));
            $count++;
        }else{
            $zahl = $_SESSION['products'][$num][1];
            $zahl = $zahl + $stueck;
            $_SESSION['products'][$num][1] = $zahl;
        }
}
echo $count;
?>