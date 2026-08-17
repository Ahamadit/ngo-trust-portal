<?php
include __DIR__ . "/../database.php"; 

// Start output buffering to prevent PHP warnings breaking JS
ob_start();

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $description = $_POST['description'];

    // Image Upload
    $image = time() . "_" . $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    $upload_dir = __DIR__ . "/uploads/authorization/";

    // Create folder if it doesn't exist
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $upload_path = $upload_dir . $image;
    $relative_path = "uploads/authorization/" . $image;

    if (move_uploaded_file($tmp, $upload_path)) {

        // Insert Query
        $sql = "INSERT INTO `authorization` (image, heading, description) 
                VALUES ('$relative_path', '$name', '$description')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $msg = "success";
        } else {
            $msg = "db_error";
        }

    } else {
        $msg = "upload_error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Authorization</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
    body { background: #f5f7fa; font-family: "Poppins", sans-serif; }
    .card { border-radius: 15px; }
    .btn-primary { padding: 10px 25px; font-size: 16px; border-radius: 30px; }
</style>
</head>
<body>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h4 class="mb-0">➕ Add Authorization</h4>
                </div>
                <div class="card-body p-4">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Upload Authorization</label>
                            <input type="file" class="form-control" name="image" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Heading</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Heading" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Description</label>
                            <textarea class="form-control" name="description" rows="4" placeholder="Write something..." required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Show SweetAlert message after submission
if (isset($msg)) {
    if ($msg == "success") {
        echo "<script>
        Swal.fire({
            title: 'Success!',
            text: 'Authorization Added Successfully!',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'authorization.php';
        });
        </script>";
    } elseif ($msg == "db_error") {
        echo "<script>
        Swal.fire({
            title: 'Error!',
            text: 'Database Insert Failed!',
            icon: 'error'
        });
        </script>";
    } elseif ($msg == "upload_error") {
        echo "<script>
        Swal.fire({
            title: 'Error!',
            text: 'Image Upload Failed!',
            icon: 'error'
        });
        </script>";
    }
}
ob_end_flush(); // Flush output buffer
?>

</body>
</html>
