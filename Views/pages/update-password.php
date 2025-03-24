<?php require "Templates/header.php"?>

<form class="registration-zone" action="?p=update-password" method="post">
    <?php if (isset($_POST['actual_password_error']) && $_POST['actual_password_error'] == 1):?>
        <?= "<p>Wrong password</p>"?>
    <?php endif?>
    <label for="first-password">Enter actual password</label>
    <input class="common-input" required name="actual-password" id="first-password" type="password">
    <label for="first-password">Enter new password</label>
    <input class="common-input" required name="first-password" id="first-password" type="password">
    <label for="first-password">Confirm your password</label>
    <input class="common-input" required name="second-password" id="second-password" type="password">
    <input type="image" src="../assets/double-arrow-right.png" width="150px" height="70px" value="Create password">
</form>
<?php if (isset($_POST['password_error']) && $_POST['password_error'] == 1):?>
    <?= "<p>Passwords don't match</p>"?>
<?php endif?>
<a href="?p=">Home</a>


<?php include "Templates/footer.php"?>