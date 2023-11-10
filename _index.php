<?php
include './dashboard/services/__api.php';

$slug = $_GET['page_id'];

$query = "SELECT * FROM services WHERE `slug` = '$slug' ";
$result = mysqli_query($con, $query);

if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
}else{
    echo 'Page Not Found';
}


?>
<?php include './routes.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$row['title'] ?></title>
    <?=$row['meta'] ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css" integrity="sha512-/VYneElp5u4puMaIp/4ibGxlTd2MV3kuUIroR3NSQjS2h9XKQNebRQiyyoQKeiGE9mRdjSCIZf9pb7AVJ8DhCg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?=base_url() ?>assets/css/footer.css">
    <link rel="stylesheet" href="<?=base_url() ?>assets/css/navbar.css">
    <link rel="stylesheet" href="<?=base_url() ?>assets/css/_index.css">

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
                <h1 class="service-hero-h1">Best Terminal to Terminal Auto Transport Services</h1>
                <div>
                    <ul class="service-hero-p" style="list-style: none;">
                        <li><span><i class="ri-share-forward-fill"></i></span>This setup ensures that the items </li>
                        <li><span><i class="ri-share-forward-fill"></i></span>This setup ensures that the items </li>
                        <li><span><i class="ri-share-forward-fill"></i></span>This setup ensures that the items </li>
                    </ul>
                </div>
                <!-- <p class="service-hero-p">This setup ensures that the items inside the flex container take up 30%, 40%, and 30% of the container's width respectively, with equal spacing between them due to justify-content: space-between;. You can adjust the percentage values to match your specific layout requirements.</p> -->
            </div>
        </div>
    </section>
    <section style="background-color:#E9E9E9;padding-top:1%;">
        <div class="services-hero-section-bellow">
            <div class="services-hero-section-bellow-box">
                <div class="services-hero-icon"><img src="./assets/images/quick.png" width="100%" height="100%" style="object-fit: cover;" alt=""></div>
                <h3>Quick Pickup</h3>
            </div>
            <div class="services-hero-section-bellow-box">
                <div class="services-hero-icon"><img src="./assets/images/Express-Auto-Service.webp" width="100%" height="100%" style="object-fit: cover;" alt=""></div>
                <h3>Fast Delivery</h3>
            </div>
            <div class="services-hero-section-bellow-box">
                <div class="services-hero-icon"><img src="./assets/images/review.png" width="100%" height="100%" style="object-fit: cover;" alt=""></div>
                <h3>Best Ratings</h3>
            </div>
            <div class="services-hero-section-bellow-box">
                <div class="services-hero-icon"><img src="./assets/images/peace.svg" width="100%" height="100%" style="object-fit: cover;" alt=""></div>
                <h3>Peace Of Mind</h3>
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
            <h2>What are Terminal to Terminal Auto Transport Services?</h2>
            <p>Terminal to terminal auto transport services (TTA) is a type of logistics service that connects two or more different locations</p>
            <h3>Definition </h3>
            <p>Terminal to terminal auto transport services involve the transport of vehicles between designated terminals. These terminals act as hubs where vehicles are dropped off and picked up.</p>
            <h3>How It Works </h3>
            <p>At the starting point, you leave your vehicle at a designated terminal. The auto transport company then loads it onto a carrier and transports it to another terminal near your destination. You can collect your vehicle from this terminal at your convenience.</p>
            <h2>Advantages of Terminal to Terminal Auto Transport </h2>
            <ul>
                <li><b>Lorem ipsum : </b> dolor sit amet consectetur, adipisicing elit. Voluptate, minima.</li>
                <li><b>Lorem ipsum : </b> dolor sit amet consectetur, adipisicing elit. Voluptate, minima.</li>
                <li><b>Lorem ipsum : </b> dolor sit amet consectetur, adipisicing elit. Voluptate, minima.</li>
                <li><b>Lorem ipsum : </b> dolor sit amet consectetur, adipisicing elit. Voluptate, minima.</li>
                <li><b>Lorem ipsum : </b> dolor sit amet consectetur, adipisicing elit. Voluptate, minima.</li>
                <li><b>Lorem ipsum : </b> dolor sit amet consectetur, adipisicing elit. Voluptate, minima.</li>
            </ul>
            <p>Moving your vehicle using terminal to terminal services offers several benefits:</p>
            <h3>Cost-Effectiveness </h3>
            <p>Terminal to terminal services are often more affordable because the company can optimize their routes and schedules.</p>
            <h3>Convenience</h3>
            <p>You don't have to worry about meeting the driver at a specific location. Terminals are easily accessible, making the process convenient for both pick-up and drop-off.</p>
            <h3>Safe and Secure </h3>
            <p>Terminals have enhanced security measures, ensuring your vehicle is safe during transit.</p>
            <h3>Flexible Timelines </h3>
            <p>You have the flexibility to drop off and pick up your vehicle within the terminal's operating hours, accommodating your schedule</p>
            <h2>How to Choose the Best Terminal to Terminal Auto Transport Service</h2>
            <p>Choosing the right service provider is crucial for a stress-free experience. Here's how you can make an informed decision:</p>
            <div class="anytime-mover-image"><img src="./assets/images/Car-Rentals-Company.webp" alt=""></div>
            <h2>Research </h2>
            <p>Look for reputable companies online. Read customer reviews and testimonials to gauge their service quality.</p>
            <h3>Services Offered </h3>
            <p>Check the range of services offered. Some companies provide additional services like vehicle tracking and insurance, enhancing your overall experience.</p>
            <h3>Pricing </h3>
            <p>Get quotes from multiple companies and compare their prices. Ensure there are no hidden fees and ask for a detailed breakdown of the costs.</p>
            <h3>Insurance Coverage</h3>
            <p>Verify the insurance coverage provided by the company. It's essential to know what is covered in case of any damages during transit.</p>
            <h2>Things to Consider Before Using Terminal to Terminal Services</h2>
            <p>Before you entrust your vehicle to an auto transport company, consider the following factors:</p>
            <h3>Vehicle Preparation</h3>
            <p>Clean your vehicle thoroughly and document any existing damages. This documentation will be essential in case of disputes.</p>
            <h3>Terminal Locations </h3>
            <div class="anytime-mover-image"><img src="./assets/images/open Air Transport.webp" alt=""></div>
            <p>Check the locations of the terminals. Ensure they are convenient for both drop-off and pick-up, minimizing your travel time.</p>
            <h3>Transit Time</h3>
            <p>Inquire about the estimated transit time between terminals. This information will help you plan your vehicle pickup accordingly. </p>

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
                    <input type="text" name="email" id="from" placeholder="Enter Email">
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