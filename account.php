<?php
$title= 'Account';
include_once 'php/header.php';
setlocale(LC_ALL, 'nl-NL');
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

    if($_SESSION['loginstatus'] == TRUE && isset($_SESSION['username'])){
        require_once 'php/dbconnectie.php';
        $statement = "SELECT customer_mail_address,firstname,lastname,payment_method,
                  payment_card_number,contract_type,subscription_start,subscription_end,username,country_name,gender,birth_date 
                  FROM Customer WHERE username = ?";
        $query = $dbc->prepare($statement);
        $query->execute([$_SESSION['username']]);
        $data = $query->fetch(PDO::FETCH_ASSOC);
    }
    else{
        header('Location: inlog.php');
    }
?>

<main>
    <div class="content-container">
        <div class="content">
            <h1>Account</h1>

<?php
            $tabel = ['Emailadres','Voornaam','Achternaam','Betalingsmethode','Creditcardnummer','Contract type','Inschrijvingsdatum','Uitschrijvingsdatum',' Gebruikersnaam','Land','Geslacht','Geboortedatum'];
            foreach($data as $temp){
                $accountgegevens[] = $temp;
            }

            echo "<table class='account'>";
            $tabel = '';
            for($i = 0 ; $i < count($tabel); $i++){
                 $tabel += "<tr>";
                 $tabel += "<th>$tabel[$i]</th>";
                 $tabel += "<td>$accountgegevens[$i]</td>";
                 $tabel += "</tr>";

            }
            $tabel += "<tr>";
            $tabel += "<th>Ingelogd op</th>";
            $tabel += "<td>" . $data['firstname'] . " " . $data['lastname'] . " is ingelogd op " . strftime($_SESSION['logindatum'])  . " "  . $_SESSION['logintijd'] . "  </td>";
            $tabel += "</tr></table>";
            echo $tabel;
            ?>
            <br>
        </div>
    </div>
</main>
<?php
include_once 'php/footer.php';
?>
