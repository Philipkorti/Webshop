<div class="container">
<div class="row justify-content-center">
    <h2 class="text-center mt-5">Regestrieren</h2>
    <form class="mt-4" id="newuser" onsubmit="signInnew()" method="GET">
        <div class="row">
            <div class='col-lg-6'>
                <label class="control-label" for="firstname">Vorname*</label>
                <input type="text" class="form-control" placeholder="Max" id="firstname" required>
            </div>
            <div class="col-lg-6">
            <label class="control-label" for="lastname">Nachname*</label>
            <input type="text" class="form-control" placeholder="Mustermann" id="lastname" required>
            </div>
        </div>
        <div class="row mt-3">
            <div class='col-lg-6'>
                <label class="control-label" for="email">Email*</label>
                <input type="email" class="form-control" id="email" placeholder="Email" required>
            </div>
            <div class="col-lg-6">
                <label class="control-label" for="password">Password*</label>
                <input type="password" class="form-control" placeholder="Password" id="password" required>
            </div>
        </div>
        <div class="col-lg-12 mt-3">
            <label class="control-label" for="address">Adresse*</label>
            <input type="text" class="form-control" id="address" placeholder="Beispielstraße 12" required>
        </div>
        <div class="col-lg-12 mt-3">
            <label for="address2">Adresse 2</label>
            <input type="text" class="form-control" id="address2" placeholder="Apartment, studio, oder Stiegenhaus">
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <label for="city">Stadt*</label>
                <input type="text" class="form-control" id="city" require>
            </div>
            <div class="col-md-4">
                <label for="state">Land*</label>
                <select id="state" class="form-control">
                    <option selected>Austria</option>
                    <option>Deutschland</option>
                    <option>Schweiz</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="plz">PLZ*</label>
                <input type="text" class="form-control" id="plz">
            </div>
        </div>
        <button type="submit" class="btn btn-success col-lg-12 mt-3">Registrieren</a>
        <script src="./JavaScript/javascript.js"></script>
    </form>
</div>
</div>
