<?php

echo "
<!DOCTYPE html>
<html lang=\"nl\">
<head>
    <meta charset=\"UTF-8\">
    <title>".$title . "</title>
    <link rel=\"stylesheet\" href=\"css/styles.css\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1\">
</head>
<body>
<header>
    <a href=\"index.php\"><img class=\"logo\" src=\"images/logo.png\" alt=\"Fletnix logo\"></a>
    <div class=\"inlog\">
        <ul>
            <li class=\"inlogmenu\"><span class=\"gebruikersnaam\">Gebruikersnaam &#9662;</span>
                <!-- gebruikers menu -->
                <ul class=\"inlogsubmenu\">
                    <li><a href=\"\"> Profiel</a></li>
                    <li><a href=\"account.php\"> Account</a></li>
                    <li><a href=\"uitlog.php\"> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class=\"navigation-container\">
        <ul class=\"navigation-items\">
            <!-- Desktop menu -->
            <li><a href=\"index.php\"> Home</a></li>
            <li><a href=\"filmoverzicht.php\"> Filmoverzicht</a></li>
            <li><a href=\"trailers.php\"> Trailers</a></li>
            <li><a href=\"abonnement.php\"> Abonnement</a></li>
            <li><a href=\"about.php\"> Over ons</a></li>
        </ul>
        <ul>
            <li class=\"dropdown\"><span class=\"menutextlayout\">Menu &#9662;</span>
                <!-- Smartphone menu -->
                <ul class=\"hidemenu submenu\">
                    <li><a href=\"index.php\"> Home</a></li>
                    <li><a href=\"filmoverzicht.php\"> Filmoverzicht</a></li>
                    <li><a href=\"trailers.php\"> Trailers</a></li>
                    <li><a href=\"abonnement.php\"> Abonnement</a></li>
                    <li><a href=\"about.php\"> Over ons</a></li>

                </ul>
            </li>
        </ul>
    </div>
</header>
";

?>