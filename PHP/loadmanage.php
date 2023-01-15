<?php
 $value = $_GET['str'];
 $suche = $_GET['search'];
 $option = $_GET['option'];
 $suche = strtolower($suche);
$mysqli = new mysqli("db", "root", "example", "WebShop");
$sql = "SELECT * FROM Produkte";
if ($result = $mysqli->query($sql)) {
    while ($data = $result->fetch_object()) {
        $posts[] = $data;
    }
}
if($option == 'Produkte'){
    $productcount = 0;
          foreach($posts as $post){
            if(startsWith(strtolower($post->Name), $suche)) {
              $productcount++;
            }
          }
          
      if(isset($posts)){
        $start = 10 * $value;
          if($value == 0){
            $end = 10;
            if($end > $productcount ){
              $end =  $productcount ;
            }
          }else{
            $end = 10 * ($value+1);
            if($end > $productcount ){
              $end =  $productcount ;
            }
          }
          }
          echo"<table class='table table-borderless'>
          <tr>
          <th>Produkt Name</th>
          <th>Stück</th>
          <th>Preis</th>
          <th class='text-center'>Beschreibung</th>
          <th>Katogorie</th>
          <th></th>
          <th></th>
          </tr>";
for($i = $start; $i < $end; $i++){
    if(startsWith(strtolower($posts[$i]->Name), $suche)) {
    echo "<tr>
    <td>".$posts[$i]->Name."</td>
    <td>".$posts[$i]->inStock."</td>
    <td>".$posts[$i]->price."</td>
    <td>".$posts[$i]->description."</td>
    <td>".$posts[$i]->category."</td>
    <td><a href='./editproducts.php?p=".$posts[$i]->id."' role='batten' class='btn btn-primary'>Manage</a></td>
    <td></td>
    </tr>";
    }
}
echo"</table>
<a href='./addProduct.php' class='btn btn-success col-lg-12'>Neues Produkt</a>";
$prev = $value -1;
    $next = $value + 1;
    $max = count($posts) / 10;
if($productcount != 0){
    echo "<nav aria-label='Page navigation example'>
<ul class='pagination justify-content-center mt-3'>
<li class='page-item'><a class='page-link' href='#' onclick='manage($prev, $max, \"$suche\")'>Prev</a></li>
";
for ($i=0; $i < $productcount/ 10; $i++) {
  $count = $i +1;
  if($i == $value){
    echo "<li class='page-item'><a class='page-link active' href='#' onclick='manage($i, $max,\"$suche\")'>".$count."</a></li>";
  }else{
    echo "<li class='page-item'><a class='page-link' href='#' onclick='manage($i, $max,\"$suche\")'>".$count."</a></li>";
    
  }
}
echo "<li class='page-item'><a class='page-link' href='#' onclick='manage($next, $max,\"$suche\")'>Next</a></li>
</ul>
</nav>";
  }
}else{
    $sql = "SELECT * FROM Katogorien";
    if ($result = $mysqli->query($sql)) {
        while ($data = $result->fetch_object()) {
            $kats[] = $data;
        }
    }
    echo "<table class='table table-borderless'>
    <tr>
    <th>Katogorien</th>
    <th></th>
    </tr>
    ";
    foreach($kats as $kat){
        if(startsWith(strtolower($kat->Katogorien), $suche)) {
            echo "<tr>
            <td>$kat->Katogorien</td>
            <td><a role='button' class='btn btn-danger' onclick='deletekat(\"$kat->Katogorien\")'>Delete</a></td>
            </tr>";
        }
    }
    
    echo"</table>";
    echo "<div id='result'></div>";
}
function startsWith( $haystack, $needle ) {
    $length = strlen( $needle );
    return substr( $haystack, 0, $length ) === $needle;
}

?>