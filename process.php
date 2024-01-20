<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "univ_uas_iii");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari form
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$alamat = $_POST['alamat'];
$jk = $_POST['jk'];
$status = $_POST['status'];
$id_matkul = $_POST['matkul'];
$jml_sks = $_POST['sks'];

// Masukkan data ke dalam database
$sql = "INSERT INTO mahasiswa (nama, alamat, nim, jk, status, id_sks) VALUES ('$nama', '$alamat', '$nim', '$jk', '$status', $id_matkul)";
$conn->query($sql);

$conn->close();

// Redirect ke halaman utama
header("Location: index.php");
exit();
?>
