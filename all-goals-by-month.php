<!-- Display the "view-only" goal list of a mentee for a mentor when a mentor click a mentee in mentee list -->
<?php
$allGoalsPendingCount = 0;
// $monthTotalGoalCount = array();
// $monthPendingGoalCount = array();
// $monthCompletedGoalCount = array();

if ($menteeGoals != null) {
        // Loop through each goal set by the mentee ("Viewed" by the mentor only)
        foreach ($menteeGoals as $goal) :
                $to_month = date('n', strtotime($goal['goal_completion_date']));
                $to_year = date('Y', strtotime($goal['goal_completion_date']));
                $current_month = date('n');
                $current_year = date('Y');
                $allGoalCount +=1;
                if ((int)$to_month - (int)$current_month == 0 && (int)$to_year - (int)$current_year != 0) {
                        // The goal set is not within the current date's month (It's not a monthly goal) 
                }
                if($goal['goal_completion_flag'] == 0 || $goal['goal_completion_flag'] == null){
                        $allGoalsPendingCount +=1;
                }
        endforeach;
}
$allGoalsCompletedCount = $allGoalCount - $allGoalsPendingCount;
echo $allGoalCount;
?>