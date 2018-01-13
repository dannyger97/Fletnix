<?php
$title= 'Filmoverzicht';
include_once 'php/header.php';

require_once 'php/dbconnectie.php';
?>

<?php
    $statement = "SELECT movie_id,cover_image FROM Movie";
    $query = $dbc->prepare($statement);
    $query->execute();
    $i = $query->fetchAll();
    foreach($i as $film){
        $image=$film['cover_image'];
        echo '<a href="filminformatie.php?movieid='.$film['movie_id'].'">
            <img width=10% src="'.$image.'">
            </a>';
    }
?>

<?php
include_once 'php/footer.php';
?>
