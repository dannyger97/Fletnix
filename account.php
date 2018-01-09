<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Account</title>
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
    <div class="content-container">
        <div class="content">
            <h1>Account</h1>
            <table class="account">
                <tr>
                    <th>
                        Voornaam
                    </th>
                    <td>
                        John
                    </td>
                </tr>
                <tr>
                    <th>
                        Achternaam
                    </th>
                    <td>
                        Doe
                    </td>
                </tr>
                <tr>
                    <th>Gebruikersnaam</th>
                    <td>HanGebruiker123</td>
                </tr>
                <tr>
                    <th>
                        Emailadres
                    </th>
                    <td>
                        emailadres@domein.nl
                    </td>
                </tr>
                <tr>
                    <th>
                        Telefoonnummer
                    </th>
                    <td>
                        0786-1234578
                    </td>
                </tr>
                <tr>
                    <th>
                        Abonnement
                    </th>
                    <td>
                        Sergeant
                    </td>
                </tr>
            <tr>
                <th>
                    Rekeningnummer
                </th>
                <td>
                    NL99BANK01234567890
                </td>
            </tr>

            </table>
            <br>
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