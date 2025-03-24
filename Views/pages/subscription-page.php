<?php require "Templates/header.php"?>

<h2 class="login-registration-title">Registration</h2>
<form action="?p=send-sub" method="post">
    <div class="registration-zone">
        <div>
            <?php if (isset($_POST['firstname'])):?>
                <input class="common-input" name="firstname"  required type="text" placeholder="Firstname" value="<?= $_POST['firstname']?>">
            <?php else:?>
                <input class="common-input" name="firstname"  required type="text" placeholder="Firstname">
            <?php endif?>
            <label>*</label>
            <?php if (isset($_POST['lastname'])):?>
                <input class="common-input" name="lastname"  required type="text" placeholder="Lastname" value="<?= $_POST['lastname']?>">
            <?php else:?>
                <input class="common-input" name="lastname"  required type="text" placeholder="Lastname" >
            <?php endif?>
            <label>*</label>
        </div>
        <div>
            <?php if (isset($_POST['birthdate'])):?>
                <input class="common-input" name="birthdate"  required type="date" max="2007-01-01" value="<?= $_POST['birthdate']?>">
            <?php else:?>
                <input class="common-input" name="birthdate"  required type="date" max="2007-01-01">
            <?php endif?>
                <label>*</label>
                <select class="common-input" required name="genre" id="genre-selector">
                <option selected value="">Genre</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            <label>*</label>
        </div>
        <div>
            <?php if (isset($_POST['email'])):?>
                <input class="common-input" name="email"  pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" id ="email-sub" required type="text" placeholder="Email" value="<?= $_POST['email']?>">
            <?php else:?>
                <input class="common-input" name="email"  pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" id ="email-sub" required type="text" placeholder="Email">
            <?php endif?>
                <label>*</label>
                <?php if (isset($_POST['mail_error']) && $_POST['mail_error'] == 1):?>
                    <?= "<label for='email-sub'>Email already taken</label>"?>
                <?php endif?>
        </div>
        <div>
            <?php if (isset($_POST['city'])):?>
                <input class="common-input" name="city" list="cities-list" placeholder="City" value="<?= $_POST['city']?>">
                <datalist id="cities-list">
                    <?php foreach ($cities as $city):?>
                        <option value="<?= $city['name']?>"><?= $city['name']?></option>
                    <?php endforeach ?>
                </datalist>
            <?php else:?>
                <input class="common-input" name="city" list="cities-list" placeholder="City">
                <datalist id="cities-list">
                    <?php foreach ($cities as $city):?>
                        <option value="<?= $city['name']?>"><?= $city['name']?></option>
                    <?php endforeach ?>
                </datalist>
            <?php endif?>
        </div>
        <div id="registration-btn-bg">
            <input class="login-registration-btn-txt" type="submit" value="Register">
        </div>
    </div>
</form>
<?php include "Templates/footer.php"?>