<?php
include __DIR__ . "/header.php";
include __DIR__ . "/sidebar.php";
include __DIR__ . "/nav.php";

include __DIR__ . "/../database.php";
$query = "SELECT * FROM download ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<style>
    body {
        background: #f4f6f9;
        font-family: "Poppins", sans-serif;
    }

    .custom-card {
        border-radius: 15px;
    }

    .table thead th {
        background: #0d6efd !important;
        color: #fff;
        text-align: center;
    }

    .table td {
        text-align: center;
        vertical-align: middle;
    }

    .btn-custom {
        border-radius: 8px;
        padding: 6px 15px;
    }
</style>

<div class="page-inner" style="margin-top:100px">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="card shadow custom-card">

                <div class="card-header bg-primary text-white d-flex justify-content-between">
                    <h4>📄 PDF Files</h4>
                    <a href="add_download.php" class="btn btn-light text-primary fw-bold btn-custom">
                        ➕ Add PDF
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>View PDF</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                if (mysqli_num_rows($result) > 0) {
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= htmlspecialchars($row['title']); ?></td>

                                            <!-- OPEN PDF IN NEW TAB -->
                                            <td>
                                                <a href="../uploads/pdf/<?= $row['pdf']; ?>"
                                                    target="_blank"
                                                    class="btn btn-sm btn-info btn-custom">
                                                    👁 View PDF
                                                </a>
                                            </td>

                                            <td>
                                                <a href="edit_download.php?id=<?= $row['id']; ?>"
                                                    class="btn btn-sm btn-warning btn-custom">Edit</a>

                                                <button onclick="deleteItem(<?= $row['id']; ?>)"
                                                    class="btn btn-sm btn-danger btn-custom">Delete</button>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>No data found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function deleteItem(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'This PDF will be deleted!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "delete_download.php?id=" + id;
            }
        });
    }
</script>

<?php include __DIR__ . "/footer.php"; ?>