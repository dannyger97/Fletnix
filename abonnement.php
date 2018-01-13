<?php
$title= 'Abonnement';
include_once 'php/header.php';

require_once 'php/dbconnectie.php';



if(isset($_POST['username']) && isset($_POST['password'])){
    $emailadres= $_POST['email'];
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $country = $_POST['country'];
    $payment = $_POST['payment'];
    $cardnumber = $_POST['cardnumber'];
    $datum = new DateTime($_POST['birthdate']);
    $birthdate = date_format($datum,'Y-m-d');
    $gender = $_POST['gender'];
    $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
    $abonnement = $_POST['abonnement'];
    $startdate = date('Y-m-d');
    $enddate= NULL;

    $statement = "INSERT INTO Customer VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?) ";
    $query = $dbc->prepare($statement);
    try{
        $query->execute([$emailadres,$lastname,$firstname,$payment,$cardnumber,$abonnement,$startdate,$enddate,$username,$password,$country,$gender,$birthdate]);

    }
    catch(Exception $error){
        echo "Error: $error";
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
                    <input type="text" name="firstname" id="firstname" placeholder="Voornaam.."/>
                </div>
                <div>
                    <label for="lastname">Achternaam</label>
                    <input type="text" name="lastname" id="lastname" placeholder="Achternaam..">
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
                    <input type="text" name="cardnumber" id="cardnumber" placeholder="Creditcardnumber.."/>
                </div>
                <div>
                    <label for="birthdate">Geboortedatum</label>
                    <input type="date" name="birthdate" id="birthdate" max="2018-01-12">
                </div>
                <div>
                    <label for="man">Man</label>
                    <input type="radio" name="gender" id="gender" value="M">
                    <label for="vrouw">Vrouw</label>
                    <input type="radio" name="gender" id="gender" value="F">
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
                    <input type="radio" name="abonnement" id="private" value="Basic">
                    <label for="sergeant">Sergeant</label>
                    <input type="radio" name="abonnement" id="sergeant" value="Premium">
                    <label for="commander">Commander</label>
                    <input type="radio" name="abonnement" id="commander" value="Pro"><br/>
                </div>
                <button>Verzenden</button>
            </form>
        </div>
    </div>
</main>
<?php
include_once 'php/footer.php';
?>
