<?php include './routes.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request a Free Quote - Anytime Movers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css" integrity="sha512-/VYneElp5u4puMaIp/4ibGxlTd2MV3kuUIroR3NSQjS2h9XKQNebRQiyyoQKeiGE9mRdjSCIZf9pb7AVJ8DhCg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?=base_url() ?>assets/css/footer.css">
    <link rel="stylesheet" href="<?=base_url() ?>assets/css/navbar.css">
    <link rel="stylesheet" href="<?=base_url() ?>assets/css/request-a-free-quote.css">
</head>

<body>
    <div style="position:relative; width:100%;height:70px"><?php include './navbar.php'; ?></div>
    <section class="request-a-free-quote">
        <div class="request-top">
            <p class="request-two">Moving Inventory List</p>
            <p class="request-one">FOR US TO PROVIDE YOU WITH THE MOST ACCURATE QUOTE</p>
            <p class="request-one">FILL OUT ALL THE FIELDS BELOW.</p>
            <p>Please list the number of each item you will be moving. We find it is easiest to pull up this page on mobile and walk through your home.
            </p>
        </div>
        <div class="request-form">
            <div class="from-box">
                <div class="h2">
                    <h2>Living Room/Family Room</h2>
                </div>
                <div class="form-group">
                    <div>
                        <div class="tr">
                            <ul>
                                <li>
                                    <div class="table-td">
                                        <p>Sofa/Couch:</p><input type="text" placeholder="0">
                                    </div>
                                </li>
                                <li>
                                    <div class="table-td">
                                        <p>Lamps:</p><input type="text" placeholder="0">
                                    </div>
                                </li>
                                <li>
                                    <div class="table-td">
                                        <p>Television:</p><input type="text" placeholder="0">
                                    </div>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <div class="table-td">
                                        <p>Chairs:</p><input type="text" placeholder="0">
                                    </div>
                                </li>
                                <li>
                                    <div class="table-td">
                                        <p>Loveseat:</p><input type="text" placeholder="0">
                                    </div>
                                </li>
                                <li>
                                    <div class="table-td">
                                        <p>Media Center:</p><input type="text" placeholder="0">
                                    </div>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <div class="table-td">
                                        <p>Coffee Table:</p><input type="text" placeholder="0">
                                    </div>
                                </li>
                                <li>
                                    <div class="table-td">
                                        <p>Area Rugs:</p><input type="text" placeholder="0">
                                    </div>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <div class="table-td">
                                        <p>End Table:</p><input type="text" placeholder="0">
                                    </div>
                                </li>
                                <li>
                                    <div class="table-td">
                                        <p>Curtains:</p><input type="text" placeholder="0">
                                    </div>
                                </li>
                                <li>
                                    <div class="table-td">
                                        <p>Total Living Room Items:</p><input type="text" placeholder="0">
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <div class="from-box">
                <div class="h2">
                    <h2>Office</h2>
                </div>
                <div class="form-group">
                    <div class="tr">
                        <ul>
                            <li>
                                <div class="table-td">
                                    <p>Sofa:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>End Table:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Television:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <div class="table-td">
                                    <p>Loveseats:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Lamps:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Books:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <div class="table-td">
                                    <p>Chairs:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Area Rugs:</p><input type="text" placeholder="0">
                                </div>
                            </li>

                            <li>
                                <div class="table-td">
                                    <p>Desk/Table:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <div class="table-td">
                                    <p>Coffee Table:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Curtains:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Computer Chair:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Bookcases:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Total Office Items:(1)</p><input type="text" placeholder="0">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="from-box">
                <div class="h2">
                    <h2>Dining Room</h2>
                </div>
                <div class="form-group">
                    <div class="tr">
                        <ul>
                            <li>
                                <div class="table-td">
                                    <p>Dining Table:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Decorative Items:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>China:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <div class="table-td">
                                    <p>Chairs:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Glassware:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <div class="table-td">
                                    <p>Silverware:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>China Cabinet:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <div class="table-td">
                                    <p>Buffet:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Area Rugs:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Total Dining Room Items:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="from-box">
                <div class="h2">
                    <h2>Kitchen/Laundry Room</h2>
                </div>
                <div class="form-group">
                    <div class="tr">
                        <ul>
                            <li>
                                <div class="table-td">
                                    <p>Stove:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Toaster:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Plates/Bowls:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Glassware:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Decorative Items:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <div class="table-td">
                                    <p>Refrigerator:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Blender:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Pots/Pans:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Washer:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <div class="table-td">
                                    <p>Microwave:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Mixer:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Cutlery:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Dryer:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <div class="table-td">
                                    <p>Dish Washer:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Coffee Machine:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Utensils:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Area Rugs:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Total Kitchen/Laundry Items</p><input type="text" placeholder="0">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="from-box">
                <div class="h2">
                    <h2>Bedrooms (All Bedrooms)</h2>
                </div>
                <div class="form-group">
                    <div class="tr">
                        <ul>
                            <li>
                                <div class="table-td">
                                    <p>Bureau/Chest:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Bed Frame:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Bed Linens:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>TVs:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <div class="table-td">
                                    <p>Matuless:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Bookcase:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Area Rug:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <div class="table-td">
                                    <p>Nightstands:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Desk:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Curtains:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <div class="table-td">
                                    <p>Dresser:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Mirror:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Decorative Items:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Total Bedroom Items:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="from-box">
                <div class="h2">
                    <h2>Bathrooms (All Bathrooms)</h2>
                </div>
                <div class="form-group">
                    <div class="tr">
                        <ul>
                            <li>
                                <div class="table-td">
                                    <p>Mirrors:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <div class="table-td">
                                    <p>Decorative Item:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <div class="table-td">
                                    <p>Scale:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <div class="table-td">
                                    <p>Area Rug:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Total Bathroom Items:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="from-box">
                <div class="h2">
                    <h2>Garage/Storage</h2>
                </div>
                <div class="form-group">
                    <div class="tr">
                        <ul>
                            <li>
                                <div class="table-td">
                                    <p>Freezer:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Hoses:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Workbench:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <div class="table-td">
                                    <p>Lawn Mower:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Ladder:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>BBQ Grill:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <div class="table-td">
                                    <p>Edger:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Auto Euipment:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Patio Furniture:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <div class="table-td">
                                    <p>Tools:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Tool Chest:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Table Saw:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Total Garage/Storage Items:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="from-box">
                <div class="h2">
                    <h2>Artwork</h2>
                </div>
                <div class="form-group">
                    <div class="tr">
                        <ul>
                            <li>
                                <div class="table-td">
                                    <p>Paintings:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <div class="table-td">
                                    <p>Pottery:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <div class="table-td">
                                    <p>Sculptures:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <div class="table-td">
                                    <p>Wall Hangings:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="from-box">
                <div class="h2">
                    <h2>Boxes/Tubs/Crates/Wardrobes</h2>
                </div>
                <div class="form-group">
                    <div class="tr">
                        <ul>
                            <li>
                                <div class="table-td">
                                    <p>Boxes:</p><input type="text" placeholder="0">
                                </div>
                            </li> </ul>
                        <ul>
                            <li>
                                <div class="table-td">
                                    <p>Crates:</p><input type="text" placeholder="0">
                                </div>
                            </li> </ul>
                        <ul>
                            <li>
                                <div class="table-td">
                                    <p>Tubs:</p><input type="text" placeholder="0">
                                </div>
                            </li> </ul>
                        <ul>
                            <li>
                                <div class="table-td">
                                    <p>Wardrobes:</p><input type="text" placeholder="0">
                                </div>
                            </li>
                       
                            <li>
                                <div class="table-td">
                                    <p>Total Boxes/ Tubs/Crates /Wardrobes</p><input type="text" placeholder="0">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="from-box">
                <div class="h2">
                    <h2>Total Items</h2>
                </div>
                <div class="form-group">
                    <div class="tr">
                        <ul>
                            <td colspan="4" style="text-align: center;">
                                <div class="table-td" style="justify-content: center;">
                                    <p>Total Items:</p><input type="text" placeholder="0">
                                </div>
                                </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="from-box">
                <div class="h2">
                    <h2>Contact Info</h2>
                </div>
                <div class="form-group">
                    <div class="tr">
                        <ul>
                            <li>
                                <div class="table-contact">
                                    <p>Name:</p><span><input type="text"><br><b>First</b></span><span><input type="text"><br><b>Last</b></span>
                                </div>
                            </li>
                            <li>
                                <div class="table-contact">
                                    <p>E-mail:*</p><span><input type="emai"></span>
                                </div>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <div class="table-contact">
                                    <p>Phone:*</p><span><input type="text" style="width:50px;"><br><b>(xxx)</b></span>-<span><input type="text"><br><b>(xxx-xxxx)</b></span>
                                </div>
                            </li>
                            <li>
                                <div class="table-contact">
                                    <p>Move Date:</p><span><input type="date"></span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="from-box">
                <div class="h2">
                    <h2>House/Building Info</h2>
                </div>
                <div class="form-group">
                    <div class="tr">
                        <ul>
                            <li>
                                <div class="table-contact">
                                    <p>Pick Up Address:*</p>
                                    <div class="_address_">
                                        <input type="text" class="add-a"><br>(Pick up) Suleet Address
                                        <div class="address_">
                                            <span><input type="text"><br>City</span>
                                            <span><input type="text"><br>State</span>
                                        </div>
                                        <input type="text"><br>Postal / Zip Code
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Number of Floors:</p><select name="" id="">
                                        <option value="">Select Value</option>
                                        <option value="">Single Story</option>
                                        <option value="">Two Stories</option>
                                        <option value="">Three Stories or more</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Apt/Condo Floor:</p><select name="" id="">
                                        <option value="selected">Select Value</option>
                                        <option value="1st Floor">1st Floor</option>
                                        <option value="1st Floor">2nd Floor</option>
                                        <option value="1st Floor">3rd Floor</option>
                                        <option value="1st Floor">4th Floor or Higher</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Does your building have an elevator:</p><select name="" id="">
                                        <option value="selected">Select Value</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <div class="table-contact">
                                    <p>Drop Off Address:</p>
                                    <div class="_address_">
                                        <input type="text" class="add-a"><br>(Drop off) Suleet Address
                                        <div class="address_">
                                            <span><input type="text"><br>City</span>
                                            <span><input type="text"><br>State</span>
                                        </div>
                                        <input type="text"><br>Postal / Zip Code
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Number of Floors:</p><select name="" id="">
                                        <option value="">Select Value</option>
                                        <option value="">Single Story</option>
                                        <option value="">Two Stories</option>
                                        <option value="">Three Stories or more</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Apt/Condo Floor:</p><select name="" id="">
                                        <option value="selected">Select Value</option>
                                        <option value="1st Floor">1st Floor</option>
                                        <option value="1st Floor">2nd Floor</option>
                                        <option value="1st Floor">3rd Floor</option>
                                        <option value="1st Floor">4th Floor or Higher</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="table-td">
                                    <p>Does your building have an elevator:</p><select name="" id="">
                                        <option value="selected">Select Value</option>
                                        <option value="selected">Select Value</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </li>
                            <li><button style="width: 100px;height:40px;color:white;background:tomato;border:0;cursor:pointer">Submit</button></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include './footer.php' ?>

</body>

</html>