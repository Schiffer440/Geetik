<?php require "Templates/header.php";?>
<form action="?p=send-profile" method="post">
    <fieldset id="complete-profile-field">
        <legend>Please complete your profile to access main site</legend>
            <p>Interested in: </p>
            <select class="common-input" name="interest" id="profile-genre-select">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Both">Both</option>
            </select>
            <p>Choose your 5 favorite games :</p>
            <input required class="common-input" list="games-1" placeholder="Game name" name="game_name[]">
            <datalist id="games-1">
                <?php foreach ($data as $elem): ?>
                    <option value="<?=$elem['game_name']?>">
                <?php endforeach ?>
                </datalist>
            <input required class="common-input" list="games-2" placeholder="Game name" name="game_name[]">
            <datalist id="games-2">
                <?php foreach ($data as $elem): ?>
                    <option value="<?=$elem['game_name']?>">
                <?php endforeach ?>
            </datalist>
            <input required class="common-input" list="games-3" placeholder="Game name" name="game_name[]">
            <datalist id="games-3">
                <?php foreach ($data as $elem): ?>
                    <option value="<?=$elem['game_name']?>">
                <?php endforeach ?>
            </datalist>
            <input required class="common-input" list="games-4" placeholder="Game name" name="game_name[]">
            <datalist id="games-4">
                <?php foreach ($data as $elem): ?>
                    <option value="<?=$elem['game_name']?>">
                <?php endforeach ?>
            </datalist>
            <input required class="common-input" list="games-5" placeholder="Game name" name="game_name[]">
            <datalist id="games-5">
                <?php foreach ($data as $elem): ?>
                    <option value="<?=$elem['game_name']?>">
                <?php endforeach ?>
            </datalist>
        </fieldset>
        <div class="small-btn-bg">
            <input class="login-registration-btn-txt" type="submit" value="Send">
        </div>
</form>
<?php include "Templates/footer.php"?>