<?php
$title = 'Account';
include_once 'php/header.inc.php';
setlocale(LC_ALL, 'nl-NL');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SESSION['loginstatus'] == TRUE && isset($_SESSION['gebruikersnaam'])) {
    require_once 'php/dbconnectie.php';
    $statement = "SELECT customer_mail_address,firstname,lastname,payment_method,
                  payment_card_number,contract_type,subscription_start,subscription_end,username,country_name,gender,birth_date 
                  FROM Customer WHERE username = ?";
    $query = $dbc->prepare($statement);
    $query->execute([$_SESSION['gebruikersnaam']]);
    $data = $query->fetch(PDO::FETCH_ASSOC);

    if (isset($_POST['verzending'])) {
        $wachtwoord = htmlspecialchars($_POST['wachtwoord']);
        $bevestiging = htmlspecialchars($_POST['bevestiging']);
        $statement = "UPDATE Customer SET password = ? WHERE username = ?";
        $query = $dbc->prepare($statement);
        if (empty(trim($wachtwoord)) || empty(trim($bevestiging))) {
            header("Location:account.php?wachtwoordfout=leeg");
        } elseif ($wachtwoord != $bevestiging) {
            header("Location:account.php?wachtwoordfout=hetzelfde");
        } elseif (strlen($wachtwoord) < 6) {
            header("Location:account.php?wachtwoordfout=lengte");
        } elseif (!preg_match("#[0-9]+#", $wachtwoord)) {
            header("Location:account.php?wachtwoordfout=cijfer");
        }
        else{
            try{
                $wachtwoord = password_hash($wachtwoord, PASSWORD_BCRYPT);
                $query->execute([$wachtwoord, $_SESSION['gebruikersnaam']]);
            }
            catch(PDOException $e){
                echo "Er ging iets fout met de database";
                $fout = TRUE;
            }
            if(!$fout){
                header("Location:account.php?wachtwoordwijziging=succes");
            }
        }

    }
} else {
    header('Location: inlog.php');
}
?>

<main>
    <div class="content-container">
        <div class="content">
            <h1>Account</h1>

            <?php

            if (isset($_GET['wachtwoordwijziging']) && $_GET['wachtwoordwijziging'] == 'succes') {
                echo("<p class='succes'>Het wachtwoord is succesvol gewijzigd!</p> <br>");
            }

            $tabel = ['Emailadres', 'Voornaam', 'Achternaam', 'Betalingsmethode', 'Creditcardnummer', 'Contract type', 'Inschrijvingsdatum', 'Uitschrijvingsdatum', ' Gebruikersnaam', 'Land', 'Geslacht', 'Geboortedatum'];
            foreach ($data as $temp) {
                $accountgegevens[] = $temp;
            }
            $accounttabel = '';
            $accounttabel .= "<table class='account'>";
            for ($i = 0; $i < count($tabel); $i++) {
                $accounttabel .= "<tr>";
                $accounttabel .= "<th>$tabel[$i]</th>";
                $accounttabel .= "<td>$accountgegevens[$i]</td>";
                $accounttabel .= "</tr>";

            }
            $accounttabel .= "<tr>";
            $accounttabel .= "<th>Ingelogd op</th>";
            $accounttabel .= "<td>" . $data['firstname'] . " " . $data['lastname'] . " is ingelogd op " . strftime($_SESSION['logindatum']) . " " . $_SESSION['logintijd'] . "  </td>";
            $accounttabel .= "</tr></table>";
            echo $accounttabel;
            ?>
            <h2>Wachtwoord wijzigen</h2>
            <br>
            <?php
            if (isset($_GET['wachtwoordfout']) && $_GET['wachtwoordfout'] == 'leeg') {
                echo("<p class='error'>Niet alle velden zijn ingevoerd! Probeer het nog een keer.</p> <br>");
            }
            if (isset($_GET['wachtwoordfout']) && $_GET['wachtwoordfout'] == 'hetzelfde') {
                echo("<p class='error'>De wachtwoorden zijn niet gelijk! Probeer het nog een keer.</p> <br>");
            }
            if (isset($_GET['wachtwoordfout']) && $_GET['wachtwoordfout'] == 'cijfer') {
                echo("<p class='error'>Het wachtwoord moet een cijfer bevatten! Probeer het nog een keer.</p> <br>");
            }
            if (isset($_GET['wachtwoordfout']) && $_GET['wachtwoordfout'] == 'lengte') {
                echo("<p class='error'>Het wachtwoord moet minimaal 6 karakters bevatten! Probeer het nog een keer.</p> <br>");
            }
            ?>
            <form action="" method="post">
                <input type="password" name="wachtwoord" id="wachtwoord">
                <input type="password" name="bevestiging" id="bevestiging">
                <button type="submit" name="verzending">Verzenden</button>
            </form>
            <br>
        </div>
    </div>
</main>
<?php
include_once 'php/footer.inc.php';
?>
