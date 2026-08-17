<?php
include __DIR__ . "/../database.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $res = mysqli_query($conn, "SELECT image FROM `our-team` WHERE id=$id LIMIT 1");

    if ($res && mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $imagePath = $row['image'];
        $delete = mysqli_query($conn, "DELETE FROM `our-team` WHERE id=$id");

        if ($delete) {
            if(file_exists(__DIR__ . '/../' . $imagePath)) unlink(__DIR__ . '/../' . $imagePath);
            header("Location: our_team.php?msg=deleted");
        } else {
            header("Location: our_team.php?msg=error");
        }
    } else {
        header("Location: our_team.php?msg=notfound");
    }
} else {
    header("Location: our_team.php");
}
exit();
?>
