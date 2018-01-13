<?php
$title = 'Inlogpagina';
include_once 'php/header.php';

require_once 'php/dbconnectie.php';

$check = true;

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $statement = "SELECT password FROM Customer WHERE username = ? ";
    $query = $dbc->prepare($statement);
    $query->execute([$username,$password]);
    $gegevens = $query->fetchColumn();
    if(password_verify($password,$gegevens)){
        $_SESSION['ingelogd'] = true;
        $_SESSION['username'] = $username;
        header('Location: index.php');
        $check = true;
    }
    else{
        $check = false;
    }


}

?>
    <main>
        <div class='content-container '>
            <div class='content'>
                <h1>Inloggen</h1>
                <br>
                <form class='formulier' action='' method='post'>
                    <?php if(!$check){echo "<p class='verkeerd' >De combinatie gebruikersnaam/wachtwoord klopt niet.</p>";} ?>
                    <label for='username'>Gebruikersnaam</label>
                    <input type='text' name='username' id='username'/>
                    <label for='password'>Wachtwoord</label>
                    <input type='password' name='password' id='password' />
                    <button>Inloggen</button>
                </form>
                <p>Indien u nog geen acccount heeft kunt u <a href="abonnement.php">hier </a>registreren</p>
            </div>
        </div>
    </main>

<?php
include_once 'php/footer.php';
?>
