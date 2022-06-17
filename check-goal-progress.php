<?php
include_once "include/config.php"; // Always include the database oconnection before accessing the database
include_once "include/m-session.php";
?>

<?php
// The submit button in the form is clicked and the data is passed to this form
try {
    $goalID = $_GET['goal-id'];
    $pageID = $_GET['page-id'];
    $sql = "SELECT * FROM `activity`
    WHERE goal_id = '$goalID'
    ;";
    $result = mysqli_query($conn, $sql);
    $totalCount = 0;
    $completedCount = 0;

    while ($row = mysqli_fetch_array($result)) {
        if ($row['activity_completion_flag'] == 1) {
            $completedCount += 1;
        }
        $totalCount += 1;
    }

    if ($totalCount == 0) {
        $totalProgress = 0;
    } else {
        $totalProgress = intval(($completedCount / $totalCount) * 100);
    }

    $goalCompletionFlag = 0;
    if ($totalProgress == 100) {
        $goalCompletionFlag = 1;
    }
    echo $totalCount;
    echo $completedCount;
    echo $totalProgress;
    echo $goalCompletionFlag;

    $sql2 = "UPDATE `goal` SET goal_progress = '$totalProgress', goal_completion_flag = '$goalCompletionFlag' WHERE goal_id = '$goalID';";
    $result = mysqli_query($conn, $sql2);
    mysqli_close($conn);

    if ($pageID == 'aanap') {
        header("Location:ap-action-plan.php?goal-id=$goalID");
    } elseif ($pageID == 'aap') {
        header("Location:ap-action-plan.php?goal-id=$goalID");
    }
} catch (mysqli_sql_exception $e) {
    die($e->getMessage());
}
