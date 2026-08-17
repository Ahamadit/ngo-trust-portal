<?php
include __DIR__ . "/../database.php";

// Start output buffering
ob_start();

// Initialize variables for edit functionality
$id = $name = $description = $imagePath = "";
$action = "Add";

// Check if editing
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM `our-team` WHERE id = $id LIMIT 1";
    $res = mysqli_query($conn, $query);
    if ($res && mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $name = $row['name'];
        $description = $row['description'];
        $imagePath = $row['image'];
        $action = "Edit";
    }
}

if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $upload_dir = __DIR__ . "/uploads/team/";
    if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);

    $new_image = $imagePath; // default to old image for edit
    if (!empty($_FILES['image']['name'])) {
        $image = time() . "_" . $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        $upload_path = $upload_dir . $image;
        $new_image = "uploads/team/" . $image;
        if (!move_uploaded_file($tmp, $upload_path)) {
            $msg = "upload_error";
        }
    }

    if (!isset($msg)) {
        if ($action == "Add") {
            $sql = "INSERT INTO `our-team` (image, name, description) 
                    VALUES ('$new_image', '$name', '$description')";
        } else {
            $sql = "UPDATE `our-team` SET image='$new_image', name='$name', description='$description' WHERE id=$id";
        }

        if (mysqli_query($conn, $sql)) {
            $msg = "success";
        } else {
            $msg = "db_error";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $action; ?> Our Team</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
    body { background: #f5f7fa; font-family: "Poppins", sans-serif; }
    .card { border-radius: 15px; }
    .btn-primary { padding: 10px 25px; font-size: 16px; border-radius: 30px; }
    .img-preview { max-width: 150px; border-radius: 10px; margin-bottom: 10px; }
</style>
</head>
<body>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h4 class="mb-0"><?php echo $action; ?> Our Team</h4>
                </div>
                <div class="card-body p-4">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="mb-3 text-center">
                            <?php if (!empty($imagePath)) : ?>
                                <img src="<?php echo $imagePath; ?>" class="img-preview" id="previewImg">
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Upload Image</label>
                            <input type="file" class="form-control" name="image" accept="image/*" onchange="previewFile(this)">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter name" value="<?php echo $name; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Description</label>
                            <textarea class="form-control" name="description" rows="4" placeholder="Write something..." required><?php echo $description; ?></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-primary"><?php echo $action; ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function previewFile(input) {
    const file = input.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            let img = document.getElementById('previewImg');
            if (!img) {
                img = document.createElement('img');
                img.id = 'previewImg';
                img.className = 'img-preview';
                input.parentNode.insertBefore(img, input);
            }
            img.src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
}
</script>

<?php
// SweetAlert messages
if (isset($msg)) {
    if ($msg == "success") {
        echo "<script>
        Swal.fire({
            title: 'Success!',
            text: 'Team edit successfully!',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'our_team.php';
        });
        </script>";
    } elseif ($msg == "db_error") {
        echo "<script>Swal.fire('Error!', 'Database error!', 'error');</script>";
    } elseif ($msg == "upload_error") {
        echo "<script>Swal.fire('Error!', 'Image upload failed!', 'error');</script>";
    }
}
ob_end_flush();
?>

</body>
</html>
