<?php include_once "include/config.php"; ?>
<?php include_once "include/m-session.php"; ?>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
// Data passed from ajax's data parameter
$mail_to = $_POST['email'];
$mail_content = $_POST['message'];
// Retrieve the email of the current mentee user of this website
$menteeID = $_SESSION['menteeID'];
// We need to check whether the person accept / reject the mentee's invitation
$mail_to = filter_var($mail_to, FILTER_SANITIZE_EMAIL); // Remove all the illegal expressions from the email address
$mail_to = filter_var($mail_to, FILTER_VALIDATE_EMAIL); // Return empty string if the email is invalid
if ($mail_to) {
    try {
        // Check whether the mentee has mentor (One mentee can only have one mentor)
        $haveMentor = $conn->query("SELECT mentor_id FROM mentee WHERE mentee_id=$menteeID")->fetch_assoc()['mentor_id'];
        if ($haveMentor == NULL) {
            $menteeEmail = $conn->query("SELECT user_email 
                                       FROM user 
                                       WHERE user_id=(SELECT user_id 
                                                      FROM mentee 
                                                      WHERE mentee_id=$menteeID)")->fetch_assoc()['user_email'];
            $output='<p>Dear '.$mail_to.'</p>';
            $output.='<p>This is an invitation email sent by '.$menteeEmail.'</p>';
            $output.='<p>-------------------------------------------------------------</p>';
            $output.='<p>'.$mail_content.'</p>';
            $output.='<p>-------------------------------------------------------------</p>';
            // Encode the email and passed to the URL when the user click the accept / reject link
            $email_encoded = rtrim(strtr(base64_encode($mail_to), '+/', '-_'), '=');
            $output .= '<a href="http://localhost/project/gtracker-mentor-1.0/invitation-confirmation.php?response=1&user='.$email_encoded.'">Accept</a>&emsp;<a href="http://localhost/project/gtracker-mentor-1.0/invitation-confirmation.php?response=0&user='.$email_encoded.'">Reject</a>';
            $output.='<p>Thanks,</p>';
            $output.='<p>GoulMou Team</p>';
            $body = $output; 
            $subject = "Invitation to be My Mentor - GoulMou.com";
            $fromserver = "noreply@GoalTracker.com";
            //  require_once "vendor/phpmailer/phpmailer/src/PHPMailer.php";
            //  require_once "PHPMailer/SMTP.php";
            //  require_once "PHPMailer/Exception.php";
            $mail = new PHPMailer();
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com"; // Enter your host here
            $mail->SMTPAuth = true;
            $mail->Username = "nickholes0928@gmail.com"; // Enter your email here
            $mail->Password = "rnjokffdrhftefsr"; //Enter your password here
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = 587;
            $mail->IsHTML(true);
            $mail->From = "noreply@yourwebsite.com";
            $mail->FromName = "GoulMou";
            $mail->Sender = $fromserver; // indicates ReturnPath header
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AddAddress($mail_to);
            if (!$mail->Send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                echo "The invitation email has been sent to your target mentor!";
            }
        }
        // // Format of an email
        // $subject = "Invitation to Be My Mentor";
        // $headers = "From: " . strip_tags($menteeEmail) . "\r\n";
        // $headers .= "Reply-To: ". strip_tags($menteeEmail) . "\r\n";
        // $headers .= "MIME-Version: 1.0\r\n";
        // $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; // So that we can integrate with HTML element while sending email
        // $message = '<html><body>';
        // $message .= '<h4>This email is sent by '.$menteeEmail.'</h4><br>';
        // $message .= '<p>'.$mail_content.'</p><br>';
        // // Encode the email and passed to the URL when the user click the accept / reject link
        // $email_encoded = rtrim(strtr(base64_encode($mail_to), '+/', '-_'), '=');
        // $message .= '<a href="http://localhost/gtracker_latest/invitation-confirmation.php?response=1&user='.$email_encoded.'">Accept</a>&emsp;<a href="http://localhost/gtracker_latest/invitation-confirmation.php?response=0&user='.$email_encoded.'">Reject</a>';
        // $message .= '</body></html>';
        // $result = mail($mail_to,$subject,$message,$headers);
        // if($result){
        //     echo "Your invitation is sent to ".$mail_to." successfully!";
        // }
        // else{
        //     echo "Invitation cannot be sent. Please try again later";
        // }
        else {
            echo "Send invitation failed. You already have one mentor!";
        }
    } catch (Exception $e) {
        die($e->getMessage());
    }
} else {
    echo "Send invitation fails. Please provide a valid email address!";
}

?>