<?php
$title = 'Abonnement';
include_once 'php/header.inc.php';
include 'php/functions.inc.php';
require_once 'php/dbconnectie.php';

if (!isset($_GET['registreerfout'])) {
    $_GET['registreerfout'] = '';
}

if (isset($_POST['verzending'])) {
    $emailadres = htmlspecialchars($_POST['email']);
    $gebruikersnaam = htmlspecialchars($_POST['gebruikersnaam']);
    $voornaam = htmlspecialchars(ucfirst($_POST['voornaam']));
    $achternaam = htmlspecialchars(ucfirst($_POST['achternaam']));
    $land = $_POST['land'];
    $betaling = $_POST['betaling'];
    $kaartnummer = htmlspecialchars($_POST['kaartnummer']);
    $datum = new DateTime($_POST['geboortedatum']);
    $geboortedatum = date_format($datum, 'Y-m-d');
    $geslacht = $_POST['geslacht'];
    $wachtwoord = $_POST['wachtwoord'];
    $bevestiging = $_POST['bevestiging'];
    $abonnement = $_POST['abonnement'];
    $startdatum = date('Y-m-d');
    $einddatum = NULL;

    $statement = "INSERT INTO Customer VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?) ";
    $query = $dbc->prepare($statement);

    if (empty(trim($emailadres)) || empty(trim($gebruikersnaam)) || empty(trim($voornaam)) || empty(trim($achternaam)) ||
        empty(trim($kaartnummer)) || empty(trim($geboortedatum)) || empty(trim($geslacht)) || empty(trim($wachtwoord)) || empty(trim($wachtwoord)) || empty(trim($bevestiging))) {
        header("Location:abonnement.php?registreerfout=leeg&voornaam=$voornaam&achternaam=$achternaam&kaartnummer=$kaartnummer");
    } elseif (strlen($wachtwoord) < 6) {
        header("Location:abonnement.php?registreerfout=wachtwoordlengte&voornaam=$voornaam&achternaam=$achternaam&kaartnummer=$kaartnummer");
    } elseif ($wachtwoord != $bevestiging) {
        header("Location:abonnement.php?registreerfout=wachtwoord&voornaam=$voornaam&achternaam=$achternaam&kaartnummer=$kaartnummer");
    } elseif (!filter_var($emailadres, FILTER_VALIDATE_EMAIL)) {
        header("Location:abonnement.php?registreerfout=emailadres&voornaam=$voornaam&achternaam=$achternaam&kaartnummer=$kaartnummer");
    } elseif (!preg_match("#[0-9]+#", $wachtwoord)) {
        header("Location:abonnement.php?registreerfout=wachtwoordcijfer&voornaam=$voornaam&achternaam=$achternaam&kaartnummer=$kaartnummer");
    } else {
        try {
            $wachtwoord = password_hash($wachtwoord, PASSWORD_BCRYPT);
            $query->execute([$emailadres, $achternaam, $voornaam, $betaling, $kaartnummer, $abonnement, $startdatum, $einddatum, $gebruikersnaam, $wachtwoord, $land, $geslacht, $geboortedatum]);
        } catch (PDOException $fout) {
            if ($fout->errorInfo[0] == 23000) {
                $foutbericht = $fout->getMessage();
                $emailerror = 'Violation of PRIMARY KEY';
                $gebruikersnaamfout = 'Violation of UNIQUE KEY';
                $kaartlengtefout = 'The INSERT statement conflicted with the CHECK constraint "ck_payment_card_length".';
                $geboortedatumfout = 'The INSERT statement conflicted with the CHECK constraint "ck_birth_date".';
                if (strpos($foutbericht, $emailerror) !== FALSE) {
                    header("Location:abonnement.php?registreerfout=dubbelemail&voornaam=$voornaam&achternaam=$achternaam&kaartnummer=$kaartnummer");
                }
                if (strpos($foutbericht, $gebruikersnaamfout) !== FALSE) {
                    header("Location:abonnement.php?registreerfout=dubbelgebruikersnaam&voornaam=$voornaam&achternaam=$achternaam&kaartnummer=$kaartnummer");
                }
                if (strpos($foutbericht, $kaartlengtefout) !== FALSE) {
                    header("Location:abonnement.php?registreerfout=kaartnummerlengte&voornaam=$voornaam&achternaam=$achternaam&kaartnummer=$kaartnummer");
                }
                if (strpos($foutbericht, $geboortedatumfout) !== FALSE) {
                    header("Location:abonnement.php?registreerfout=geboortedatum&voornaam=$voornaam&achternaam=$achternaam&kaartnummer=$kaartnummer");
                } else {
                    echo "Er ging iets fout met de database. $fout";
                }
            } else {
                echo "Er ging iets fout met de database. $fout";
            }
        }

        if (!isset($fout)) {
            header('Location:inlog.php');
        }
    }
}


?>

<main>
    <div class="content-container">
        <div class="content">
            <h1>Abonnement</h1>
            <p>
                Wij van Fletnix bieden zeer mooie abonnementen aan voor voordelige prijzen. De drie abonnementen die wij
                aanbieden zijn 'Private', 'Sergeant' en 'Commander'. Private is de voordeligste van de drie pakketten,
                maar heeft alles wat de dagelijkse soldaat nodig heeft. Sergeant is de middenweg en heeft toch een
                beetje
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
            <p>
                <?php registreer_fout() ?>
            </p>
            <form class="formulier" action="" method="post">
                <div class="">
                    <label for="email">Emailadres</label>
                    <input type="email" name="email" id="email" placeholder="E-mailadres.."/>
                </div>
                <div>
                    <label for="gebruikersnaam">Gebruikersnaam</label>
                    <input type="text" name="gebruikersnaam" id="gebruikersnaam" placeholder="Gebruikersnaam..">
                </div>
                <div class="">
                    <label for="voornaam">Voornaam</label>
                    <?php
                    if (isset($_GET['voornaam']) && !empty($_GET['voornaam'])) {
                        $voornaam = $_GET['voornaam'];
                        echo "<input type='text' name='voornaam' id='voornaam' value='$voornaam'/>";
                    } else {
                        echo '<input type="text" name="voornaam" id="voornaam" placeholder="Voornaam.."/>';
                    } ?>
                </div>
                <div>
                    <label for="achternaam">Achternaam</label>
                    <?php
                    if (isset($_GET['achternaam']) && !empty($_GET['achternaam'])) {
                        $achternaam = $_GET['achternaam'];
                        echo "<input type='text' name='achternaam' id='achternaam' value='$achternaam' />";
                    } else {
                        echo '<input type="text" name="achternaam" id="achternaam" placeholder="Achternaam..">';
                    } ?>
                </div>
                <div>
                    <label for="land">Land</label>
                    <select name="land" id="land">
                        <option value="The Netherlands">The Netherlands</option>
                        <option value="Belgium">Belgium</option>
                    </select>
                </div>
                <div>
                    <label for="betaling">Betalingsmethode</label>
                    <select name="betaling" id="betaling">
                        <option value="Visa">Visa</option>
                        <option value="Mastercard">Mastercard</option>
                    </select>
                </div>
                <div class="">
                    <label for="kaartnummer">Creditcardnummer</label>
                    <?php
                    if (isset($_GET['kaartnummer']) && !empty($_GET['kaartnummer'])) {
                        $kaartnummer = $_GET['kaartnummer'];
                        echo "<input type='text' name='kaartnummer' id='kaartnummer' value='$kaartnummer' />";
                    } else {
                        echo '<input type="text" name="kaartnummer" id="kaartnummer" placeholder="Creditcardnummer.."/>';
                    } ?>
                </div>
                <div>
                    <label for="geboortedatum">Geboortedatum</label>
                    <input type="date" name="geboortedatum" id="geboortedatum" max="<?php echo "date('Y-m-d')"; ?>">
                </div>
                <div>
                    <label for="man">Man</label>
                    <input type="radio" name="geslacht" id="man" value="M">
                    <label for="vrouw">Vrouw</label>
                    <input type="radio" name="geslacht" id="vrouw" value="F">
                </div>
                <div>
                </div>
                <div>
                    <label for="wachtwoord">Wachtwoord</label>
                    <input type="password" id="wachtwoord" name="wachtwoord" placeholder="Wachtwoord..">
                </div>
                <div>
                    <label for="bevestiging">Wachtwoord</label>
                    <input type="password" id="bevestiging" name="bevestiging" placeholder="Bevestig wachtwoord..">
                </div>
                <div>
                    <label for="private">Private</label>
                    <input type="radio" name="abonnement" id="private" value="Private">
                    <label for="sergeant">Sergeant</label>
                    <input type="radio" name="abonnement" id="sergeant" value="Sergeant">
                    <label for="commander">Commander</label>
                    <input type="radio" name="abonnement" id="commander" value="Commander"><br/>
                </div>
                <button type="submit" name="verzending">Verzenden</button>
            </form>
        </div>
    </div>
</main>
<?php
include_once 'php/footer.inc.php';
?>
