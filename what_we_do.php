<?php
include "header.php";
include "database.php";
?>

<!-- =================== WHAT WE DO SECTION =================== -->
<section class="what-we-do-section">
    <div class="container">

        <!-- Section Header -->
        <div class="section-header">
            <h2>What We Do</h2>
            <p>Discover the services and initiatives that define our work.</p>
        </div>

        <div class="row">
            <?php
            // Fetch all data from what-we-do table
            $query = "SELECT * FROM `what-we-do` ORDER BY id ASC";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $imageFile = basename($row['image']);
                    $imagePath = 'admin/uploads/what_we_do/' . $imageFile;
            ?>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="service-card">

                        <div class="service-image">
                            <img 
                                src="<?php echo $imagePath; ?>" 
                                alt="<?php echo htmlspecialchars($row['name']); ?>"
                                loading="lazy"
                            >
                        </div>

                        <div class="service-content">
                            <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                            <p><?php echo nl2br(htmlspecialchars($row['description'])); ?></p>
                        </div>

                    </div>
                </div>
            <?php
                }
            } else {
                echo "<p style='text-align:center;'>No services found.</p>";
            }
            ?>
        </div>

    </div>
</section>

<?php include "footer.php"; ?>

<style>
/* =================== WHAT WE DO SECTION =================== */
.what-we-do-section {
    padding: 100px 20px;
    background: #f8f9fa;
}

.section-header {
    text-align: center;
    max-width: 700px;
    margin: 0 auto 60px;
}

.section-header h2 {
    font-size: 38px;
    font-weight: 700;
    margin-bottom: 12px;
    color: #0d6efd;
}

.section-header p {
    font-size: 16px;
    color: #555;
}

/* Service Card */
.service-card {
    background: #ffffff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 50px rgba(0,0,0,0.08);
    margin-bottom: 40px;
    transition: all 0.4s ease;
    text-align: center;
    padding: 25px;
}

.service-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 25px 60px rgba(0,0,0,0.15);
}

.service-image {
    margin: 0 auto 20px auto;
    width: 100%;
    max-width: 300px;
    height: 200px;
    overflow: hidden;
    border-radius: 15px;
}

.service-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.service-card:hover .service-image img {
    transform: scale(1.05);
}

.service-content h3 {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 12px;
    color: #0d6efd;
}

.service-content p {
    font-size: 15px;
    color: #555;
    line-height: 1.7;
}

/* Responsive Grid */
@media (max-width: 991px) {
    .col-lg-6 {
        width: 50%;
        max-width: 50%;
        flex: 0 0 50%;
    }
    .service-image {
        max-width: 250px;
        height: 170px;
    }
}

@media (max-width: 576px) {
    .col-md-6, .col-lg-6 {
        width: 100%;
        max-width: 100%;
        flex: 0 0 100%;
    }
    .what-we-do-section {
        padding: 70px 15px;
    }
    .service-image {
        max-width: 100%;
        height: 150px;
    }
}
</style>
