<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../vendor/autoload.php';
class mail {
    private $mailTo;
    private $subject;
    private $body;

    public function __construct($mailTo,$subject,$body) {
        $this->mailTo = $mailTo;
        $this->subject = $subject;
        $this->body = $body;
    }
    public function send() :bool
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
            $mail->SMTPAuth   =  true;                                   //Enable SMTP authentication
            $mail->Username   = 'sa3doni2714@gmail.com';                //SMTP username
            $mail->Password   = 'btrtslevykfgkfgt';                         //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
// SMTP configuration
            // $mail->isSMTP();
            // $mail->Host= 'smtp-relay.sendinblue.com';
            // $mail->Username="examzoneservice@gmail.com";
            // $mail->Password = 'XDvA972TFOcM86sz';
            // $mail->SMTPAuth = true;
            // $mail->SMTPSecure = 'tls';
            // $mail->Port = 587;
            // //Recipients
            $mail->setFrom('sa3doni2714@gmail.com', 'SVU Housing System');
            $mail->addAddress($this->mailTo);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $this->subject;
            $mail->Body    = $this->body;

            $mail->send();
            return true;
        } catch (Exception $e) {
            // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
    }
}

