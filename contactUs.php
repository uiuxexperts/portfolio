<?php
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");
// $recipient_email    = "mohsin@engineersahab.com,abhishek@engineersahab.com";
$recipient_email    = "contact.uiuxexperts@gmail.com"; //recepient
$postdata = file_get_contents('php://input');
$postd = json_decode($postdata,true);

if(isset($_POST) && !empty($_POST)){
    $post = $_POST;
    $message = filter_var($post["requirement"], FILTER_SANITIZE_STRING);
}else{
    $post = $postd;
    $message = filter_var($post["requirement"], FILTER_SANITIZE_STRING);
}

if($post){
    $sender_name    = $post["name"]; //capture sender name
    $sender_email   = $post["email"]; //capture sender email
    $contactno   = $post["phone_number"];
    
    $subject        = "UIUX-Experts Enquiry";
    $from_email     = 'enginmfy@business46.web-hosting.com'; //from email using site domain.
         if(!empty($sender_name) && !empty($sender_email) && !empty($message) && !empty($subject)){
            //php validation, exit outputting json string
            if(strlen($sender_name)<3){
                print json_encode(array('type'=>'error', 'text' => 'Name is too short or empty!'));
                exit;
            }
            if(!filter_var($sender_email, FILTER_VALIDATE_EMAIL)){ //email validation
                print json_encode(array('type'=>'error', 'text' => 'Please enter a valid email!'));
                exit;
            }
            if(strlen($subject)<3){ //check emtpy subject
                print json_encode(array('type'=>'error', 'text' => 'message is required'));
                exit;
            }
            
            //construct a message body to be sent to recipient
            $message_body='<!DOCTYPE html><html><head><title></title><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta name="viewport" content="width=device-width, initial-scale=1"><meta http-equiv="X-UA-Compatible" content="IE=edge" /><style type="text/css">.email-head-img{background-size: cover;background-repeat: no-repeat;padding: 35px;} body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; } table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; } img { -ms-interpolation-mode: bicubic; } img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; } table { border-collapse: collapse !important; }body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }a[x-apple-data-detectors] {color: inherit !important;text-decoration: none !important;font-size: inherit !important;font-family: inherit !important;font-weight: inherit !important;line-height: inherit !important;} @media screen and (max-width: 480px) {.mobile-hide {display: none !important;}.mobile-center {text-align: center !important; }} .logo-img{height: 150px;width: 240px;}div[style*="margin: 16px 0;"] { margin: 0 !important; } </style><body style="margin: 0 !important; padding: 0 !important; background-color: #eeeeee;" bgcolor="#eeeeee"><table border="0" cellpadding="0" cellspacing="0" width="100%"> <tr><td align="center" style="background-color: #eeeeee;"> <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;"> <tr> <td align="center" valign="top" style="font-size:0; padding: 35px;"bgcolor="#102fc9"  class="email-head-img"> <div style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;"> <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;"> <tr> <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 36px; font-weight: 800; line-height: 35px;" class="mobile-center"> <h1 style="font-size: 36px; font-weight: 800; margin: 0; color: #ffffff;"> <img src="https://uiuxexperts.github.io/portfolio/images/logo.svg" class="" width="250px"> </h1> </td> </tr> </table> </div> </td> </tr> <tr> <td align="center" style="padding: 35px 35px 20px 35px; background-color: #ffffff;" bgcolor="#ffffff"> <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px; margin-bottom: 30px;"> <tr> <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 13px;padding-bottom: 20px;"><table><tr><td>Name : </td><td>'.$sender_name.'</td></tr><tr><td>Email : </td><td>'.$sender_email.'</td></tr><tr><td>Contact Number : </td><td>'.$contactno.'</td></tr><tr><td>Requirement : </td><td>'.$message.'</td></tr></table></td> </tr> <tr> <td align="left" style=""> <table cellspacing="0" cellpadding="0" border="0" width="100%"> <tr> </table> </td> </tr> </table> </td> </tr> <tr> <td align="center" style="padding: 35px; background-color: #102fc9; font-size:16px; color: white;"> © 2022 UIUX-Experts. All rights reserved. </td> </tr> </table> </td> </tr> </table> </body> </html>';
//print_r($message_body); exit;
                //header
                $headers = "MIME-Version: 1.0\r\n"; 
                $headers .= "From:".$from_email."\r\n"; 
                $headers .= "Reply-To: ".$sender_email."" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                
                
                // $headers = "From:".$from_email."\r\n".
                // "Reply-To: ".$sender_email. "\n" .
                // "X-Mailer: PHP/" . phpversion();
                //$body = $message_body;
        
                
            $sentMail = mail($recipient_email, $subject, $message_body, $headers);
       
            if($sentMail) //output success or failure messages
            {  print json_encode(array('type'=>'success', 'text' => 'Thank You for contacting us.Will get back to you shortly'));
                $message='<!DOCTYPE html><html><head><title></title><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta name="viewport" content="width=device-width, initial-scale=1"><meta http-equiv="X-UA-Compatible" content="IE=edge" /><style type="text/css">.email-head-img{background-size: cover;background-repeat: no-repeat;padding: 35px;} body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; } table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; } img { -ms-interpolation-mode: bicubic; } img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; } table { border-collapse: collapse !important; }body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }a[x-apple-data-detectors] {color: inherit !important;text-decoration: none !important;font-size: inherit !important;font-family: inherit !important;font-weight: inherit !important;line-height: inherit !important;} @media screen and (max-width: 480px) {.mobile-hide {display: none !important;}.mobile-center {text-align: center !important; }} .logo-img{height: 150px;width: 240px;}div[style*="margin: 16px 0;"] { margin: 0 !important; } </style><body style="margin: 0 !important; padding: 0 !important; background-color: #eeeeee;" bgcolor="#eeeeee"><table border="0" cellpadding="0" cellspacing="0" width="100%"> <tr><td align="center" style="background-color: #eeeeee;"> <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;"> <tr> <td align="center" valign="top" style="font-size:0; padding: 35px;"bgcolor="#102fc9"  class="email-head-img"> <div style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;"> <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;"> <tr> <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 36px; font-weight: 800; line-height: 35px;" class="mobile-center"> <h1 style="font-size: 36px; font-weight: 800; margin: 0; color: #ffffff;"> <img src="https://uiuxexperts.github.io/portfolio/images/logo.svg" class="" width="250px"> </h1> </td> </tr> </table> </div> </td> </tr> <tr> <td align="center" style="padding: 35px 35px 20px 35px; background-color: #ffffff;" bgcolor="#ffffff"> <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px; margin-bottom: 30px;"> <tr> <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 13px;padding-bottom: 20px;"><table><tr><td>Name : </td><td>'.$sender_name.'</td></tr><tr><td>Email : </td><td>'.$sender_email.'</td></tr><tr><td>Contact Number : </td><td>'.$contactno.'</td></tr><tr><td>Requirement : </td><td>'.$message.'</td></tr></table></td> </tr> <tr> <td align="left" style=""> <table cellspacing="0" cellpadding="0" border="0" width="100%"> <tr> </table> </td> </tr> </table> </td> </tr> <tr> <td align="center" style="padding: 35px; background-color: #102fc9; font-size:16px; color: white;"> © 2022 UIUX-Experts. All rights reserved. </td> </tr> </table> </td> </tr> </table> </body> </html>';
        
                $subject ='Thank you for contacting Engineer Sahab';
                //check if the email address is invalid $secure_check
                if(mail($sender_email, $subject, $message, $headers)){
                    //echo"sendTo";
                }
                exit;
            }else{
                print json_encode(array('type'=>'error', 'text' => 'Could not send mail! please try again.'));
                exit;
            }
   
    }else{
                print json_encode(array('type'=>'error', 'text' => 'Could not send mail! please try again.!!!!!!'));
                exit;
            }
    
}
?>