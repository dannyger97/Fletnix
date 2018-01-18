<?php
session_start();

if (isset($_SESSION['laatsteactiviteit']) && (time() - $_SESSION['laatsteactiviteit'] > 600 )) {
    session_unset();
    session_destroy();
}
$_SESSION['laatsteactiviteit'] = time();

echo "
<!DOCTYPE html>
<html lang='nl'>
<head>
    <meta charset='UTF-8'>
    <base href='http://localhost/Fletnix/index.php'>
    <title>" . $title . "</title>
    <link rel='stylesheet' href='/Fletnix/css/styles.css'>
    <meta name='viewport' content='width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1'>
</head>
<body>
<header>
    <a href='index.php'><img class='logo' src='images/logo.png' alt='Fletnix logo'></a>
    <div class='inlog'>
        <ul>
            ";
if(isset($_SESSION['loginstatus']) && ($_SESSION['loginstatus'] == TRUE)){
        echo " <li class='inlogmenu'><span class='gebruikersnaam'><a class='inloggen' href='account.php'> " . $_SESSION['username'] . "</a>&#9662;</span>";
}
elseif(!isset($_SESSION['loginstatus'])){
    echo "<li class='inlogmenu'><span class='gebruikersnaam'><a class='inloggen' href='inlog.php'>Inloggen </a>&#9662;</span>";
}

echo "
                <!-- gebruikers menu -->
                <ul class='inlogsubmenu'>
                    <li><a href='account.php'> Account</a></li>
                    <li><a href='uitlog.php'> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class='navigation-container'>
        <ul class='navigation-items'>
            <!-- Desktop menu -->
            <li><a href='index.php'> Home</a></li>
            <li><a href='films'> Filmoverzicht</a></li>
            <li><a href='abonnement.php'> Abonnement</a></li>
            <li><a href='about.php'> Over ons</a></li>
        </ul>
        <ul>
            <li class='dropdown'><span class=\'menutextlayout\'>Menu &#9662;</span>
                <!-- Smartphone menu -->
                <ul class='hidemenu submenu'>
                    <li><a href='index.php'> Home</a></li>
                    <li><a href='filmoverzicht.php'> Filmoverzicht</a></li>
                    <li><a href='abonnement.php'> Abonnement</a></li>
                    <li><a href='about.php'> Over ons</a></li>

                </ul>
            </li>
        </ul>
    </div>
</header>
";

?>