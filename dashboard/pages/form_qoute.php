<?php
include_once "../init.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Admin Panel</title>

    <?php
    include_once HEAD;
    ?>

    <link rel="stylesheet" href="<?= get_css() ?>dashboard.css">
    <link rel="stylesheet" href="<?= get_css() ?>form_qoute.css">
    <style>
        main {
            padding: 0;
            /* width: 100%; */
        }

        .back-button {
            display: none;
        }

        .back-to-dash {
            display: none;
        }

        #pop_the_box {
            left: 35%;
            top: 1%
        }

        @media screen and (max-width: 500px) {
            #pop_the_box {
                left: 0;
                top: 10%
            }

            .back-button {
                display: block;
            }

            .back-to-dash {
                display: block;
            }

            .back-to-dash button {
                width: 60px;
                height: 30px;
                padding: 1%;
                background-color: teal;
                color: white;
                border: 0;
            }

            .main {
                width: 100%;
            }

            .message_tab {
                width: 200%;
            }

            .back-button button {
                width: 30px;
                height: 30px;
                outline: 0;
                border: 0;
                border-radius: 50%;
                background-color: dodgerblue;
                color: white;
                cursor: pointer;
            }

            .back-to-dash {
                position: fixed;
                top: 3%;
                left: 3%;
            }

            .rotate-the-button {
                transform: rotate(180deg);
            }

            .left-slider {
                display: none;
            }

            .hide_show {
                display: block !important;
            }

            .flex_space_between {
                display: block;
            }

            .xyz-detail-tab {
                height: 80%;
                width: 100%;
                overflow: auto;
            }
        }
        .close_the_pop_up{
            width: 30px;
            height: 30px;
            background-color: black;
            color: white;
            border-radius: 50%;
            position: absolute; 
            display: grid;
            place-items: center;
            top: 2.5%;
            right: 5%;
            cursor: pointer;
        }
    </style>

    <style>
        .loader {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            display: none;
        }

        .jimu-primary-loading:before,
        .jimu-primary-loading:after {
            position: absolute;
            top: 0;
            content: '';
        }

        .jimu-primary-loading:before {
            left: -19.992px;
        }

        .jimu-primary-loading:after {
            left: 19.992px;
            -webkit-animation-delay: 0.32s !important;
            animation-delay: 0.32s !important;
        }

        .jimu-primary-loading:before,
        .jimu-primary-loading:after,
        .jimu-primary-loading {
            background: #076fe5;
            -webkit-animation: loading-keys-app-loading 0.8s infinite ease-in-out;
            animation: loading-keys-app-loading 0.8s infinite ease-in-out;
            width: 13.6px;
            height: 32px;
        }

        .jimu-primary-loading {
            text-indent: -9999em;
            margin: auto;
            position: absolute;
            right: calc(50% - 6.8px);
            top: calc(50% - 16px);
            -webkit-animation-delay: 0.16s !important;
            animation-delay: 0.16s !important;
        }

        @-webkit-keyframes loading-keys-app-loading {

            0%,
            80%,
            100% {
                opacity: .75;
                box-shadow: 0 0 #076fe5;
                height: 32px;
            }

            40% {
                opacity: 1;
                box-shadow: 0 -8px #076fe5;
                height: 40px;
            }
        }

        @keyframes loading-keys-app-loading {

            0%,
            80%,
            100% {
                opacity: .75;
                box-shadow: 0 0 #076fe5;
                height: 32px;
            }

            40% {
                opacity: 1;
                box-shadow: 0 -8px #076fe5;
                height: 40px;
            }
        }
    </style>

</head>

<body>

    <?php
    include_once MENU;

    ?>
    <?php
    $message_query = "SELECT * FROM form_qoute order by id desc";
    $message_result = mysqli_query($con, $message_query) or die('message query failed');
    ?>

    <main id="main" class="main">
        <div class="back-to-dash" id="back-to-dash">
            <button>Menu</button>
        </div>
        <section style="display:flex;">
            <div class="message_tab">
                <?php
                foreach ($message_result as $message) {; ?>
                    <div class="notification <?php echo $message['status']; ?>" data-id="<?php echo $message['id']; ?>">
                        <div class="message">
                            <div class="usr_dtl">
                                <div class="user_img"><img src="<?= get_img() ?>user.png" width="32px" alt="user"></div>
                                <div class="user_name"><?php echo $message['username']; ?></div>
                            </div>
                            <div class="message_time">
                                <p><?php
                                    $dateStr = strtotime($message['added_on']);
                                    echo date('d-m-Y H:i:s', $dateStr);
                                    ?></p>
                            </div>
                        </div>
                    </div>
                <?php }
                ?>


            </div>
            <div class="details_tab">
                <div class="back-button" id="back-button">
                    <button><i class="fa fa-arrow-left"></i>&nbsp;</button>
                </div>
                <div class="xyz-detail-tab" id="details_tab"></div>

                <!-- <div class=" details_heading flex_space_between">
                        <h3>User Name: Harry</h3>
                        <h3>Phone Number: 1234567890</h3>
                    </div>
                    <div class="  details_heading flex_space_between">
                        <h3>Email: Harry</h3>
                        <h3>Qoute ID: 1234567890</h3>
                    </div>
                    <div class=" details_heading flex_space_between">
                        <h3>Ship From: Harry</h3>
                        <h3>Ship To: 1234567890</h3>
                    </div>
                    <div class=" details_heading flex_space_between">
                        <h3>Distance: Harry</h3>
                        <h3>Pick Up Date: 1234567890</h3>
                    </div>
                    <div class=" details_heading flex_space_between">
                        <h3>Make: Harry</h3>
                        <h3>Model: 1234567890</h3>
                    </div>
                    <div class=" details_heading flex_space_between">
                        <h3>Vehicle Size: Harry</h3>
                        <h3>Year: 1234567890</h3>
                    </div>
                    <div class=" details_heading flex_space_between">
                        <h3>Transport Method: Harry</h3>
                        <h3>Vehicle Type: 1234567890</h3>
                    </div> -->


            </div>


        </section>


    </main>
    <!-- 
        IF DELIVERY_DONE = TRUE (DO NOT SEND MAIL)
    
        IF SUBSCRIPTION = TRUE (SEND MAIL)    
    -->




    <?php
    include_once SCRIPT;
    ?>
    <script>
        $(".notification").on('click', function() {
            let noti_id = $(this).attr("data-id");
            if ($(this).hasClass('unread')) {
                $(this).removeClass('unread');
                $(this).addClass('read');
            }
            $.ajax({
                url: "<?= home_path(); ?>/services/form_qoute/view.php",
                method: "GET",
                data: "id=" + noti_id,
                success: function(res) {
                    var windowWidth = $(window).width();
                    $('#details_tab').html(res);
                    if (windowWidth < 500) {
                        $('.message_tab').width('0%')
                    }
                    $('.details_tab').width('100%')
                    $('.details_tab').show()
                    // document.getElementById('back-button').style.transform = 'rotate(180deg)'
                }
            })
        })

        document.getElementById('back-to-dash').addEventListener('click', () => {
            document.querySelector('.left-slider').classList.toggle('hide_show')
            document.getElementById('main').classList.toggle('main')
            document.querySelector('.message_tab').style.width = '200%';
            document.querySelector('.details_tab').style.display = 'none';
        })

        document.getElementById('back-button').addEventListener('click', () => {
            document.querySelector('.message_tab').style.width = '200%';
            document.querySelector('.details_tab').style.display = 'none';
        })
    </script>

</body>

</html>