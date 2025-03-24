<?php require_once "Templates/header.php"?>

<h2 class="login-registration-title">Login</h2>
<form action="?p=login" method="post">
    <?php if(isset($_SESSION['log_fail']) && $_SESSION['log_fail'] == 1):?>
        <div id="log-fail-div">
            <p id="log-fail-alert">Login error: please check your username or password. </p>
        </div>
    <?php endif ?>
    <div id="login-zone">
        <div class="login-input">
            <!-- <label for="user-mail"> Email</label> -->
            <input class="common-input" name="login-email" required id="user-mail" type="text" placeholder="Email">
        </div>
        <div class="login-input">
            <!-- <label for="user-pwd">Password</label> -->
            <input class="common-input" name="login-pwd" required id="user-pwd" type="password" placeholder="Password">
        </div>
    </div>
    <div class="small-btn-bg">
        <input class="login-registration-btn-txt" type="submit" value="Play">
    </div>
</form>

<?php require_once "Templates/footer.php"?>