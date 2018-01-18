<?php
$title= 'Filmoverzicht';
include_once 'php/header.inc.php';
include_once 'php/functions.inc.php';

require_once 'php/dbconnectie.php';
?>
<main>
    <div class="index-container">
        <h1>Filmoverzicht</h1>
        <div class="index-item">
            <form action="filmoverzicht.php" method="post">
                <label for="titel">Zoeken op titel: </label>
                <input type="text" id="titel" name="filmtitel">
                <input type="submit" id="zoeken" value="Zoeken">
            </form>
            <form action="filmoverzicht.php" method="post">
                <label for="regisseur">Zoeken op regisseur: </label>
                <input type="text" id="regisseur" name="filmregisseur">
                <input type="submit" id="zoeken" value="Zoeken">
            </form>
            <form action="filmoverzicht.php" method="post">
                <label for="publicatiejaar">Zoeken op publicatiejaar: </label>
                <input type="number" id="publicatiejaar" name="publicatiejaar">
                <input type="submit" id="zoeken" value="Zoeken">
            </form>
        </div>
        <div class="index-item">
<?php
    if (isset ($_SESSION['loginstatus']) && ($_SESSION['loginstatus'] == TRUE)) {
        if (empty($_POST['filmtitel']) && empty($_POST['filmregisseur']) && empty($_POST['publicatiejaar'])) {
            $statement = "SELECT movie_id,cover_image FROM Movie";
            $query = $dbc->prepare($statement);
            $query->execute();
            $i = $query->fetchAll();
            movieloop($i);
        }
        if (!empty($_POST['filmtitel']) && empty($_POST['filmregisseur']) && empty($_POST['publicatiejaar'])) {
            echo '<div class="index-container"><p> U heeft gezocht op titel: ' . $_POST['filmtitel'] . ' - Gesorteerd op publicatiejaar</p><div class="index-item">';
            $filmtitel = "%" . $_POST['filmtitel'] . "%";
            $statement = "SELECT Movie.movie_id, cover_image FROM Movie WHERE title LIKE ? ORDER BY publication_year DESC";
            $query = $dbc->prepare($statement);
            $query->execute([$filmtitel]);
            $i = $query->fetchAll();
            movieloop($i);
            echo '</div></div>';
        }
        if (empty($_POST['filmtitel']) && !empty($_POST['filmregisseur']) && empty($_POST['publicatiejaar'])) {
            echo '<div class="index-container"><p> U heeft gezocht op regisseur: ' . $_POST['filmregisseur'] . ' - Gesorteerd op publicatiejaar</p><div class="index-item">';
            $filmregisseur = "%" . $_POST['filmregisseur'] . "%";
            $statement = "SELECT Movie.movie_id, cover_image FROM Movie INNER JOIN Movie_Director md on Movie.movie_id=md.movie_id INNER JOIN Person p on p.person_id=md.person_id WHERE p.lastname LIKE ? OR p.firstname LIKE ? ORDER BY publication_year DESC";
            $query = $dbc->prepare($statement);
            $query->execute([$filmregisseur, $filmregisseur]);
            $i = $query->fetchAll();
            movieloop($i);
            echo '</div></div>';
        }
        if (empty($_POST['filmtitel']) && empty($_POST['filmregisseur']) && !empty($_POST['publicatiejaar'])) {
            echo '<div class="index-container"><p> U heeft gezocht op publicatiejaar: ' . $_POST['publicatiejaar'] . ' - Gesorteerd op titel</p><div class="index-item">';
            $publicatiejaar = $_POST['publicatiejaar'];
            $statement = "SELECT Movie.movie_id, cover_image FROM Movie WHERE publication_year= ? ORDER BY title ASC";
            $query = $dbc->prepare($statement);
            $query->execute([$publicatiejaar]);
            $i = $query->fetchAll();
            movieloop($i);
            echo '</div></div>';
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