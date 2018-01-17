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

function signup_error(){
    if ($_GET['signuperror'] == 'empty') {
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
}
?>
