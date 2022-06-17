<?php
include_once "include/config.php"; // Always include the database oconnection before accessing the database
include_once "include/m-session.php"
?>

<?php

try {
    $goalID = $_GET['goal-id'];
    $activityID = $_GET['activity-id'];
    // $sql = "SELECT * FROM `activity` WHERE goal_id = $goalID AND activity_id = $activityID;";
    $sql = "UPDATE `activity`
    SET activity_completion_flag = 1
    WHERE activity_id = $activityID;";
    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);
    header("Location:check-goal-progress.php?goal-id=$goalID&page-id=aap");
    // header("Location:ap-action-plan.php?goal-id=$goalID");

    mysqli_close($conn);
} catch (mysqli_sql_exception $e) {
    die($e->getMessage());
}

?>