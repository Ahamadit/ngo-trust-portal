<?php
include "header.php";
include "database.php";
?>

<!-- ================= DOWNLOAD TABLE SECTION ================= -->
<section class="download-section" style="margin-top: 100px;" >
    <div class="container">

        <!-- Section Header -->
        <div class="section-header">
            <h2>Downloads</h2>
            <h3>View or download important documents</h3>
        </div>

        <div class="table-wrapper">
            <table class="download-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Document Title</th>
                        <th>View</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM download ORDER BY id DESC";
                    $result = mysqli_query($conn, $query);
                    $count = 1;

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                            $fileName = rawurlencode($row['pdf']);
                            $pdfPath  = "uploads/pdf/" . $fileName;
                    ?>
                        <tr>
                            <td data-label="#"><?php echo $count++; ?></td>

                            <td data-label="Title" class="doc-title">
                                <?php echo htmlspecialchars($row['title']); ?>
                            </td>

                            <td data-label="View">
                                <a href="<?php echo $pdfPath; ?>" target="_blank" class="icon view">
                                    <i class="fas fa-eye"></i> View
                                </a>
                            </td>

                            <td data-label="Download">
                                <a href="<?php echo $pdfPath; ?>" download class="icon download">
                                    <i class="fas fa-download"></i> Download
                                </a>
                            </td>
                        </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='4' class='no-data'>No PDF files available</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- ================= STYLES ================= -->
<style>
.download-section {
    padding: 90px 20px;
    background: linear-gradient(135deg, #f4f6fb, #eef2f7);
    font-family: 'Segoe UI', Tahoma, sans-serif;
}

.container {
    max-width: 1200px;
    margin: auto;
}

/* Header */
.section-header {
    text-align: center;
    margin-bottom: 60px;
}

.section-header h2 {
    font-size: 40px;
    font-weight: 700;
    color: #1d3557;
}

.section-header p {
    color: #6c757d;
    font-size: 16px;
}

/* Table Wrapper */
.table-wrapper {
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 20px 50px rgba(0,0,0,0.08);
    overflow-x: auto;
}

/* Table */
.download-table {
    width: 100%;
    border-collapse: collapse;
}

.download-table thead {
    background: #1d3557;
}

.download-table thead th {
    color: #fff;
    padding: 18px;
    font-size: 14px;
    font-weight: 600;
    text-transform: uppercase;
}

/* Rows */
.download-table tbody tr {
    transition: all 0.3s ease;
}

.download-table tbody tr:hover {
    background: #f1f4fa;
    transform: scale(1.01);
}

/* Cells */
.download-table tbody td {
    padding: 18px;
    font-size: 15px;
    text-align: center;
    border-bottom: 1px solid #eee;
}

/* Title */
.doc-title {
    font-weight: 600;
    color: #2b2d42;
    text-align: left;
}

/* Buttons */
.icon {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 10px 18px;
    border-radius: 30px;
    color: #fff;
    font-size: 14px;
    text-decoration: none;
    transition: 0.3s;
}

.icon.view {
    background: linear-gradient(135deg, #457b9d, #1d3557);
}

.icon.download {
    background: linear-gradient(135deg, #e63946, #c1121f);
}

.icon:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.15);
}

/* No Data */
.no-data {
    padding: 40px;
    text-align: center;
    color: #999;
}

/* ================= MOBILE RESPONSIVE ================= */
@media (max-width: 768px) {

    .section-header h2 {
        font-size: 32px;
    }

    .download-table thead {
        display: none;
    }

    .download-table tr {
        display: block;
        margin-bottom: 20px;
        border-radius: 14px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        overflow: hidden;
    }

    .download-table td {
        display: flex;
        justify-content: space-between;
        padding: 14px 16px;
        text-align: left;
    }

    .download-table td::before {
        content: attr(data-label);
        font-weight: 600;
        color: #1d3557;
    }
}
</style>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<?php
include "footer.php";
?>
