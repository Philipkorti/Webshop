<?php
session_start();
$mysqli = new mysqli("db", "root", "example", "WebShop");
$sql = 'SELECT * FROM Produkte';
if ($result = $mysqli->query($sql)) {
 while ($data = $result->fetch_object()) {
     $posts[] = $data;
 }
}
echo "<div class='container'>";
echo "<div class='row mt-3'>
<div class='col-lg-12'>
<div class='card'>
<div class='card-text text-center'>
";
echo "<table class='table table-borderless'>
    <tr>
    <th>Name</th>
    <th>Preis</th>
    <th>Stück</th>
    <th>Gesamt Preis</th>
    <th></th>
    </tr>";
    if(isset($_SESSION['products'])){
        for($i = 1; $i < count($_SESSION['products']); $i++) {
            foreach($posts as $post) {
                    if($post->id == $_SESSION['products'][$i][0]){
                        $sum = $post->price*$_SESSION['products'][$i][1];
                        echo "<tr>
                <td scope='col'>".$post->Name."</td>
                <td scope='col'>".$post->price."€</td>
                <td scope='col'>".$_SESSION['products'][$i][1]."</td>
                <td scope='col'>".$sum."€</td>
                <td><a onclick='warenkorbdelete(".$i.");' role='button'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-lg' viewBox='0 0 16 16'>
                <path d='M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z'/>
              </svg></a></td>
                </tr>";
                $preis+= $sum;
                    }
                }
            }
    }
$ust = $preis*0.20;
$preis = $ust + $preis;
echo"<tr><td></td>
<td></td>
<th>20% Ust</th>
<td>".round($ust,2)."</td>
</tr>
<tr>
<td></td>
<td></td>
<th>Preis:</th>
<td>".round($preis,2)."</td>
</tr>";
echo "</table>";
echo"</div>
</div>
</div>
</div>
<div class='row mt-3'>
<a class='btn btn-success' onclick='order()' >Bestellen</a>
</div>";
?>
</div>