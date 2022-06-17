<?php 
include_once "include/config.php"; // Always include the database oconnection before accessing the database
include_once "include/m-session.php";
?>

<?php
// The submit button in the form is clicked and the data is passed to this form

if(isset($_POST)){
    $goalID = $_POST['ap-goal-id'];
    $activityID = $_POST['ap-activity-id'];
    $date = $_POST["ap-reminder-date"];
    $time = $_POST["ap-reminder-time"];
    $notes = $_POST["ap-reminder-notes"];

    try{
        $sql = "INSERT INTO `alert`(`alert_date`, `alert_time`, `alert_notes`, `activity_id`, `mentee_id`) VALUES ('$date','$time','$notes','$activityID','$roleID')";
        $result = mysqli_query($conn,$sql);
        mysqli_close($conn);
        header("Location:ap-action-plan-slider.php?goal-id=$goalID&&activity-id=$activityID");
        
        }catch(mysqli_sql_exception $e){
            die($e -> getMessage());
    }
    // Check whether the email exists in the database before signing up the new mentor / mentee
    // If the email exists in the mentor / mentee table, we should avoid two user using the same email to resgiter
    
    // try{
    //         // Define a prepared statement to be created
    //         $preparedstmt = "INSERT INTO goal(goal_title,goal_description,goal_specific,goal_measurable,goal_achievable,goal_realistic,goal_start_date, goal_completion_date) VALUES ('$title','$description','$ap_specific','$measurable','$achievable','$realistic','$starting_date','$target_completion_date')";
    //         // Allows the database to prepare the prepared statement
    //         $stmt = $conn -> prepare($preparedstmt);
    //         // Bind the values input by the user with the bound parameter(?) in the prepared statement
    //         $stmt -> bind_param("ssssssss",$title,$description,$ap_specific,$measurable,$achievable,$realistic,$starting_date,$target_completion_date);
    //         // Execute the complete query after binding the value
    //         $stmt -> execute();
    //         // Close the statement after completing the query execution
    //         $stmt -> close();
    //         // Close the database after query execution
    //         $conn -> close();
    //         header("Location:ap-new-goal.php?type=1&success=goalAddedSuccessfully");
    //     }catch(Exception $e){
    //         die($e -> getMessage());
    //     }
}
?>