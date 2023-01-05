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
  <div class="row">
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./Bilder/images.jpg" class="d-block w-50" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/shoe.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/shoe.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
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
       $mysqli = new mysqli("db", "root", "example", "WebShop");
       $sql = 'SELECT * FROM Produkte';
       if ($result = $mysqli->query($sql)) {
        while ($data = $result->fetch_object()) {
            $posts[] = $data;
        }
    }
    $sql = "SELECT * FROM Bilder";
    if ($result = $mysqli->query($sql)) {
      while ($data = $result->fetch_object()) {
        $bilder[] = $data;
      }
    }
    $kat = $_GET['q'];
    if(isset($posts)){
      foreach ($posts as $post) {
        if($post->category == $kat) {
            echo "
            <div class='col-lg-4 col-md-3' style='margin-top: 10px'>
                <div class='card'>";
                        echo "<a  onclick='show(".$post->id.")' role='button'><img class='mx-auto d-block w-100' src='$post->mainPicture'/></a>";
                    echo"
                    <div class='card-text'>
                    <h4><a onclick='show(".$post->id.")' role='button'>".$post->Name."</a></h4>
                    <p>Preis: ".$post->price."€</p>
                    </div>
                </div>
            </div>";
        }  
    }
    }
        ?>
  </div>

</div>
</html>