<?php
$title = 'Inlogpagina';
include_once 'php/header.inc.php';
require_once 'php/dbconnectie.php';

setlocale(LC_ALL, 'nl_NL');
if(!isset($_GET['login'])){
    $_GET['login'] = '';
}

if (isset($_POST['verzending'])) {
    $gebruikersnaam = $_POST['gebruikersnaam'];
    $wachtwoord = $_POST['wachtwoord'];

    $statement = "SELECT password FROM Customer WHERE username = ? ";
    $query = $dbc->prepare($statement);
    $query->execute([$gebruikersnaam, $wachtwoord]);
    $gegevens = $query->fetchColumn();
    if (password_verify($wachtwoord, $gegevens)) {
        $_SESSION['loginstatus'] = true;
        $_SESSION['gebruikersnaam'] = $gebruikersnaam;
        $_SESSION['logindatum'] = date('D-d-m-Y');
        $_SESSION['logintijd'] = date('H:i:s');
        if (isset($_GET['return']) && !empty($_GET['return'])){
            header('Location: filmoverzicht.php');
        }
        else {
            header('Location: index.php');
        }
        }
    else {
        header('Location: inlog.php?login=wachtwoord');
    }
}

?>
<main>
    <div class='content-container '>
        <div class='content'>
            <h1>Inloggen</h1>
            <br>
            <form class='formulier' action='' method='post'>
                <?php if ($_GET['login'] == 'wachtwoord') {
                    echo "<p class='error' >De combinatie gebruikersnaam/wachtwoord klopt niet.</p>";
                } ?>
                <label for='gebruikersnaam'>Gebruikersnaam</label>
                <input type='text' name='gebruikersnaam' id='gebruikersnaam'/>
                <label for='wachtwoord'>Wachtwoord</label>
                <input type='password' name='wachtwoord' id='wachtwoord'/>
                <button type="submit" name="verzending" >Inloggen</button>
            </form>
            <p>Indien u nog geen acccount heeft kunt u <a href="abonnement.php">hier </a>registreren</p>
        </div>
    </div>
</main>
<?php
include_once 'php/footer.inc.php';
?>
