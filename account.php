<?php
$title = 'Account';
include_once 'php/header.inc.php';
setlocale(LC_ALL, 'nl-NL');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SESSION['loginstatus'] == TRUE && isset($_SESSION['username'])) {
    require_once 'php/dbconnectie.php';
    $statement = "SELECT customer_mail_address,firstname,lastname,payment_method,
                  payment_card_number,contract_type,subscription_start,subscription_end,username,country_name,gender,birth_date 
                  FROM Customer WHERE username = ?";
    $query = $dbc->prepare($statement);
    $query->execute([$_SESSION['username']]);
    $data = $query->fetch(PDO::FETCH_ASSOC);

    if (isset($_POST['submit'])) {
        $password = htmlspecialchars($_POST['password']);
        $confirmation = htmlspecialchars($_POST['confirmation']);
        $statement = "UPDATE Customer SET password = ? WHERE username = ?";
        $query = $dbc->prepare($statement);
        if (empty(trim($password)) || empty(trim($confirmation))) {
            header("Location:account.php?passworderror=empty");
        } elseif ($password != $confirmation) {
            header("Location:account.php?passworderror=same");
        } elseif (strlen($password) < 6) {
            header("Location:account.php?passworderror=length");
        } elseif (!preg_match("#[0-9]+#", $password)) {
            header("Location:account.php?passworderror=number");
        }
        else{
            try{
                $password = password_hash($password, PASSWORD_BCRYPT);
                $query->execute([$password, $_SESSION['username']]);
            }
            catch(PDOException $e){
                echo "Er ging iets fout met de database";
                $error = TRUE;
            }
            if(!$error){
                header("Location:account.php?passwordchange=success");
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

            if (isset($_GET['passwordchange']) && $_GET['passwordchange'] == 'success') {
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
            if (isset($_GET['passworderror']) && $_GET['passworderror'] == 'empty') {
                echo("<p class='error'>Niet alle velden zijn ingevoerd! Probeer het nog een keer.</p> <br>");
            }
            if (isset($_GET['passworderror']) && $_GET['passworderror'] == 'same') {
                echo("<p class='error'>De wachtwoorden zijn niet gelijk! Probeer het nog een keer.</p> <br>");
            }
            if (isset($_GET['passworderror']) && $_GET['passworderror'] == 'number') {
                echo("<p class='error'>Het wachtwoord moet een cijfer bevatten! Probeer het nog een keer.</p> <br>");
            }
            if (isset($_GET['passworderror']) && $_GET['passworderror'] == 'length') {
                echo("<p class='error'>Het wachtwoord moet minimaal 6 karakters bevatten! Probeer het nog een keer.</p> <br>");
            }
            ?>
            <form action="" method="post">
                <input type="password" name="password" id="password">
                <input type="password" name="confirmation" id="confirmation">
                <button type="submit" name="submit">Verzenden</button>
            </form>
            <br>
        </div>
    </div>
</main>
<?php
include_once 'php/footer.inc.php';
?>
