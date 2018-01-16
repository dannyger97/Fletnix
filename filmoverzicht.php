<?php
$title= 'Filmoverzicht';
include_once 'php/header.php';

require_once 'php/dbconnectie.php';
?>
<main>
    <div class="index-container">
        <h1>Filmoverzicht</h1>
        <div class="index-item">
<?php
    if (isset ($_SESSION['loginstatus']) && ($_SESSION['loginstatus'] == TRUE)) {
        if(!isset($_GET['movieid'])) {
            $statement = "SELECT movie_id,cover_image FROM Movie";
            $query = $dbc->prepare($statement);
            $query->execute();
            $i = $query->fetchAll();
            foreach ($i as $film) {
                $image = $film['cover_image'];
                echo '<a href="filmoverzicht.php?movieid=' . $film['movie_id'] . '">
            <img src="' . $image . '">
            </a>';
            }
        }
        if(isset($_GET['movieid'])){
            $movieid = $_GET['movieid'];

            $statement = "SELECT title, duration, description, publication_year, price, cover_image, URL FROM Movie WHERE movie_id=?";
            $query = $dbc->prepare($statement);
            $query->execute([$movieid]);
            $gegevens = $query->fetchAll();
        }
        }
    else {
        echo 'dit soort films bieden wij aan op Fletnix';
    }
?>
        </div>
    </div>
</main>

<?php
include_once 'php/footer.php';
?>
