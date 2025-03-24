<?php require "Templates/header.php";?>

<?php if (isset($_SESSION['id_user'])):?>
    <div class="main-container" id="profile-display-zone">
        <form id="filters" action="?p=home" method="post">
            <label for="genre">Genre: </label>
            <select class="common-input" name="filter[genre]" id="genre">
                <option value="All">All</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <input class="common-input" name="filter[city]" list="cities-list" placeholder="City">
                <datalist id="cities-list">
                    <?php foreach ($cities as $city):?>
                        <option value="<?= $city['name']?>"><?= $city['name']?></option>
                    <?php endforeach ?>
            </datalist>
            <input class="common-input" list="games-filter" placeholder="Game name" name="filter[game]">
            <datalist id="games-filter">
                <?php foreach ($games as $game): ?>
                    <option value="<?=$game['game_name']?>">
                <?php endforeach ?>
            </datalist>
            <label for="filter">Filter</label>
            <input id="filter" class="common-input" type="image" alt="submit" src="../assets/filter-image.png" width="30" height="30">
        </form>
        <h2>They might interest you !</h2>
        <div id="profile-carousel">
            <?php foreach ($data as $profile):?>
                <div class="profile">
                    <img src="../assets/dwarf-constructing-profile-filling-img.png" alt="" width="500" height="500">
                    <a href="?p=profile-page&user=<?= $profile['id']?>">Go to profile</a>
                    <p><?= $profile['firstname'], " ", $profile['lastname']?></p>
                    <p><?php echo date_diff(date_create($profile['birthdate']), date_create('today'))->y?> ans</p>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis sunt pariatur optio odio numquam iusto alias, excepturi, est magnam, porro velit? Quasi inventore dolores ipsa libero voluptatem tempore omnis dolorum?</p>
                </div>
            <?php endforeach?>
        </div>
        
    </div>
<?php else:?>
    <div id="welcome-zone">
        <h2 id="welcome-title">Welcome to Geetik !</h2>
    </div>
<?php endif?>


<?php include "Templates/footer.php"?>