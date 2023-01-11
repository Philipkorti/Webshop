<!DOCTYPE html>
<html lang="en">
<?php
include "./header.php";
?>
<body>
    <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<div class="container">
<div class="row">
    <form class="fileupload mt-3" action="upload.php" method="post">
        <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Title" id="title" aria-label="Title" aria-describedby="basic-addon1" required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text">$</span>
              <input type="text" class="form-control" id="price" aria-label="Amount (to the nearest dollar)" require>
            </div>
            <div id="outputkat">
            </div>
            <div class="input-group mb-3 mt-3">
              <input type="number" class="form-control" placeholder="Stück" id="stueck" aria-label="Title" aria-describedby="basic-addon1" require>
            </div>
            <div class="input-group mb-3 mt-3">
              <span class="input-group-text">Beschreibung</span>
              <textarea class="form-control" id="beschreibung" aria-label="With textarea" require></textarea>
            </div>
        <input type="file" class="form-control" id="photos" name="photos[]" multiple require>
        <button type="submit" id="upload-btn" class="btn btn-success mt-2">Laden</button>
    </form>
</div>
</div>
<div class="filelist"></div>
<div id="result"></div>
<script>
user();
let form = document.querySelector('.fileupload');
let fileSelect = document.getElementById('photos');
let uploadButton = document.getElementById('upload-btn');
loadkatogorien(0);
// Platzhalter für die Anzeige der Vorschaubilder
document.getElementById('photos').addEventListener('change', function (event) {
let files = event.target.files; // FileList object
for (let i = 0, f; f = files[i]; i++) {
    if (!f.type.match('image.*')) {
        continue;
    }
    let reader = new FileReader();
    reader.onload = (function(theFile) {
        return function(e) {
            let span = document.createElement('span');
            span.innerHTML = ['<img class="thumb col-lg-2 col-s-1 m-2" src="', e.target.result, '" title="', escape(theFile.name), '"/>'].join('');
            document.querySelector ('.filelist').insertBefore(span, null);
        };
    })(f);
    reader.readAsDataURL(f);
}
document.querySelector ('.filelist').innerHTML = '';
});
form.onsubmit = function(event) {
event.preventDefault();

// Den Text des Buttons als visuelles Signal ändern
uploadButton.innerHTML = 'Uploading ...';
// Hierhin kommt der Rest des Scripts
// Die ausgeählten Dateien aus dem input-Element laden
let files = fileSelect.files;
//Ein FormData Objekt erzeugen.
let formData = new FormData();
// Alle ausgewählten Dateien durchlaufen
for (let i = 0; i < files.length; i++) {
let file = files[i];
// Dateityp prüfen.
if (!file.type.match('image.*')) {
    continue;
}
alert("Hund");
// Datei in den Request setzen
formData.append('photos[]', file, file.name);
}
alert("Katze");
// XMLHttpRequest aufstellen
var xhr = new XMLHttpRequest();
// Verbindung zur Anwendung aufbauen
alert("let");
let title = document.getElementById('title').value;
let price = document.getElementById('price').value;
let beschreibung = document.getElementById('beschreibung').value;
let katogorien = document.getElementById('katogorien').value;
let stueck = document.getElementById('stueck').value;
alert(title);
alert(katogorien);
xhr.open('POST', './upload.php?title='+title+"&price="+price+"&beschreibung="+beschreibung + "&katogorien="+katogorien+"&stueck="+stueck, true);
// Platzhalter für den Ladefortschritt
// Event Handler für die Response vom Server
xhr.onload = function () {
if (xhr.status === 200) {
// Dateien wurden hochgeladen

    document.querySelector("#result").innerHTML = xhr.responseText;
    uploadButton.innerHTML = 'Upload';
    
} else {
    document.querySelector("#result").innerHTML = "Fehler beim Upload " + xhr.responseText;
}
};
// Daten übertragen
xhr.send(formData);
xhr.upload.onprogress = function (e) {
let percentUpload = Math.floor(100 * e.loaded / e.total);
progress.value = percentUpload;
}
}
</script>
</body>
</html>
</body>
</html>