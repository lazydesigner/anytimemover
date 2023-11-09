<?php
    include_once "../init.php";
    authorized_user_only();

    $table = $_GET['table'];

    if (isset($_GET['_id']) && !empty($_GET['_id'])) {
        $_id = senitize_string($_GET['_id']);

        $datas = "SELECT * FROM $table WHERE `id` = '$_id'";                 // deepak
    $result = mysqli_query($con, $datas);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $blog = mysqli_fetch_assoc($result);
        }
    }

    } else {
        $error = "Failed";
    }
   
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Edit Blog</title>

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

        .btn-car {
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

        .right-section-car {
            position: relative;
        }
    </style>



</head>

<body>
    <?php
        include MENU;
        ?>



    <main>
        <form action="<?=home_path()?>/services/blogs/edit.php" method="post">
            <div class="right-section-car">
                <input type="text" name="table_name" id="table_name" value="<?= $table;?>" hidden>
                <input type="hidden" name='id' value="<?= $blog['id'];?>">
                <div class="page-header">

                    <div class="page-header-breadcrumb">
                        <a href="#">Dashboard</a>
                        <p>/</p>
                        <a href="#">Edit Blog</a>
                    </div>

                    <p class="page-header-heading"> Edit Blog </p>
                    <div class="page-header-btn-container">

                        <button class="btn-yellow-1" id="save-page-btn"> Save Blog</button>

                    </div>

                </div>
                <section>
                    <div>
                        <div class="box-1">
                            <p class="input-lable"> Title: </p>
                            <input type="text" name="title" id="title" value="<?= $blog['title'];?>">

                            <p class="input-lable"> Slug: </p>
                            <input type="text" name="slug" id="slug" value="<?= $blog['slug'];?>">



                            <p class="input-lable">Meta Tags:</p>
                            <textarea type="text" name="meta" id="meta-tags" rows="12"> <?= $blog['meta'];?></textarea>
                        </div>



                        <div class="box-5" style="margin-bottom:15px;">
                            <!-- <div>
                             <div class="div-inline-form">
                                 <p class="input-lable">Blog Image 1:</p>
                                 <input type="file" name="file" id="car-form-img" style="display:none">
                                 <button class="btn-yellow-1" id="login_btn" onclick="open_display_img_selector_form();"> Add</button>
                             </div>
                             <img src="<?= get_img(); ?>placeholder-image.png" id="car-form-img-preview">

                             <input type="text" id="car-form-img-alt" placeholder="Image alt text">
                         </div>
                         <div>
                             <div class="div-inline-form">
                                 <p class="input-lable">Blog Image 2:</p>
                                 <input type="file" name="file" id="car-to-img" style="display:none">
                                 <button class="btn-yellow-1" onclick="open_display_img_selector_to();"> Add</button>
                             </div>
                             <img src="<?= get_img(); ?>placeholder-image.png" id="car-to-img-preview">

                             <input type="text" id="car-to-img-alt" placeholder="Image alt text">
                         </div> -->


                        </div>

                    </div>
                    <div>
                        <div class="box-1">

                            <p class="input-lable"> Page-h1: </p>
                            <input type="text" name="h1" id="page-h1" value="<?= $blog['h1'];?>">

                            <p class="input-lable"> About-1: </p>
                            <textarea type="text" name="h1_about" id="about-1"
                                rows="12"><?= $blog['h1_about'];?></textarea>

                            <p class="input-lable"> Page-h2: </p>
                            <input type="text" name="h2" id="page-h2" value="<?= $blog['h2'];?>">

                            <p class="input-lable"> About-2: </p>
                            <textarea type="text" name="h2_about" id="about-2"
                                rows="12"><?= $blog['h2_about'];?></textarea>


                        </div>

                    </div>

                </section>
                <div class="box-1">
                    <!-- <p class="input-lable"> heading: </p>
                 <input type="text" id="heading"> -->

                    <p class="input-lable">Content: </p>
                    <textarea name="content" id="content"><?= $blog['content'];?></textarea>


                </div>
                

            </div>

            
        </form>

    </main>



    <?php 
    // include_once SCRIPT;
     ?>


    <!-- <script type="text/javascript" src="<?= get_js(); ?>add_car_to_car.js"></script> -->

    <script>
 
    </script>


    <script src="<?= get_assets();?>/ckeditor/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content', {
            height: 400,
            filebrowserUploadUrl: '<?= home_path();?>/services/img_upload.php',
            removeButtons: 'PasteFromWord'
        });
        
    </script>

</body>

</html>