<?php include_once "include/config.php"; // Always include the database oconnection before accessing the database?>

<?php
use PHPMailer\PHPMailer\PHPMailer;

//Load Composer's autoloader
require 'vendor/autoload.php';

if(isset($_POST["email"]) && (!empty($_POST["email"]))){
$email = $_POST["email"];
$usertype = $_GET['type'];

$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email) {
        echo "Invalid email address please type a valid email address!";
   }else{
   $sql = "SELECT * FROM `user` WHERE user_email='$email' AND user_type='$usertype'";
   $result = mysqli_query($conn,$sql);
   if (mysqli_num_rows($result) == 0){
        echo "No ".$usertype." is registered with this email address!";
   }
   else{
    $expFormat = mktime(
        date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
        );
        $expDate = date("Y-m-d H:i:s",$expFormat);
        $key = md5(strval(2418*2).$email);
        $addKey = substr(md5(uniqid(rand(),1)),3,10);
        $key = $key . $addKey;
     // Insert Temp Table
     $conn -> query("INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`, `user_type`) 
                     VALUES ('".$email."', '".$key."', '".$expDate."', '".$usertype."');");
     $output='<p>Dear user,</p>';
     $output.='<p>Please click on the following link to reset your password.</p>';
     $output.='<p>-------------------------------------------------------------</p>';
     $output.='<p><a href="http://localhost/project/gtracker-final/error-change-password.php?key='.$key.'&type='.$usertype.'&email='.$email.'&action=reset" target="_blank">Set Your New Password</a></p>';		
     $output.='<p>-------------------------------------------------------------</p>';
     $output.='<p>Please be sure to copy the entire link into your browser.
     The link will expire after 1 day for security reason.</p>';
     $output.='<p>If you did not request this forgotten password email, no action 
     is needed, your password will not be reset. However, you may want to log into 
     your account and change your security password as someone may have guessed it.</p>';   	
     $output.='<p>Thanks,</p>';
     $output.='<p>GTracker Team</p>';
     $body = $output; 
     $subject = "Password Recovery - GTracker.com";
     $fromserver = "noreply@GoalTracker.com"; 
     $mail = new PHPMailer();
     // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
     // $mail->isSMTP();
     $mail->Host = "smtp.gmail.com"; // Enter your host here
     $mail->SMTPAuth = true;
     $mail->Username = "nickholes0928@gmail.com"; // Enter your email here
     $mail->Password = "rnjokffdrhftefsr"; //Enter your password here
     $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
     $mail->Port = 465;
     $mail->IsHTML(true);
     $mail->From = "noreply@yourwebsite.com";
     $mail->FromName = "GTracker";
     $mail->Sender = $fromserver; // indicates ReturnPath header
     $mail->Subject = $subject;
     $mail->Body = $body;
     $mail->AddAddress($email);
     if(!$mail->Send()){
     echo "Mailer Error: " . $mail->ErrorInfo;
     }else{
     echo "An email has been sent to you with instructions on how to reset your password.";
     // include_once "link-back-index.php";
         }
   }
  }
}
else{
     echo "Please provide your email!";
}
?>