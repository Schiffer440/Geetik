<?php require "Templates/header.php";?>

<form action="?p=sub-password" method="post">
    <fieldset class="registration-zone">
        <legend>User infos</legend>
        <div>
            <label for="firstname">Firstname: </label>
            <input class="common-input" readonly type="text" name="firstname" id="firstname" value="<?= $_POST['firstname'] ?>">
            <label for="lastname"> Lastname: </label>
            <input class="common-input" readonly type="text" name="lastname" id="lastname" value="<?= $_POST['lastname'] ?>">
        </div>
     
        <div>
            <label for="email">Email: </label>
            <input class="common-input" readonly type="text" name="email" id="email" value="<?= $_POST['email'] ?>">
            <label for="genre">Genre: </label>
            <input class="common-input" readonly type="text" name="genre" id="genre" value="<?= $_POST['genre'] ?>">
        </div>
        <div>
            <label for="birthdate">Birthdate: </label>
        <input class="common-input" readonly type="text" name="birthdate" id="birthdate" value="<?= $_POST['birthdate'] ?>">
        </div>
        <div>
            <label for="city">City: </label>
            <input class="common-input" readonly type="text" name="city" id="city" value="<?= $_POST['city'] ?>">
        </div>
    </fieldset>
    <div id="sub-confirm-btn">
        <input type="image" src="../assets/confirm-check-btn.png" width="100px", height="100px" value="Confirm">
        <input type="image" src="../assets/redo-btn.png" width="100px", height="100px" formmethod="post" formaction="?p=subscription-page">
    </div>
</form>
<?php include "Templates/footer.php"?>