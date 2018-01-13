<?php
$title= 'Uitlog';
include_once 'php/header.php';
if (session_status() == PHP_SESSION_ACTIVE) {
    session_destroy();
}
?>

<main>
    <div class="content-container ">
        <div class="content uitlog">
            <h1>Account</h1>
            <p class="uitlog">U bent uitgelogd</p>
            <p class="uitlog">U wordt na 2 seconden verwezen naar de hoofdpagina, als dat niet gebeurt klik <a href="index.php">hier</a></p>
        </div>
    </div>
</main>
<?php
header('Refresh: 2; URL=index.php');
include_once 'php/footer.php';
?>
