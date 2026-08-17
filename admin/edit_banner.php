<?php
include __DIR__ . "/../database.php"; 
ob_start();

// Check if ID is provided
if (!isset($_GET['id'])) {
    header("Location: banner.php");
    exit;
}

$id = intval($_GET['id']);

// Fetch existing banner
$query = "SELECT * FROM banner WHERE id = $id LIMIT 1";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
    echo "<script>
        alert('Banner not found!');
        window.location.href = 'banner.php';
    </script>";
    exit;
}

$banner = mysqli_fetch_assoc($result);

// Handle form submission
if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $description = $_POST['description'];
    $new_image = $banner['image']; // default to old image

    // Check if new image uploaded
    if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
        $image = time() . "_" . $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        $upload_dir = __DIR__ . "/uploads/banner/";

        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $upload_path = $upload_dir . $image;
        $relative_path = "uploads/banner/" . $image;

        if (move_uploaded_file($tmp, $upload_path)) {
            // Delete old image if exists
            if (file_exists(__DIR__ . "/" . $banner['image'])) {
                unlink(__DIR__ . "/" . $banner['image']);
            }
            $new_image = $relative_path;
        } else {
            $msg = "upload_error";
        }
    }

    if (!isset($msg)) {
        $sql = "UPDATE banner SET heading='$name', description='$description', image='$new_image' WHERE id=$id";
        $res = mysqli_query($conn, $sql);

        if ($res) {
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
<title>Edit Banner</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
    body { background: #f5f7fa; font-family: "Poppins", sans-serif; }
    .card { border-radius: 15px; }
    .btn-primary { padding: 10px 25px; font-size: 16px; border-radius: 30px; }
    .img-preview { max-width: 200px; margin-bottom: 10px; border-radius: 10px; }
</style>
</head>
<body>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h4 class="mb-0">✏️ Edit Banner</h4>
                </div>
                <div class="card-body p-4">
                    <form method="POST" enctype="multipart/form-data">

                        <!-- Current Image -->
                        <div class="mb-3 text-center">
                            <?php
                            // Build full URL for current image dynamically
                            $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
                            $host = $_SERVER['HTTP_HOST'];
                            $projectFolder = dirname($_SERVER['SCRIPT_NAME']); // detect project folder
                            $imageURL = $protocol . "://" . $host . $projectFolder . "/" . $banner['image'];
                            ?>
                            <img src="<?php echo $imageURL; ?>" class="img-preview" id="preview">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Upload New Banner (Optional)</label>
                            <input type="file" class="form-control" name="image" onchange="previewImage(event)">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Heading</label>
                            <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($banner['heading']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Description</label>
                            <textarea class="form-control" name="description" rows="4" required><?php echo htmlspecialchars($banner['description']); ?></textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Preview selected image before upload
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function(){
        const output = document.getElementById('preview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

// SweetAlert messages
<?php
if (isset($msg)) {
    if ($msg == "success") {
        echo "Swal.fire({
            title: 'Updated!',
            text: 'Banner updated successfully!',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'banner.php';
        });";
    } elseif ($msg == "db_error") {
        echo "Swal.fire({
            title: 'Error!',
            text: 'Database update failed!',
            icon: 'error'
        });";
    } elseif ($msg == "upload_error") {
        echo "Swal.fire({
            title: 'Error!',
            text: 'Image upload failed!',
            icon: 'error'
        });";
    }
}
?>
</script>

</body>
</html>
<?php ob_end_flush(); ?>
