<?php include './routes.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=preload href=https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css as=style onload='this.onload=null,this.rel="stylesheet"' async>
    <link rel="stylesheet" href="<?= base_urlx() ?>assets/css/footer.css">
    <link rel="stylesheet" href="<?= base_urlx() ?>assets/css/navbar.css">
    <title>Frequently Asked Question</title>
    <style>
        .calculator-heading {
            width: 100%;
            height: 300px;
            box-shadow: 0px 280px 81px -42px grey inset;
            -webkit-box-shadow: 0px 280px 81px -42px grey inset;
            -moz-box-shadow: 0px 280px 81px -42px grey inset;
            text-align: center;
            display: grid;
            align-items: end;
            /* background-color: green; */
        }

        h1 {
            font-size: 2.5rem;
        }

        .service-faq{
        width: 1150px;
        height: auto;
        margin: auto;
        padding: 3%;
    }
    .services-heading{
        text-align: center;
    }

    .services-heading h2{
        margin: 0;
        padding: 0;
    }
    .service-faq-body{
        margin-top: 5%;
    }
    .service-faq-question-body{
        width: 90%;
        margin: 1.5% auto;
        height: 60px;
        border-radius: 10px;
        background-color: lightgray;
        overflow: hidden;
    }
    .service-faq-question{
        width: 100%;
        height: auto;
        display: flex;
        align-items: center;
        cursor: pointer;
        padding: .5% 3%;
        user-select: none;
        justify-content: space-between;
    }
    .service-faq-ans{padding: 0 3%;}
    .service-faq-question span{
        font-size: xx-large;
        font-weight: bold;
    }
    .height-faq{
        height: auto!important;
    }
    </style>
</head>

<body>
    <?php include './navbar2.php' ?>

    <div class="container">
        <div class="calculator-heading">
            <h1>Frequently Asked Question</h1>
            <div class="design">
                <div class="line1" style="background-color: orangered;"></div>
                <div class="line2" style="background-color: orangered;"></div>
                <div class="line1" style="background-color: orangered;"></div>
            </div>
        </div>
    </div>
    <div class="service-faq">
        <div class="service-faq-body">
            <div class="service-faq-question-body" id="service-faq-question-body">
                <div class="service-faq-question">
                    <p><b>Q </b>What services are available for residential shifting?</p><span>+</span>
                </div>
                <p class="service-faq-ans">
                We provide proper residential shifting services, including packing, loading, transportation, unloading, and unpacking your goods and things.
                </p>
            </div>
            <div class="service-faq-question-body" id="service-faq-question-body">
                <div class="service-faq-question">
                    <p><b>Q </b>How do you calculate the cost of residential moving?</p><span>+</span>
                </div>
                <p class="service-faq-ans">
                The cost is calculated based on many factors, such as the weight of items, distance, packing requirements, and any requested special custom shipping services.
                </p>
            </div>
            <div class="service-faq-question-body" id="service-faq-question-body">
                <div class="service-faq-question">
                    <p><b>Q </b>Do residential moves provide packing services?</p><span>+</span>
                </div>
                <p class="service-faq-ans">
                Professional packing services, including ours ensure that your belongings are properly packed and transported safely and securely.
                </p>
            </div>
            <div class="service-faq-question-body" id="service-faq-question-body">
                <div class="service-faq-question">
                    <p><b>Q </b>Can I do the packing by myself?</p><span>+</span>
                </div>
                <p class="service-faq-ans">
                Our experts are available and trained to pack your items and transport them safely. But you can pack your items by yourself, or you can get assistance from our experts.
                </p>
            </div>
            <div class="service-faq-question-body" id="service-faq-question-body">
                <div class="service-faq-question">
                    <p><b>Q </b>How do I track my shipping status? </p><span>+</span>
                </div>
                <p class="service-faq-ans">
                We provide tracking options and regular updates to keep you informed about the status of your residential move.
                </p>
            </div>
            <div class="service-faq-question-body" id="service-faq-question-body">
                <div class="service-faq-question">
                    <p><b>Q </b>What type of services came under corporate shifting?</p><span>+</span>
                </div>
                <p class="service-faq-ans">
                Corporate shifting services usually include office packing, furniture disassembly, Shipping, and reassembling at the newly provided location.
                </p>
            </div>
            <div class="service-faq-question-body" id="service-faq-question-body">
                <div class="service-faq-question">
                    <p><b>Q </b>Can IT equipment and important documents be shipped under corporate shifting?</p><span>+</span>
                </div>
                <p class="service-faq-ans">
                Many major moving companies like us can ship sensitive IT equipment and documents with proper handling.
                </p>
            </div>
            <div class="service-faq-question-body" id="service-faq-question-body">
                <div class="service-faq-question">
                    <p><b>Q </b>Are any weekend or after-hours moves available for corporate clients?</p><span>+</span>
                </div>
                <p class="service-faq-ans">
                With us, you can get corporate shifts any day of the week or after working hours. We are flexible and can schedule according to your time and availability.
                </p>
            </div>
            <div class="service-faq-question-body" id="service-faq-question-body">
                <div class="service-faq-question">
                    <p><b>Q </b>Do any corporate items have restrictions for relocating? </p><span>+</span>
                </div>
                <p class="service-faq-ans">
                We can relocate many items, but some hazardous items have restrictions and need proper clearance for corporate relocation.
                </p>
            </div>
            <div class="service-faq-question-body" id="service-faq-question-body">
                <div class="service-faq-question">
                    <p><b>Q </b>Are employee relocation services available with corporate relocation?</p><span>+</span>
                </div>
                <p class="service-faq-ans">
                Our corporate moving services provide shipping services to your whole office and staff, providing the best and most customized shipping services.

                </p>
            </div>
            <div class="service-faq-question-body" id="service-faq-question-body">
                <div class="service-faq-question">
                    <p><b>Q </b>What is a long-distance move?</p><span>+</span>
                </div>
                <p class="service-faq-ans">
                When shifting or moving anything from your location is more than 450 miles, it is counted as a long-distance move.

                </p>
            </div>
            <div class="service-faq-question-body" id="service-faq-question-body">
                <div class="service-faq-question">
                    <p><b>Q </b>What type of security measures are taken for long-distance moves?</p><span>+</span>
                </div>
                <p class="service-faq-ans">
                For the proper security of your goods, we use high-grade packing materials, proper carriers employed with trained and experienced drivers and provide tracking options for complete safety. 

                </p>
            </div>
            <div class="service-faq-question-body" id="service-faq-question-body">
                <div class="service-faq-question">
                    <p><b>Q </b>What types of things could be shipped under a long-distance moving package?</p><span>+</span>
                </div>
                <p class="service-faq-ans">
                We offer many services in long-distance packages you can ship anything from cars to household items to office materials.
                </p>
            </div>
            <div class="service-faq-question-body" id="service-faq-question-body">
                <div class="service-faq-question">
                    <p><b>Q </b>How long do long-distance moves take?</p><span>+</span>
                </div>
                <p class="service-faq-ans">
                As the timeframe depends on many things like distance, Type of item, season and other things, it is difficult to provide an extract number of days but we provide estimated days for shipping as per recent or past shippings.
                </p>
            </div>
            <div class="service-faq-question-body" id="service-faq-question-body">
                <div class="service-faq-question">
                    <p><b>Q </b>What types of items are restricted or can not be transported when moving long distances? </p><span>+</span>
                </div>
                <p class="service-faq-ans">
                Many hazardous and sensitive goods have some rules and regulations restricting them for shipping. Don't worry we will provide you with a proper guide containing what can or cannot be shipped.
                </p>
            </div>
            <div class="service-faq-question-body" id="service-faq-question-body">
                <div class="service-faq-question">
                    <p><b>Q </b>Can I do the packing by myself?</p><span>+</span>
                </div>
                <p class="service-faq-ans">
                Our experts are available and trained to pack your items and transport them safely. But you can pack your items by yourself, or you can get assistance from our experts.
                </p>
            </div>
            <div class="service-faq-question-body" id="service-faq-question-body">
                <div class="service-faq-question">
                    <p><b>Q </b>Can I do the packing by myself?</p><span>+</span>
                </div>
                <p class="service-faq-ans">
                Our experts are available and trained to pack your items and transport them safely. But you can pack your items by yourself, or you can get assistance from our experts.
                </p>
            </div>
        </div>
    </div>
    <?php include './footer.php' ?>
    <script>
        a = document.querySelectorAll('#service-faq-question-body')
        for (i = 0; i < a.length; i++) {
            a[i].addEventListener('click', (e) => {
                e.target.parentElement.classList.toggle('height-faq')
            })
        }
    </script>
</body>

</html>