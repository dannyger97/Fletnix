<?php
$title = 'Filmoverzicht';
include_once 'php/header.inc.php';
include_once 'php/functions.inc.php';

require_once 'php/dbconnectie.php';
?>
    <main>
        <div class="index-container">
            <h1>Filmoverzicht</h1>
            <div class="index-item">
                <form action="filmoverzicht.php" method="post">
                    <?php
                    if(isset($_GET['title'])&& !empty($_GET['title'])){
                        $title= $_GET['title'];
                        echo"<label for='titel'>Zoeken op titel: </label>";
                        echo "<input type='text' id='titel' name='filmtitel' value='$title'>";
                    }
                    else{
                        echo"<label for='titel'>Zoeken op titel: </label>";
                        echo "<input type='text' id='titel' name='filmtitel'>";
                    }
                    if(isset($_GET['regisseur'])&& !empty($_GET['regisseur'])){
                        $regisseur=;
                        <label for="regisseur">Zoeken op regisseur: </label>
                    <input type="text" id="regisseur" name="filmregisseur">
                    }
                    else{
                        echo "<label for='regisseur'>Zoeken op regisseur: </label>";
                        echo "<input type='text' id='regisseur' name='filmregisseur'>";
                    }
                    if(isset($_GET['publicatiejaar'])&& !empty($_GET['publicatiejaar'])){

                    }
                    else{

                    }
                    ?>


                    <label for="publicatiejaar">Zoeken op publicatiejaar: </label>
                    <input type="number" id="publicatiejaar" name="publicatiejaar" min="1900" max="2050">
                    <input type="submit" id="zoeken" value="Zoeken" name="submit">
                </form>
            </div>
            <div class="index-item">
                <?php
                if (isset ($_SESSION['loginstatus']) && ($_SESSION['loginstatus'] == TRUE)) {
                    if (!isset($_POST['submit']) && !isset($_GET['search'])) {
                        $statement = "SELECT movie_id,cover_image FROM Movie";
                        $query = $dbc->prepare($statement);
                        $query->execute();
                        $i = $query->fetchAll();
                        movieloop($i);
                    }
                    if (isset($_POST['submit'])) {
                            $filmtitel = "%" . $_POST['filmtitel'] . "%";
                            $filmregisseur = "%" . $_POST['filmregisseur'] . "%";
                            $publicatiejaar = "%" . $_POST['publicatiejaar'] . "%";
                            $statement = "SELECT Movie.movie_id, cover_image
                                            FROM Movie 
                                            INNER JOIN Movie_Director md on Movie.movie_id=md.movie_id 
                                            INNER JOIN Person p on p.person_id=md.person_id 
                                            WHERE  p.firstname + ' ' + p.lastname LIKE ? AND Movie.title LIKE ? AND Movie.publication_year LIKE ? ORDER BY Movie.publication_year DESC";
                            $query = $dbc->prepare($statement);
                            $query->execute([$filmregisseur, $filmtitel, $publicatiejaar]);
                            $i = $query->fetchAll();
                            $_SESSION['movies'] = $i;
                            $_SESSION['zoektitelinfo'] = $_POST['filmtitel'];
                            $_SESSION['zoekregisseurinfo'] = $_POST['filmregisseur'];
                            $_SESSION['zoekjaarinfo'] = $_POST['publicatiejaar'];
                            header('Location:filmoverzicht.php?search=result&title='.$_POST["filmtitel"].'&regisseur='.$_POST["filmregisseur"].'&publicatiejaar='.$_POST["publicatiejaar"].'');
                    }
                    if (isset ($_GET['search']) && $_GET['search'] == 'result') {
                        $i = $_SESSION['movies'];
                        echo '<div><p> U heeft gezocht op filmtitel: '.$_SESSION['zoektitelinfo'].' - regisseur: '.$_SESSION['zoekregisseurinfo'].' - en publicatiejaar: '.$_SESSION['zoekjaarinfo'].' </p><div class="index-item">';
                        movieloop($i);
                        echo '</div></div>';
                    }
                } else {
                    header('Location:inlog.php?return=filmoverzicht.php');

                }
                ?>
            </div>
        </div>
    </main>

<?php
include_once 'php/footer.inc.php';
?>