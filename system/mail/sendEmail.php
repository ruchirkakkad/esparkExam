<?php

function sendEmail($email,$subject, $message)
{
    
        $mail = null;
        $mail = new PHPMailer(true);
        $mail->IsSMTP();
        try
        {
            $mail->Host = "mail.eworkdemo.com"; // SMTP server
            $mail->SMTPDebug = 0;                     // enables SMTP debug information (for testing)
            $mail->SMTPAuth = true;                  // enable SMTP authentication
            // sets the SMTP server
            $mail->Port = 2525;                    // set the SMTP port for the GMAIL server
            $mail->Username = "noreply@eworkdemo.com"; // SMTP account username
            $mail->Password = "1NSuZrEGNvWd";        // SMTP account password
            $mail->AddAddress($email);            

            $mail->SetFrom('noreply@eworkdemo.com', 'Converge Coach');
            $mail->Subject = $subject;
//                $mail->AddEmbeddedImage('uploads/'.$res['user_img'], 'prf');
//                                <img height='100' width='100' style='border 5px solid gray;' src='cid:prf' alt='' />
            $mail->MsgHTML($message);
            $mail->Send();
            
        }
        catch (Eception $e)
        {
            echo $e;
        }
        $mail->ClearAllRecipients();
}
?>