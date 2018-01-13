<?php
$title= 'Filminformatie';
include_once 'php/header.php';

require_once 'php/dbconnectie.php';
?>

<?php
$movieid= $_GET['movieid'];
$statement = "SELECT title, duration, description, publication_year, price, cover_image, URL FROM Movie WHERE movie_id=?";
$query = $dbc->prepare($statement);
$query->execute([$movieid]);
$gegevens = $query->fetchAll();

echo '<img width=20% src="'.$gegevens [0]['cover_image'].'">'.'<br>';
echo $gegevens[0]['title'].'<br>';
echo $gegevens[0]['duration'].'<br>';
echo $gegevens[0]['description'].'<br>';
echo $gegevens[0]['publication_year'].'<br>';
echo $gegevens[0]['price'].'<br>';
echo '<a href="'. $gegevens[0]['URL'].'">Trailer</a>'


?>

<?php
include_once 'php/footer.php';
?>
