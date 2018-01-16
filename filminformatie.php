<?php
$title= 'Filminformatie';
include_once 'php/header.php';

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

$cast= "SELECT firstname,lastname, role FROM Movie_Cast INNER JOIN Person ON Movie_Cast.person_id=Person.person_id WHERE movie_id=?";
$query=$dbc->prepare($cast);
$query->execute([$movieid]);
$gegevenscast=$query->fetchAll();


echo $gegevens[0]['title'].'</h1>';
echo '<img src="'.$gegevens [0]['cover_image'].'"';
echo '<p>Speeltijd: '.$gegevens[0]['duration'].'</p>';
echo '<p>Beschrijving: '.$gegevens[0]['description'].'</p>';
echo '<p>Jaar van publicatie: '.$gegevens[0]['publication_year'].'</p>';
echo '<p>Prijs: '.$gegevens[0]['price'].'</p>';
echo '<a href="'. $gegevens[0]['URL'].'">Trailer</a><br>';
echo '<h2>Cast</h2>';
?>
        </div>
    </div>
</main>
<?php
include_once 'php/footer.php';
?>
