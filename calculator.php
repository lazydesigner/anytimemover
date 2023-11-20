<?php include './routes.php' ?>
<!doctype html>
<html lang=en>

<head>
    <meta charset=UTF-8>
    <meta name=viewport content="width=device-width,initial-scale=1">
    <title>Caculotor</title>
    <link rel=preload href=https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css as=style onload='this.onload=null,this.rel="stylesheet"' async>
    <link rel=stylesheet href="<?= base_urlx() ?>assets/css/calculator.css" async>
    <link rel=stylesheet href="<?= base_urlx() ?>assets/css/footer.css" async>
    <link rel=stylesheet href="<?= base_urlx() ?>assets/css/navbar.css" async>
</head>

<body>
    <?php include './navbar.php'; ?>
    <div class="calculator-heading">
        <h1>Get Estimated Quote</h1>
    </div>
    <div class="container">
        <div class="form-container">
            <form action="" method=post onsubmit="return false;">
                <div class="from-group from-group-row">
                    <input type=text placeholder="From" id=from_ class="calculated_price2 from" />

                    <input type=text placeholder="To" id=to_ class="calculated_price2 from" />
                </div>
                <div class="from-group from-group-row">
                    <input type=text placeholder="Distance" id=calcInput class="calculated_price2" />

                    <select id="transport" class="calculated_price2">
                        <option value="open">Open</option>
                        <option value="enclosed">Enclosed</option>
                    </select>
                </div>
                <div class="from-group from-group-row">
                    <input type=text id=calculated_price class="calculated_price calculated_price2" readonly />
                </div>
                <div class="form-group">
                    <button type=submit id="calculatorForm">Calculate</button>
                    <button type=submit id="reset" class="reset" disabled>Reset</button>
                </div>
            </form>
            <small><span style="color: tomato;">**</span>It is important to note that the prices listed are only estimates and will vary depending on factors such as the season and the type of vehicle being shipped. To get accurte priceing please talk to our executive <b>+1 984-235-6077</b></small>
        </div>
    </div>
    <div class="top-review-row" style="padding: 2%;">
        <div class="top-review-col">
            <div class="top-review-box">
                <div class="top-review-detail">
                    <span>GOOGLE</span><br>
                    <span class="top-rating-star"><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-half-fill"></i></span><br>
                    <span style="font-size: small;color:grey;">(5,534 reviews)</span>
                </div>
                <div class="top-review-ratings" style="text-align: center;">
                    <span class="top-rating-font"><strong>4.8</strong></span>
                    <div class="top-review-img"><img src="./assets/images/google.png" width="100%" height="100%" alt=""></div>
                </div>
            </div>
        </div>
        <div class="top-review-col">
            <div class="top-review-box">
                <div class="top-review-detail">
                    <span>TRANSPORT REVIEWS</span><br>
                    <span class="top-rating-star"><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-half-fill"></i></span><br>
                    <span style="font-size: small;color:grey;">(1534 reviews)</span>
                </div>
                <div class="top-review-ratings" style="text-align: center;">
                    <span class="top-rating-font"><strong>4.7</strong></span>
                    <div class="top-review-img"><img src="./assets/images/transport-reviews.png" width="100%" height="100%" alt=""></div>
                </div>
            </div>
        </div>
        <div class="top-review-col">
            <div class="top-review-box">
                <div class="top-review-detail">
                    <span>BBB</span><br>
                    <span class="top-rating-star"><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i></span><br>
                    <span style="font-size: small;color:grey;">(2534 reviews)</span>
                </div>
                <div class="top-review-ratings" style="text-align: center;">
                    <span class="top-rating-font"><strong>4.9</strong></span>
                    <div class="top-review-img"><img src="./assets/images/bbb.png" width="100%" height="100%" alt=""></div>
                </div>
            </div>
        </div>
        <div class="top-review-col">
            <div class="top-review-box">
                <div class="top-review-detail">
                    <span>TRUSTPILOT</span><br>
                    <span class="top-rating-star"><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i></span><br>
                    <span style="font-size: small;color:grey;">(1634 reviews)</span>
                </div>
                <div class="top-review-ratings" style="text-align: center;">
                    <span class="top-rating-font"><strong>4.7</strong></span>
                    <div class="top-review-img"><img src="./assets/images/trustpilot.png" width="100%" height="100%" alt=""></div>
                </div>
            </div>
        </div>
    </div>
    <?php include './footer.php' ?>
    <script>
        document.getElementById('calculatorForm').addEventListener('click',function(e){
            e.preventDefault();
            const formData = new FormData();
            formData.append('distance', document.getElementById('calcInput').value)
            formData.append('transport', document.getElementById('transport').value)
            fetch('./a.php',{
                method: 'POST',
                body : formData,
            }).then(res=>res.json())
            .then(d=>{
                document.getElementById('calculated_price').style.display = 'block'
                document.getElementById('calculated_price').value = d['price'];
                document.getElementById('reset').removeAttribute('disabled')
            })

        })

        document.getElementById('reset').addEventListener('click',(e)=>{
            e.preventDefault();
            document.getElementById('from_').value = "";
            document.getElementById('to_').value = "";
            document.getElementById('calcInput').value = "";
            document.getElementById('transport').value = "open";
            document.getElementById('calculated_price').style.display = 'none'
            document.getElementById('reset').setAttribute('disabled','true')
        })




    </script>
</body>

</html>