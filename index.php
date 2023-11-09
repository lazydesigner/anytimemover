<?php include './routes.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anytimemover</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css" integrity="sha512-/VYneElp5u4puMaIp/4ibGxlTd2MV3kuUIroR3NSQjS2h9XKQNebRQiyyoQKeiGE9mRdjSCIZf9pb7AVJ8DhCg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?=base_url() ?>assets/css/index.css">
    <link rel="stylesheet" href="<?=base_url() ?>assets/css/footer.css">
    <link rel="stylesheet" href="<?=base_url() ?>assets/css/navbar.css">
</head>

<body>
    <div class="hero-section">
        <div class="background-color"></div>
        <video autoplay loop width="100%" muted poster="https://anytimemove.com/wp-content/uploads/2016/05/Moving-Company-Coral-Springs-1-e1463461961510.jpg">
            <source src="https://anytimemove.com/wp-content/uploads/2016/05/shutterstock_v4827407.mov" type="video/mp4">
        </video>
        <header>
            <nav>
                <a href="./" class="flex1"><img src="./assets/images/Logo2.png" width="100%" alt="" style="object-fit:cover;"></a>
                <div id="three-line-menu" class="three-line-menu"><i class="ri-menu-3-line"></i></div>
                <ul class="flex2" id="flex2">
                    <div class="close-the-nav" id="close-the-nav">X</div>
                <li><a href="#service-section">OUR SERVICES</a></li>
                <li><a href="about-us">ABOUT US</a></li>
                <li><a href="request-a-free-quote">REQUEST A FREE QUOTE</a></li>
                <li><a href="blogs">BLOGS</a></li>
                </ul>
            </nav>
        </header>
        <div class="hero-section-content">
            <div class="hero-section-heading">
                <h1>DEDICATED . EFFICIENT . RELIABLE </h1>
                <p>Anytime Movers is built on providing the most value to our customers. We want to be the most dedicated, efficient, and reliable moving company you have ever worked with.</p>
                <div class="hero-section-button">
                    <a href=""><button class="btn">People are Talking</button></a>
                    <a href=""><button class="btn2">Get A FREE Quote</button></a>
                </div>

            </div>
        </div>
    </div>
    <section class="below-hero-section">
        <div class="below-hero-section-content">
            <p>a little about..</p>
            <h2>Anytime Movers</h2>
            <div class="design">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line1"></div>
            </div>
            <div class="below-hero-section-content-p-div">
                <p class="below-hero-section-content-p">Located in Coral Springs Florida we strive to make every move a pleasant moving experience. We want every customer to be 100% satisfied while ensuring the moving experience is stress free from beginning to end.</p><br>
                <p class="below-hero-section-content-p">We have been moving families and businesses throughout South Florida for over 30 years with amazing satisfaction from all of our clients and customers. We look forward to helping you and your family or business with your next move in south Florida. Make sure your next move is with Anytime Movers.</p>
            </div>
        </div>

    </section>
    <section class="service-section" id="service-section">
        <h2>OUR SERVICES</h2>
        <div class="design">
            <div class="line1"></div>
            <div class="">⚙️</div>
            <div class="line1"></div>
        </div>
        <div class="list-of-service">
            <div class="box">
                <div class="list-of-service-img"><img src="<?=base_url() ?>assets/images/South-Florida-Movers1-e1463070625660.png" alt=""></div>
                <h3>RESIDENTIAL MOVES</h3>
                <p>We understand changing homes can be stressful, but your moving experience doesn’t have to be.</p>
                <a href="services-page" style="cursor: pointer;"><button><i class="ri-truck-fill"></i>Learn More</button></a>
            </div>
            <div class="box">
                <div class="list-of-service-img"><img src="<?=base_url() ?>assets/images/Tri-country-movers.png" alt=""></div>
                <h3>CORPORATE RELOCATION</h3>
                <p>When it come to commercial moves, no job is too big or too small. </p>
                <a href="services-page" style="cursor: pointer;"><button><i class="ri-truck-fill"></i>Learn More</button></a>
            </div>
            <div class="box">
                <div class="list-of-service-img"><img src="<?=base_url() ?>assets/images/Moving-South-Florida.png" alt=""></div>
                <h3>PRICING OPTIONS</h3>
                <p>We try to accommodate every customer on every job. See our pricing options.</p>
                <a href="services-page" style="cursor: pointer;"><button><i class="ri-money-dollar-circle-line"></i>Learn More</button></a>
            </div>
            <div class="box">
                <div class="list-of-service-img"><img src="<?=base_url() ?>assets/images/Best-Movers-South-Florida.png" alt=""></div>
                <h3>LONG DISTANCE MOVES</h3>
                <p>We handle long distance moves with the same dedication and care as our local moves. </p>
                <a href="services-page" style="cursor: pointer;"><button><i class="ri-shuffle-line"></i>Learn More</button></a>
            </div>
            <div class="box">
                <div class="list-of-service-img"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22 13.5V21C22 21.5523 21.5523 22 21 22H20C19.4477 22 19 21.5523 19 21V20H5V21C5 21.5523 4.55228 22 4 22H3C2.44772 22 2 21.5523 2 21V13.5L0.757464 13.1894C0.312297 13.0781 0 12.6781 0 12.2192V11.5C0 11.2239 0.223858 11 0.5 11H2.375L4.51334 5.29775C4.80607 4.51715 5.55231 4 6.386 4H17.614C18.4477 4 19.1939 4.51715 19.4867 5.29775L21.625 11H23.5C23.7761 11 24 11.2239 24 11.5V12.2192C24 12.6781 23.6877 13.0781 23.2425 13.1894L22 13.5ZM4 15V17C4 17.5523 4.44772 18 5 18H8.24496C8.3272 18 8.40818 17.9797 8.4807 17.9409C8.72418 17.8107 8.81602 17.5078 8.68582 17.2643L8.68588 17.2643C7.87868 15.7548 6.31672 15 4 15ZM20 15C17.6833 15 16.1213 15.7548 15.3141 17.2643L15.3142 17.2643C15.184 17.5078 15.2758 17.8107 15.5193 17.9409C15.5918 17.9797 15.6728 18 15.755 18H19C19.5523 18 20 17.5523 20 17V15ZM6 6L4.43874 10.6838C4.40475 10.7857 4.38743 10.8925 4.38743 11C4.38743 11.5523 4.83514 12 5.38743 12H18.6126C18.7201 12 18.8268 11.9827 18.9288 11.9487C19.4527 11.774 19.7359 11.2077 19.5613 10.6838L18 6H6Z"></path></svg></div>
                <h3>CAR TRANSPORT</h3>
                <p>We Also Ship Car When Your Are Shifting</p>
                <a href="more-services" style="cursor: pointer;"><button><i class="ri-shuffle-line"></i>Learn More</button></a>
            </div>
        </div>
    </section>
    <section class="call-to-action">
        <h2 style="text-align: center;font-size:2.4rem;">What You Want To Ship</h2>
        <div class="call-to-action-row">
            <div class="call-to-action-col">
                <h2>Ship A Residennce </h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum animi quas, error laborum facere cum ea doloremque rerum fuga. Harum.</p>
                <button>Residence Shipping</button>
            </div>
            <div class="call-to-action-col">
                <h2>Ship A Car </h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum animi quas, error laborum facere cum ea doloremque rerum fuga. Harum.</p>
                <button>Car Shipping</button>
            </div>
        </div>
    </section>
    <section class="why-section">
         
    </section>
    <section class="review-section">
        <h2>WHAT OUR CUSTOMERS ARE SAYING</h2>
        <p>Real words from real customers!</p>
        <div class="design">
            <div class="line1" style="background-color: whitesmoke;"></div>
            <div class="line3" style="background-color: whitesmoke;"></div>
            <div class="line1" style="background-color: whitesmoke;"></div>
        </div>
        <div class="review-section-row">
            <div class="review-section-col">
                <p>Excellent price and service! We booked with Right Way after calling several other local movers. At first we were skeptical because they were considerably less expensive; however, they did a great job. They showed up on time and worked really, really hard to move us quickly and efficiently. Nothing was damaged and they were extremely courteous and polite. I will use them again.</p>
                <p>Rebecca C.</p>
                <p>Fort Lauderdale, FL</p>
            </div>
            <div class="review-section-col">
                <p>Run don't walk to book these guys. I moved a lot of stuff from my condo to my primary home in Coral Springs. The price was fair. all came on time and worked very hard. The three guys I had (The A Team) take great pride in working for the company, and it shows. It is hard to find a good reliable moving company. Don't waste time looking in this area, book Anytime with complete confidence.
                </p>
                <p>Michael S.</p>
                <p>Pompano Beach, FL</p>
            </div>
            <div class="review-section-col">
                <p>I have not had to use a mover in years, but recently had to help my (former) boss move their office, I spoke to a couple movers but many seemed to give a "run around"....then I found Anytime on CL - and right away I felt more comfortable. For one thing they are local, and family owned...and they really go out of their way to make the move stress free. A big thanks from all of us!</p>
                <p>Esty F.</p>
                <p>Fort Lauderdale, FL</p>
            </div>
        </div>
        <button class="review-section-btn">View More</button>
    </section>
    <section class="contact-section">
        <h2>GET IN CONTACT WITH US</h2>
        <p>Whether you have a question, just want to say hello, or want to leave us a testimonial feel free to get in contact with us! Phone: <span style="color: rgb(159, 10, 10);font-weight:bold;">954-941-6848</span> or fill out your info and send us an e-mail.  We look forward to hearing from you.</p>
        <button class="contact-section-btn">For a Quote Click Here</button>
        <div class="design" style="margin-top: 2.5%;">
            <div class="line1" style="background-color: rgb(159, 10, 10);"></div>
            <div class="" style="color: rgb(159, 10, 10);font-size:xx-large;"><i class="ri-arrow-drop-down-line"></i></div>
            <div class="line1" style="background-color: rgb(159, 10, 10);"></div>
        </div>
        <div class="contact-section-row">
            <div class="contact-section-col1">
                <div><img src="./assets/images/florida.png" alt=""></div>
            </div>
            <div class="contact-section-col">
                <form action="">
                    <input type="text" placeholder="Name*">
                    <input type="text" placeholder="Email*">
                    <input type="text" placeholder="Subject*">
                    <textarea name="" id="" cols="30" rows="7" placeholder="Your Message"></textarea>
                    <div><input type="checkbox" name="" id=""><span style="color:lightblue;">I agree with this Site's Privacy Policy</span></div>
                    <input type="submit" value="Send">
                </form>
            </div>
        </div>
        
    </section>
    <section class="recent-blogs">
        <h2 style="text-align: center;font-size:2.4rem;margin:0;padding:0;">Recent Blogs</h2>
        <div class="design">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line1"></div>
            </div>
        <div class="recent-blogs-row">
            <div class="recent-blogs-col">
                <div class="blogs">
                    <div class="blogs-img"><img src="<?=base_url() ?>assets/images/open Air Transport.webp" alt=""></div>
                    <div style="padding:1% 2%;">
                    <a href="#"><h4>Lorem ipsum dolor sit amet.</h4></a>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non dolor fugit inventore sunt nemo quae voluptas ex fuga veritatis necessitatibus!</p>
                    </div>
                </div>
            </div>
            <div class="recent-blogs-col">
                <div class="blogs">
                    <div class="blogs-img"><img src="<?=base_url() ?>assets/images/17899070.webp" alt=""></div>
                    <div style="padding:1% 2%;">
                    <a href="#"><h4>Lorem ipsum dolor sit amet.</h4></a>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non dolor fugit inventore sunt nemo quae voluptas ex fuga veritatis necessitatibus!</p>
                    </div>
                </div>
            </div>
            <div class="recent-blogs-col">
                <div class="blogs">
                    <div class="blogs-img"><img src="<?=base_url() ?>assets/images/87210796.webp" alt=""></div>
                    <div style="padding:1% 2%;">
                    <a href="#"><h4>Lorem ipsum dolor sit amet.</h4></a>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non dolor fugit inventore sunt nemo quae voluptas ex fuga veritatis necessitatibus!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include './footer.php'; ?>

</body>

</html>
<!-- 
ns69.domaincontrol.com
ns70.domaincontrol.com -->
