<?php
    include_once "../init.php";
    authorized_user_only();
    
    $table = $_GET['table'];

    if (isset($_GET['_id']) && !empty($_GET['_id'])) {
        $_id = senitize_string($_GET['_id']);

        // if (!is_data_exist('services', "`id` = '$_id'")) {
        //     $error = "Faild";
        // } else {
        //     $sql = "SELECT * FROM `services` WHERE `id` = '$_id'";
        //     $service = fetch_data($sql);
        // }
        
        $datas = "SELECT * FROM $table WHERE `id` = '$_id'";                 // rishabh
    $result = mysqli_query($con, $datas);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $service = mysqli_fetch_assoc($result);
        }
    }
    // $data2 = "SELECT * FROM new_services WHERE `id` = '$_id'";
    // $result2 = mysqli_query($con, $data2);
    // if ($result2) {
    //     if (mysqli_num_rows($result2) > 0) {
    //         $service = mysqli_fetch_assoc($result2);
    //         $name = "services";
    //     }
    // }
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


    <title>Edit Motorcycle</title>

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
        <form action="<?=home_path()?>/services/service/edit.php" method="post">
            <div class="right-section-car">
                <input type="hidden" name='id' value="<?=$service['id'];?>">
                <div class="page-header">

                    <div class="page-header-breadcrumb">
                        <a href="#">Dashboard</a>
                        <p>/</p>
                        <a href="#">Edit Service</a>
                    </div>

                    <p class="page-header-heading"> Edit Service </p>
                    <div class="page-header-btn-container">

                        <button class="btn-yellow-1" id="save-page-btn"> Save Service</button>

                    </div>

                </div>
                <section>
                    <div>
                        <div class="box-1">
                            <p class="input-lable"> Title: </p>
                            
                            <input type="text" name="table_name" id="table_name" value="<?= $table;?>" hidden>
                            <input type="text" name="title" id="title" value="<?= $service['title'];?>">

                            <p class="input-lable"> Slug: </p>
                            <input type="text" name="slug" id="slug" value="<?= $service['slug'];?>">



                            <p class="input-lable">Meta Tags:</p>
                            <textarea type="text" name="meta" id="meta-tags" rows="12"> <?= $service['meta'];?></textarea>
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
                            <input type="text" name="h1" id="page-h1" value="<?= $service['h1'];?>">

                            <p class="input-lable"> About-1: </p>
                            <textarea type="text" name="h1_about" id="about-1"
                                rows="12"><?= $service['h1_about'];?></textarea>

                            <p class="input-lable"> Page-h2: </p>
                            <input type="text" name="h2" id="page-h2" value="<?= $service['h2'];?>">

                            <p class="input-lable"> About-2: </p>
                            <textarea type="text" name="h2_about" id="about-2"
                                rows="12"><?= $service['h2_about'];?></textarea>


                        </div>

                    </div>

                </section>
                <div class="box-1">
                    <!-- <p class="input-lable"> heading: </p>
                 <input type="text" id="heading"> -->

                    <p class="input-lable">Content: </p>
                    <textarea name="content" id="content"><?= $service['content'];?></textarea>


                </div>
                

            </div>

            
        </form>

    </main>



    <?php 
    // include_once SCRIPT;
     ?>


    <!-- <script type="text/javascript" src="<?= get_js(); ?>add_car_to_car.js"></script> -->

    <!-- <script>
        let note_site = ``;
        var note = JSON.parse(note_site) ?? [];
        var note_index = -1;


        show_inp();

        let city_zip = document.getElementById('city_zip');

        city_zip.value = JSON.stringify(note);


        let add_city = document.getElementById('add_city');
        add_city.addEventListener('click', function (e) {
            e.preventDefault();
            add_data();
            city_zip.value = JSON.stringify(note);
        })

        function add_data() {

            let heading = document.getElementById('city');
            if (heading.value == '') {
                toast.error("Please enter Model")
                return;
            }

            if (note_index == -1) {

                note.push({
                    "index": note.length,
                    "car": heading.value
                })

            } else {
                let newList = [];
                for (var i = 0; i < note.length; i++) {
                    if (note[i].index == note_index) {
                        newList.push({
                            "index": note_index,
                            "car": heading.value
                        })
                    } else {
                        newList.push(note[i])
                    }
                }

                note = newList;
                note_index = -1

            }

            heading.value = "";

            show_inp();

        }

        function show_inp() {

            var notts = "",
                count = 0;

            note.forEach((i) => {
                count++;

                let index = i.index
                //  heading = i.city.replace(/'/g, "\\'").replace(/"/g, "\\'"),
                //  about = i.zip_code.replace(/'/g, "\\'").replace(/"/g, "\\'");
                notts += ` <div class="output-box" style="margin-top:20px;">
                 <div class="output-box-1">
                    <p>${count}</p>
                 </div>
                 <div class="output-box-child-2">
                     <h3>` + i.car + `</h3>
                 </div>
                 <div class="output-box-child-3">
                     <i class="fa-solid fa-pen-to-square" style="cursor:pointer;" onclick="edit_note('${i.index}')"></i>
                     <i class="fa-solid fa-trash-can" style="cursor:pointer;" onclick="delete_note(${i.index})"></i>
                 </div>
             </div>`;

            })

            document.getElementById('output-box').innerHTML = notts;
        }

        function edit_note(i) {
            note_index = i
            document.getElementById('city').value = note[i].car
        }


        function delete_note(index) {
            let newList = [];
            let newCount = 0;
            for (var i = 0; i < note.length; i++) {
                if (note[i].index != index) {
                    let nNote = note[i];
                    nNote.index = ++newCount;
                    newList.push(nNote)
                }
            }
            note = newList;
            city_zip.value = JSON.stringify(note);
            show_inp();
        }


         //  function for get img
        //  function open_display_img_selector_form() {
        //      document.getElementById("car-form-img").click();
        //  }

        //  document.getElementById('car-form-img').addEventListener("change", function() {

        //      if (this.files && this.files[0]) {
        //          var reader = new FileReader();

        //          reader.onload = function(e) {
        //              $('#car-form-img-preview').attr('src', e.target.result);
        //          };
        //          reader.readAsDataURL(this.files[0]);
        //      }
        //  });

        //  function open_display_img_selector_to() {
        //      document.getElementById("car-to-img").click();
        //  }

        //  document.getElementById('car-to-img').addEventListener("change", function() {

        //      if (this.files && this.files[0]) {
        //          var reader = new FileReader();

        //          reader.onload = function(e) {
        //              $('#car-to-img-preview').attr('src', e.target.result);
        //          };
        //          reader.readAsDataURL(this.files[0]);
        //      }
        //  });
    </script> -->


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