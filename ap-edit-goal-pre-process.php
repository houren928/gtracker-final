<?php
include_once "include/config.php"; // Always include the database oconnection before accessing the database
?>

<?php
// The submit button in the form is clicked and the data is passed to this form
try {
    $goalID = $_GET['goal-id'];
    $sql = "SELECT * FROM `goal` WHERE goal_id = $goalID;";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) { 
        echo '<div class="mb-3"><input class="form-control" type="text" name="ap-title" placeholder="Goal Title" value="';
        echo $row['goal_title'];
        echo '"></div>';
        echo '<div class="mb-3"><textarea class="form-control" name="ap-description" placeholder="Goal Description" rows="14">';
        echo $row['goal_description'];
        echo '</textarea></div>';
        echo '<h5 class="fw-bold">SMART Field</h5>';
        echo '<fieldset style="margin-bottom: .5rem;"><input class="form-control" type="text" placeholder="Specific" name="ap-specific" value="';
        echo $row['goal_specific'];
        echo '"><label class="form-label fw-normal text-black-50" for="specific" style="--bs-body-font-size: 1rem;font-size: 12px;">Specific: Well defined, clear, and unambiguous<br></label></fieldset>';
        echo '<fieldset style="margin-bottom: .5rem;"><input class="form-control" type="text" placeholder="Measurable" name="ap-measurable" value="';
        echo $row['goal_measurable'];
        echo '"><label class="form-label fw-normal text-black-50" for="specific" style="font-size: 12px;">Measurable: With specific criteria that measure your progress toward the accomplishment of the goal<br></label></fieldset>';
        echo '<fieldset style="margin-bottom: .5rem;"><input class="form-control" type="text" placeholder="Achievable" name="ap-achievable" value="';
        echo $row['goal_achievable'];
        echo '"><label class="form-label fw-normal text-black-50" for="specific" style="font-size: 12px;">Achievable: Attainable and not impossible to achieve<br></label></fieldset>';
        echo '<fieldset style="margin-bottom: .5rem;"><input class="form-control" type="text" placeholder="Realistic" name="ap-realistic" value="';
        echo $row['goal_realistic'];
        echo '"><label class="form-label fw-normal text-black-50" for="specific" style="font-size: 12px;">Realistic: Within reach, realistic, and relevant to your life purpose<br></label>';
        echo '<div class="container" style="padding: 0px;">';
        echo '<div class="row">';
        echo '<div class="col-md-6"><label class="form-label" style="font-size: 13px;">Starting Date</label><input class="form-control" type="date" name="ap-start-date" value="';
        echo $row['goal_start_date'];
        echo '"></div>';
        echo '<div class="col-md-6"><label class="form-label" style="font-size: 13px;">Target Completion Date</label><input class="form-control" type="date" name = "ap-completion-date" value="';
        echo $row['goal_completion_date'];
        echo '"></div>';
        echo '</div>';
        echo '</div>';
        echo '</fieldset><label class="form-label fw-normal text-black-50" for="specific" style="font-size: 12px;">Timely: With a clearly defined timeline, including a starting date and a target date. The purpose is to create urgency.<br></label>';
        echo '<div class="mb-3"><input class="form-control" type="text" name="ap-goal-id" placeholder="Activity Name" hidden value="';
        echo $row['goal_id'];
        echo '"></div>';
        echo '<div class="mb-3"><button class="btn btn-primary" type="submit" 
        href="goal-progress.php?goal-id=';
        echo $goalID;
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