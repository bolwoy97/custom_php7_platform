<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailService
{
   
    public static function mail($emailTo,$subject,$body, $image= '' )
    {  
        /*if($_SESSION['user']['login']=='tester1'){
            //ini_set("display_errors", 1);
            self::mail_ru($emailTo,$subject,$body );
            exit;
            return true;
        }*/
        $from = $GLOBALS['env']['email'];
        $password = $GLOBALS['env']['email_pass']; 

        require ROOT.'/res/PHPMailer/src/Exception.php';
        require ROOT.'/res/PHPMailer/src/PHPMailer.php';
        require ROOT.'/res/PHPMailer/src/SMTP.php';
        $mail = new PHPMailer(true);
        try {
            $mail ->CharSet  = "UTF-8"; 
            $mail->Encoding = 'base64';
            //Server settings
            $mail->SMTPDebug = 0;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = $from;                     // SMTP username
            $mail->Password   = $password;                               // SMTP password
            $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
            $mail->SMTPAutoTLS = false;                                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = 587;                                    // TCP port to connect to
            $mail->SMTPKeepAlive = true;   
            $mail->Mailer = "smtp"; // don't change the quotes!
           
            //Recipients
            $mail->setFrom($from);
            $mail->addAddress($emailTo);               // Name is optional
            $mail->addReplyTo($from);
        
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            if( $image !=''){
              //  $mail->addEmbeddedImage("assets/images/$image.png",$image);
            }
            
            $mail->Subject = $subject;
            $mail->Body    = $body;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
           // echo 'Message has been sent';
        } catch (Exception $e) {
            echo " Mailer Error: {$mail->ErrorInfo}";
            return false;
            //exit;
        }
        //exit;
        return true;
    }

    public static function mail_ru($emailTo,$subject,$body, $image= '' )
    {  
        echo ' mail_ru ';

        $from = '@mail.ru';
        $password = 'password'; 
        
        require ROOT.'/res/PHPMailer/src/Exception.php';
        require ROOT.'/res/PHPMailer/src/PHPMailer.php';
        require ROOT.'/res/PHPMailer/src/SMTP.php';
        $mail = new PHPMailer(true);
        try {
            $mail ->CharSet  = "UTF-8"; 
            $mail->Encoding = 'base64';
            //Server settings
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->SMTPDebug = 0;                                       // Enable verbose debug output
            $mail->Host       = 'ssl://smtp.mail.ru';  // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = $from;                     // SMTP username
            $mail->Password   = $password;                               // SMTP password
            $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
            $mail->SMTPAutoTLS = false;                                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = 465; //587 or 465            // TCP port to connect to
            $mail->SMTPKeepAlive = true;   
            $mail->Mailer = "smtp"; // don't change the quotes!
           
            //Recipients
            $mail->setFrom($from,'gridgroup.cc');
            $mail->addAddress($emailTo);               // Name is optional
            $mail->addReplyTo($from);
        
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            if( $image !=''){
              //  $mail->addEmbeddedImage("assets/images/$image.png",$image);
            }
            
            $mail->Subject = $subject;
            $mail->Body    = $body;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
           // echo 'Message has been sent';
        } catch (Exception $e) {
            echo " Mailer Error: {$mail->ErrorInfo}";
            return false;
            //exit;
        }
        //exit;
        return true;
    }


    public static function mailnew($emailTo,$subject,$body )
    {
        echo ' mailnew ';
        //(u_935nYMDH#
        //////////////////////////////////////////////////////
        try {
            $fromMail = $GLOBALS['env']['email'];
            $fromName = 'gridgroup.cc';
            $subject = '=?utf-8?b?'. base64_encode($subject) .'?=';
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= "Content-type: text/html; charset=\"utf-8\"\r\n";
            $headers .= "From: ". $fromName ." <". $fromMail ."> \r\n";        
            $body = '<html>'.$body.'</html>';
            if(mail($emailTo, $subject, $body, $headers, '-f'. $fromMail )){
                 //echo "message send";
                 return true;
            }
            else{ 
                echo "message not send";
                return false;
            }
        } catch (Exception $e) {
            echo " Mail error: {$mail->ErrorInfo}";
            return false;
        }
        return true;
    }
    

}