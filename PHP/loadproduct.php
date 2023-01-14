<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


</head>
<div class="container">
  <div class="row mt-2">
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
  <div class="carousel-indicators">
    <?php
    $value = $_GET['str'];
    $kat = $_GET['q'];
    $mysqli = new mysqli("db", "root", "example", "WebShop");
    if($kat != 'undefined'){
      $sql = "SELECT * FROM Produkte WHERE category = '$kat'";
    }else{
      $sql = "SELECT * FROM Produkte";
    }

       if ($result = $mysqli->query($sql)) {
        while ($data = $result->fetch_object()) {
            $posts[] = $data;
        }
    }
    if(count($posts) >2) {
      if(isset($posts)){
        $rand_keys = array_rand( $posts, 3);
      }
      if(isset($rand_keys)){
        for($i = 0; $i < count($rand_keys); $i++){
          echo " <button type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide-to='$i' class='active' aria-current='true' aria-label='Slide $i'></button>";
        }
      }
      if(isset($rand_keys)){
      echo "</div>";
      echo "<div class='carousel-inner'>";
      echo "<div class='carousel-inner'>
      <div class='carousel-item active'>";
        echo "<a role='button' onclick='show(".$posts[$rand_keys[0]]->id.")'><img src='".$posts[$rand_keys[0]]->mainPicture."' class='d-block w-100' alt='...'></a>
      </div>";
        for($i = 1; $i < 3; $i++){
          echo "<div class='carousel-item'>
          <a role='button' onclick='show(".$posts[$rand_keys[$i]]->id.")'><img src='".$posts[$rand_keys[$i]]->mainPicture."' class='d-block w-100' alt='...'></a>
        </div>";
        }
      }
    }
      ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </div>
      <div class="row">
          <?php
      $sql = "SELECT * FROM Bilder";
      if ($result = $mysqli->query($sql)) {
        while ($data = $result->fetch_object()) {
          $bilder[] = $data;
        }
      }
      if(isset($posts)){
        $start = 9 * $value;
          if($value == 0){
            $end = 9;
            if($end > count($posts)){
              $end =  count($posts);
            }
          }else{
            $end = 9 * ($value+1);
            if($end > count($posts)){
              $end =  count($posts);
            }
          }
            for($i = $start; $i < $end; $i++){
                echo "
          <div class='col-lg-4 col-md-3' style='margin-top: 10px'>
              <div class='card'>";
                      echo "<a  onclick='show(".$posts[$i]->id.")' role='button'><img class='mx-auto d-block w-100' src='".$posts[$i]->mainPicture."'/></a>";
                  echo"
                  <div class='card-text'>
                  <h4><a onclick='show(".$posts[$i]->id.")' role='button'>".$posts[$i]->Name."</a></h4>
                  <p>Preis: ".$posts[$i]->price."€</p>
                  </div>
              </div>
          </div>";
      }
          }
            
    $prev = $value -1;
    $next = $value + 1;
    $max = count($posts) / 9;
    echo "<nav aria-label='Page navigation example'>
  <ul class='pagination justify-content-center mt-3'>
  <li class='page-item'><a class='page-link' href='#' onclick='loadproduct($prev, $max)'>Prev</a></li>
  ";
  for ($i=0; $i < count($posts) / 9; $i++) {
    $count = $i +1;
    if($i == $value){
      echo "<li class='page-item'><a class='page-link active' href='#' onclick='loadproduct($i, $max)'>".$count."</a></li>";
    }else{
      echo "<li class='page-item'><a class='page-link' href='#' onclick='loadproduct($i, $max)'>".$count."</a></li>";
      
    }
  }
  echo "<li class='page-item'><a class='page-link' href='#' onclick='loadproduct($next, $max)'>Next</a></li>
  </ul>
  </nav>";
    ?>
    </div>

</div>
</html>