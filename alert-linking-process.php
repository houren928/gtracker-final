<?php
include_once "include/config.php"; // Always include the database oconnection before accessing the database
include_once "include/m-session.php"
?>

<?php
try {
    $goalID = $_GET['goal-id'];
    $activityID = $_GET['activity-id'];
    $alertID = $_GET['alert-id'];

    $sql = "DELETE FROM `alert` WHERE alert_id = '$alertID';";
    $result = mysqli_query($conn, $sql);
    header("Location:ap-action-plan-slider.php?goal-id=$goalID&&activity-id=$activityID");
    mysqli_close($conn);
} catch (mysqli_sql_exception $e) {
    die($e->getMessage());
}
?>
<html>

</html>