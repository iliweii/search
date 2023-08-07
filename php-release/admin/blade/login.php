<form id="Form" class="form-signin text-center">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="Tbuser" class="sr-only">Username</label>
    <input type="text" id="Tbuser" class="form-control" placeholder="Username" required autofocus>
    <div id="tbuserFeedback" class="valid-feedback"></div>
    <label for="Tbpwd" class="sr-only">Password</label>
    <input type="password" id="Tbpwd" class="form-control" placeholder="Password" required>
    <div id="tbpwdFeedback" class="valid-feedback"></div>
    <div class="input-group" id="TbverifyGroup">
        <label for="Tbverify" class="sr-only">Verify</label>
        <input type="text" id="Tbverify" class="form-control" placeholder="Verify" required>
        <div class="input-group-append">
            <div id="verify-img"></div>
        </div>
    </div>
    <div id="tbverifyFeedback" class="invalid-feedback"></div>

    <button id="Loginbtn" class="btn btn-lg btn-primary btn-block mt-3" type="button">Sign in</button>
</form>