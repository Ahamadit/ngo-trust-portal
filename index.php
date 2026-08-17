<?php
include 'header.php';
include 'database.php';
?>

<!-- Sticky Header -->
<div class="stricky-header stricky-header__two stricked-menu main-menu">
    <div class="sticky-header__content"></div>
</div>

<!-- ================= MAIN SLIDER START ================= -->
<section class="main-slider main-slider-one main-slider-one--two">
    <div class="main-slider-one--two__inner">
        <div class="swiper-container main-slider-one--two__slider">
            <div class="swiper-wrapper">

                <?php
                // Fetch banners from database
                $query = "SELECT * FROM banner ORDER BY id DESC";
                $result = mysqli_query($conn, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        // Correct image path
                        $image_path = $row['image'];
                        if (strpos($image_path, 'admin/uploads/banner/') === false) {
                            $image_path = 'admin/uploads/banner/' . basename($row['image']);
                        }
                ?>
                        <!-- Slider Single -->
                        <div class="swiper-slide">
                            <div class="main-slider-one__single">

                                <!-- Full Image -->
                                <div class="main-slider-one__bg">
                                    <img src="<?php echo $image_path; ?>"
                                        alt="<?php echo $row['heading']; ?>"
                                        class="slider-img">
                                </div>

                                <!-- Slider Content -->
                                <div class="main-slider-one__content">

                                    <!-- Heading -->
                                    <h1 class="slider-heading">
                                        <?php echo $row['heading']; ?>
                                    </h1>

                                    <!-- Description -->
                                    <p class="slider-text">
                                        <?php echo $row['description']; ?>
                                    </p>

                                    <!-- Button -->
                                    <a href="https://www.youtube.com/@jkewtrust" target="_blank" class="slider-btn"> <i class="fa-solid fa-video"></i> Videos</a>

                                </div>

                            </div>
                        </div>
                        <!-- Slider Single End -->
                <?php
                    }
                } else {
                    echo "<p style='color:red;text-align:center'>No Banner Found</p>";
                }
                ?>

            </div>
        </div>
    </div>

    <div id="main-slider-one--two__pagination"></div>
</section>
<!-- ================= MAIN SLIDER END ================= -->
<!--Start Feature One-->
<section class="feature-one">
    <div class="feature-one__pattern" style="background-image: url(assets/images/pattern/feature-v1-pattern.png);"></div>
    <div class="container">
        <div class="row feature-one__row">
            <!-- Educational Work -->
            <div class="col-xl-5">
                <div class="feature-one__single same-height mr40">
                    <div class="feature-one__single-bg" style="background-image: url(assets/images/resources/feature-v1-img1.jpg);"></div>
                    <div class="shape1"><img src="assets/images/shapes/feature-v1-shape1.png" alt=""></div>
                    <h2><a href="#">Educational Work</a></h2>
                    <p>We focus on skill development and providing educational resources to empower individuals and communities.</p>
                    <div class="btn-box">
                        <a href="contact.html" class="thm-btn">Join Us Now <span class="icon-diagonal-ar"></span></a>
                    </div>
                </div>
            </div>

            <!-- Happy People Stats -->
            <div class="col-xl-2">
                <div class="feature-one__client-box same-height">
                    <div class="feature-one__client-box-pattern" style="background-image: url(assets/images/pattern/feature-v1-pattern2.png);"></div>
                    <div class="feature-one__client-box-inner">
                        <ul class="feature-one__client-img">
                            <li>
                                <div class="img-box"><img src="assets/images/resources/why-choose-v1-img3.png" alt=""></div>
                            </li>
                            <li>
                                <div class="img-box"><img src="assets/images/resources/why-choose-v1-img4.png" alt=""></div>
                            </li>
                            <li>
                                <div class="img-box"><img src="assets/images/resources/why-choose-v1-img5.png" alt=""></div>
                            </li>
                            <li>
                                <div class="img-box"><img src="assets/images/resources/why-choose-v1-img6.png" alt=""></div>
                            </li>
                            <li>
                                <div class="icon-box"><a href="#"><span class="icon-plus"></span></a></div>
                            </li>
                        </ul>
                        <div class="feature-one__client-text">
                            <h2><span class="odometer" data-count="2"></span><span class="txt">k+</span></h2>
                            <p>Happy People</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Women Empowerment & Environment -->
            <div class="col-xl-5">
                <div class="feature-one__single style2 same-height ml40">
                    <div class="feature-one__single-bg" style="background-image: url(assets/images/resources/feature-v1-img2.jpg);"></div>
                    <div class="shape2"><img src="assets/images/shapes/feature-v1-shape2.png" alt=""></div>
                    <h2><a href="#">Women Empowerment & Environment Protection</a></h2>
                    <p>We promote women empowerment initiatives and support environmental protection activities like tree plantation and sustainable practices.</p>

                </div>
            </div>
        </div>
    </div>
</section>

<!--End Feature One-->

<!--Start About Two-->
<section class="about-two">
    <div class="shape3"><img src="assets/images/shapes/about-v2-shape3.png" alt=""></div>
    <div class="container">
        <div class="row">
            <!--Start About Two Img-->
            <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                <div class="about-two__img">
                    <div class="shape1 float-bob-y"><img src="assets/images/shapes/about-v2-shape1.png" alt=""></div>
                    <div class="shape2 rotate-me"><img src="assets/images/shapes/about-v2-shape2.png" alt=""></div>
                    <ul class="about-two__img-list1">
                        <li>
                            <div class="about-two__img-list1-img1">
                                <img src="assets/about/educational.jpeg" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="about-two__img-list1-img2">
                                <img src="assets/about/enviroment.jpeg" alt="">
                            </div>
                        </li>
                    </ul>

                    <ul class="about-two__img-list2">
                        <li>
                            <div class="about-two__img-list1-img3">
                                <img src="assets/about/women1.jpeg" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="about-two__experiences">
                                <div class="about-two__experiences-inner">
                                    <h2><span class="odometer" data-count="15"></span><span class="txt">+</span></h2>
                                    <p>Years of <br> Impact</p>
                                </div>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
            <!--End About Two Img-->

            <!--Start About Two Content-->
            <div class="col-xl-6 wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                <div class="about-two__content">
                    <div class="sec-title sec-title-animation animation-style2">
                        <div class="sec-title__tagline">
                            <div class="left-line"></div>
                            <div class="text">
                                <h4>About JKEW Trust</h4>
                            </div>
                        </div>
                        <h2 class="sec-title__title title-animation">Empowering Communities, Transforming Lives</h2>
                    </div>
                    <div class="about-two__content-text1">
                        <p>(JKEWTRUST)
                            Jan Kalyan Educational And Welfare Trust is an Indian not-for-profit organization working for Free Education / Tree Plantation and Woman Empowerment. Through different programs. We are a non-denominational, non-political organization and it has been working in India for over a decade, focusing on child free education and especially the empowerment of women and girls for their basic education and technical/vocational education so that they can stand themselves. We believe that we all need to come together to control & stop violence against Women and Children in India will be the most important step. As we know if women are equipped with the proper resources, they can help their whole families and entire communities to overcome poverty, marginalization, and social in justice. We do this through well-planned Techie girls and comprehensive programs in our different kinds of visions like Basic education, Protection, Proper healthcare, Healthy environment for their better livelihoods. We want to see our Country in Top of the world where every child gets an education, every youth an opportunity to succeed, and every woman has the right to equality. Our main goal is the empowerment of women and girls for the betterment and takes out them from poverty, discrimination, and violations.
                            What is NGO
                            A non-governmental organization (NGO) is basically a legally constituted organization which is operated by legal persons who work as independent team with the help of donation.</p>
                    </div>





                </div>
            </div>
            <!--End About Two Content-->
        </div>
    </div>
</section>
<!--End About Two-->


<!--Start Services Two-->
<section class="services-two">
    <div class="services-two__pattern" style="background-image: url(assets/images/pattern/services-v2-pattern.jpg);"></div>
    <div class="container">
        <div class="sec-title text-center sec-title-animation animation-style1">
            <div class="sec-title__tagline center">
                <div class="left-line"></div>
                <div class="text">
                    <h4>Our Services</h4>
                </div>
                <div class="right-line"></div>
            </div>
            <h2 class="sec-title__title title-animation">Changing Lives Through Education, Empowerment, and Care</h2>
        </div>

        <div class="services-two__carousel owl-carousel owl-theme thm-dot-style2">
            <!--Start Services Two Single-->
            <div class="services-two__single text-center p-4">
                <div class="services-two__single-top mb-3">
                    <div class="icon-box">
                        <i class="fas fa-book-reader fa-3x"></i>
                    </div>
                    <div class="title-box mt-2">
                        <h3>Educational Programs</h3>
                    </div>
                </div>
                <div class="services-two__single-bottom">
                    <p>Providing skill development, workshops, and educational resources to empower children and adults for a brighter future.</p>
                </div>
            </div>
            <!--End Services Two Single-->

            <!--Start Services Two Single-->
            <div class="services-two__single text-center p-4">
                <div class="services-two__single-top mb-3">
                    <div class="icon-box">
                        <i class="fas fa-female fa-3x"></i>
                    </div>
                    <div class="title-box mt-2">
                        <h3>Women Empowerment</h3>
                    </div>
                </div>
                <div class="services-two__single-bottom">
                    <p>Supporting women-led initiatives, training, and projects that promote equality, confidence, and economic independence.</p>
                </div>
            </div>
            <!--End Services Two Single-->

            <!--Start Services Two Single-->
            <div class="services-two__single text-center p-4">
                <div class="services-two__single-top mb-3">
                    <div class="icon-box">
                        <i class="fas fa-tree fa-3x"></i>
                    </div>
                    <div class="title-box mt-2">
                        <h3>Environmental Protection</h3>
                    </div>
                </div>
                <div class="services-two__single-bottom">
                    <p>Promoting tree plantation, clean-up drives, and awareness campaigns to protect our environment for future generations.</p>
                </div>
            </div>
            <!--End Services Two Single-->

            <!--Start Services Two Single-->
            <div class="services-two__single text-center p-4">
                <div class="services-two__single-top mb-3">
                    <div class="icon-box">
                        <i class="fas fa-hand-holding-heart fa-3x"></i>
                    </div>
                    <div class="title-box mt-2">
                        <h3>Community Support</h3>
                    </div>
                </div>
                <div class="services-two__single-bottom">
                    <p>Engaging with local communities through outreach programs, workshops, and support services to create sustainable development.</p>
                </div>
            </div>
            <!--End Services Two Single-->

            <!--Start Services Two Single-->
            <div class="services-two__single text-center p-4">
                <div class="services-two__single-top mb-3">
                    <div class="icon-box">
                        <i class="fas fa-users fa-3x"></i>
                    </div>
                    <div class="title-box mt-2">
                        <h3>Volunteer Opportunities</h3>
                    </div>
                </div>
                <div class="services-two__single-bottom">
                    <p>Providing opportunities for individuals to join our mission, contribute their skills, and make a positive impact in society.</p>
                </div>
            </div>
            <!--End Services Two Single-->
        </div>
    </div>
</section>
<!--End Services Two-->


<!--Start Help People One-->
<section class="help-people-one clean-version">
    <div class="container">
        <div class="help-people-wrapper">

            <!-- Left Content -->
            <div class="help-content">
                <span class="tagline">Support Our Mission</span>

                <h2>
                    Donate, Volunteer <br>
                    & Transform Lives
                </h2>

                <p class="main-text">
                    At JKEW Trust, we are dedicated to empowering communities through education,
                    women empowerment, and sustainable environmental initiatives. Your support
                    enables us to create lasting change.
                </p>

                <div class="feature-box">
                    <div class="icon">🎓</div>
                    <div class="text">
                        <h4>Building Schools & Learning Centers</h4>
                        <p>
                            Creating safe, inclusive, and inspiring learning spaces for
                            underprivileged children to grow and succeed.
                        </p>
                    </div>
                </div>

                <a href="donate-now.html" class="thm-btn donate-btn">
                    Donate Now <span class="icon-diagol-arrow1"></span>
                </a>
            </div>

            <!-- Right Highlight Box -->
            <div class="help-highlight">
                <h3>Why Your Support Matters</h3>
                <ul>
                    <li>✔ Education for underprivileged children</li>
                    <li>✔ Women skill development & empowerment</li>
                    <li>✔ Environmental awareness & action</li>
                    <li>✔ Transparent & impactful programs</li>
                </ul>
            </div>

        </div>
    </div>
</section>
<!--End Help People One-->










<?php include 'footer.php'; ?>

<!-- ================= SLIDER CSS ================= -->
<style>
/* Help People Clean Section */
.help-people-one.clean-version {
    padding: 100px 20px;
    background: linear-gradient(135deg, #f5f7fa, #eef2f7);
}

.help-people-wrapper {
    display: flex;
    align-items: center;
    gap: 60px;
    flex-wrap: wrap;
}

.help-content {
    flex: 1;
    max-width: 600px;
}

.help-content .tagline {
    display: inline-block;
    color: #2d72d9;
    font-weight: 600;
    margin-bottom: 15px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.help-content h2 {
    font-size: 42px;
    font-weight: 700;
    margin-bottom: 25px;
    line-height: 1.3;
}

.help-content .main-text {
    font-size: 16px;
    color: #555;
    margin-bottom: 30px;
    line-height: 1.8;
}

.feature-box {
    display: flex;
    gap: 20px;
    background: #ffffff;
    padding: 25px;
    border-radius: 14px;
    box-shadow: 0 10px 35px rgba(0,0,0,0.08);
    margin-bottom: 35px;
}

.feature-box .icon {
    font-size: 40px;
}

.feature-box h4 {
    font-size: 20px;
    margin-bottom: 8px;
}

.feature-box p {
    font-size: 15px;
    color: #666;
}

.donate-btn {
    padding: 14px 34px;
    font-size: 16px;
    border-radius: 50px;
}

/* Highlight Box */
.help-highlight {
    flex: 1;
    background: #ffffff;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 15px 45px rgba(0,0,0,0.08);
}

.help-highlight h3 {
    font-size: 24px;
    margin-bottom: 20px;
}

.help-highlight ul {
    list-style: none;
    padding: 0;
}

.help-highlight ul li {
    font-size: 16px;
    margin-bottom: 12px;
    color: #444;
}

/* Responsive */
@media (max-width: 991px) {
    .help-content h2 {
        font-size: 34px;
    }

    .help-people-wrapper {
        gap: 40px;
    }
}

@media (max-width: 767px) {
    .help-people-one.clean-version {
        padding: 70px 15px;
    }

    .help-content h2 {
        font-size: 30px;
    }

    .help-highlight {
        padding: 30px;
    }
}
    /* Slider Images */
    .slider-img {
        width: 100%;
        min-height: 100vh;
        /* Minimum height full screen */
        object-fit: cover;
        /* Cover entire container */
        display: block;
    }

    /* Slider Single container for better text placement */
    .main-slider-one__single {
        position: relative;
    }

    /* Slider Content */
    .main-slider-one__content {
        position: absolute;
        top: 60%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: #fff;
        z-index: 10;
        width: 90%;
        /* Responsive width */
        max-width: 1200px;
        padding: 20px;
        /* Add padding so text doesn't cut */

        border-radius: 10px;
    }

    /* Heading */
    .slider-heading {
        color: white;
        font-weight: bold;
        font-size: 60px;
        /* Increased font size */
        margin-bottom: 20px;
        line-height: 1.2;
        text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
    }

    /* Paragraph */
    .slider-text {
        font-size: 22px;
        /* Increased font size */
        margin-bottom: 30px;
        line-height: 1.6;
        text-shadow: 1px 1px 6px rgba(0, 0, 0, 0.6);
    }

    /* Button */
    .slider-btn {
        padding: 15px 35px;
        font-size: 20px;
        text-transform: uppercase;
        background-color: #ff5a00;
        color: #fff;
        border-radius: 5px;
        transition: 0.3s;
        display: inline-block;
        text-decoration: none;
    }

    .slider-btn:hover {
        background-color: #e14c00;
    }

    /* Responsive */
    @media (max-width: 1200px) {
        .slider-heading {
            font-size: 50px;
        }

        .slider-text {
            font-size: 20px;
        }

        .slider-btn {
            font-size: 18px;
            padding: 12px 30px;
        }
    }

    @media (max-width: 992px) {
        .slider-heading {
            font-size: 40px;
        }

        .slider-text {
            font-size: 18px;
        }

        .slider-btn {
            font-size: 16px;
            padding: 10px 25px;
        }
    }

    @media (max-width: 576px) {
        .slider-heading {
            font-size: 28px;
        }

        .slider-text {
            font-size: 16px;
        }

        .slider-btn {
            font-size: 14px;
            padding: 8px 20px;
        }
    }
</style>