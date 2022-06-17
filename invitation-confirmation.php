<?php include_once "include/config.php";?>
<?php include_once "include/m-session.php"; // To track the user that send out the invitation?>

<?php 
// 0 = reject, 1 = accept
$response = $_GET['response'];
// Decode the email to verify the traget mentor's email
$email_decoded = base64_decode(strtr($_GET['user'], '-_', '+/'));
// Get the id of current mentee user
$menteeID = $_SESSION['menteeID'];
// Get the email of current mentee so that we can send notification to mentee whether target mentor accpet / reject invitation
$menteeEmail = $conn -> query("SELECT user_email 
                               FROM user 
                               WHERE user_id=(SELECT user_id 
                                              FROM mentee 
                                              WHERE mentee_id=$menteeID)") ->fetch_assoc()['user_email'];
// Format of an email
$subject = "Response from Your Target Mentor";
$headers = "From: " . strip_tags($email_decoded) . "\r\n";
$headers .= "Reply-To: ". strip_tags($menteeEmail) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; // So that we can integrate with HTML element while sending email
$message = '<html><body>';
$message .= '<h4>This response is sent by '.$email_decoded.'</h4><br>';
// The target mentor accept the invitation
if($response == 1){
    //Check whether the email exists in the user table and is mentor type user
    $isMentorExists = $conn -> query("SELECT * FROM user WHERE user_email='$email_decoded' AND user_type='mentor'");
    if(mysqli_num_rows($isMentorExists) == 0){
        // The target mentor does not exists in the database (she/he does not register as a mentor before)
        header("Location: register-signup.php?type=mentor&response=1&mid=".$_SESSION['menteeID']);
    }
    else{
        try{
            // Define a prepared statement to be created
            $sql = "UPDATE mentee SET mentor_id = (SELECT mentor_id FROM mentor WHERE user_id=(SELECT user_id FROM user WHERE user_type='mentor' AND user_email='$email_decoded')) WHERE mentee_id=$menteeID";
            $result = $conn -> query($sql);
            $message .= '<p>I have accepted your invitation. Looking forward to your achievements!</p><br>';
            mail($menteeEmail,$subject,$message,$headers);
            sleep(3);
            header('Location: http://www.google.com/');
        }catch(Exception $e){
            die($e -> getMessage());
        }
    }
}
else{
    $message .= '<p>I\'m sorry that I would not accept your invitation to be your mentor.</p><br>';
    mail($menteeEmail,$subject,$message,$headers);
    sleep(3);
    header('Location: http://www.google.com/');
}
$message .= '</body></html>';
// Finally, send the response back to the current mentee
exit;
?>