<?php require "Templates/header.php";?>

<div class="main-container profile-page">
    <div id="profile-picture">
        <img src="../assets/dwarf-constructing-profile-filling-img.png" alt="" width="500" height="500">        
    </div>
    <div>
        <div>
            <form action="?p=update-profile" method="post">
                <label for="firstname">Firstname</label>
                <input class="common-input" type="text" name="firstname" id="firstname" value="<?=$user_data['firstname']?>">
                <input type="image" alt="submit" src="../assets/feather-with-writing.png" width="50" height="50">
            </form>
            <form action="?p=update-profile" method="post">
                <label for="lastname">Lastname</label>
                <input class="common-input" type="text" name="user_data[lastname]" id="lastname" value="<?=$user_data['lastname']?>">
                <input type="image" alt="submit" src="../assets/feather-with-writing.png" width="50" height="50">
            </form>
            <form action="?p=update-profile" method="post">
                    <label for="email">Email</label>
                    <input class="common-input" type="text" name="email" id="email" value="<?=$user_data['email']?>">
                    <input type="image" alt="submit" src="../assets/feather-with-writing.png" width="50" height="50">
            </form>
            <form action="?p=update-profile" method="post">
                <label for="city">City</label>
                <input class="common-input" type="text" name="city" id="city" value="<?=$user_data['city']?>">
                <input type="image" alt="submit" src="../assets/feather-with-writing.png" width="50" height="50">
            </form>
            <form action="?p=update-password" method="post">
                <label for="password">Password</label>
                <input disabled class="common-input" type="password" name="password" id="password" value="<?=$user_data['city']?>">
                <input type="image" alt="submit" src="../assets/feather-with-writing.png" width="50" height="50">
            </form>
            <form action="?p=update-profile" method="post">
                <label for="interest">Interest</label>
                    <select class="common-input" name="interest" id="interest">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
                    <input type="image" alt="submit" src="../assets/feather-with-writing.png" width="50" height="50">
            </form>
        </div>
        <div>
            <p>Fav games:</p>
            <?php foreach ($user_games as $game):?>
                <p><?=$game['game_name']?></p>
                <img src="<?=$game['game_image']?>" alt="">
            <?php endforeach?>
        </div>
    </div>
</div>

<?php include "Templates/footer.php"?>