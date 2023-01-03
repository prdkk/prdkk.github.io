<?php
$mysqli = new mysqli("localhost", "usr1", "AbfjD5O7wzEBsF5E", "m07");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$mysqli = new mysqli("127.0.0.1", "usr1", "AbfjD5O7wzEBsF5E", "m07", 3306);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>