<?php
include 'koneksi.php';

$query = mysqli_query($koneksi, "SELECT * FROM produk");
$array_data = array();

while ($row = mysqli_fetch_assoc($query))
{
    $array_data[] = $row;
}

header('Content-type: text/javascript');
$json = json_encode($array_data, JSON_PRETTY_PRINT);
file_put_contents('blackpink.json', $json);
echo $json;
?>
