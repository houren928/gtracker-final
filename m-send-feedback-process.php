<?php include_once "include/config.php";?>
<?php include_once "include/m-session.php";?>

<?php
    // The submit button in the form is clicked and the data is passed to this form
    $mentorID = $_SESSION['mentorID'];
    $menteeID = $_GET['mid'];
    $goalID = $_GET['gid'];
    $feedbackMsg = $_POST['message'];
    try{
        // Define a prepared statement to be created
        $preparedstmt = "INSERT INTO feedback(mentor_id,mentee_id,feedback_message,feedback_date, goal_id) VALUES (?,?,?,?,?)";
        // Allows the database to prepare the prepared statement
        $stmt = $conn -> prepare($preparedstmt);
        if($stmt){
            $dateFormat = 'Y-m-d'; // E.g., 2022-06-09
            $currentDate = date($dateFormat);
            // Bind the values input by the user with the bound parameter(?) in the prepared statement
            $stmt -> bind_param("iissi",$mentorID, $menteeID, $feedbackMsg, $currentDate, $goalID);
            // Execute the complete query after binding the value
            $result = $stmt -> execute();
            if($result){
                echo json_encode (["send" =>"Your feedback is sent successfully"]);
                // header("Location: m-goal-progress.php.?success=das");
            }
            else{
                echo json_encode(["send" => "Your feedback cannot be sent. Please try again later"]);
                // header("Location: m-goal-progress.php.?fail=error");
            }
        }
        // Close the statement after completing the query execution
        $stmt -> close();
        // Close the database after query execution
        $conn -> close();
        }catch(mysqli_sql_exception $e){
            die($e -> getMessage());
    }

?>