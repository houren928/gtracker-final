<?php 
include_once "include/config.php"; // Always include the database oconnection before accessing the database
include_once "include/m-session.php";
?>

<?php
// The submit button in the form is clicked and the data is passed to this form
if(isset($_POST)){
    $title = $_POST["title"];
    $description = $_POST["description"];
    $ap_specific = $_POST["ap_specific"];
    $measurable = $_POST["measurable"];
    $achievable = $_POST["achievable"];
    $realistic = $_POST["realistic"];
    $starting_date = $_POST["starting_date"];
    $target_completion_date = $_POST["target_completion_date"];


    try{
        // $getMenteeId = "SELECT * FROM `mentee` WHERE user_id = 2;";
        // $tempResult = mysqli_query($conn, $sql);
        // $row = mysqli_fetch_assoc($tempResult);
        // $menteeId = $row["mentee_id"];

        $sql = "INSERT INTO goal(goal_title,goal_description,goal_specific,goal_measurable,goal_achievable,goal_realistic,goal_start_date, goal_completion_date, mentee_id) VALUES ('$title','$description','$ap_specific','$measurable','$achievable','$realistic','$starting_date','$target_completion_date','$roleID')";
        $result = mysqli_query($conn,$sql);
        // $sql2 = "SELECT * FROM `goal`";
        // // mysqli_close($conn);

        // // include_once "include/config.php"; // Always include the database oconnection before accessing the database
        // $goal -> mysqli_query($conn,$sql2);
        // $goal_id = mysqli_field_count($conn);
        $goal_id = $conn -> insert_id;
        mysqli_close($conn);

        header("Location:check-goal-progress.php?goal-id=$goal_id&page-id=aap");
        // header("Location:ap-action-plan.php?goal-id=$goal_id");
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