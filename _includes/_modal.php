<div id="loginModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span id="close1" class="close">&times</span>
            <h3>Log In Here</h3>
        </div>
        <div class="modal-body">
            <?php include '_includes/modal/login.php';?>
        </div>
        <div class="modal-footer">
            <button id="btnsignup" class="btn btn-warning btn-block">Don't have an account? Sign Up</button>
        </div>
    </div>
</div>
<div id="signupModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span id="close2" class="close">&times</span>
            <h3>Sign Up Here</h3>
        </div>
        <div class="modal-body">
            <?php include '_includes/modal/signup.php';?>
        </div>
        <div class="modal-footer">
            <button id="btnlogin" class="btn btn-warning btn-block">Have an account? Log In</button>
        </div>
    </div>
</div>
<div id="shareModal" class="modal container-fluid">
    <div class="modal-content">
        <div class="modal-header">
            <span id="close3" class="close">&times</span>
            <h3>Share</h3>
        </div>
        <div class="modal-body">
            <?php include '_includes/modal/share.php';?>
        </div>
    </div>
</div>
