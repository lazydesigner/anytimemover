<?php

   

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require './phpMailer/src/Exception.php';
    require './phpMailer/src/PHPMailer.php';
    require './phpMailer/src/SMTP.php';


    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $quote = $_POST['quote'];

            // $to = "info@rapidautoshipping.com , amankeshari5937@gmail.com, ".$user_email;
    $mail = new PHPMailer(true);
    
    $mail->isSMTP();
    // $mail->Host = 'smtp.gmail.com';
    // $mail->Host = 'smtp.titan.email';
    $mail->Host = 'smtp.hostinger.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'info@rapidautoshipping.com';
    $mail->Password = 'Welcome@9091';
    $mail->SMTPSecure = 'ssl';
    $mail->Port= 465;
    // $mail->Host = 'smtp.gmail.com';
    // $mail->SMTPAuth = true;
    // $mail->Username = 'deepakbaradwaj933@gmail.com';
    // $mail->Password = 'sjkosmmlnbabblmm';
    // $mail->SMTPSecure = 'ssl';
    // $mail->Port= 465;
    // 
    $mail->setFrom('info@rapidautoshipping.com', 'rapidautoshipping');
    // $mail->setFrom('deepakbaradwaj933@gmail.com', 'ShareRapidly');
    
    $mail->addAddress($email);
    // $mail->addBCC('amankeshari5937@gmail.com', 'new customer details');
    // $mail->addBCC('atulkeshari14@hotmail.com', 'new customer details');
    // $mail->addBCC('info@rapidautoshipping.com', 'new customer details');
    $mail->isHTML(true);
    
    $mail->Subject = 'Qoute from Rapid';
    
    $mail->Body =  '<h1>Customer Detail</h1>
    <a href="https://rapidautoshipping.com/customer/'.base64_encode($name).'/'. $email .'/'. $phone .'/'. $quote.'">Fill The Form</a> ';

      // Always set content-type when sending HTML email
    //   $headers = "MIME-Version: 1.0" . "\r\n";
    //   $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    //   // More headers
    //    $headers .= 'From: <noreply.rapidautoshipping.com>' . "\r\n";

       if(!$mail->send()){
        echo json_encode(['status'=>500,'a'=>$name]);
       }else{
           echo json_encode(['status'=>200,'a'=>$name]);
       }
       ?>