<?php
include 'header.php';
?>

<!-- ================= CONTACT US SECTION ================= -->
<section class="contact-us-section" style="margin-top:100px; padding: 100px 20px; background: #f5f7fa;">
    <div class="container" style="max-width: 1200px; margin: 0 auto;">

        <!-- Heading -->
        <div style="text-align: center; margin-bottom: 70px;">
            <h1 style="font-size: 46px; font-weight: 700; color: #1e90ff; margin-bottom: 15px;">
                Contact Us
            </h1>
            <p style="font-size: 18px; color: #555; max-width: 850px; margin: 0 auto;">
                Get in touch with <strong>Jan Kalyan Educational and Welfare Trust</strong> for support, collaboration, or any general inquiries. We are always happy to connect.
            </p>
        </div>

        <!-- Contact Cards -->
        <div style="display: flex; flex-wrap: wrap; gap: 40px; justify-content: center;">

            <!-- Address -->
            <div class="contact-card" style="flex: 1 1 300px; background: #fff; border-radius: 20px; padding: 45px 30px; text-align: center;
                box-shadow: 0 20px 50px rgba(0,0,0,0.1); transition: all 0.4s;">
                <i class="fa-solid fa-location-dot" style="font-size: 42px; color: #ff6b6b; margin-bottom: 20px;"></i>
                <h4 style="font-size: 22px; font-weight: 600; color: #333; margin-bottom: 10px;">Our Address</h4>
                <p style="font-size: 16px; color: #555;">
                    Mathura, Uttar Pradesh – 281004
                </p>
            </div>

            <!-- Email -->
            <div class="contact-card" style="flex: 1 1 300px; background: #fff; border-radius: 20px; padding: 45px 30px; text-align: center;
                box-shadow: 0 20px 50px rgba(0,0,0,0.1); transition: all 0.4s;">
                <i class="fa-solid fa-envelope" style="font-size: 42px; color: #1e90ff; margin-bottom: 20px;"></i>
                <h4 style="font-size: 22px; font-weight: 600; color: #333; margin-bottom: 10px;">Email Address</h4>
                <p style="font-size: 16px; color: #555;">
                    jkewtrust2019@gmail.com
                </p>
            </div>

            <!-- Phone -->
            <div class="contact-card" style="flex: 1 1 300px; background: #fff; border-radius: 20px; padding: 45px 30px; text-align: center;
                box-shadow: 0 20px 50px rgba(0,0,0,0.1); transition: all 0.4s;">
                <i class="fa-solid fa-phone" style="font-size: 42px; color: #28a745; margin-bottom: 20px;"></i>
                <h4 style="font-size: 22px; font-weight: 600; color: #333; margin-bottom: 10px;">Contact Number</h4>
                <p style="font-size: 16px; color: #555;">
                    +91 82737 78515
                </p>
            </div>

        </div>

        <!-- Map -->
        <div style="margin-top: 70px; border-radius: 22px; overflow: hidden; box-shadow: 0 20px 50px rgba(0,0,0,0.1);">
            <iframe 
                src="https://maps.google.com/maps?q=Mathura%2C%20Uttar%20Pradesh&t=&z=13&ie=UTF8&iwloc=&output=embed"
                width="100%" 
                height="450" 
                style="border:0;" 
                loading="lazy">
            </iframe>
        </div>

    </div>
</section>

<!-- FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>
    .contact-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 30px 70px rgba(0,0,0,0.15);
    }

    @media (max-width: 768px) {
        h1 { font-size: 34px; }
        .contact-card h4 { font-size: 18px; }
        .contact-card p { font-size: 14px; }
    }
</style>

<?php
include 'footer.php';
?>
