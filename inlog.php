<?php
$title = 'Inlogpagina';
include_once 'php/header.php';
require_once 'php/dbconnectie.php';

setlocale(LC_ALL, 'nl_NL');
if(!isset($_GET['login'])){
    $_GET['login'] = '';
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $statement = "SELECT password FROM Customer WHERE username = ? ";
    $query = $dbc->prepare($statement);
    $query->execute([$username, $password]);
    $gegevens = $query->fetchColumn();
    if (password_verify($password, $gegevens)) {
        $_SESSION['loginstatus'] = true;
        $_SESSION['username'] = $username;
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
        header('Location: inlog.php?login=password');
    }
}

?>
<main>
    <div class='content-container '>
        <div class='content'>
            <h1>Inloggen</h1>
            <br>
            <form class='formulier' action='' method='post'>
                <?php if ($_GET['login'] == 'password') {
                    echo "<p class='error' >De combinatie gebruikersnaam/wachtwoord klopt niet.</p>";
                } ?>
                <label for='username'>Gebruikersnaam</label>
                <input type='text' name='username' id='username'/>
                <label for='password'>Wachtwoord</label>
                <input type='password' name='password' id='password'/>
                <button type="submit" name="submit" >Inloggen</button>
            </form>
            <p>Indien u nog geen acccount heeft kunt u <a href="abonnement.php">hier </a>registreren</p>
        </div>
    </div>
</main>
<?php
include_once 'php/footer.php';
?>
