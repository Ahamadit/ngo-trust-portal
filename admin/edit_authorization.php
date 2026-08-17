<?php
include __DIR__ . "/../database.php";
ob_start();

// Defaults
$id = "";
$heading = "";
$description = "";
$imagePath = "";
$action = "Add";

// EDIT MODE
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM authorization WHERE id=$id LIMIT 1";
    $res = mysqli_query($conn, $query);

    if ($res && mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $heading = $row['heading'];
        $description = $row['description'];
        $imagePath = $row['image'];
        $action = "Edit";
    }
}

// FORM SUBMIT
if (isset($_POST['submit'])) {

    $heading = mysqli_real_escape_string($conn, $_POST['heading']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $upload_dir = __DIR__ . "/uploads/authorization/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $finalImage = $imagePath;

    // IMAGE UPLOAD
    if (!empty($_FILES['image']['name'])) {
        $image = time() . "_" . $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        $path = $upload_dir . $image;

        if (move_uploaded_file($tmp, $path)) {
            $finalImage = "uploads/authorization/" . $image;
        } else {
            $msg = "upload_error";
        }
    }

    // INSERT / UPDATE
    if (!isset($msg)) {
        if ($action == "Add") {
            $sql = "INSERT INTO authorization (image, heading, description)
                    VALUES ('$finalImage', '$heading', '$description')";
        } else {
            $sql = "UPDATE authorization 
                    SET image='$finalImage', heading='$heading', description='$description'
                    WHERE id=$id";
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
<title><?php echo $action; ?> Authorization</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
body {
    background: #f5f7fa;
    font-family: "Poppins", sans-serif;
}
.card {
    border-radius: 15px;
}
.btn-primary {
    border-radius: 30px;
    padding: 10px 30px;
}
.preview-img {
    max-width: 150px;
    border-radius: 10px;
    margin-bottom: 10px;
}
</style>
</head>

<body>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0"><?php echo $action; ?> Authorization</h4>
                </div>
                <div class="card-body p-4">

                    <form method="POST" enctype="multipart/form-data">

                        <?php if ($imagePath) { ?>
                            <div class="text-center">
                                <img src="<?php echo $imagePath; ?>" class="preview-img" id="preview">
                            </div>
                        <?php } ?>

                        <div class="mb-3">
                            <label class="fw-bold">Upload Image</label>
                            <input type="file" name="image" class="form-control" onchange="previewFile(this)">
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold">Heading</label>
                            <input type="text" name="heading" class="form-control" required value="<?php echo $heading; ?>">
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold">Description</label>
                            <textarea name="description" class="form-control" rows="4" required><?php echo $description; ?></textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-primary">
                                <?php echo $action; ?>
                            </button>
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
            let img = document.getElementById('preview');
            if (!img) {
                img = document.createElement('img');
                img.id = 'preview';
                img.className = 'preview-img';
                input.parentNode.insertBefore(img, input);
            }
            img.src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
}
</script>

<?php
if (isset($msg)) {
    if ($msg == "success") {
        echo "<script>
            Swal.fire('Success!', 'Authorization Edit successfully!', 'success')
            .then(() => window.location.href='authorization.php');
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
