<?php require "Templates/header.php"?>

<form class="registration-zone" action="?p=sub-final" method="post">
    <label for="first-password">Enter your password</label>
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