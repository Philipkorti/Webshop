<div class='container'>
    <div class='row'>
        <div class='col-lg-12 mt-3'>
            <h2 class='text-center'>Bestelldetails</h2>
        </div>
    </div>
    <form>
    <div class='row'>
        <h3>Adresse:</h3>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
            <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z"/>
            </svg></span>
            <input type="text" id="streat" require class="form-control" placeholder="Straße und Hausnummer" aria-label="Straße und Hausnummer" aria-describedby="basic-addon1">
            <input type="text" id="vilage" class="form-control ms-2" placeholder="PLZ und Ort" aria-label="PLZ und Ort" aria-describedby="basic-addon1">
        </div>
        <div class='input-group mb-3'>
            <input type="text" id="adress" class="form-control" placeholder="Adresszusatz" aria-label="Adresszusatz">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-globe-americas" viewBox="0 0 16 16">
            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0ZM2.04 4.326c.325 1.329 2.532 2.54 3.717 3.19.48.263.793.434.743.484-.08.08-.162.158-.242.234-.416.396-.787.749-.758 1.266.035.634.618.824 1.214 1.017.577.188 1.168.38 1.286.983.082.417-.075.988-.22 1.52-.215.782-.406 1.48.22 1.48 1.5-.5 3.798-3.186 4-5 .138-1.243-2-2-3.5-2.5-.478-.16-.755.081-.99.284-.172.15-.322.279-.51.216-.445-.148-2.5-2-1.5-2.5.78-.39.952-.171 1.227.182.078.099.163.208.273.318.609.304.662-.132.723-.633.039-.322.081-.671.277-.867.434-.434 1.265-.791 2.028-1.12.712-.306 1.365-.587 1.579-.88A7 7 0 1 1 2.04 4.327Z"/>
            </svg></span>
            <select class="form-select" id="country" aria-describedby="basic-addon2" aria-label="Default select example">
                <option selected value="Oesterreich">Österreich</option>
                <option value="Deutschland">Deutschland</option>
                <option value="Schweiz">Schweiz</option>
            </select>
        </div>
    </div>
    <div class='row'>
        <h3>Bezahlung:</h3>
        <div class='input-group mb-3'>
            <span class='input-group-text' id='basic-addon3'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card" viewBox="0 0 16 16">
            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
            <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
            </svg></span>
            <select class="form-select" id="currency" aria-describedby="basic-addon3" aria-label="Default select example">
                <option selected value="PayPal">PayPal</option>
                <option value="Sofortüberweisung">Sofortüberweisung</option>
                <option value="Kretitkarte">Kretitkarte</option>
            </select>
        </div>
    </div>
    <div class='row'>
        <button class='btn btn-success' onclick='finishorder(1)'>Bestellen</button>
    </div>
    </form>
    
</div>