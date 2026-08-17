<?php
include __DIR__ . "/header.php";
include __DIR__ . "/sidebar.php";
include __DIR__ . "/nav.php";

// Fetch all data from database
include __DIR__ . "/../database.php";
$query = "SELECT * FROM `authorization` ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<style>
    body {
        background: #f4f6f9;
        font-family: "Poppins", sans-serif;
    }

    .custom-card {
        border-radius: 15px;
        overflow: hidden;
    }

    .table thead th {
        background: #0d6efd !important;
        color: #fff !important;
        font-weight: 500;
        text-align: center;
    }

    .table tbody tr {
        transition: 0.3s;
    }

    .table tbody tr:hover {
        background: #e8f1ff !important;
    }

    .table td {
        vertical-align: middle;
        text-align: center;
    }

    .rounded-img {
        border-radius: 10px;
        transition: 0.3s;
    }

    .rounded-img:hover {
        transform: scale(1.1);
    }

    .btn-custom {
        border-radius: 8px;
        padding: 6px 15px;
        font-weight: 500;
    }

</style>

<div class="page-inner" style="margin-top: 100px;">

    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12">

            <div class="card shadow custom-card">

                <!-- 🔥 Add Button -->
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">📊 Authorization </h4>
                    <a href="add_authorization.php" class="btn btn-light text-primary fw-bold btn-custom">
                        ➕ Add Authorization
                    </a>
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">

                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Heading</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                if (mysqli_num_rows($result) > 0) {
                                    $i = 1; // Initialize counter
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $i++ . "</td>"; // Serial number
                                        echo "<td><img src='" . $row['image'] . "' class='rounded-img' width='70'></td>";
                                        echo "<td><strong>" . $row['heading'] . "</strong></td>";
                                        echo "<td>" . $row['description'] . "</td>";
                                        echo "<td>
                                                <a href='edit_authorization.php?id=" . $row['id'] . "' class='btn btn-sm btn-warning btn-custom'>Edit</a>
                                                <a href='delete_authorization.php?id=" . $row['id'] . "' class='btn btn-sm btn-danger btn-custom' 
                                                    onclick=\"return confirm('Are you sure you want to delete this team?')\">Delete</a>
                                              </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5'>No data found.</td></tr>";
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
// Check URL for msg parameter
const urlParams = new URLSearchParams(window.location.search);
const msg = urlParams.get('msg');

if(msg){
    if(msg == 'deleted'){
        Swal.fire({
            title: 'Deleted!',
            text: 'Authorization deleted successfully.',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'authorization.php'; // Remove msg from URL
        });
    } else if(msg == 'error'){
        Swal.fire({
            title: 'Error!',
            text: 'Something went wrong while deleting!',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    } else if(msg == 'notfound'){
        Swal.fire({
            title: 'Error!',
            text: 'Item not found!',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
}
</script>


<?php
include __DIR__ . "/footer.php";
?>
