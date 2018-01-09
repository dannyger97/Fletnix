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
                <ul class="submenu">
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
            <h1>Abonnement</h1>
            <p>
                Wij van Fletnix bieden zeer mooie abonnementen aan voor voordelige prijzen. De drie abonnementen die wij
                aanbieden zijn 'Private', 'Sergeant' en 'Commander'. Private is de voordeligste van de drie pakketten,
                maar heeft alles wat de dagelijkse soldaat nodig heeft. Sergeant is de middenweg en heeft toch een beetje
                extra kaliber vergeleken met het Private-abonnement. Voor de ultieme krijgers onder ons is er het
                Commander-pakket. Dit is het beste pakket, maar daar hangt natuurlijk ook een duurder prijskaartje aan.
                Hopelijk zit er wat leuks tussen voor u!
            </p>
            <br>
            <div class="abonnement">
                <table>
                    <tr>
                        <th>Feature</th>
                        <th>Private</th>
                        <th>Sergeant</th>
                        <th>Commander</th>
                    </tr>
                    <tr>
                        <td>Prijs per maand</td>
                        <td>3.99</td>
                        <td>6.99</td>
                        <td>11.99</td>
                    </tr>
                    <tr>
                        <td>Aantal schermen</td>
                        <td>1</td>
                        <td>2</td>
                        <td>4</td>
                    </tr>
                    <tr>
                        <td>HD materiaal</td>
                        <td>&#10004;</td>
                        <td>&#10004;</td>
                        <td>&#10004;</td>
                    </tr>
                    <tr>
                        <td>Ultra HD materiaal</td>
                        <td></td>
                        <td></td>
                        <td>&#10004;</td>
                    </tr>
                    <tr>
                        <td>Eindeloos oorlogsfilms bekijken</td>
                        <td>&#10004;</td>
                        <td>&#10004;</td>
                        <td>&#10004;</td>
                    </tr>
                    <tr>
                        <td>Elke maand opzegbaar</td>
                        <td>&#10004;</td>
                        <td>&#10004;</td>
                        <td>&#10004;</td>
                    </tr>

                </table>
                <br>
            </div>
            <h2>Aanmelden</h2>
            <br>
            <form class="formulier" action="abonnement.php" id="aanmelding">
                <div class="">
                    <label for="voornaam">Voornaam</label>
                    <input type="text" name="voornaam" id="voornaam" placeholder="Voornaam.."/>
                </div>
                <div>
                    <label for="achternaam">Achternaam</label>
                    <input type="text" name="achternaam" id="achternaam" placeholder="Achternaam..">
                </div>
                <div>
                    <label for="land">Land</label>
                    <select name="land" id="land">
                        <option value="nederland">Nederland</option>
                        <option value="belgië">België</option>
                    </select>
                </div>
                <div>
                    <label for="geboortedatum">Geboortedatum</label>
                    <input type="date" name="geboortedatum" id="geboortedatum" max="2017-11-30">
                </div>
                <div>
                    <label for="rekeningnummer">Rekeningnummer</label>
                    <input type="text" id="rekeningnummer" placeholder="Rekeningnummer.." name="rekeningnummer">
                </div>
                <div>
                    <label for="gebruikersnaam">Gebruikersnaam</label>
                    <input type="text" id="gebruikersnaam" name="gebruikersnaam" placeholder="Gebruikersnaam..">
                </div>
                <div>
                    <label for="wachtwoord">Wachtwoord</label>
                    <input type="password" id="wachtwoord" name="wachtwoord" placeholder="Wachtwoord..">
                </div>
                <div>
                    <label for="wachtwoord2">Bevestig wachtwoord</label>
                    <input type="password" id="wachtwoord2" name="wachtwoord2" placeholder="Bevestig wachtwoord..">
                </div>
                <div>
                    <label for="private">Private</label>
                    <input type="radio" name="abonnement" id="private" value="Private">
                    <label for="sergeant">Sergeant</label>
                    <input type="radio" name="abonnement" id="sergeant" value="Sergeant">
                    <label for="commander">Commander</label>
                    <input type="radio" name="abonnement" id="commander" value="Commander"><br/>
                </div>
                <div>
                    <a href="abonnementformulieringevuld.php">Verzenden</a>
                </div>
            </form>
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