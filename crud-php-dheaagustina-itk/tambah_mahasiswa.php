<?php
include "koneksi.php";

session_start();
if (!isset($_SESSION['username']) || $_SESSION['role']===! 'admin') {
    header('Location: index.php');
    exit;
}

$sql = "SELECT * FROM jurusan";
$result = $conn->query($sql);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Tambahan Data Mahasiswa</title>
</head>

<body >
    <h2 class="p-3 mb-2 bg-success text-white">Tambah Data Mahasiswa</h2>
    <form class="border p-3 rounded d-grid mx-auto" style="width: 315px" action="proses_tambah.php" method="POST">
        <label>Nama:</label>
        <input type="text" name="nama" required><br>
        <label>NIM:</label>
        <input type="text" name="nim" required><br>
        <label>Email: </label>
        <input type="text" name="email" required><br>
        <label>Nomor:</label>
        <input type="text" name="nomor" required><br>
        <label>Jurusan:</label>
        <select name="jurusan">
            <?php while ($row = $result -> fetch_assoc()) { ?>
                <option value="<?php echo $row ['id']; ?>"><?php
                echo $row ['nama_jurusan']; ?></option>
<?php }?>
            </select><br>
        <input type="submit" value="Tambahan">

    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>