<?php
$title= 'Filmoverzicht';
include_once 'php/header.php';

require_once 'php/dbconnectie.php';
?>

<?php
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $statement = "SELECT movie_id,cover_image FROM Movie";
        $query = $dbc->prepare($statement);
        $query->execute();
        $i = $query->fetchAll();
        foreach ($i as $film) {
            $image = $film['cover_image'];
            echo '<a href="filminformatie.php?movieid=' . $film['movie_id'] . '">
            <img width=10% src="' . $image . '">
            </a>';
        }
    }
    else {
        echo 'dit soort films bieden wij aan op Fletnix';
    }
?>

<?php
include_once 'php/footer.php';
?>
