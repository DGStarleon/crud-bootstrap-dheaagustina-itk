<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role']===! 'admin') {
    header('Location: index.php');
    exit;
}
$id = $_GET['id'];

$sql = "DELETE FROM mahasiswa WHERE id=$id";

if($conn->query($sql)=== TRUE) {
    header("Location:  index.php");
    exit;
} else {
    echo "Error: " . $conn->error;
}

$conn->close();