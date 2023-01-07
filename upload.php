<?php
/** Über alle Dateien laufen 
    und den Pfad für den Dateispeicher setzen
**/
$target_dir = "./Bilder/";
$title = $_GET['title'];
$price = $_GET['price'];
$katogorien = $_GET['katogorien'];
$beschreibung = $_GET['beschreibung'];
$stueck = $_GET['stueck'];
if ( isset($_FILES['photos']['name']) ) {
	$total_files = count($_FILES['photos']['name']);

	for($key = 0; $key < $total_files; $key++) {
		echo $_FILES['photos']['name'][$key];
		// Check if file is selected
		if (isset($_FILES['photos']['name'][$key]) 
                      && $_FILES['photos']['size'][$key] > 0) {
			
			if(!getimagesize($_FILES['photos']['tmp_name'][$key])){
				echo'Datei ist kein Bild.';
			}
			
			// Check filesize
			if($_FILES['photos']['size'][$key] > 600000){
				echo'Dateigröße überschreitet Max 600KB.';
			}
			
			// Check ob der Dateiname bereits existiert
			if(file_exists ($target_dir . $_FILES['photos']['name'][$key])){
				echo "Eine Datei mit diesem Namen existiert bereits.";
			}

			$original_filename = $_FILES['photos']['name'][$key];
			$target = $target_dir . basename($original_filename);
			$tmp  = $_FILES['photos']['tmp_name'][$key];
			move_uploaded_file($tmp, $target);
			$check = true;
         $mysqli = new mysqli("db", "root", "example", "WebShop");
         if($key == 0){
			$sql = "SELECT * FROM Katogorien";
			if ($result = $mysqli->query($sql)) {
				while ($data = $result->fetch_object()) {
					$kats[] = $data;
				}
			}
			foreach($kats as $ket){
				if($ket->Katogorien == $katogorien){
					$check = false;
				}
			}
			if($check == 1){
				$sql = "INSERT INTO Katogorien(Katogorien) VALUES ('$katogorien')";
				$mysqli->query($sql);
			}

            $sql = "INSERT INTO Produkte(Name, price, inStock, description, evaluation, countevaluation, category, mainPicture) VALUES ('$title', $price, $stueck, '$beschreibung', 0, 0, '$katogorien', '$target')";
            $mysqli->query($sql);
         }else{
			$sql = "SELECT * FROM Produkte ORDER BY id DESC Limit 1";
			if ($result = $mysqli->query($sql)) {
				while ($data = $result->fetch_object()) {
					$posts[] = $data;
				}
			}
			foreach($posts as $post){
				$sql = "INSERT INTO Bilder(URL, parent) VALUES ('$target', $post->id)";
				$mysqli->query($sql);
			}
		 }
		}
	}
   echo $total_files . ' Dateien in das Verzeichnis UPLOADS geladen ',  'OK';  
}