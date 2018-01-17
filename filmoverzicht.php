<?php
$title= 'Filmoverzicht';
include_once 'php/header.inc.php';

require_once 'php/dbconnectie.php';
?>
<main>
    <div class="index-container">
        <h1>Filmoverzicht</h1>
        <div class="index-item">
<?php
    if (isset ($_SESSION['loginstatus']) && ($_SESSION['loginstatus'] == TRUE)) {
            $statement = "SELECT movie_id,cover_image FROM Movie";
            $query = $dbc->prepare($statement);
            $query->execute();
            $i = $query->fetchAll();
            foreach ($i as $film) {
                $image = $film['cover_image'];
                echo '<a href="filminformatie.php?movieid=' . $film['movie_id'] . '">
            <img src="' . $image . '">
            </a>';
            }
        }
    else {
        header('Location:inlog.php?return=filmoverzicht.php');

    }
?>
        </div>
    </div>
</main>

<?php
include_once 'php/footer.inc.php';
?>
