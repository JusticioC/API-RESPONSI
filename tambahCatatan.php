<?php
require 'koneksi.php';

$input = file_get_contents('php://input');
$data = json_decode($input, true);

$nama = trim($data['nama']);
$keterangan = trim($data['keterangan']);

http_response_code(201);

if ($nama != '' && $keterangan != '') {
    $query = mysqli_query($koneksi, "INSERT INTO catatan (nama, keterangan) VALUES ('$nama', '$keterangan')");
    $pesan = ($query) ? true : false;
} else {
    $pesan = false;
}

echo json_encode($pesan);
echo mysqli_error($koneksi);
?>
