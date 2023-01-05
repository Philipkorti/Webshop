<?php
$q = $_GET['q'];
echo "<p class='sternebewertung' style='margin-top: 20px'>
<input type='radio' id='1Stern' name='bewertung' value='5'><label for='stern5' title='5 Sterne'>5 Sterne</label>
<input type='radio' id='2Sterne' name='bewertung' value='4'><label for='stern4' title='4 Sterne'>4 Sterne</label>
<input type='radio' id='3Sterne' name='bewertung' value='3'><label for='stern3' title='3 Sterne'>3 Sterne</label>
<input type='radio' id='4Sterne' name='bewertung' value='2'><label for='stern2' title='2 Sterne'>2 Sterne</label>
<input type='radio' id='5Sterne' name='bewertung' value='1'><label for='stern1' title='1 Stern'>1 Stern</label>
<span id='Bewertung' title='Keine Bewertung'>
 <label><input type='radio' name='bewertung' value='0' checked='checked'> Bewertung:</label>
</span>
</p>";
echo "<input type='text' maxlength='20' id='user' placeholder='Anzeigter Name' class='form-control' style='margin-top: 20px'/>
<input type='text' maxlength='50' id='title' placeholder='Titel' class='form-control' style='margin-top: 20px'>
<div class='form-floating' style='margin-top:20px'>
  <textarea class='form-control' placeholder='Leave a comment here' id='Comment' style='height: 100px'></textarea>
  <label for='Comment'>Dein Kommentar</label>
</div>
<a onclick='newevaluation($q);'><button class='btn btn-warning' style='margin-top: 20px' >Abschiken</button></a>";
?>
