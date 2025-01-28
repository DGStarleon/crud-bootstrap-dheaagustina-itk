<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role']!== 'admin') {
    header('Location: index.php');
    exit;
}
$id = $_GET["id"];
$sql = "SELECT * FROM mahasiswa WHERE id=$id ";
$result = $conn->query($sql);
$data = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta chorset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Edit data Mahasiswa</title>
</head>

<body>
    <h2 class="p-3 mb-2 bg-success text-white">Edit Data Mahasiswa</h2>
    <form class="border p-3 rounded d-grid mx-auto" style="width: 315px" action="proses_edit.php" method="POST">
        <input type='hidden' name='id' value="<?php echo $data['id']; ?>">
        Nama:<input type='text' name='nama' value="<?php echo $data['id']; ?>"> <br>
        NIM:<input type='text' name='nim' value="<?php echo $data['id']; ?>"> <br>
        Email:<input type='email' name='email' value="<?php echo $data['id']; ?>"> <br>
        Nomor:<input type='text' name='nomor' value="<?php echo $data['id']; ?>"> <br>
        Jurusan:<input type='text' name='jurusan' value="<?php echo $data['id']; ?>"> <br>
        <input type='submit' value='Simpan'>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>