<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&family=Oswald:wght@200..700&family=Sriracha&display=swap" rel="stylesheet">
    <title>Geetik</title>
</head>
<body>
    <header>
        <nav id="nav-bar" class="main-container">
            <?php if (isset($_SESSION['id_user'])):?>
                <h2 id="main-title"><a href="user.php?p=home">Geetik</a></h2>
            <?php else:?>
                <h2 id="main-title"><a href="index.php?p=home">Geetik</a></h2>
            <?php endif?>
            <div id="nav-menu">
                <?php if (!isset($_SESSION['id_user']) || $_SESSION['id_user'] == ""): ?>
                    <?php if (isset($_GET['p']) && $_GET['p'] == 'subscription-page'):?>
                        <a class="menu-link" href="../login.php?p=login-page">Login</a>
                    <?php elseif (isset($_GET['p']) && $_GET['p'] == 'login-page'):?>
                        <a class="menu-link" href="../register.php?p=subscription-page">Register</a>
                    <?php else:?>
                        <a class="menu-link" href="../login.php?p=login-page">Login</a>
                        <a class="menu-link" href="../register.php?p=subscription-page">Register</a>
                        <?php endif?>
                <?php else:?>
				    <a class="menu-link" href="?p=user-profile-page">Profile</a>
				    <a class="menu-link" href="index.php?p=disconnect">Disconnect</a>
                <?php endif?>
            </div>
        </nav>
    </header>
	<main>
