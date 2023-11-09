<?php
include_once '../__api.php';

$id = $_GET['id'];
$query = "SELECT * FROM form_qoute where id = '$id'";
$result = mysqli_query($con, $query) or die('details query failed');
$row = mysqli_fetch_assoc($result);

if($row['status'] == "unread"){
    $edit_query = "UPDATE form_qoute SET status='read' where id = '$id'";
    mysqli_query($con, $edit_query) or die("edit query failed");
}

if($row['delivery_done'] == 'true' ){
    $d_done = '<button style="width: 150px;height:40px;border:0;border-radius:5px;background-color:orangered;color:white;cursor:pointer;font-weight:bold;" id="delivery_done_btn" onclick="delivery_status()">Delivered</button>';
}else{
    $d_done = '<button style="width: 150px;height:40px;border:0;border-radius:5px;background-color:orange;color:white;cursor:pointer;font-weight:bold;" id="delivery_done_btn" onclick="delivery_status()">Not Delivered</button>';
}



echo '<div class=" details_heading flex_space_between">
<h3>User Name: '.$row['username'].'</h3>
<h3>Phone Number: <a href=tel:'.$row['phone'].'>'.$row['phone'].'</a></h3>
</div>
<div class="  details_heading flex_space_between">
<h3>Email: '.$row['email'].'</h3>
<h3>Qoute ID: '.$row['qoute_id'].'</h3>
</div>
<div class=" details_heading flex_space_between">
<h3>Ship From: '.$row['ship_from'].'</h3>
<h3>Ship To: '.$row['ship_to'].'</h3>

</div>
<div class=" details_heading flex_space_between">
<h3>Distance: '.$row['distance'].'</h3>
<h3>Make: '.$row['make'].'</h3>

</div>
<div class=" details_heading flex_space_between">
<h3>Pick Up Date: '.$row['pickup_date'].'</h3>
<h3>Model: '.$row['model'].'</h3>
</div>
<div class=" details_heading flex_space_between">
<h3>Vehicle Size: '.$row['vehicle_size'].'</h3>
<h3>Year: '.$row['year'].'</h3>
</div>
<div class=" details_heading flex_space_between">
<h3>Transport Method: '.$row['t_method'].'</h3>
<h3>Vehicle Type: '.$row['vehicle_type'].'</h3>
</div>
<div class=" details_heading flex_space_between">
<h3>URL: '.$row['url'].'</h3>
<h3>IP: '.$row['ip'].'</h3>
</div>
<div class=" details_heading flex_space_between">
<h3>send mail: <button style="width: 150px;height:40px;border:0;border-radius:5px;background-color:tomato;color:white;cursor:pointer;font-weight:bold;" id="_send_" onclick="Send_link()">Send Link</button></h3>
<h3>View Mail: <button id="message_view_button" style="width: 150px;height:40px;border:0;border-radius:5px;background-color:teal;color:white;cursor:pointer;font-weight:bold;" >View Quote</button></h3>
</div>
<div class=" details_heading flex_space_between">
<h3>Delivery : '.$d_done.'</h3>
</div>


<div id="pop_the_box" style="max-width:600px;min-width:300px;height:600px;border:1px solid black;position:absolute;z-index:1;background-color:lightgrey;padding:2%;display:none;">
<span class="close_the_pop_up" id="close_the_pop_up">X</span>
                <div style="width:100%;height:500px;overflow:auto;" contenteditable="true" name="message_view_box" id="message_view_box" ></div>
                <button style="width: 150px;height:40px;border:0;border-radius:5px;background-color:green;color:white;cursor:pointer;font-weight:bold;margin-top:2%" id="message_send_button" onclick="send_mail_to_customer()">Send Mail</button><div class="loader" id="loader">
                <div class="justify-content-center jimu-primary-loading"></div>
              </div>
        </div>

<script>

document.getElementById("message_view_button").addEventListener("click",()=>{
    document.getElementById("pop_the_box").style.display = "block"
    document.getElementById("message_view_box").innerHTML = "<br>Hello <b>Mr. '.$row['username'].'</b>,<br><br> Quote Id : <b>RAS '.$row['qoute_id'].'</b><br><br> Thank you for placing your order with us. Our goal is your complete satisfaction. Your order number for your reference is <b>RAS '.$row['qoute_id'].'</b>.<br><br> We understand that the 1st available date to pickup your '.$row['year'].' '.$row['make'].' '.$row['model'].' is '.$row['pickup_date'].' . Below you will find the details of your shipment, please review the information carefully. If there is anything we need to correct please reach out to one of our agents.<br><br> 1. <b>Shipper Information</b><br><br> First Name: <b>'.$row['username'].'</b><br> Last Name: <br>Phone 1: '.$row['phone'].' <br>Phone 2: <br>Address: '.$row['ship_from'].' <br>Country : USA <br>Email: '.$row['email'].'<br><br> ====================== <br><br>2. <b>Pricing and Shipping</b><br> <br>Order Number: <b>RAS '.$row['qoute_id'].'</b> <br>Total Price: $1,750.00 (incl. 100 % Insurance) <br>1st Available Date: '.$row['pickup_date'].' <br>Ship Via: Open Carrier <br>Vehicle(s) Run: YES<br><br>  ======================= <br><br>3. <b>Location Details Origin</b><br><br> First Name: <b>'.$row['username'].'</b><br> Last Name: <br>Phone 1: '.$row['phone'].' <br>Phone 2: <br>Address: '.$row['ship_from'].' <br>Country : USA <br>Email: '.$row['email'].'<br><br> ======================= <br><br>4. <b>Destination</b><br> <br>Name: '.$row['username'].' <br>Company: <br>Phone : '.$row['phone'].' <br>Address: '.$row['ship_to'].' <br>Country : USA <br>Email : '.$row['email'].' <br><br>======================== <br><br>Please click on the below button to reserve your space in the trailer and confirm your booking with one of the leading Auto Transport Company in USA<br><a href=\'https://rapidautoshipping.com/customer/'.base64_encode($row['username']).'/'. $row['email'] .'/'. $row['phone'] .'/'. $row['qoute_id'].'\' ><button style=\"width: 150px;height:40px;border:0;border-radius:5px;background-color:tomato;color:white;cursor:pointer;font-weight:bold;margin-top:2%;\">Click for Reservations</button></a><br><br>Email : info@rapidautoshipping.com <br><br>WE ARE HERE TO ANSWER YOUR QUESTIONS FROM 7 AM TO 5 PM CENTRAL TIME. WE LOOK FORWARD TO HEARING FROM YOU.<br><br> Sincerely,<br><br> <a href=\'https://rapidautoshipping.com/\' style=\'cursor:pointer;\' >Rapid Auto Shipping</a><br><br> Toll Free Number+1 833-233 (4447)"
})

        function Send_link(){
            const formdata = new FormData();
            formdata.append("name","'.$row['username'].'")
            formdata.append("email","'.$row['email'].'")
            formdata.append("phone","'.$row['phone'].'")
            formdata.append("quote","'.$row['qoute_id'].'")
            fetch("https://dashboard.rapidautoshipping.com/send-mail",{
                method:"POST",
               // mode: "no-cors", // no-cors, *cors, same-origin
                body:formdata,
            }).then(res=>res.json()).then((d)=>{
                if(d["status"] == 500){
                    alert("Failed To Send Mail")
                }else{
                    document.getElementById("_send_").style.backgroundColor = "green";
                    const keys = [];
for (const key of formdata.keys()) {
    keys.push(key);
}
for (const idx in keys) {
    formdata.delete(keys[idx]);
}
                }
            })
        }

        function send_mail_to_customer(){
            document.getElementById("loader").style.display = "block";
            const FormDatas  = new FormData();
            FormDatas.append("email","'.$row['email'].'");
            FormDatas.append("vehicle","'.$row['make'].' '.$row['model'].'");
            FormDatas.append("message",document.getElementById("message_view_box").innerHTML);
            fetch("http://localhost/rapiddash/confermation_mail",{
            // fetch("https://dashboard.rapidautoshipping.com/confermation_mail",{
                method:"POST",
                body : FormDatas,
            }).then(res=>res.json()).then((d)=>{
                console.log(d)
                if(d["status"] == 500){
                    alert("Failed To Send Mail")
                }else{
                    document.getElementById("message_send_button").style.backgroundColor = "dodgerblue";
                    document.getElementById("loader").style.display = "none";
                    const keysc = [];
                    for (const key of FormDatas.keys()) {
                        keysc.push(key);
                    }
                    for (const idx in keysc) {
                        FormDatas.delete(keysc[idx]);
                    }
                }
            })
        }
        document.getElementById("close_the_pop_up").addEventListener("click",()=>{
            document.getElementById("pop_the_box").style.display = "none"
        })

        function delivery_status(){
            // let email = prompt("Please Enter Your Email Address To UnSubscribe From Our News Letter");
            const stats_update = new FormData();
            stats_update.append("status","delivery");
            stats_update.append("delivered","true");
            stats_update.append("delivered_number",'.$_GET['id'].');
            fetch("http://localhost/rapiddash/update_status",{
                method:"POST",
                body:stats_update,
            }).then(res=>res.json()).then(d=>{
                if(d["status"] == 200){
                    document.getElementById("delivery_done_btn").style.backgroundColor = "orangered";
                    document.getElementById("delivery_done_btn").innerText = "Delivered";
                }
            })

        }

        
    </script>



';
?>
