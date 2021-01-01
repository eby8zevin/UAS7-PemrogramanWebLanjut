<?php
include 'pdokoneksi.php';

$response = [];

$query = $dbh->prepare("SELECT * FROM tugas_data ORDER BY nim_data ASC");
$query->execute();

if ($query->rowCount() == 0)
{
    $response['status'] = false;
    $response['message'] = "Data tidak ditemukan";
}
else
{
    while ($data = $query->fetch())
    {
        $response[] = ["id_data" => $data["id_data"], "nim_data" => $data["nim_data"], "nama_data" => $data["nama_data"], "alamat_data" => $data["alamat_data"], "ttl_data" => $data["ttl_data"], "status_data" => $data["status_data"]];
    }
}

header('Content-type: text/javascript');
$json = json_encode($response, JSON_PRETTY_PRINT);
echo $json;
?>
