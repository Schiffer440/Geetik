<?php require "Templates/header.php";?>

<div class="main-container profile-page">
    <div id="profile-picture">
        <img src="../assets/dwarf-constructing-profile-filling-img.png" alt="" width="500" height="500">
    </div>
    <div>
        <div id="profile-page-infos">
                <input disabled class="common-input" type="text" name="firstname" id="firstname" value="<?=$user_data['firstname']?>">
                <input disabled class="common-input" type="text" name="user_data[lastname]" id="lastname" value="<?=$user_data['lastname']?>">
                <input disabled class="common-input" type="text" name="city" id="city" value="<?=$user_data['city']?>">
                <p><?php echo date_diff(date_create($user_data['birthdate']), date_create('today'))->y?> ans</p>
        </div>
        <div>
            <p>Fav games: </p>
            <?php foreach ($user_games as $game):?>
                <p><?=$game['game_name']?></p>
                <img src="<?=$game['game_image']?>" alt="">
            <?php endforeach?>
        </div>
    </div>
</div>

<?php include "Templates/footer.php"?>