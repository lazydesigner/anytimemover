<?php include './routes.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place A Deposit - Anytime Movers</title>
    <link rel=preload href=https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css as=style onload='this.onload=null,this.rel="stylesheet"' async>
    <link rel="stylesheet" href="<?= base_urlx() ?>assets/css/footer.css">
    <link rel="stylesheet" href="<?= base_urlx() ?>assets/css/navbar.css">
    <link rel="stylesheet" href="<?= base_urlx() ?>assets/css/deposit.css">
</head>

<body>
    <div style="position:relative; width:100%;height:70px"><?php include './navbar.php'; ?></div>
    <section class="recent-blogs">
        <div class="recent-blogs-row">
            <div class="recent-blogs-col">
                <div class="blogs">
                    <div class="blogs-img"><img src="./assets/images/open Air Transport.webp" alt=""></div>
                    <div style="padding:1% 2%;">
                        <a href="https://anytimemove.com/why-is-our-long-distance-moving-company-better-for-you">
                            <h4>Long-Distance Moving Company | Anytime Move</h4>
                        </a>
                        <p>Any time movers simplify long-distance moving. As a leader in the long-distance moving industry, we strive to integrate the latest technology and sophisticated...</p>
                    </div>
                </div>
            </div>
            <div class="recent-blogs-col">
                <div class="blogs">
                    <div class="blogs-img"><img src="./assets/images/17899070.webp" alt=""></div>
                    <div style="padding:1% 2%;">
                        <a href="https://anytimemove.com/how-to-work-our-professional-movers">
                            <h4>How to Work Our Professional Movers? | Anytime Move</h4>
                        </a>
                        <p>We have a team of professional movers with extensive years under their belt, with reviews from previous customers who recommend our moving services and...</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include './footer.php' ?>
</body>

</html>