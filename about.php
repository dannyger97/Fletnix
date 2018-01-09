<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>About</title>
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
            <h1>Over ons</h1>
            <p>
                Wij, Danny Gerritsen en Wout Hakvoort, zijn twee ICT-studenten aan de Hogeschool van Arnhem en Nijmegen.
                In onze korte ICT carrière is dit de eerste keer dat wij een HTML/CSS pagina moeten maken. Wij kregen de
                opdracht vanuit de course WebTech om een HTML/CSS pagina te maken voor het bedrijf "Fletnix". Fletnix is
                een
                directe concurrent van het grote bedrijf Netflix. Als studenten wilden wij deze pagina zo aantrekkelijk
                mogelijk maken voor klanten, zodat zij niet overstappen naar de concurrent.<br/> <br/>
                Fletnix is een bedrijf wat wereldwijd een maandabonnement aanbiedt voor streaming video on demand via
                internet. Hierbij is de mogelijkheid om de film of serie te pauzeren, vooruit te spoelen of terug te
                spoelen.
                Ook heeft de gebruiker geen last van reclameblokken, wat wel het geval zou zijn bij TV-zenders. <br/>
                <br/>
                Als doelgroep hebben wij gekozen voor mensen die van oorlogsfilms houden. Hierbij is tijdens het maken
                en
                het ontwerpen van de webpagina rekening mee gehouden. Beiden zijn wij erg gefascineerd door
                oorlogsfilms.
                Films zoals 'Saving Private Ryan' en 'Hacksaw Ridge' hebben er voor gezorgd dat wij gekozen hebben voor
                deze
                bepaalde doelgroep. Ook zijn wij beide geïnspireerd door het spel 'Call of Duty: World War II' wat zich
                afspeelt tijdens de Tweede Wereldoorlog. Doormiddel van deze inspiratie is deze site tot stand gekomen.
            </p> <br/>
            <h1>Contact</h1>
            <P>
                Als u contact wilt opnemen met ons, vult u dan dit formulier in:
            </P><br/>
            <form class="formulier" action="about.php" id="contact">
                <div class="veld">
                    <label for="naam">Naam</label>
                    <input type="text" name="naam" id="naam" maxlength="40" placeholder="Naam"/>
                </div>
                <div class="geslacht-container">
                    <div class="geslacht">
                        <label for="man">Man</label>
                        <input type="radio" name="geslacht" value="Man" id="man"/>
                    </div>
                    <div class="geslacht">
                        <label for="vrouw">Vrouw</label>
                        <input type="radio" name="geslacht" value="Vrouw" id="vrouw"/></div>
                </div>
                <div class="veld">
                    <label for="telefoon">Telefoon</label>
                    <input type="tel" name="telefoon" id="telefoon" maxlength="10" placeholder="Telefoonnummer.."/>
                </div>
                <div class="veld">
                    <label for="email">E-mail</label>
                    <input type="email" name="naam" id="email" placeholder="E-mail adres.."/>
                </div>
                <div class="veld">
                    <label for="opmerkingen">Opmerkingen</label>
                    <textarea name="opmerkingen" id="opmerkingen" rows="6" cols="40" placeholder="Opmerking.."></textarea>
                </div>
                <a href="contactformulieringevuld.php">Verzenden</a>
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