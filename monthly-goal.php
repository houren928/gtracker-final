<!-- Display the "view-only" goal list of a mentee for a mentor when a mentor click a mentee in mentee list -->
<?php
$monthlyGoalCount = 0;
$monthlyGoalPendingCount = 0;

if ($menteeGoals != null) {
        // Loop through each goal set by the mentee ("Viewed" by the mentor only)
        foreach ($menteeGoals as $goal) :
                $to_month = date('n', strtotime($goal['goal_completion_date']));
                $to_year = date('Y', strtotime($goal['goal_completion_date']));
                $current_month = date('n');
                $current_year = date('Y');
                if ((int)$to_month - (int)$current_month == 0 && (int)$to_year - (int)$current_year == 0) {
                        // The goal set is within the current date's month (It's a monthly goal)
                        $monthlyGoalCount += 1;
                        if ($goal['goal_completion_flag'] == 0 || $goal['goal_completion_flag'] == null) {
                                $monthlyGoalPendingCount += 1;
                        }
                        if ($_SERVER['SCRIPT_NAME'] == "/Project/gtracker-mentor-1.0/goals.php") {
                                echo '<tr class=\'clickable-row\' data-href="';
                                echo 'ap-action-plan.php?goal-id=';
                                echo $goal['goal_id']; //Change with targeted goal
                                echo '">';
                                echo '<td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar2.jpeg">';
                                echo $goal["goal_title"];
                                echo '</td>';
                                echo '<td>';
                                echo $goal["goal_start_date"];
                                echo '</td>';
                                echo '<td>';
                                echo $goal["goal_completion_date"];
                                echo '</td>';
                                if ($goal["goal_completion_flag"] == 1) {
                                        echo '<td><span class="badge bg-success">Done</span></td>';
                                        echo '<td>';
                                        echo '<div class="progress">';
                                        echo '<div class="progress-bar progress-bar-striped progress-bar-animated bg-success" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: ';
                                        echo $goal["goal_progress"];
                                        echo '%;">';
                                        echo $goal["goal_progress"];
                                        echo '%</div>';
                                } elseif ($goal["goal_progress"] == 0) {
                                        echo '<td><span class="badge bg-info">New</span></td>';
                                        echo '<td>';
                                        echo '<div class="progress">';
                                        echo '<div class="progress-bar progress-bar-striped progress-bar-animated bg-info" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: ';
                                        echo '100';
                                        echo '%;">';
                                        echo '0';
                                        echo '%</div>';
                                } else {
                                        echo '<td><span class="badge bg-warning">Pending</span></td>';
                                        echo '<td>';
                                        // echo '<div class="row">';
                                        echo '<div class="progress">';
                                        echo '<div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: ';
                                        echo $goal["goal_progress"];
                                        echo '%;">';
                                        echo $goal["goal_progress"];
                                        echo '%</div>';
                                }

                                echo '</div>';
                                // echo '</div>';
                                echo '</td>';
                                echo '</tr>';
                        }
                }
        endforeach;
}
$monthlyGoalCompletedCount = $monthlyGoalCount - $monthlyGoalPendingCount;
if ($_SERVER['SCRIPT_NAME'] != "/Project/gtracker-mentor-1.0/goals.php"){
echo $monthlyGoalCount;}
?>