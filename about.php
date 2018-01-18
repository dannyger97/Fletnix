<?php
$title = 'Over ons';
include_once 'php/header.inc.php';

if (isset($_POST['submit'])) {
    header('Location: about.php?contact=success');
}
?>

<main>
    <div class='content-container'>
        <div class='content'>
            <?php
            if (isset($_GET['contact']) && $_GET['contact'] == 'success' ) {
                $bericht = htmlspecialchars($_POST['message']);
                echo "<h1>Contact</h1><br><p>Bedankt voor uw vraag. We zullen zo snel mogelijk op u reageren.</p><br><br>";
                echo "<p>Uw bericht: <br> ".var_dump($bericht)."</p>";
            } else {
                ?>

            <h1>Over ons</h1>
            <p>
                Wij, Danny Gerritsen en Wout Hakvoort, zijn twee ICT-studenten aan de Hogeschool van Arnhem en Nijmegen.
                In onze korte ICT carrière is dit de eerste keer dat wij een HTML/CSS pagina moeten maken. Wij kregen de
                opdracht vanuit de course WebTech om een HTML/CSS pagina te maken voor het bedrijf 'Fletnix'. Fletnix is
                een
                directe concurrent van het grote bedrijf Netflix. Als studenten wilden wij deze pagina zo aantrekkelijk
                mogelijk maken voor klanten, zodat zij niet overstappen naar de concurrent.<br/> <br/>
                Fletnix is een bedrijf wat wereldwijd een maandabonnement aanbiedt voor streaming video on demand via
                internet. Hierbij is de mogelijkheid om de film of serie te pauzeren, vooruit te spoelen of terug te
                spoelen.
                Ook heeft de gebruiker geen last van reclameblokken, wat wel het geval zou zijn bij TV-zenders. <br/>
                <br/>
                Als doelgroep hebben wij gekozen voor mensen die van oorlogsfilms houden. Hierbij is tijdens het maken
                en
                het ontwerpen van de webpagina rekening mee gehouden. Beiden zijn wij erg gefascineerd door
                oorlogsfilms.
                Films zoals 'Saving Private Ryan' en 'Hacksaw Ridge' hebben er voor gezorgd dat wij gekozen hebben voor
                deze
                bepaalde doelgroep. Ook zijn wij beide geïnspireerd door het spel 'Call of Duty: World War II' wat zich
                afspeelt tijdens de Tweede Wereldoorlog. Doormiddel van deze inspiratie is deze site tot stand gekomen.
            </p> <br/>
            <h1>Contact</h1>
            <p>
                Als u contact wilt opnemen met ons, vult u dan dit formulier in:
            </p><br/>
            <form class='formulier' action='about.php' method='post' id="contact">
                <div class='veld'>
                    <label for='naam'>Naam</label>
                    <input type='text' name='naam' id='naam' maxlength='40' placeholder='Naam'/>
                </div>
                <div class='geslacht'>
                    <div class='geslacht'>
                        <label for='man'>Man</label>
                        <input type='radio' name='geslacht' value='Man' id='man'/>
                </div>
                <div class='geslacht'>
                        <label for='vrouw'>Vrouw</label>
                        <input type='radio' name='geslacht' value='Vrouw' id='vrouw'/>
                </div>
                <div class='veld'>
                    <label for='telefoon'>Telefoon</label>
                    <input type='tel' name='telefoon' id='telefoon' maxlength='10' placeholder='Telefoonnummer ..'/>
                </div>
                <div class='veld'>
                    <label for='email'>E-mail</label>
                    <input type='email' name='naam' id='email' placeholder='E - mail adres ..'/>
                </div>
                <div class='veld'>
                    <label for='message'>Opmerkingen</label>
                    <textarea name='message' id="message" rows='6' cols='40' form="contact" placeholder='Opmerking ..'></textarea>
                </div>
                <button type='submit' name='submit'>Verzenden</button>
            </form>
            <?php
            } ?>
        </div>
    </div>
</main>

<?php
include_once 'php/footer.inc.php';
?>
