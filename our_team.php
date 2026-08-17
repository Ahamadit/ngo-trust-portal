<?php
include "header.php";
include "database.php";
?>
<!-- Sticky Header -->
<div class="stricky-header stricky-header__two stricked-menu main-menu">
    <div class="sticky-header__content"></div>
</div>
<!-- ================= FULL WIDTH BANNER WITH HEADING ================= -->
<section class="full-banner" style="position: relative; width: 100%; height: 500px; overflow: hidden;">
    <img src="assets/banner/banner.webp" alt="Banner" style="width:100%; height:100%; object-fit: cover; display:block;">
    <div class="banner-heading" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);
        text-align: center; color: #fff; text-shadow: 2px 2px 10px rgba(0,0,0,0.7);">
        <h1 style="font-size: 48px; margin: 0; font-weight: 700; color:white; ">Meet Our-Team</h1>

    </div>
</section>
<!-- =================== TEAM SECTION =================== -->
<section class="team-section">
    <div class="container">

        <!-- Section Header -->
        <div class="section-header">
          
            <p>Our dedicated team members working tirelessly to serve you.</p>
        </div>

        <div class="row">
            <?php
            // Fetch all team members
            $query = "SELECT * FROM `our-team` ORDER BY id DESC";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $imageFile = basename($row['image']);
                    $imagePath = 'admin/uploads/team/' . $imageFile;
            ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="team-card">

                        <div class="team-image">
                            <img 
                                src="<?php echo $imagePath; ?>" 
                                alt="<?php echo htmlspecialchars($row['name']); ?>"
                                loading="lazy"
                            >
                        </div>

                        <div class="team-content">
                            <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                            <p><?php echo nl2br(htmlspecialchars($row['description'])); ?></p>
                        </div>

                    </div>
                </div>
            <?php
                }
            } else {
                echo "<p style='text-align:center;'>No team data found.</p>";
            }
            ?>
        </div>

    </div>
</section>

<?php include "footer.php"; ?>

<style>
/* =================== TEAM SECTION =================== */
.team-section {
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

/* Team Card */
.team-card {
    background: #ffffff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 50px rgba(0,0,0,0.08);
    margin-bottom: 40px;
    transition: all 0.4s ease;
    text-align: center;
    padding: 25px;
}

.team-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 25px 60px rgba(0,0,0,0.15);
}

.team-image {
    margin: 0 auto 20px auto;
    width: 180px;
    height: 180px;
    border-radius: 50%;
    overflow: hidden;
    border: 4px solid #0d6efd;
}

.team-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.team-card:hover .team-image img {
    transform: scale(1.1);
}

.team-content h3 {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 12px;
    color: #0d6efd;
}

.team-content p {
    font-size: 15px;
    color: #555;
    line-height: 1.7;
}

/* Responsive Grid */
@media (max-width: 991px) {
    .col-lg-4 {
        width: 50%;
        max-width: 50%;
        flex: 0 0 50%;
    }
    .team-image {
        width: 150px;
        height: 150px;
    }
}

@media (max-width: 576px) {
    .col-md-6, .col-lg-4 {
        width: 100%;
        max-width: 100%;
        flex: 0 0 100%;
    }
    .team-section {
        padding: 70px 15px;
    }
    .team-image {
        width: 120px;
        height: 120px;
    }
}
</style>
