<?php
include_once "include/config.php"; // Always include the database oconnection before accessing the database
include_once "include/m-session.php"
?>

<?php
try {
    $goalID = $_GET['goal-id'];
    // $activityID = $_GET['activity-id'];
    // $sql = "SELECT * FROM `activity` WHERE goal_id = $goalID AND activity_id = $activityID;";

    $sql = "SELECT activity_id FROM activity WHERE goal_id = $goalID";
    $result = mysqli_query($conn, $sql);
    // $row = mysqli_fetch_array($result);
    while ($row = mysqli_fetch_array($result)) {
        $activityID = $row['activity_id'];
        $sql3 = "SELECT * FROM alert WHERE activity_id = $activityID";
        $result3 = mysqli_query($conn, $sql3);
        // $row = mysqli_fetch_array($result);
        while ($row = mysqli_fetch_array($result3)) {
            $alertID = $row['alert_id'];
            $sql4 = "DELETE FROM alert WHERE alert_id = $alertID;";
            $result4 = mysqli_query($conn, $sql4);
        };
        $sql2 = "DELETE FROM activity WHERE activity_id = $activityID;";
        $result2 = mysqli_query($conn, $sql2);
    };

    $sql = "DELETE FROM goal WHERE goal_id ='$goalID';";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("Location:dashboard.php");

    mysqli_close($conn);
} catch (mysqli_sql_exception $e) {
    die($e->getMessage());
}

?>