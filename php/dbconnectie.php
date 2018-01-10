<?php
$dbserver= '192.168.1.223';
$dbname='fletnixphp';
$dbusername='test';
$dbpassword='test';

$dbh = new PDO ("sqlsrv:Server=$dbserver;Database=$dbname;
			ConnectionPooling=0", "$dbusername", "$dbpassword");

?>
