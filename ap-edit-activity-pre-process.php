<?php
include_once "include/config.php"; // Always include the database oconnection before accessing the database
?>

<?php
// The submit button in the form is clicked and the data is passed to this form
try {
    $activityID = $_GET['activity-id'];
    $goalID = $_GET['goal-id'];
    $sql = "SELECT * FROM `activity` WHERE activity_id = $activityID;";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
        echo '<div class="mb-3"><input class="form-control" type="text" name="ap-activity-name" placeholder="Activity Name" value="';
        echo $row['activity_name'];
        echo '"></div>';
        echo '<div class="mb-3"><textarea class="form-control" name="ap-activity-description" placeholder="Activity Description" rows="14">';
        echo $row['activity_description'];
        echo '</textarea></div>';
        echo '<fieldset style="margin-bottom: .5rem;"><label class="form-label" style="font-size: 13px;">Target Completion Date</label><input class="form-control" type="date" name = "ap-activity-date" value="';
        echo $row['activity_completion_date'];
        echo '"></fieldset>';
        echo '<fieldset style="margin-bottom: .5rem;"><label class="form-label" style="font-size: 13px;">Time</label><input class="form-control" type="time" name = "ap-activity-time" value="';
        echo $row['activity_time'];
        echo '"></fieldset>';
        echo '<fieldset style="margin-bottom: .5rem;"><label class="form-label" style="font-size: 13px;">Location</label><input class="form-control" type="text" name = "ap-activity-location"  value="';
        echo $row['activity_location'];
        echo '"></fieldset>';
        echo '<div class="mb-3"><input class="form-control" type="text" name="ap-activity-id" placeholder="Activity Name" hidden value="';
        echo $row['activity_id'];
        echo '"></div>';
        echo '<div class="mb-3"><input class="form-control" type="text" name="ap-goal-id" placeholder="Activity Name" hidden value="';
        echo $row['goal_id'];
        echo '"></div>';
        echo '<div class="mb-3"><button class="btn btn-primary" type="submit" href="ap-action-plan-slider.php?goal-id=';
        echo $goalID;
        echo '&activity-id=';
        echo $activityID;
        echo'">save changes</button></div>';
        }
    

    // mysqli_close($conn);
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

?>