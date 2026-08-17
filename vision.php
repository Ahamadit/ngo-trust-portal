<?php
include 'header.php';
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
        <h1 style="font-size: 48px; margin: 0; font-weight: 700; color:white; ">Our Vision & Mission</h1>

    </div>
</section>

<!-- ================= MISSION & VISION SECTION ================= -->
<section class="mission-vision-section" style="padding: 80px 20px; background: #f5f7fa;">
    <div class="container" style="max-width: 1200px; margin: 0 auto;">
        <div class="mv-cards" style="display: flex; flex-wrap: wrap; gap: 40px; justify-content: center;">

            <!-- Mission Card -->
            <div class="mv-card" style="flex: 1 1 500px; background: #fff; border-radius: 16px; padding: 40px; box-shadow: 0 15px 35px rgba(0,0,0,0.15); transition: transform 0.4s;">
                <div class="mv-icon" style="font-size: 60px; color: #ff6b6b; text-align: center; margin-bottom: 25px;">
                    <i class="fa-solid fa-lightbulb"></i>
                </div>
                <h3 style="font-size: 26px; text-align: center; color: #333; margin-bottom: 20px; font-weight: 600;">Mission</h3>
                <p style="font-size: 16px; color: #555; line-height: 1.8; text-align: justify;">
                    We do this through well-planned Techie girls and comprehensive programs in our different kinds of visions like Basic education, Protection, Proper healthcare, Healthy environment for their better livelihoods. We want to see our Country in Top of the world where every child gets an education, every youth an opportunity to succeed, and every woman has the right to equality. Our main goal is the empowerment of women and girls for the betterment and takes out them from poverty, discrimination, and violations..
                </p>
            </div>

            <!-- Vision Card -->
            <div class="mv-card" style="flex: 1 1 500px; background: #fff; border-radius: 16px; padding: 40px; box-shadow: 0 15px 35px rgba(0,0,0,0.15); transition: transform 0.4s;">
                <div class="mv-icon" style="font-size: 60px; color: #1e90ff; text-align: center; margin-bottom: 25px;">
                    <i class="fa-solid fa-globe"></i>
                </div>
                <h3 style="font-size: 26px; text-align: center; color: #333; margin-bottom: 20px; font-weight: 600;">Vision</h3>
                <p style="font-size: 16px; color: #555; line-height: 1.8; text-align: justify;">
                   Our mission is to make this world a better place where everybody lives happily with harmony by caring & sharing with love for each other and promoting the universal brotherhood of mankind. We strive to eradicate poverty, illiteracy & every other problem on the Earth, so that we give the coming generations a better world to live by wiping every tear and removing all the sorrows....only with a desire to see a smile on every child's face...!!!
                </p>
            </div>

        </div>
    </div>
</section>

<!-- FontAwesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" />

<style>
    .mv-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 50px rgba(0,0,0,0.2);
    }

    @media (max-width: 992px) {
        .mission-vision-section { padding: 60px 20px; }
    }

    @media (max-width: 768px) {
        .mv-cards { flex-direction: column; gap: 30px; }
        .mv-card { flex: 1 1 100%; }
    }

    @media (max-width: 480px) {
        .section-title { font-size: 32px; }
        .mv-card h3 { font-size: 22px; }
        .mv-card p { font-size: 15px; }
        .mv-icon { font-size: 45px !important; }
        .banner-heading h1 { font-size: 28px; }
    }
</style>

<?php
include 'footer.php';
?>
