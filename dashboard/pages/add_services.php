<?php
    include_once "../init.php";
    authorized_user_only();
  
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Add New Services</title>

    <?php
        include_once HEAD;
        ?>

    <link rel="stylesheet" href="<?= get_css(); ?>table.global.css">
    <link rel="stylesheet" href="<?= get_css(); ?>tours_list.css">
    <link rel="stylesheet" href="<?= get_css(); ?>PAGE_company_review_add.css">

    <style>
        /* * {
             list-style: unset !important;
         }
         .ck-content .text-small {
             font-size: 1.8rem !important;
         }
         .ck-content ol li{
            list-style: auto !important;
         }
         .ck-content ul li{
            list-style: disc !important;
         }

         .output-box-child-2 ol li{
            list-style: auto !important;
         }
         .output-box-child-2 ul li{
            list-style: disc !important;
         } */


        .box-5 {
            display: inline-flex;
            align-items: center;
            justify-content: space-around;
            width: 100%;
            box-shadow: 0 1px 3px #00000026;
            background-color: #fff;
            padding: 15px;

        }

        .box-5>div {
            width: 40%;

        }

        .box-5>div>img {
            width: 100%;

        }

        .box-5>input {
            width: 35%;

        }

        .btn-state {
            margin: 10px 0;
            width: 100%;
            display: flex;
            justify-content: flex-end;
        }

        .output-box {
            display: inline-flex;
            box-shadow: 0 1px 3px #00000026;
            background-color: #fff;
            padding: 15px;
            width: 100%;

        }

        .output-box-1 {
            display: grid;
            place-items: center;
            width: 4%;
            font-size: 24px;
        }


        .output-box-child-2 {
            width: 86%;

        }

        .output-box-child-2>h3 {
            margin-bottom: 10px;

        }

        .output-box-child-3 {
            width: 10%;
            display: flex;
            justify-content: center;
            align-self: center;
        }

        .output-box-child-3>i:first-child {
            margin-right: 10px;
        }

        .output-box-child-2>p {
            font-weight: 300;
            margin: 2% 0;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            line-clamp: 3;
            -webkit-box-orient: vertical;

        }

        .right-section-state {
            position: relative;
        }
    </style>



</head>

<body>
    <?php
        include MENU;
        ?>



    <main>
        <form action="<?=home_path()?>/services/service/add.php" method="post">
            <div class="right-section-state">

                <div class="page-header">

                    <div class="page-header-breadcrumb">
                        <a href="#">Dashboard</a>
                        <p>/</p>
                        <a href="#">Add Service</a>
                    </div>

                    <p class="page-header-heading"> Create Service </p>
                    <div class="page-header-btn-container">

                        <button class="btn-yellow-1" id="save-page-btn">Save Service</button>

                    </div>

                </div>
                <section>
                    <div>
                        <div class="box-1">
                            <p class="input-lable"> Title: </p>
                            <input type="text" name="title" id="title" placeholder="Page Title">

                            <p class="input-lable"> Slug: </p>
                            <input type="text" name="slug" id="slug"  placeholder="Page Slug">



                            <p class="input-lable">Meta Tags:</p>
                            <textarea type="text" name="meta" id="meta-tags" rows="12" placeholder="Page Meta Tag"></textarea>
                        </div>
<br>


 
                    </div>
                    <div>
                        <div class="box-1">

                            <p class="input-lable"> Page-h1: </p>
                            <input type="text" name="h1" id="page-h1" placeholder="Page H1 Tag">

                            <p class="input-lable"> Top Three Points:</p>
                            <input type="text" name="point1" id="point1" placeholder="Top Ponit One">
                            <input type="text" name="point2" id="point2" placeholder="Top Ponit Two" style="margin: 2% 0;">
                            <input type="text" name="point3" id="point2" placeholder="Top Ponit Three">

                            <p class="input-lable"> Page-h2: </p>
                            <input type="text" name="h2" id="page-h2" placeholder="Page H2 Tag">

                            <p class="input-lable"> About-2: </p>
                            <textarea type="text" name="h2_about" id="about-2" rows="12"  placeholder="About Page H2 Heading"></textarea>


                        </div>

                    </div>

                </section>
                <div class="box-1">
                    <!-- <p class="input-lable"> heading: </p>
                 <input type="text" id="heading"> -->

                    <p class="input-lable">Content: </p>
                    <textarea name="content" id="content"></textarea>


                </div>
            </div>
        </form>

    </main>



    <?php 
    // include_once SCRIPT;
     ?>

    <script src="<?= get_assets();?>/ckeditor/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content', {
            height: 400,
            filebrowserUploadUrl: '<?= home_path();?>/services/img_upload.php',
            removeButtons: 'PasteFromWord'
        });
    </script>
    <script>

    </script>

</body>

</html>