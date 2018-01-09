<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Fletnix</title>
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
</head>
<body>
<header>
    <a href="index.php"><img class="logo" src="images/logo.png" alt="Fletnix logo"></a>
    <div class="inlog">
        <ul>
            <li class="inlogmenu"><span class="gebruikersnaam">Gebruikersnaam &#9662;</span>
                <!-- gebruikers menu -->
                <ul class="inlogsubmenu">
                    <li><a href="account.php"> Account</a></li>
                    <li><a href="uitlog.php"> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="navigation-container">
        <ul class="navigation-items">
            <!-- Desktop menu -->
            <li><a href="index.php"> Home</a></li>
            <li><a href="filmoverzicht.php"> Filmoverzicht</a></li>
            <li><a href="trailers.php"> Trailers</a></li>
            <li><a href="abonnement.php"> Abonnement</a></li>
            <li><a href="about.php"> Over ons</a></li>
        </ul>
        <ul>
            <li class="dropdown"><span class="menutextlayout">Menu &#9662;</span>
                <!-- Smartphone menu -->
                <ul class="hidemenu submenu">
                    <li><a href="index.php"> Home</a></li>
                    <li><a href="filmoverzicht.php"> Filmoverzicht</a></li>
                    <li><a href="trailers.php"> Trailers</a></li>
                    <li><a href="abonnement.php"> Abonnement</a></li>
                    <li><a href="about.php"> Over ons</a></li>

                </ul>
            </li>
        </ul>
    </div>
</header>
<main>
    <div class="index-container">
        <div class="video-container">
            <div class="index-text">
                <p>
                    Fletnix is jouw ultieme filmstation voor alle soorten oorlogsfilms. <br/>
                    Oorlogfilms over de Tweede Wereldoorlog, de Koude oorlog en nog veel meer verschillende tijdperken! <br/>
                </p>
                <h2>
                    Welke abonnementen biedt Fletnix u? Kijk hieronder! Voor meer details over de abonnementen
                    <a href="abonnement.php">klik hier!</a><br/>
                    Een kijkje nemen naar de oorlogfilms die Fletnix aanbiedt?
                    <a href="filmoverzicht.php">Klik hier!</a>
                </h2>
            </div>
            <div class="overlay">
            </div>
            <video muted loop autoplay>
                <source src="videos/background-video.mp4" type="video/mp4">
            </video>
        </div>
    </div>
    <div class="abonnement-container">
        <div class="abonnement-item">
            <h1>Abonnementen</h1>
            <p>
                Fletnix biedt drie soorten abonnementen aan. Daar zit voor elke persoon een prima pakket tussen.
                Wilt u meer weten over de abonnementen? <br/> <br/>
            </p>
            <a href="abonnement.php"> Ik wil meer weten!</a>
        </div>
        <div class="abonnement-item-foto">
            <img src="images/private-abonnement.jpg" alt="Private abonnement">
            <img src="images/sergeant-abonnement.jpg" alt="Sergeant abonnement">
            <img src="images/commander-abonnement.jpg" alt="Commander abonnement">
        </div>
    </div>
</main>
<footer>
    <h4>
        &copy; - Danny Gerritsen en Wout Hakvoort - 2017
    </h4>
</footer>
</body>
</html>