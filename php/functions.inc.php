<?php
function HTMLTable($values,$tablehead){
    $table = '';
    // Parameters: Waarden die geoutput moeten worden. Hoe de headers van de tabel er uit moeten komen te zien.
    $table += "<table>";
    for($i = 0; $i < $tablehead; $i++ ){
        $table += "<tr>";
        $table += "<th>$tablehead</th>";
        $table += "<td>$values</td>";
        $table += "</tr>";
    }
    $table += "</table>";
    return $table;
}

function registreer_fout()
{
    if ($_GET['registreerfout'] == 'leeg') {
        echo("<p class='error'>Niet alle velden zijn ingevoerd! Probeer het nog een keer.</p> <br>");
    }
    if ($_GET['registreerfout'] == 'emailadres') {
        echo("<p class='error'>Dit is geen juist emailadres! Probeer het nog een keer.</p> <br>");
    }
    if ($_GET['registreerfout'] == 'wachtwoord') {
        echo("<p class='error'>De wachtwoorden zijn niet gelijk! Probeer het nog een keer.</p> <br>");
    }
    if ($_GET['registreerfout'] == 'dubbelemail') {
        echo("<p class='error'>Het ingevoerde emailadres is al bezet. Probeer het met een ander emailadres.</p> <br>");
    }
    if ($_GET['registreerfout'] == 'dubbelgebruikersnaam') {
        echo("<p class='error'>De ingevoerde gebruikersnaam is al bezet. Probeer het met een andere gebruikersnaam.</p> <br>");
    }
    if ($_GET['registreerfout'] == 'kaartnummerlengte') {
        echo("<p class='error'>Het ingevoerde creditcardnummer is te kort. Probeer het nog een keer.</p> <br>");
    }
    if ($_GET['registreerfout'] == 'geboortedatum') {
        echo("<p class='error'>De ingevoerde geboortedatum klopt niet. Probeer het nog een keer.</p> <br>");
    }
    if ($_GET['registreerfout'] == 'wachtwoordlengte') {
        echo("<p class='error'>Het ingevoerde wachtwoord moet minimaal 6 tekens bevatten. Probeer het nog een keer.</p> <br>");
    }
    if ($_GET['registreerfout'] == 'wachtwoordcijfer') {
        echo("<p class='error'>Het ingevoerde wachtwoord bevat geen cijfer. Probeer het nog een keer.</p> <br>");
    }
}

function movieloop ($i)
{
    $resultaat="";
    foreach ($i as $film) {
        $foto = $film['cover_image'];
        $films = $film['movie_id'];
        $resultaat.= '<a href="/Fletnix/films/' . $films . '">
        <img src="/Fletnix/' . $foto . '">
        </a>';
    }
    echo $resultaat;
}
?>