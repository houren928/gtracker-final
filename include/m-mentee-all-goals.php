<!-- Display the "view-only" goal list of a mentee for a mentor when a mentor click a mentee in mentee list -->
<?php 
    if($menteeGoals != null){
            // Loop through each goal set by the mentee ("Viewed" by the mentor only)
            foreach($menteeGoals as $goal) :
                $to_month = date('n',strtotime($goal['goal_completion_date']));
                $to_year = date('Y',strtotime($goal['goal_completion_date'])) ;
                $current_month = date('n');
                $current_year = date('Y');
                if((int)$to_month-(int)$current_month == 0 && (int)$to_year-(int)$current_year != 0){
                // The goal set is not within the current date's month (It's not a monthly goal)
?>
            <tr id="<?php echo $goal['goal_id'];?>"> 
                    <td><?php echo $goal['goal_title']; ?></td>
                    <td><?php echo $goal['goal_start_date']; ?></td>
                    <td><?php echo $goal['goal_completion_date']; ?></td>
                    <td><span class="badge bg-primary"><?php echo $goal['goal_status']; ?></span></td>
                    <td>
                        <div class="progress">
                                <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"><?php echo $goal['goal_progress']; ?>%</div>
                        </div>
                    </td>
            </tr> 
                <?php 
                }
                endforeach;
        }
                ?> 
            