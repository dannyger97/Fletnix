<?php
$title = 'Abonnement';
include_once 'php/header.php';

require_once 'php/dbconnectie.php';

if (!isset($_GET['signuperror'])) {
    $_GET['signuperror'] = '';
}

if (isset($_POST['submit'])) {
    $emailadres = htmlspecialchars($_POST['email']);
    $username = htmlspecialchars($_POST['username']);
    $firstname = htmlspecialchars(ucfirst($_POST['firstname']));
    $lastname = htmlspecialchars(ucfirst($_POST['lastname']));
    $country = $_POST['country'];
    $payment = $_POST['payment'];
    $cardnumber = htmlspecialchars($_POST['cardnumber']);
    $datum = new DateTime($_POST['birthdate']);
    $birthdate = date_format($datum, 'Y-m-d');
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $confirmation = $_POST['confirmation'];
    $abonnement = $_POST['abonnement'];
    $startdate = date('Y-m-d');
    $enddate = NULL;

    $statement = "INSERT INTO Customer VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?) ";
    $query = $dbc->prepare($statement);

    if (empty($emailadres) || empty($username) || empty($firstname) || empty($lastname) || empty($cardnumber) || empty($birthdate) || empty($gender) || empty($password) || empty($password) || empty($confirmation)) {
        header("Location:abonnement.php?signuperror=empty&firstname=$firstname&lastname=$lastname&cardnumber=$cardnumber");
    } elseif ($password != $confirmation) {
        header("Location:abonnement.php?signuperror=password&firstname=$firstname&lastname=$lastname");
    } elseif (!filter_var($emailadres, FILTER_VALIDATE_EMAIL)) {
        header("Location:abonnement.php?signuperror=emailadres&firstname=$firstname&lastname=$lastname");
    } else {
        try {
            $password = password_hash($password, PASSWORD_BCRYPT);
            $query->execute([$emailadres, $lastname, $firstname, $payment, $cardnumber, $abonnement, $startdate, $enddate, $username, $password, $country, $gender, $birthdate]);
        } catch (PDOException $error) {
            if ($error->errorInfo[0] == 23000) {
                $errormessage = $error->getMessage();
                $emailerror = 'Violation of PRIMARY KEY';
                $usernameerror = 'Violation of UNIQUE KEY';
                $cardlengtherror= 'The INSERT statement conflicted with the CHECK constraint "ck_payment_card_length".';
                $birthdateerror= "The INSERT statement conflicted with the CHECK constraint \"ck_birth_date\".";
                if (strpos($errormessage,$emailerror) !== FALSE){
                    header('Location:abonnement.php?signuperror=duplicateemail');
                }
                if (strpos($errormessage,$usernameerror) !== FALSE){
                    header('Location:abonnement.php?signuperror=duplicateusername');
                }
                if (strpos($errormessage,$cardlengtherror) !== FALSE){
                    header('Location:abonnement.php?signuperror=cardnumberlength');
                }
                if (strpos($errormessage,$birthdateerror) !== FALSE){
                    header('Location:abonnement.php?signuperror=birthdate');
                }
                else{
                    echo "Er ging iets fout met de database. $error";
                }
            } else {
                echo "Er ging iets fout met de database. $error";
            }
        }

        if (!isset($error)) {
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
                <?php if ($_GET['signuperror'] == 'empty') {
                    echo("<p class='error'>Niet alle velden zijn ingevoerd! Probeer het nog een keer.</p> <br>");
                }
                if ($_GET['signuperror'] == 'emailadres') {
                    echo("<p class='error'>Dit is geen juist emailadres! Probeer het nog een keer.</p> <br>");
                }
                if ($_GET['signuperror'] == 'password') {
                    echo("<p class='error'>De wachtwoorden zijn niet gelijk! Probeer het nog een keer.</p> <br>");
                }
                if ($_GET['signuperror'] == 'duplicateemail') {
                    echo("<p class='error'>Het ingevoerde emailadres is al bezet. Probeer het met een ander emailadres.</p> <br>");
                }
                if ($_GET['signuperror'] == 'duplicateusername') {
                    echo("<p class='error'>De ingevoerde gebruikersnaam is al bezet. Probeer het met een andere gebruikersnaam.</p> <br>");
                }
                if ($_GET['signuperror'] == 'cardnumberlength') {
                    echo("<p class='error'>Het ingevoerde creditcardnummer is te kort. Probeer het nog een keer.</p> <br>");
                }
                if ($_GET['signuperror'] == 'birthdate') {
                    echo("<p class='error'>De ingevoerde geboortedatum klopt niet met de datum van vandaag. Probeer het nog een keer.</p> <br>");
                }
                ?>
            </p>
            <form class="formulier" action="" method="post">
                <div class="">
                    <label for="email">Emailadres</label>
                    <input type="email" name="email" id="email" placeholder="E-mailadres.."/>
                </div>
                <div>
                    <label for="username">Gebruikersnaam</label>
                    <input type="text" name="username" id="username" placeholder="Gebruikersnaam..">
                </div>
                <div class="">
                    <label for="firstname">Voornaam</label>
                    <?php
                    if (isset($_GET['firstname']) && !empty($_GET['firstname'])) {
                        $firstname = $_GET['firstname'];
                        echo "<input type='text' name='firstname' id='firstname' value='$firstname'/>";
                    } else {
                        echo '<input type="text" name="firstname" id="firstname" placeholder="Voornaam.."/>';
                    } ?>
                </div>
                <div>
                    <label for="lastname">Achternaam</label>
                    <?php
                    if (isset($_GET['lastname']) && !empty($_GET['lastname'])) {
                        $lastname = $_GET['lastname'];
                        echo "<input type='text' name='lastname' id='lastname' value='$lastname' />";
                    } else {
                        echo '<input type="text" name="lastname" id="lastname" placeholder="Achternaam..">';
                    } ?>
                </div>
                <div>
                    <label for="country">Land</label>
                    <select name="country" id="country">
                        <option value="The Netherlands">The Netherlands</option>
                        <option value="Belgium">Belgium</option>
                    </select>
                </div>
                <div>
                    <label for="payment">Betalingsmethode</label>
                    <select name="payment" id="payment">
                        <option value="Visa">Visa</option>
                        <option value="Mastercard">Mastercard</option>
                    </select>
                </div>
                <div class="">
                    <label for="cardnumber">Creditcardnummer</label>
                    <?php
                    if (isset($_GET['cardnumber']) && !empty($_GET['cardnumber'])) {
                        $cardnumber = $_GET['cardnumber'];
                        echo "<input type='text' name='cardnumber' id='cardnumber' value='$cardnumber' />";
                    } else {
                        echo '<input type="text" name="cardnumber" id="cardnumber" placeholder="Creditcardnummer.."/>';
                    } ?>
                </div>
                <div>
                    <label for="birthdate">Geboortedatum</label>
                    <input type="date" name="birthdate" id="birthdate" max="<?php echo "date('Y-m-d')"; ?>">
                </div>
                <div>
                    <label for="man">Man</label>
                    <input type="radio" name="gender" id="man" value="M">
                    <label for="vrouw">Vrouw</label>
                    <input type="radio" name="gender" id="vrouw" value="F">
                </div>
                <div>
                </div>
                <div>
                    <label for="wachtwoord">Wachtwoord</label>
                    <input type="password" id="wachtwoord" name="password" placeholder="Wachtwoord..">
                </div>
                <div>
                    <label for="wachtwoord2">Wachtwoord</label>
                    <input type="password" id="wachtwoord2" name="confirmation" placeholder="Bevestig wachtwoord..">
                </div>
                <div>
                    <label for="private">Private</label>
                    <input type="radio" name="abonnement" id="private" value="Private">
                    <label for="sergeant">Sergeant</label>
                    <input type="radio" name="abonnement" id="sergeant" value="Sergeant">
                    <label for="commander">Commander</label>
                    <input type="radio" name="abonnement" id="commander" value="Commander"><br/>
                </div>
                <button type="submit" name="submit">Verzenden</button>
            </form>
        </div>
    </div>
</main>
<?php
include_once 'php/footer.php';
?>
