<?php
include "header.php";
include "database.php";
?>
<!-- ================= FULL WIDTH BANNER WITH HEADING ================= -->
<!-- Sticky Header -->
<div class="stricky-header stricky-header__two stricked-menu main-menu">
    <div class="sticky-header__content"></div>
</div>
<!-- ================= FULL WIDTH BANNER WITH HEADING ================= -->
<section class="full-banner" style="position: relative; width: 100%; height: 500px; overflow: hidden;">
    <img src="assets/banner/banner.webp" alt="Banner" style="width:100%; height:100%; object-fit: cover; display:block;">
    <div class="banner-heading" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);
        text-align: center; color: #fff; text-shadow: 2px 2px 10px rgba(0,0,0,0.7);">
        <h1 style="font-size: 48px; margin: 0; font-weight: 700; color:white; ">Our Authorization</h1>

    </div>
</section>

<section class="authorization-section">
    <div class="container">

        <!-- Section Header -->
        <div class="section-header">
          
            <p>Recognized and authorized by trusted institutions.</p>
        </div>

        <div class="row">
            <?php
            $query = "SELECT * FROM authorization ORDER BY id DESC";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $imageFile = basename($row['image']);
                    $imagePath = 'admin/uploads/authorization/' . $imageFile;
            ?>
                <div class="col-lg-6 col-md-6">
                    <div class="authorization-card">

                        <div class="auth-image">
                            <img 
                                src="<?php echo $imagePath; ?>" 
                                alt="<?php echo htmlspecialchars($row['heading']); ?>"
                                loading="lazy"
                            >
                        </div>

                        <div class="auth-content">
                            <h3><?php echo htmlspecialchars($row['heading']); ?></h3>
                            <p><?php echo nl2br(htmlspecialchars($row['description'])); ?></p>
                        </div>

                    </div>
                </div>
            <?php
                }
            } else {
                echo "<p style='text-align:center;'>No authorization data found.</p>";
            }
            ?>
        </div>

    </div>
</section>

<?php include "footer.php"; ?>
<style>
    .authorization-section {
    padding: 100px 20px;
    background: #f7f9fc;
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

/* Card Styles */
.authorization-card {
    background: #ffffff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 50px rgba(0,0,0,0.08);
    margin-bottom: 40px;
    transition: all 0.4s ease;
    position: relative;
    cursor: pointer;
    text-align: center; /* center content */
    padding: 20px; /* space inside card */
}

.authorization-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 25px 60px rgba(0,0,0,0.15);
}

.auth-image {
    margin: 0 auto 20px auto; /* center image and add bottom space */
    max-width: 80%; /* image width smaller than card */
    overflow: hidden;
    border-radius: 15px;
}

.auth-image img {
    width: 100%;
    height: auto; /* maintain aspect ratio */
    display: block;
    transition: transform 0.5s ease;
    border: 2px solid #0d6efd; /* optional border for professional look */
}

.authorization-card:hover .auth-image img {
    transform: scale(1.05);
}

.auth-content {
    padding: 0 10px;
}

.auth-content h3 {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 12px;
    color: #0d6efd;
}

.auth-content p {
    font-size: 15px;
    color: #555;
    line-height: 1.7;
}

/* Responsive */
@media (max-width: 991px) {
    .section-header h2 {
        font-size: 32px;
    }
    .auth-image {
        max-width: 90%;
    }
}

@media (max-width: 576px) {
    .authorization-section {
        padding: 70px 15px;
    }
    .auth-image {
        max-width: 100%;
    }
}

</style>