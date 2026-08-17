<?php
include __DIR__ . "/../database.php";

$success = false;
$error = "";

if (isset($_POST['submit'])) {

    $title = mysqli_real_escape_string($conn, $_POST['title']);

    // File upload
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

            $query = "INSERT INTO download (title, pdf) VALUES ('$title', '$new_pdf')";
            if (mysqli_query($conn, $query)) {
                $success = true;
            } else {
                $error = "Database error!";
            }
        } else {
            $error = "File upload failed!";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Download</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Add PDF Download</h4>
                    </div>
                    <div class="card-body">

                        <form method="POST" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Upload PDF</label>
                                <input type="file" name="pdf" class="form-control" accept="application/pdf" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" name="submit" class="btn btn-success">
                                    Upload PDF
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
                title: 'Success!',
                text: 'PDF uploaded successfully',
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