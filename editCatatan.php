<?php
require 'koneksi.php';

$input = file_get_contents('php://input');
$data = json_decode($input, true);

$id = trim($data['id']);
$nama = trim($data['nama']);
$keterangan = trim($data['keterangan']);

http_response_code(200);

if ($nama != '' && $keterangan != '') {
    $query = mysqli_query($koneksi, "UPDATE catatan SET nama='$nama', keterangan='$keterangan' WHERE id='$id'");
    $pesan = ($query) ? true : false;
} else {
    $pesan = false;
}

echo json_encode($pesan);
echo mysqli_error($koneksi);
?>
