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

?>
