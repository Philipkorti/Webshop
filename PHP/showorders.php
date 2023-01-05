<?php
session_start();
echo "<div class='container'>";
 $mysqli = new mysqli("db", "root", "example", "WebShop");
 $sql = 'SELECT * FROM Bestellungen';
 if ($result = $mysqli->query($sql)) {
  while ($data = $result->fetch_object()) {
      $orders[] = $data;
  }
}
$sql = 'SELECT * FROM User';
if ($result = $mysqli->query($sql)) {
    while ($data = $result->fetch_object()) {
        $users[] = $data;
    }
  }
$sql = "SELECT * FROM BestellungProdukte bp JOIN Produkte p ON p.id = bp.produktid";
if ($result = $mysqli->query($sql)) {
    while ($data = $result->fetch_object()) {
        $bestellungProdukte[] = $data;
    }
  }
  echo "<h1 class='mt-3'>Bestellungen</h1>";
if(isset($orders[0])){
    if(isset($_SESSION['userid'])){
    foreach($users as $User){
        if($User->id == $_SESSION['userid']){
            if($User->Rechte == 'Admin'){
                foreach ($orders as $order){
                    show($order, $bestellungProdukte);
                }
            }else{
                foreach ($orders as $order){
                    if($order->user == $_SESSION['userid']){
                        show($order, $bestellungProdukte);
                    }
                }
            }
        }
       
    }
    }else{
        echo "<p>Sie müssen sich voher anmelden!</p>";
    }
}else{
    echo "<p>Es sind keine Bestellungenvorhanden!</p>";
}


function show($order, $bestellungProdukte){
    echo "<div class='card mt-3'>
    <div class='card-text'>
    <h5>".$order->datum."</h4>
    <p>Straße: ".$order->Straße."<br/>Ort: ".$order->PZLOrt."<br/>Land: ".$order->Land."</p>
    <table class='table table-borderless'>
    <tr>
    <th>Name</th>
    <th>Preis</th>
    <th>Stück</th>
    <th>Gesamt Preis</th>
    <th></th>
    </tr>";
    foreach($bestellungProdukte as $bestellungProduk){
        if($bestellungProduk->bestellungsid == $order->id){
            $sum = $bestellungProduk->price * $bestellungProduk->stueckb;
            echo "<tr>
                <td scope='col'>".$bestellungProduk->Name."</td>
                <td scope='col'>".$bestellungProduk->price."€</td>
                <td scope='col'>".$bestellungProduk->stueckb."</td>
                <td scope='col'>".$sum."€</td>";
                $preis+= $sum;
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
    echo "</div>
    </div>";
    
}
?>
</div>