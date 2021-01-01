<?php

$koneksi = new mysqli("localhost", "username", "password", "dbname");

// Check connection
if ($koneksi->connect_errno)
{
    printf("Connect failed: %s\n", $koneksi->connect_error);
    exit();
}
// print_r(PDO::getAvailableDrivers());

?>
