<?php
include __DIR__ . "/../database.php";

if (!isset($_GET['id'])) {
    die("Invalid request");
}

$id = intval($_GET['id']);

// Fetch existing data
$query = "SELECT * FROM download WHERE id = $id LIMIT 1";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
    die("Record not found");
}

$data = mysqli_fetch_assoc($result);

$success = false;
$error = "";

if (isset($_POST['submit'])) {

    $title = mysqli_real_escape_string($conn, $_POST['title']);

    // If new PDF selected
    if (!empty($_FILES['pdf']['name'])) {

        $pdf_name = $_FILES['pdf']['name'];
        $pdf_tmp  = $_FILES['pdf']['tmp_name'];
        $pdf_ext  = strtolower(pathinfo($pdf_name, PATHINFO_EXTENSION));

        if ($pdf_ext != "pdf") {
            $error = "Only PDF files are allowed!";
        } else {

            $new_pdf = time() . "_" . $pdf_name;
            $upload_dir = __DIR__ . "/../uploads/pdf/";

            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            if (move_uploaded_file($pdf_tmp, $upload_dir . $new_pdf)) {

                // Delete old PDF
                if (!empty($data['pdf']) && file_exists($upload_dir . $data['pdf'])) {
                    unlink($upload_dir . $data['pdf']);
                }

                $update = "UPDATE download SET title='$title', pdf='$new_pdf' WHERE id=$id";
            } else {
                $error = "PDF upload failed!";
            }
        }
    } else {
        // Update title only
        $update = "UPDATE download SET title='$title' WHERE id=$id";
    }

    if ($error == "") {
        if (mysqli_query($conn, $update)) {
            $success = true;
        } else {
            $error = "Database update failed!";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Download</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow">
                    <div class="card-header bg-warning text-dark text-center">
                        <h4>Edit PDF</h4>
                    </div>

                    <div class="card-body">

                        <form method="POST" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="title" class="form-control"
                                    value="<?= htmlspecialchars($data['title']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Current PDF</label><br>
                                <a href="../uploads/pdf/<?= $data['pdf']; ?>" target="_blank">
                                    View Current PDF
                                </a>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Change PDF (optional)</label>
                                <input type="file" name="pdf" class="form-control" accept="application/pdf">
                            </div>

                            <div class="d-grid">
                                <button type="submit" name="submit" class="btn btn-warning">
                                    Update PDF
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php if ($success) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Updated!',
                text: 'PDF updated successfully',
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                window.location.href = "download.php";
            });
        </script>
    <?php } ?>

    <?php if ($error != "") { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '<?= $error ?>'
            });
        </script>
    <?php } ?>

</body>

</html>