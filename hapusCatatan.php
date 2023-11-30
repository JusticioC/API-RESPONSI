<?php
require 'koneksi.php';

$input = file_get_contents('php://input');
$data = json_decode($input, true);

$id = trim($data['id']);

http_response_code(200);

$query = mysqli_query($koneksi, "DELETE FROM catatan WHERE id='$id'");
$pesan = ($query) ? true : false;

echo json_encode($pesan);
echo mysqli_error($koneksi);
?>
