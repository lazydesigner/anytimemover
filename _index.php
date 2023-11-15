<?php
include './dashboard/services/__api.php';
include './routes.php';

$slug = $_GET['page_id'];

$query = "SELECT * FROM services WHERE `slug` = '$slug' ";
$result = mysqli_query($con, $query);

if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
}else{
    echo 'Page Not Found';
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$row['title'] ?></title>
    <?=$row['meta'] ?>
<link rel=preload href=https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css as=style onload='this.onload=null,this.rel="stylesheet"' async>
    <link rel="stylesheet" href="<?=base_urlx() ?>assets/css/footer.css">
    <link rel="stylesheet" href="<?=base_urlx() ?>assets/css/navbar.css">
    <link rel="stylesheet" href="<?=base_urlx() ?>assets/css/_index.css">

    <style>
        .side-form-quotes{
            width: 125px;
            position: fixed;
            top: 30%;
            left: .5%;
            height: auto;
        }
        .side-form-circle{
            width: 100px;
            height: 100px;
            border-radius: 50%;
            /* margin: 30% 0; */
            border: 4px solid red;
            display: grid;
            place-items: center;
            background-color: whitesmoke;
            text-align: center;
            position: relative;
        }
        .circle-one, .circle-two, .circle-three{
            position: absolute;
            left: 10%;
            display: none;
        }
        .circle-one{
            top: 10px;
        }
        .circle-two{
            top: 160px;
        }
        .circle-three{
            top: 310px;
        }
        .side-form-line{
            width: 10px;
            height: 50px;
            background-color: red;
            transition: 1s;
            margin: auto;
            transform-origin:top;
            position: absolute;
            left: 45%;
        }
        .line-one{
            top: 110px;
            transform: scaleY(0);
        }
        .line-two{
            top: 260px;
            transform: scaleY(0);
        }
    </style>

    
</head>

<body style="width: 1200px;margin:auto;">
    <div style="position:relative; width:100%;height:70px"><?php include './navbar.php'; ?></div>
    <section class="service-hero-section">
        <img src="./assets/images/open Air Transport.webp" width="100%" height="100%" alt="">
        <div class="service-hero-section-row">
            <div class="service-hero-section-col">
                <div class="form-container">
                    <p class="form-container-p">Get Quotes</p>
                    <form class="form-container-form" id="form-container-form" action="" method="post">
                        <div class="form-group">
                            <input type="text" name="from" id="from" placeholder="Ship From">
                        </div>
                        <div class="form-group">
                            <input type="text" name="to" id="to" placeholder="Ship To">
                        </div>
                        <div class="form-group" style="text-align: end;">
                            <button class="form-container-button" id="form-container-button">Next</button>
                        </div>
                    </form>
                    <div class="form-review">
                        <div class="form-review-face">
                            <div class="face-one"><img src="./assets/images/profile-1.jpeg" width="100%" height="100%" alt=""></div>
                            <div class="face-one"><img src="./assets/images/profile-2.jpeg" width="100%" height="100%" alt=""></div>
                            <div class="face-one"><img src="./assets/images/profile-3.jpeg" width="100%" height="100%" alt=""></div>
                        </div>
                        <small>2023 people shipped till now</small>
                    </div>
                </div>
            </div>
            <div class="service-hero-section-col">
                <h1 class="service-hero-h1"><?=$row['h1'] ?></h1>
                <div>
                    <ul class="service-hero-p" style="list-style: none;">
                        <li><span><i class="ri-share-forward-fill"></i></span><?=$row['ponit1'] ?></li>
                        <li><span><i class="ri-share-forward-fill"></i></span><?=$row['ponit2'] ?></li>
                        <li><span><i class="ri-share-forward-fill"></i></span><?=$row['ponit3'] ?></li>
                    </ul>
                </div>
                <!-- <p class="service-hero-p">inside the flex container take up 30%, 40%, and 30% of the container's width respectively, with equal spacing between them due to justify-content: space-between;. You can adjust the percentage values to match your specific layout requirements.</p> -->
            </div>
        </div>
    </section>
    <section style="background-color:#E9E9E9;padding-top:1%;">
        <div class="services-hero-section-bellow">
            <div class="services-hero-section-bellow-box">
                <div class="services-hero-icon"><img src="./assets/images/quick.png" width="100%" height="100%" style="object-fit: cover;" alt=""></div>
                <h2>Quick Pickup</h2>
            </div>
            <div class="services-hero-section-bellow-box">
                <div class="services-hero-icon"><img src="./assets/images/Express-Auto-Service.webp" width="100%" height="100%" style="object-fit: cover;" alt=""></div>
                <h2>Fast Delivery</h2>
            </div>
            <div class="services-hero-section-bellow-box">
                <div class="services-hero-icon"><img src="./assets/images/review.png" width="100%" height="100%" style="object-fit: cover;" alt=""></div>
                <h2>Best Ratings</h2>
            </div>
            <div class="services-hero-section-bellow-box">
                <div class="services-hero-icon"><img src="./assets/images/peace.svg" width="100%" height="100%" style="object-fit: cover;" alt=""></div>
                <h2>Peace Of Mind</h2>
            </div>

        </div>
        <div class="service-review-section">
            <div class="slider">
                <div class="slides-container">
                    <div class="slide">
                        <div class="box-slide">
                            <div class="box-slide-review">
                                <div style="display: flex;align-items: center;justify-content: space-between;">
                                    <div class="box-review-profile">
                                        <div class="box-profile"><img src="./assets/images/profile-2.jpeg" width="100%" height="100%" alt=""></div>
                                        <span>
                                            <h3>Deepak </h3><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i>
                                        </span>
                                    </div>
                                    <div class="box-profile" style="background-color: white;"><img src="./assets/images/google.png" style="object-fit: contain;" width="100%" height="100%" alt=""></div>
                                </div>
                                <p style="text-align: start;font-size:15px;line-height:23px;">With this setup, the flex items will adjust their size and layout based on the available space, creating a responsive design that works well on different screen sizes. You can modify the styles and structure according to your specific layout requirements.</p>
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
                                            <h3>Deepak </h3><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i>
                                        </span>
                                    </div>
                                    <div class="box-profile" style="background-color: white;"><img src="./assets/images/transport-reviews.png" style="object-fit: contain;" width="100%" height="100%" alt=""></div>
                                </div>
                                <p style="text-align: start;font-size:15px;line-height:23px;">With this setup, the flex items will adjust their size and layout based on the available space, creating a responsive design that works well on different screen sizes. You can modify the styles and structure according to your specific layout requirements.</p>
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
                                            <h3>Deepak </h3><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i>
                                        </span>
                                    </div>
                                    <div class="box-profile" style="background-color: white;"><img src="./assets/images/google.png" style="object-fit: contain;" width="100%" height="100%" alt=""></div>
                                </div>
                                <p style="text-align: start;font-size:15px;line-height:23px;">With this setup, the flex items will adjust their size and layout based on the available space, creating a responsive design that works well on different screen sizes. You can modify the styles and structure according to your specific layout requirements.</p>
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
                                            <h3>Deepak </h3><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i>
                                        </span>
                                    </div>
                                    <div class="box-profile" style="background-color: white;"><img src="./assets/images/trustpilot.png" style="object-fit: contain;" width="100%" height="100%" alt=""></div>
                                </div>
                                <p style="text-align: start;font-size:15px;line-height:23px;">With this setup, the flex items will adjust their size and layout based on the available space, creating a responsive design that works well on different screen sizes. You can modify the styles and structure according to your specific layout requirements.</p>
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
                                            <h3>Deepak </h3><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i>
                                        </span>
                                    </div>
                                    <div class="box-profile" style="background-color: white;"><img src="./assets/images/bbb.png" style="object-fit: contain;" width="100%" height="100%" alt=""></div>
                                </div>
                                <p style="text-align: start;font-size:15px;line-height:23px;">With this setup, the flex items will adjust their size and layout based on the available space, creating a responsive design that works well on different screen sizes. You can modify the styles and structure according to your specific layout requirements.</p>
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
                                            <h3>Deepak </h3><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i>
                                        </span>
                                    </div>
                                    <div class="box-profile" style="background-color: white;"><img src="./assets/images/transport-reviews.png" style="object-fit: contain;" width="100%" height="100%" alt=""></div>
                                </div>
                                <p style="text-align: start;font-size:15px;line-height:23px;">With this setup, the flex items will adjust their size and layout based on the available space, creating a responsive design that works well on different screen sizes. You can modify the styles and structure according to your specific layout requirements.</p>
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
                                            <h3>Deepak </h3><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i>
                                        </span>
                                    </div>
                                    <div class="box-profile" style="background-color: white;"><img src="./assets/images/trustpilot.png" style="object-fit: contain;" width="100%" height="100%" alt=""></div>
                                </div>
                                <p style="text-align: start;font-size:15px;line-height:23px;">With this setup, the flex items will adjust their size and layout based on the available space, creating a responsive design that works well on different screen sizes. You can modify the styles and structure according to your specific layout requirements.</p>
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
                                            <h3>Deepak </h3><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i>
                                        </span>
                                    </div>
                                    <div class="box-profile" style="background-color: white;"><img src="./assets/images/google.png" style="object-fit: contain;" width="100%" height="100%" alt=""></div>
                                </div>
                                <p style="text-align: start;font-size:15px;line-height:23px;">With this setup, the flex items will adjust their size and layout based on the available space, creating a responsive design that works well on different screen sizes. You can modify the styles and structure according to your specific layout requirements.</p>
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
                                            <h3>Deepak </h3><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i><i class="ri-star-s-fill"></i>
                                        </span>
                                    </div>
                                    <div class="box-profile" style="background-color: white;"><img src="./assets/images/bbb.png" style="object-fit: contain;"  width="100%" height="100%" alt=""></div>
                                </div>
                                <p style="text-align: start;font-size:15px;line-height:23px;">With this setup, the flex items will adjust their size and layout based on the available space, creating a responsive design that works well on different screen sizes. You can modify the styles and structure according to your specific layout requirements.</p>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="slide">Slide 10</div> -->
                </div>
            </div>
        </div>
        <div class="content">
            <?=$row['content'] ?>

        </div>
        <div style="background-color: lightblue;">
        <div class="why-choose-us">
            <div class="why-choose-heading">
                <h2>WHY US</h2>
                <div class="design">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line1"></div>
                </div>
            </div>
            <div class="why-choose-us-row">
                <div class="why-choose-us-box">
                    <div class="why-choose-us-icon"><img src="./assets/images/ach.svg" width="100%" height="100%" alt=""></div>
                    <div class="why-choose-sub-heading">15 Years of Auto Transportation</div>
                    <p>Being an experience auto transporter in the industry, we understand most of the shipping routes and challenges.</p>
                </div>
                <div class="why-choose-us-box">
                    <div class="why-choose-us-icon"><img src="./assets/images/zero.svg" width="100%" height="100%" alt=""></div>
                    <div class="why-choose-sub-heading">$ Zero Down Payment</div>
                    <p>We never take any upfront payment to schedule your Auto Transportation.</p>
                </div>
                <div class="why-choose-us-box">
                    <div class="why-choose-us-icon"><img src="./assets/images/price.svg" width="100%" height="100%" alt=""></div>
                    <div class="why-choose-sub-heading">Price Match</div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores, quae?</p>
                </div>
                <div class="why-choose-us-box">
                    <div class="why-choose-us-icon"><img src="./assets/images/insure.svg" width="100%" height="100%" alt=""></div>
                    <div class="why-choose-sub-heading">Fully Insured</div>
                    <p>Our Auto insurance are from the top notch insurance agency making your car shipment 100% insured</p>
                </div>
            </div>
        </div>
        </div>
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
                        <p><b>Q </b> What is the name of your company?</p><span>+</span>
                    </div>
                    <p class="service-faq-ans">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur fugit eaque fugiat quis nostrum voluptatibus, consectetur minima veniam molestias eos dicta aspernatur enim, cumque consequatur officia, cum vitae ipsam dolore.
                    </p>
                </div>
                <div class="service-faq-question-body" id="service-faq-question-body">
                    <div class="service-faq-question">
                        <p><b>Q </b> What is the name of your company b?</p><span>+</span>
                    </div>
                    <p class="service-faq-ans">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur fugit eaque fugiat quis nostrum voluptatibus, consectetur minima veniam molestias eos dicta aspernatur enim, cumque consequatur officia, cum vitae ipsam dolore.
                    </p>
                </div>
                <div class="service-faq-question-body" id="service-faq-question-body">
                    <div class="service-faq-question">
                        <p><b>Q </b> What is the name of your company c?</p><span>+</span>
                    </div>
                    <p class="service-faq-ans">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur fugit eaque fugiat quis nostrum voluptatibus, consectetur minima veniam molestias eos dicta aspernatur enim, cumque consequatur officia, cum vitae ipsam dolore.
                    </p>
                </div>
                <div class="service-faq-question-body" id="service-faq-question-body">
                    <div class="service-faq-question">
                        <p><b>Q </b> What is the name of your company d?</p><span>+</span>
                    </div>
                    <p class="service-faq-ans">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur fugit eaque fugiat quis nostrum voluptatibus, consectetur minima veniam molestias eos dicta aspernatur enim, cumque consequatur officia, cum vitae ipsam dolore.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- POPUP FORM -->
    <div class="popup-background" id="popup-background">
        <div class="next-form-conatiner">
            <p class="form-container-p">Get Quotes</p>
            <form action="" id="final-submit-form" method="POST">
                <div class="form-group">
                    <input type="text" name="email" id="email" placeholder="Enter Email">
                </div>
                <div class="form-group">
                <input type="text" placeholder="Enter Your Phone" name="phone_number" id="phone" min="10" onkeyup="formatPhoneNumber(this)" max="10" >
                </div>
                <div class="form-group">
                <input type="date" name='pick_up_date' min="<?php echo date('Y-m-d'); ?>" max="2030-12-31" placeholder="Pickup Date" id="ship_date">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Select an option" name="vehicle_size" id="ship_vehicle" readonly>
                </div>
                <div class="form-group" style="display:flex;justify-content:space-between;align-items:center;">
                <button class="form-container-button" name="previous">Previous</button>
                <button class="form-container-button" name="final-submit" id="final-submit">Submit</button>
                </div>
            </form>
            <div class="form-review">
                        <div class="form-review-face">
                            <div class="face-one"><img src="./assets/images/profile-1.jpeg" width="100%" height="100%" alt=""></div>
                            <div class="face-one"><img src="./assets/images/profile-2.jpeg" width="100%" height="100%" alt=""></div>
                            <div class="face-one"><img src="./assets/images/profile-3.jpeg" width="100%" height="100%" alt=""></div>
                        </div>
                        <small style="color: black;">2023 people shipped till now</small>
                    </div>
        </div>
    </div>
    <!-- POPUP FORM -->

    <!-- SIDE FORM -->
        <div class="side-form-quotes">
            <div class="side-form-circle circle-one" id="circle-one">Get Quotes</div>
            <div class="side-form-line line-one" id="line-one" ></div>
            <div class="side-form-circle circle-two" id="circle-two">Shipping Process</div>
            <div class="side-form-line line-two" id="line-two"></div>
            <div class="side-form-circle circle-three" id="circle-three">Successful Delivery</div>
        </div>
    <!-- SIDE FORM -->

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
    </script>
    <script>
        a = document.querySelectorAll('#service-faq-question-body')
        for (i = 0; i < a.length; i++) {
            a[i].addEventListener('click', (e) => {
                e.target.parentElement.classList.toggle('height-faq')
            })
        }

        function formatPhoneNumber(input) {
            // Remove all non-digit characters from the input
            const phoneNumber = input.value.replace(/\D/g, '');

            // Apply the desired pattern (e.g., XXX-XXX-XXXX)
            if (phoneNumber.length <= 3) {
                input.value = phoneNumber;
            } else if (phoneNumber.length <= 6) {
                input.value = `(${phoneNumber.slice(0, 3)}) ${phoneNumber.slice(3)}`;
            } else {
                input.value = `(${phoneNumber.slice(0, 3)}) ${phoneNumber.slice(3, 6)}-${phoneNumber.slice(6, 10)}`;
            }

            // Display the formatted phone number
            document.getElementById('formattedPhoneNumber').textContent = input.value;
        }
        document.getElementById('form-container-form').addEventListener('submit',function(e){
            e.preventDefault();
            document.getElementById('popup-background').style.display = 'grid';
        })
        document.getElementById('final-submit-form').addEventListener('submit',function(e){
            e.preventDefault();
            document.getElementById('popup-background').style.display = 'none';
        })


        document.getElementById('final-submit').addEventListener('click',(e)=>{
            e.preventDefault();
            let from = document.getElementById('from').value;
            let to = document.getElementById('to').value;
            console.log(from)
            console.log(to)
        })


            window.onscroll = (e)=>{
               height = document.documentElement.scrollTop
                console.log(height)
               if(height >= 400){
                document.getElementById('circle-one').style.display = 'grid'
               }else{
                document.getElementById('circle-one').style.display = 'none'
               }
               if(height >= 500){
                document.getElementById('line-one').style.transform = 'scaleY(1)';
               }else{
                document.getElementById('line-one').style.transform = 'scaleY(0)';
               }
               if(height >= 600){
                document.getElementById('circle-two').style.display = 'grid'
               }else{
                document.getElementById('circle-two').style.display = 'none'
               }
               if(height >= 700){                
                document.getElementById('line-two').style.transform = 'scaleY(1)';
               }else{
                document.getElementById('line-two').style.transform = 'scaleY(0)';
               }
               if(height >= 800){                
                document.getElementById('circle-three').style.display = 'grid'
               }
               else{
                document.getElementById('circle-three').style.display = 'none'
               }
            }

    </script>
</body>

</html>
<!-- <div class="anytime-mover-image"><img src="./assets/images/open Air Transport.webp" alt=""></div> -->