<?php

include './dashboard/services/__api.php';
include './routes.php';

$slug = $_GET['page_id'];

$query = "SELECT * FROM services WHERE `slug` = '$slug' ";
$result = mysqli_query($con, $query);

$query1 = "SELECT * FROM blogs WHERE `slug` = '$slug' ";
$result1 = mysqli_query($con, $query1);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} elseif (mysqli_num_rows($result1) > 0) {
    $hide_and_seek = true;
    $row = mysqli_fetch_assoc($result1);
} else {
    echo 'Page Not Found';
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=preload href=https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css as=style onload='this.onload=null,this.rel="stylesheet"' async>
    <link rel="stylesheet" href="./assets/css/home.css?v=1">
    <!-- <link rel="stylesheet" href="<?= base_urlx() ?>assets/css/navbar.css"> -->
    <link rel="stylesheet" href="./assets/css/footer.css">
    <title><?= $row['title'] ?></title>
    <?= $row['meta'] ?>

    <style>
        

        .multiline-ellipsis {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 4;
            /* start showing ellipsis when 3rd line is reached */
            /* white-space: pre-wrap; let the text wrap preserving spaces */
        }

        .multiline-ellipsis2 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 6;
            /* start showing ellipsis when 3rd line is reached */
            /* white-space: pre-wrap; let the text wrap preserving spaces */
        }
        .hero-points p{
            font-size: 1.2rem;
            line-height: 24px;
            width: 90%;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <nav class="nav">
            <div class="logo">
                <a href="">Any Time Move</a>
            </div>
            <div class="menu" id="menu">
                <div class="close-the-nav" id="close-the-nav"><i class="ri-close-line"></i></div>
                <ul>
                    <li><a href="<?=base_urlx() ?>#service-section">Our Services</a></li>
                    <li><a href="about-us">About Us</a></li>
                    <li><a href="calculator">Get Quotes</a></li>
                    <li><a href="blogs">Blogs</a></li>
                </ul>
            </div>
            <div class="phone-menu" >
                <span id="open-the-nav"><i class="ri-menu-line"></i></span>
            </div>
        </nav>
    </div>
    <section class="hero">
        <div class="hero-section">
            <div class="hero-section-detail hero-section-col">
                <h1><?= $row['h1'] ?></h1>
                <div class="hero-section-point">
                <?php
                    if ($hide_and_seek) {
                    ?>
                        <div class="hero-points multiline-ellipsis">
                            <p><?= $row['h1_about'] ?><p>
                        </div>
                    <?php
                    } else {
                    ?>
                    <div class="hero-section-point-body">
                        <div class="hero-point">
                            <p><?= $row['ponit1'] ?></p>
                        </div>
                    </div>
                    <div class="hero-section-point-body">
                        <div class="hero-point">
                            <p><?= $row['ponit2'] ?></p>
                        </div>
                    </div>
                    <div class="hero-section-point-body">
                        <div class="hero-point">
                            <p><?= $row['ponit3'] ?></p>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="hero-section-image hero-section-col">
                <img src="./20123577_6209999.jpg" width="100%" height="100%" alt="<?= $row['h1'] ?>">
            </div>
        </div>
        <div class="hero-section-form">
            <form action="">
                <div class="form-row">
                    <input type="text" name="" placeholder="Ship From" id="">
                    <input type="text" name="" placeholder="Ship To" id="">
                    <input type="submit" value="Get Quotes">
                </div>
            </form>
        </div>
    </section>

    <section class="below-hero-section">
        <div class="below-hero-section-row">
            <div class="below-hero-section-col">
                <div class="below-hero-img">
                    <img src="https://anytimemove.com/assets/images/quick.png" alt="">
                </div>
                <h2>Quick Pickup</h2>
            </div>
            <div class="below-hero-section-col">
                <div class="below-hero-img">
                    <img src="https://anytimemove.com/assets/images/review.png" alt="">
                </div>
                <h2>Best Ratings</h2>
            </div>
            <div class="below-hero-section-col">
                <div class="below-hero-img">
                    <img src="https://anytimemove.com/assets/images/peace.svg" alt="">
                </div>
                <h2>Peace Of Mind</h2>
            </div>
            <div class="below-hero-section-col">
                <div class="below-hero-img">
                    <img src="https://anytimemove.com/assets/images/ach.svg" alt="">
                </div>
                <h2>Experties</h2>
            </div>
            <!-- <div class="below-hero-section-col"></div> -->
        </div>
    </section>
    <section>
        <div class="service-review-section">
            <div class="slider">
                <div class="slides-container">
                    <div class="slide">
                        <div class="box-slide">
                            <div class="box-slide-review">
                                <div style="display: flex;align-items: center;justify-content: space-between;">
                                    <div class="box-review-profile">
                                        <div class="box-profile"><img src="./assets/images/profile-3.jpeg" width="100%" height="100%" alt=""></div>
                                        <span>
                                            <h3>Mark Hill </h3><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i>
                                        </span>
                                    </div>
                                    <div class="box-profile" style="background-color: white;"><img src="./assets/images/google.png" style="object-fit: contain;" width="100%" height="100%" alt=""></div>
                                </div>
                                <p style="text-align: start;font-size:19px;line-height:23px;" class="multiline-ellipsis2">Their auto shipping services are accurate whether it is home pickup or taking care of my vehicles. I was happy with all their services and their shipping and transport services were better than anyone else.</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="box-slide">
                            <div class="box-slide-review">
                                <div style="display: flex;align-items: center;justify-content: space-between;">
                                    <div class="box-review-profile">
                                        <div class="box-profile"><img src="./assets/images/profile-2.jpeg" width="100%" height="100%" alt=""></div>
                                        <span>
                                            <h3>Angela Merkle</h3><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i>
                                        </span>
                                    </div>
                                    <div class="box-profile" style="background-color: white;"><img src="./assets/images/transport-reviews.png" style="object-fit: contain;" width="100%" height="100%" alt=""></div>
                                </div>
                                <p style="text-align: start;font-size:19px;line-height:23px;" class="multiline-ellipsis2">I asked them for car shipping in a trailer to Vegas. I have been using their services for many years and I am never disappointed. The vehicles arrived quickly and safely.</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="box-slide">
                            <div class="box-slide-review">
                                <div style="display: flex;align-items: center;justify-content: space-between;">
                                    <div class="box-review-profile">
                                        <div class="box-profile"><img src="./assets/images/profile-4.jpeg" width="100%" height="100%" alt=""></div>
                                        <span>
                                            <h3>John Logan</h3><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i>
                                        </span>
                                    </div>
                                    <div class="box-profile" style="background-color: white;"><img src="./assets/images/google.png" style="object-fit: contain;" width="100%" height="100%" alt=""></div>
                                </div>
                                <p style="text-align: start;font-size:19px;line-height:23px;" class="multiline-ellipsis2">Very accurate and in-time services. Their home pickup was excellent, and auto shippers took care of the vehicle very well. If I had known they were so good, I would have also asked them for car shipping.</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="box-slide">
                            <div class="box-slide-review">
                                <div style="display: flex;align-items: center;justify-content: space-between;">
                                    <div class="box-review-profile">
                                        <div class="box-profile"><img src="./assets/images/profile-5.jpeg" width="100%" height="100%" alt=""></div>
                                        <span>
                                            <h3>Barbara Allison </h3><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i>
                                        </span>
                                    </div>
                                    <div class="box-profile" style="background-color: white;"><img src="./assets/images/trustpilot.png" style="object-fit: contain;" width="100%" height="100%" alt=""></div>
                                </div>
                                <p style="text-align: start;font-size:19px;line-height:23px;" class="multiline-ellipsis2">I couldn't be happier with the service I received from this car transportation company when I engaged them to move my vintage vehicle. My automobile was handled carefully, and it arrived in the same state as when it left. Throughout the entire process, there was excellent communication, and I valued the assurance that my car was in capable hands.</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="box-slide">
                            <div class="box-slide-review">
                                <div style="display: flex;align-items: center;justify-content: space-between;">
                                    <div class="box-review-profile">
                                        <div class="box-profile"><img src="./assets/images/profile-6.jpeg" width="100%" height="100%" alt=""></div>
                                        <span>
                                            <h3>Beth Sever </h3><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i>
                                        </span>
                                    </div>
                                    <div class="box-profile" style="background-color: white;"><img src="./assets/images/bbb.png" style="object-fit: contain;" width="100%" height="100%" alt=""></div>
                                </div>
                                <p style="text-align: start;font-size:19px;line-height:23px;" class="multiline-ellipsis2">Just book your next car shipment with them they are quick and reliable company to work with as they do not change their prices at the last moment which other car shipping company always does.</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="box-slide">
                            <div class="box-slide-review">
                                <div style="display: flex;align-items: center;justify-content: space-between;">
                                    <div class="box-review-profile">
                                        <div class="box-profile"><img src="./assets/images/profile-7.jpeg" width="100%" height="100%" alt=""></div>
                                        <span>
                                            <h3>Jerry Merten </h3><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i>
                                        </span>
                                    </div>
                                    <div class="box-profile" style="background-color: white;"><img src="./assets/images/transport-reviews.png" style="object-fit: contain;" width="100%" height="100%" alt=""></div>
                                </div>
                                <p style="text-align: start;font-size:19px;line-height:23px;" class="multiline-ellipsis2">Best Car Transport company out of all the car shipping company. Shipping a car from one state to the other state with Anytime Mover is the best experience of car shipping i ever had as they were quick and easy to respond during the whole shipment process.</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="box-slide">
                            <div class="box-slide-review">
                                <div style="display: flex;align-items: center;justify-content: space-between;">
                                    <div class="box-review-profile">
                                        <div class="box-profile"><img src="./assets/images/profile-1.jpeg" width="100%" height="100%" alt=""></div>
                                        <span>
                                            <h3>joe bird </h3><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i>
                                        </span>
                                    </div>
                                    <div class="box-profile" style="background-color: white;"><img src="./assets/images/trustpilot.png" style="object-fit: contain;" width="100%" height="100%" alt=""></div>
                                </div>
                                <p style="text-align: start;font-size:19px;line-height:23px;" class="multiline-ellipsis2">Best Auto transport company out of all the car shipping companies in my knowledge. They have transported my car to California and once to Texas and i am the satisfied customer of Anytime Mover. The time my vehicle was getting Shipped by Anytime Mover</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="box-slide">
                            <div class="box-slide-review">
                                <div style="display: flex;align-items: center;justify-content: space-between;">
                                    <div class="box-review-profile">
                                        <div class="box-profile"><img src="./assets/images/profile-2.jpeg" width="100%" height="100%" alt=""></div>
                                        <span>
                                            <h3>Kevin Carree </h3><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i>
                                        </span>
                                    </div>
                                    <div class="box-profile" style="background-color: white;"><img src="./assets/images/google.png" style="object-fit: contain;" width="100%" height="100%" alt=""></div>
                                </div>
                                <p style="text-align: start;font-size:19px;line-height:23px;" class="multiline-ellipsis2">Shipping A vehicle from Texas to California was the best experience with Anytime Mover. Auto Transportation company usually charge high at the last minute whereas the timing and no increase in price was the best i can expect from any Anytime Mover.</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="box-slide">
                            <div class="box-slide-review">
                                <div style="display: flex;align-items: center;justify-content: space-between;">
                                    <div class="box-review-profile">
                                        <div class="box-profile"><img src="./assets/images/profile-4.jpeg" width="100%" height="100%" alt=""></div>
                                        <span>
                                            <h3>JandE Essam </h3><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i>
                                        </span>
                                    </div>
                                    <div class="box-profile" style="background-color: white;"><img src="./assets/images/bbb.png" style="object-fit: contain;" width="100%" height="100%" alt=""></div>
                                </div>
                                <p style="text-align: start;font-size:19px;line-height:23px;" class="multiline-ellipsis2">Best vehicle shipping company. I have used them quiet a few times and they were proved to be the best one one as always. Anytime Mover is one of the best car transportation in state to state shipping for USA</p>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="slide">Slide 10</div> -->
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="content-row">
            <div class="content-col content-details">
                <?= $row['content'] ?>
            </div>
            <div class="content-col">
                <div class="content-form-container">
                    <h2>Get Free Quote</h2>
                    <form action="">
                        <div class="content-form-group">
                            <input type="text" placeholder="Ship From">
                        </div>
                        <div class="content-form-group">
                            <input type="text" placeholder="Ship To">
                        </div>
                        <div class="content-form-group">
                            <input type="submit" value="Get Quotes">
                        </div>
                    </form>
                    <p>2343 people has requested for the free quote till now</p>
                </div>
                <div class="content-form-contact">
                    <div class="content-form-contact-h2">
                        <h2><a href="tel: 985-243-4053"><button>(985) 243-4053</button></a></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="about-apart">
        <div class="about-apart-row">
            <div class="about-apart-col">
                <div class="about-apart-col-detail">
                    <h2 style="text-align: center;">What Sets Us Apart</h2>
                </div>
            </div>
            <div class="about-apart-col">
                <div class="about-apart-grid">
                    <div class="about-apart-grid-col">
                        <h3>Personalized Approach</h3>
                        <p> We understand that every customer is unique, as well as their moving requirements. We try to provide you with services according to your needs so that you can best out of us and get complete and satisfying moving service.</p>
                    </div>
                    <div class="about-apart-grid-col">
                        <h3>Expert at Work</h3>
                        <p>Our team is well-trained and experienced contributing best to the table. Our team is committed to their work they take every task from packing and loading, very sincerely, which makes us deliver the highest standard of services with care and precision.</p>
                    </div>
                    <div class="about-apart-grid-col">
                        <h3>Inclusive Services</h3>
                        <p>Whether shifting to a new home, relocating your whole office or wanting to ship your car under a long-distance move. We are here with expertise and resources to make your moving process smooth and reliable.</p>
                    </div>
                    <div class="about-apart-grid-col">
                        <h3>Transparent pricing</h3>
                        <p>We believe in transparency whether it is a working quote or working, we provide the best. From quote to your home we try to optimize the resources with proper and clear communication and genuine pricing.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="why-choose-us">
        <div class="why-choose-heading">
            <h2>Why Choose Us</h2>
        </div>
        <div class="why-choose-content">
            <div class="why-choose-one one">
                <h3>Reliability</h3>
                <p>Our experience and working made us a reliable company in the Moving industry. Many customers have already trusted us with our most valuable and sensitive possessions.</p>
            </div>
            <div class="why-choose-one two"><h3>Experience</h3>
            <p>With years of working in this industry, we have discovered and perfected almost every skill that is important for moving your belongings.</p>
        </div>
            <div class="why-choose-one three"><h3>Custom Approach</h3>
        <p>We understand everyone is different along with their needs. Our experts are here to help and provide you with the best solutions that fit your requirements well.</p></div>
            <div class="why-choose-one four"><h3>Affordability</h3><p> We do not compromise the level of service with cost. We try to provide you best service with transparent and competitive pricing.</p></div>


        </div>
    </div>
    <?php
                    if ($hide_and_seek) {}else{
                    ?>
    <div class="service-faq">
        <div class="services-heading">
            <h2>FAQ</h2>
            <div class="design">
                <div class="line1" style="background-color: orangered;"></div>
                <div class="line2" style="background-color: orangered;"></div>
                <div class="line1" style="background-color: orangered;"></div>
            </div>
        </div>
        <div class="service-faq-body">
            <div class="service-faq-question-body" id="service-faq-question-body">
                <div class="service-faq-question">
                    <p><b>Q </b>How car shipping service is beneficial?</p><span>+</span>
                </div>
                <p class="service-faq-ans">
                    When relocating, there might be other options than driving long distances. Shipping allows families and business firms to focus on the move and settle in comfortably while their car and other items are safely shipped to their new location, saving time and money.

                </p>
            </div>
            <div class="service-faq-question-body" id="service-faq-question-body">
                <div class="service-faq-question">
                    <p><b>Q </b>How safe is it to ship our family car?</p><span>+</span>
                </div>
                <p class="service-faq-ans">
                    Mojar Moving companies, including us, prioritise proper vehicle safety by using equipment and following a proper procedure to reduce risk during shipping.
                </p>
            </div>
            <div class="service-faq-question-body" id="service-faq-question-body">
                <div class="service-faq-question">
                    <p><b>Q </b>Can I ship more than one car? </p><span>+</span>
                </div>
                <p class="service-faq-ans">
                    Nowadays having two or more vehicles is quite common and could be challenging when shipping but not with us we provide multi-car shipping services which make car shipping of both cars easy and fast and you can get discount also.
                </p>
            </div>
            <div class="service-faq-question-body" id="service-faq-question-body">
                <div class="service-faq-question">
                    <p><b>Q </b> Is Shipping service available for Non-operational vehicles? </p><span>+</span>
                </div>
                <p class="service-faq-ans">
                    You can ship non-operational vehicles with us easily just by contacting our team and providing information about the vehicle and getting quotes and knowledge about the process.

                </p>
            </div>
            <div class="service-faq-question-body" id="service-faq-question-body">
                <div class="service-faq-question">
                    <p><b>Q </b>Is there any insurance coverage provided in the car shipping package?</p><span>+</span>
                </div>
                <p class="service-faq-ans">
                    Basic insurance coverage comes with a car shipping package, but it is vital to check whether insurance coverage is sufficient for your car.
                </p>
            </div>
            <div class="service-faq-question-body" id="service-faq-question-body">
                <div class="service-faq-question">
                    <p><b>Q </b>What types of cars can be shipped?</p><span>+</span>
                </div>
                <p class="service-faq-ans">
                    We have proper specialisation in shipping any type of cars whether it is working or non working, standard or exotic. We can ship any car to any location affordably.
                </p>
            </div>
            <div class="service-faq-question-body" id="service-faq-question-body">
                <div class="service-faq-question">
                    <p><b>Q </b>Can I ship personal items in my car? </p><span>+</span>
                </div>
                <p class="service-faq-ans">
                    Personal items weighing around 100 lbs can be shipped inside your car but it is advisable to not ship any valuable or loose items as they can potentially damage your car.

                </p>
            </div>
        </div>
    </div>
    <?php } ?>
    


    <?php include './footer.php' ?>



    <script>
        let isDragging = false;
        let startPosition = 0;
        let currentIndex = 0;
        const slidesContainer = document.querySelector('.slides-container');
        const slides = document.querySelectorAll('.slide');
        const totalSlides = slides.length;

        slidesContainer.addEventListener('mousedown', (e) => {
            isDragging = true;
            startPosition = e.clientX;
        });

        slidesContainer.addEventListener('mouseup', () => {
            isDragging = false;
            adjustSlidePosition();
        });

        slidesContainer.addEventListener('mousemove', (e) => {
            if (isDragging) {
                const currentPosition = e.clientX;
                const difference = startPosition - currentPosition;
                slidesContainer.style.transform = `translateX(-${currentIndex * 33.33 + difference}px)`;
            }
        });

        function adjustSlidePosition() {
            const movedPixels = startPosition - event.clientX;
            if (movedPixels > 100) {
                currentIndex += 3;
            } else if (movedPixels < -100) {
                currentIndex -= 3;
            }
            currentIndex = Math.max(0, Math.min(currentIndex, totalSlides - 3));
            slidesContainer.style.transform = `translateX(-${currentIndex * 33.33}%)`;
        }

        // Show 3 slides on desktop and 1 slide on mobile
        if (window.innerWidth < 768) {
            for (let i = 0; i < totalSlides; i++) {
                slides[i].style.flex = '0 0 100%';
            }
        }

        // Update slide layout when window is resized
        window.addEventListener('resize', () => {
            if (window.innerWidth < 768) {
                for (let i = 0; i < totalSlides; i++) {
                    slides[i].style.flex = '0 0 100%';
                }
            } else {
                for (let i = 0; i < totalSlides; i++) {
                    slides[i].style.flex = '0 0 33.33%';
                }
            }
        });


        a = document.querySelectorAll('#service-faq-question-body')
        for (i = 0; i < a.length; i++) {
            a[i].addEventListener('click', (e) => {
                e.target.parentElement.classList.toggle('height-faq')
            })
        }


        document.getElementById('open-the-nav').addEventListener('click',()=>{
            document.getElementById('menu').style.display = "grid";
        })
        document.getElementById('close-the-nav').addEventListener('click',()=>{
            document.getElementById('menu').style.display = "none";
        })


    </script>
</body>

</html>