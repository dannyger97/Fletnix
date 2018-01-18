<?php
$title= 'Fletnix';
include_once 'php/header.inc.php';
?>

<main>
    <div class="video">
        <div class="video-container">
            <div class="index-text">
                <p>
                    Fletnix is jouw ultieme filmstation voor alle soorten oorlogsfilms. <br/>
                    Oorlogfilms over de Tweede Wereldoorlog, de Koude oorlog en nog veel meer verschillende tijdperken! <br/>
                </p>
                <h2>
                    Welke abonnementen biedt Fletnix u? Kijk hieronder! Voor meer details over de abonnementen
                    <a href="abonnement.php">klik hier!</a><br/>
                    Een kijkje nemen naar de oorlogfilms die Fletnix aanbiedt?
                    <a href="filmoverzicht.php">Klik hier!</a>
                </h2>
            </div>
            <div class="overlay">
            </div>
            <video muted loop autoplay>
                <source src="videos/background-video.mp4" type="video/mp4">
            </video>
        </div>
    </div>
    <div class="abonnement-container">
        <div class="abonnement-item">
            <h1>Abonnementen</h1>
            <p>
                Fletnix biedt drie soorten abonnementen aan. Daar zit voor elke persoon een prima pakket tussen.
                Wilt u meer weten over de abonnementen? <br/> <br/>
            </p>
            <a href="abonnement.php"> Ik wil meer weten!</a>
        </div>
        <div class="abonnement-item-foto">
            <img src="images/private-abonnement.jpg" alt="Private abonnement">
            <img src="images/sergeant-abonnement.jpg" alt="Sergeant abonnement">
            <img src="images/commander-abonnement.jpg" alt="Commander abonnement">
        </div>
    </div>
</main>
<?php
include_once 'php/footer.inc.php';
?>
