<?php
include __DIR__ . "/../database.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $res = mysqli_query($conn, "SELECT image FROM `authorization` WHERE id=$id LIMIT 1");

    if ($res && mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $imagePath = $row['image'];
        $delete = mysqli_query($conn, "DELETE FROM `authorization` WHERE id=$id");

        if ($delete) {
            if(file_exists(__DIR__ . '/../' . $imagePath)) unlink(__DIR__ . '/../' . $imagePath);
            header("Location: authorization.php?msg=deleted");
        } else {
            header("Location: authorization.php?msg=error");
        }
    } else {
        header("Location: authorization.php?msg=notfound");
    }
} else {
    header("Location: authorization.php");
}
exit();
?>
