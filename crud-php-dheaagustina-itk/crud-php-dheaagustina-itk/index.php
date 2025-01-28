<?php
include "koneksi.php";

session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$role = $_SESSION['role'];


$sql = "SELECT * FROM mahasiswa INNER JOIN jurusan ON mahasiswa.jurusan = jurusan.id";
$result = $conn->query($sql);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset = "UTF-8">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
     <title>Data Mahasiswa</title>
    
</head>

<body> 
<div class="p-3 mb-2 bg-success text-white"><h2>Data Mahasiswa</h2> </div>
      
     <?php if ($role==='admin'): ?>
        <a class="btn btn-dark bi bi-person-plus-fill" href="tambah_mahasiswa.php" role="button">Tambah Data</a>
        <?php endif; ?>
    <br> <br>
    
    <table class="table table-success" border="1">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Email</th>
            <th>Nomor</th>
            <th>Jurusan</th>
            <?php if ($role==='admin'): ?>
            <th>Aksi</th>
            <?php endif; ?>
        </tr>
     </thead>
    

<?php while ($row =$result->fetch_assoc()){ ?>
    <tbody>
      <tr>
         <td><?php echo $row['id']; ?></td>
         <td><?php echo $row['nama']; ?></td>
         <td><?php echo $row['nim']; ?></td>
         <td><?php echo $row['email']; ?></td>
         <td><?php echo $row['nomor']; ?></td>
         <td><?php echo $row['nama_jurusan']; ?></td>
         
         <td>
         <?php if ($role==='admin'): ?>
            <a class="btn btn-primary bi bi-pencil-square" href="edit_mahasiswa.php?id=<?php echo $row['id']; ?>"></a>
            <?php endif; ?>
             
            <?php if ($role==='admin'): ?>
            <a class="btn btn-danger bi bi-trash3-fill" href="hapus_mahasiswa.php?id=<?php echo $row['id']; ?>"></a>
            <?php endif; ?>
        </td>
     </tr>
</tbody>
 <?php } ?>

 </table>
 <br>
<div class="text-end">
 <a class="btn btn-danger    bi bi-box-arrow-right" href="logout.php" role="button">Logout</a>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 </body>

 </html>
  
 <?php $conn->close(); ?>
 
 


