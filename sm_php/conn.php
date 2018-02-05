<?php
// Connecting, selecting database
$dbconn = pg_connect("host=localhost port=5432 dbname=senlon user=postgres password=123456789")
    or die('Could not connect: ' . pg_last_error());
?>