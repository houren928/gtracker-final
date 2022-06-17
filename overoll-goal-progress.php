<?php
include_once "include/config.php"; // Always include the database oconnection before accessing the database
include_once "include/m-session.php";
?>

<?php

$monthTotalGoalCount = array(0,0,0,0,0,0,0,0,0,0,0,0);
$monthPendingGoalCount = array(0,0,0,0,0,0,0,0,0,0,0,0);
$monthCompletedGoalCount = array(0,0,0,0,0,0,0,0,0,0,0,0);
try {
    $sql = "SELECT * FROM `goal` WHERE mentee_id = $roleID";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        // $date =  date_create($row['goal_completion_date']);
        $date = date_create($row['goal_completion_date']);
        $month =(intval(date_format($date, "m"))-1);
        $monthTotalGoalCount[$month] = ($monthTotalGoalCount[$month] + 1);
        if ($row['goal_completion_flag'] == 1) {
            $monthCompletedGoalCount[$month] = ($monthCompletedGoalCount[$month] + 1);
        } else {
            $monthPendingGoalCount[$month] = ($monthPendingGoalCount[$month] + 1);
        }
        // print_r($monthTotalGoalCount);
        // print_r($monthCompletedGoalCount);
        // print_r($monthPendingGoalCount);
    }

$monthTotalGoalCountArray = json_encode($monthTotalGoalCount);
$monthPendingGoalCountArray = json_encode($monthPendingGoalCount);
$monthCompletedGoalCountArray = json_encode($monthCompletedGoalCount);
// echo json_encode($age);
// $js_array = json_encode($monthTotalGoalCount);
// echo "var javascript_array = ". $js_array . ";\n";

} catch (mysqli_sql_exception $e) {
    die($e->getMessage());
}

?>
