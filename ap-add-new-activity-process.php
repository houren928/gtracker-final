<?php
include_once "include/config.php"; // Always include the database oconnection before accessing the database
include_once "include/m-session.php";
?>

<?php
// The submit button in the form is clicked and the data is passed to this form

if (isset($_POST)) {
    $goalID = $_POST['ap-goal-id'];
    $name = $_POST["ap-activity-name"];
    $description = $_POST["ap-activity-description"];
    $date = $_POST["ap-activity-date"];
    $time = $_POST["ap-activity-time"];
    $location = $_POST["ap-activity-location"];

    try {
        $menteeID = $_SESSION['menteeID'];
        $sql = "INSERT INTO activity(activity_name,activity_description,activity_completion_date,activity_time,activity_location,mentee_id,goal_id) VALUES ('$name','$description','$date','$time','$location',$menteeID,'$goalID')";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        header("Location:check-goal-progress.php?goal-id=$goalID&page-id=aanap");
        // header("Location:ap-action-plan.php?goal-id=$goalID");
    } catch (mysqli_sql_exception $e) {
        die($e->getMessage());
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