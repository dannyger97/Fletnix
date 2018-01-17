<?php
$dbserver= '192.168.65.3';
$dbusername = 'sa';
$dbpassword = 'Welkom01!dg';
$dbname = 'FletnixPHP';

try {
    $dbc = new PDO ("sqlsrv:Server=$dbserver;Database=$dbname;
			ConnectionPooling=0", "$dbusername", "$dbpassword");
    $dbc->setAttribute(PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION);
}

catch (PDOException $e){
    echo 'Er ging iets mis met de database!';
    echo "<br> Foutmelding: ". $e . "";
}
?>
