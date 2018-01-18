<?php
$title= 'Filminformatie';
include_once 'php/header.inc.php';

require_once 'php/dbconnectie.php';
?>
<main>
    <div class="content-container">
        <div class="content">
            <h1>
<?php
$movieid= $_GET['movieid'];
$beschrijving = "SELECT title, duration, description, publication_year, price, cover_image, URL FROM Movie WHERE movie_id=?";
$query = $dbc->prepare($beschrijving);
$query->execute([$movieid]);
$gegevens = $query->fetchAll();

$cast= "SELECT firstname+ ' ' +lastname AS Name, role FROM Movie_Cast INNER JOIN Person ON Movie_Cast.person_id=Person.person_id WHERE movie_id=?";
$query=$dbc->prepare($cast);
$query->execute([$movieid]);
$gegevenscast=$query->fetchAll();

$director= "SELECT firstname+ ' ' +lastname AS Name FROM Movie_Director INNER JOIN Person ON Movie_Director.person_id=Person.person_id WHERE movie_id=?";
$query=$dbc->prepare($director);
$query->execute([$movieid]);
$gegevensdirector=$query->fetchAll();

echo $gegevens[0]['title'].'</h1>';
echo '<img src="'.$gegevens [0]['cover_image'].'"';
echo '<p>Speeltijd: '.$gegevens[0]['duration'].'</p>';
echo '<p>Beschrijving: '.$gegevens[0]['description'].'</p>';
echo '<p>Jaar van publicatie: '.$gegevens[0]['publication_year'].'</p>';
echo '<p>Prijs: '.$gegevens[0]['price'].'</p>';
echo '<iframe width="600" height="400" src="'. $gegevens[0]['URL'].'" allowfullscreen></iframe>';
echo '<h2>Cast</h2>';
$casttabel = '';
$casttabel .= '<table> <tr><th>Naam</th><th>Role</th></tr>';
if(!empty($gegevenscast)){
    for ($i = 0; $i < count($gegevenscast); $i++) {
        $casttabel .= "<tr>";
        $casttabel .= "<th>" . $gegevenscast[$i][0] . "</th>";
        $casttabel .= "<td>" . $gegevenscast[$i][1] . "</td>";
        $casttabel .= "</tr>";

    }
}
    if(!empty($gegevensdirector)){
       $casttabel .= "<tr>";
       $casttabel .= "<th>". $gegevensdirector [0][0]. "</th>";
       $casttabel .= "<td>Regisseur</td>";
       $casttabel .= "</tr>";
    }
    $casttabel .= '</table>';
    echo $casttabel;
?>
        </div>
    </div>
</main>
<?php
include_once 'php/footer.inc.php';
?>
