<?php 
include_once "include/config.php"; // Always include the database oconnection before accessing the database
?>

<?php
// The submit button in the form is clicked and the data is passed to this form
if(isset($_POST['signUpBtn'])){
    $type = $_GET['type'];
    $email = $_POST["email"];
    $password = $_POST["password"];
    // If the mentor button is clicked in the index.php, we need to process the data to mentor
    try{
        $sql = "SELECT * FROM user WHERE user_email='$email' AND user_type='$type'";
        $result = mysqli_query($conn,$sql);
        }catch(mysqli_sql_exception $e){
            die($e -> getMessage());
    }
    // Check whether the email exists in the database before signing up the new mentor / mentee
    // If the email exists in the mentor / mentee table, we should avoid two user using the same email to resgiter
    if(mysqli_num_rows($result) == 1){
        header("Location:register-signup.php?type=$type&error=emailalreadyexists");
    }
    // If there is no any result found in the database, we should register this new member
    else if(mysqli_num_rows($result) == 0){
        try{
            // Hashed the password before storing the user's password
            $hashPass = password_hash($password, PASSWORD_DEFAULT);
            // Define a prepared statement to be created
            $preparedstmt = "INSERT INTO user(user_email,user_password, user_type) VALUES(?,?,?)";
            // Allows the database to prepare the prepared statement
            $stmt = $conn -> prepare($preparedstmt);
            // Bind the values input by the user with the bound parameter(?) in the prepared statement
            $stmt -> bind_param("sss",$email,$hashPass,$type);
            // Execute the complete query after binding the value
            $status = $stmt -> execute(); // True if successful
            if($status){
                // Close the statement after completing the query execution
                $stmt -> close();
                 // We need to get the last user_id inserted just now
                 $userID = $conn -> insert_id;
                try{
                    $query = "INSERT INTO $type(user_id) VALUES($userID)";
                    $conn -> query($query);
                }catch(Exception $e){
                    die($e -> getMessage());
                }
                // The person registering successfully is the one that accept the mentee invitation just now
                if(isset($_GET['response']) && isset($_GET['mid'])){
                    $menteeID = $_GET['mid'];
                    // Get the email of the mentee that send invitation
                    $menteeEmail = $conn -> query("SELECT user_email 
                                                   FROM user 
                                                   WHERE user_id=(SELECT user_id 
                                                                  FROM mentee 
                                                                  WHERE mentee_id=$menteeID)") ->fetch_assoc()['user_email'];
                    $sql = "UPDATE mentee SET mentor_id = (SELECT mentor_id FROM mentor WHERE user_id=$userID) WHERE mentee_id=$menteeID";
                    $result = $conn -> query($sql);
                    // Format of an email
                    $subject = "Response from Your Target Mentor";
                    $headers = "From: " . strip_tags($email) . "\r\n";
                    $headers .= "Reply-To: ". strip_tags($menteeEmail) . "\r\n";
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; // So that we can integrate with HTML element while sending email
                    $message = '<html><body>';
                    $message .= '<h4>This response is sent by '.$email.'</h4><br>';
                    $message .= '<p>I have accepted your invitation. Looking forward to your achievements!</p><br>';
                    $message .= '</body></html>';
                    // Finally, send the response back to the current mentee
                    mail($menteeEmail,$subject,$message,$headers);
                }
            }
            // Close the database after query execution
            $conn -> close();
            header("Location:register-login.php?type=$type&success=registersuccessfully");
        }catch(Exception $e){
            die($e -> getMessage());
        }
    }
}