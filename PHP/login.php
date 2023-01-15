<div class="container">
    <div class="row justify-content-center" style="margin-top: 40px">
        <div class="col-lg-4 col-md-3">
            <div class='card'>
                <div class='card-contand'>
                    <div class='card-header'>
                        <h4 class='card-title text-center'>Login</h4>
                    </div>
                    <div class='card-text'>
                        <form method="POST">
                            <input type="text" class="form-control" Name="username" id="username" placeholder="Email"><br/>
                            <input type="password" class="form-control" Name="password" id="password" placeholder="password"><br/>
                            <div class="form-check ms-2 mb-2">
                                <input class="form-check-input" type="checkbox" value="true" id="angemeldet">
                                <label class="form-check-label" for="angemeldet">
                                    Angemeldet bleiben
                                </label>
                            </div>
                            <div id="error" class="ms-2 me-2"></div>
                            <div class="card-footer text-center">
                                <a role="button" onclick="admin()" class="btn btn-warning">Login</a>
                                <a role="button" onclick="signIn()" class="btn btn-warning">SignIn</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>