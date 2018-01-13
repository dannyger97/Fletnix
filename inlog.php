<?php
$title = 'Inlogpagina';
include_once 'php/header.php';

require_once 'php/dbconnectie.php';

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $statement = "SELECT count(*) FROM Customer WHERE username = ? AND password = ? ";
    $query = $dbc->prepare($statement);
    $query->execute([$username,$password]);
    $gegevens = $query->fetchColumn();
    if($gegevens == 1){
        $_SESSION['ingelogd'] = true;
        $_SESSION['username'] = $username;
        header('Location: index.php');
    }


}

?>
    <main>
        <div class='content-container '>
            <div class='content'>
                <h1>Inloggen</h1>
                <br>
                <form class='formulier' action='' method='post'>
                    <?php if(isset($gegevens)){ if(!$gegevens == 1){echo "De combinatie gebruikersnaam/wachtwoord klopt niet.";}} ?>
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
