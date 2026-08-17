<?php
include __DIR__ . "/../database.php";

if (!isset($_GET['id'])) {
    header("Location: download.php?msg=error");
    exit;
}

$id = intval($_GET['id']);

// Fetch PDF name
$query = "SELECT pdf FROM download WHERE id = $id LIMIT 1";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
    header("Location: download.php?msg=notfound");
    exit;
}

$row = mysqli_fetch_assoc($result);
$pdf = $row['pdf'];

$upload_dir = __DIR__ . "/../uploads/pdf/";

// Delete file if exists
if (!empty($pdf) && file_exists($upload_dir . $pdf)) {
    unlink($upload_dir . $pdf);
}

// Delete database record
$delete = "DELETE FROM download WHERE id = $id";

if (mysqli_query($conn, $delete)) {
    header("Location: download.php?msg=deleted");
} else {
    header("Location: download.php?msg=error");
}
exit;
