<?php 
include_once "include/config.php"; // Always include the database oconnection before accessing the database
?>
 
<?php
// The submit button in the form is clicked and the data is passed to this form
if(isset($_POST['loginBtn'])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    // If the mentor button is clicked in the index.php, we need to process the data to mentor
    $type = $_GET['type'];
    try{
        // Define a prepared statement to be created
        $preparedstmt = "SELECT * FROM user WHERE user_email=? AND user_type=?";
        // Allows the database to prepare the prepared statement
        $stmt = $conn -> prepare($preparedstmt);
        // Bind the values input by the user with the bound parameter(?) in the prepared statement
        $stmt -> bind_param("ss",$email, $type);
        // Execute the complete query after binding the value
        $stmt -> execute();
        //After completing execution, check whether there is an user with the entered email
        $result = mysqli_stmt_get_result($stmt);
        // The account does not exists
        if(mysqli_num_rows($result) == 0){
            header("Location:register-login.php?type=$type&error=accountdoesnotexist");
        // The account does exist
         }else{
             // Converts the result into associative array
             $fetch = $result -> fetch_assoc();
             // We need to dehash and verify whether the password entered is the same as the password stored
             $verifyPass = password_verify($password,$fetch['user_password']);
             if(!$verifyPass){
                 // If the password is incorrect, display error message
                 header("Location:register-login.php?type=$type&error=wrongpassword");
         }
         else{
             // The user exists and the password is correct, we start the unique session for this user
            session_start();
            $_SESSION['userID'] = $fetch['user_id'];
            $_SESSION['userType'] = $fetch['user_type'];
            if(isset($_SESSION['userType']) && !empty($_SESSION['userType'])){
                // We need to check whether the user type is set properly because the page displayed for mentor and mentee is different
                if($_SESSION['userType'] == 'mentor'){
                    $userID = $fetch['user_id'];
                    $result2 = $conn -> query("SELECT mentor_id FROM mentor WHERE user_id=$userID");
                    $_SESSION['mentorID'] = mysqli_fetch_assoc($result2)['mentor_id'];
                    header("Location:m-profileUpdate.php?success=loginsuccessfully");
                }
                if($_SESSION['userType'] == 'mentee'){
                    $userID = $fetch['user_id'];
                    $result2 = $conn -> query("SELECT mentee_id FROM mentee WHERE user_id=$userID");
                    $_SESSION['menteeID'] = mysqli_fetch_assoc($result2)['mentee_id'];
                    header("Location:dashboard.php?success=loginsuccessfully");
                }
            }
            else{
                // If the user unable to access even all the information entered is correct, display the error message
                header("Location:register-login.php?error=somethingwentwrong");
            }
         }
        }
        // Close the statement after completing the query execution
        $stmt -> close();
        // Close the database after query execution
        $conn -> close();
        }catch(mysqli_sql_exception $e){
            die($e -> getMessage());
    }
}