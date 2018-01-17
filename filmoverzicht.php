<?php
$title= 'Filmoverzicht';
include_once 'php/header.php';

require_once 'php/dbconnectie.php';
?>
<main>
    <div class="index-container">
        <h1>Filmoverzicht</h1>
        <div class="index-item">
            <form action="filmoverzicht.php" method="post">
                <label for="titel">Zoeken op titel: </label>
                <input type="text" id="titel" name="Zoeken op titel">
                <label for="regisseur">Zoeken op regisseur: </label>
                <input type="text" id="regisseur">
                <label for="publicatiejaar">Zoeken op publicatiejaar: </label>
                <input type="number" id="publicatiejaar" name="Zoeken op publicatiejaar">
                <label for="zoeken"></label>
                <input type="submit" id="zoeken" value="Zoeken">
            </form>
        </div>
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
include_once 'php/footer.php';
?>
