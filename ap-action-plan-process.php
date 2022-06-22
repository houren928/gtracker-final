<?php
include_once "include/config.php"; // Always include the database oconnection before accessing the database
?>

<?php
// The submit button in the form is clicked and the data is passed to this form
try {
    $goalID = $_GET['goal-id'];
    $sql = "SELECT * FROM `activity` WHERE goal_id = $goalID;";
    $result = mysqli_query($conn, $sql);
    $completedArray = array();
    $pendingArray = array();

    $flag = 0;
    echo '<div class="row people" style="padding-bottom: 1px;">';

    while ($row = mysqli_fetch_array($result)) {
        if ($flag == 3) {
            echo '</div>';
            echo '<div class="row people" style="padding-top: 0px;">';
            $flag = 0;
        } else {
            if ($row['activity_completion_flag'] == 1) {
                // print '<div class="col-md-6 col-lg-4 text-success item" style="cursor: pointer;" onclick="window.location=\' ' .
                //     '/Project/gtracker-mentor-1.0/ap-action-plan-slider.php?goal-id=' //Need to be replaced with target web link
                //     . $goalID
                //     .'&activity-id='
                //     . $row['activity_id']
                //     . '\';" >' .
                //     '                                        <div class="acbox" style="background: var(--bs-light);">' .
                //     '                                            <p class="description"> ' . $row["activity_description"] . '</p>' .
                //     '                                        </div>' .
                //     '                                        <div class="author">' .
                //     '                                            <h5 class="name">' . $row["activity_name"] . '</h5>' .
                //     '                                            <p class="title">Ends in 10 days.</p>' .
                //     '                                        </div>' .
                //     '                                    </div>';
                array_push($completedArray, $row);
            } else {
                // print '<div class="col-md-6 col-lg-4 text-success item" style="cursor: pointer;" onclick="window.location=\' ' .
                // '/Project/gtracker-mentor-1.0/ap-action-plan-slider.php?goal-id=' //Need to be replaced with target web link
                // . $goalID
                // .'&activity-id='
                // . $row['activity_id']
                // . '\';" >' .
                // '                                        <div class="acbox" style="background: var(--bs-light);">' .
                // '                                            <p class="description"> ' . $row["activity_description"] . '</p>' .
                // '                                        </div>' .
                // '                                        <div class="author">' .
                // '                                            <h5 class="name text-warning">' . $row["activity_name"] . '</h5>' .
                // '                                            <p class="title">Ends in 10 days.</p>' .
                // '                                        </div>' .
                // '                                    </div>';
                array_push($pendingArray, $row);
            }
        }
    }
    // foreach ($pendingArray as $row) {
    //     print '<div class="col-md-6 col-lg-4 text-success item" style="cursor: pointer;" onclick="window.location=\' ' .
    //         '/Project/gtracker-mentor-1.0/ap-action-plan-slider.php?goal-id=' //Need to be replaced with target web link
    //         . $goalID
    //         . '&activity-id='
    //         . $row['activity_id']
    //         . '\';" >' .
    //         '                                        <div class="acbox" style="background: var(--bs-light);">' .
    //         '                                            <p class="description"> ' . $row["activity_description"] . '</p>' .
    //         '                                        </div>' .
    //         '                                        <div class="author">' .
    //         '                                            <h5 class="name text-warning">' . $row["activity_name"] . '</h5>' .
    //         '                                            <p class="title">Ends in 10 days.</p>' .
    //         '                                        </div>' .
    //         '                                    </div>';
    // }
    // // $flag = 0;
    // foreach ($completedArray as $row) {
    //     print '<div class="col-md-6 col-lg-4 text-success item" style="cursor: pointer;" onclick="window.location=\' ' .
    //         '/Project/gtracker-mentor-1.0/ap-action-plan-slider.php?goal-id=' //Need to be replaced with target web link
    //         . $goalID
    //         . '&activity-id='
    //         . $row['activity_id']
    //         . '\';" >' .
    //         '                                        <div class="acbox" style="background: var(--bs-light);">' .
    //         '                                            <p class="description"> ' . $row["activity_description"] . '</p>' .
    //         '                                        </div>' .
    //         '                                        <div class="author">' .
    //         '                                            <h5 class="name">' . $row["activity_name"] . '</h5>' .
    //         '                                            <p class="title">Ends in 10 days.</p>' .
    //         '                                        </div>' .
    //         '                                    </div>';
    // }

    foreach ($pendingArray as $row) {
        $today_date = date('Y-m-d');
        $from_date = strtotime(date($today_date)); //Convert the start date to second
        $to_date = strtotime($row['activity_completion_date']); // Convert the end date to second
        $timeBound = (int)(($to_date - $from_date) / (60 * 60 * 24)); // Convert the time bound to day and check whether it exceeds the time limit or not
        if ($timeBound < 0) {
            $paragraph = '<p class="title">Already expires ' . ($timeBound * -1) . ' days ago.</p>';
        } else {
            $paragraph = '<p class="title">Ends in ' . $timeBound . ' days.</p>';
        }
        print '<div class="col-md-6 col-lg-4 text-success item" style="cursor: pointer;" onclick="window.location=\' ' .
            'ap-action-plan-slider.php?goal-id=' //Need to be replaced with target web link
            . $goalID
            . '&activity-id='
            . $row['activity_id']
            . '\';" >' .
            '       <div class="acbox" style="background: var(--bs-light);">' .
            '           <p class="description"> ' . $row["activity_description"] . '</p>' .
            '       </div>' .
            '       <div class="author">';
        if ($timeBound < 0) {
            print '            <h5 class="name text-danger">' . $row["activity_name"] . '</h5>';
        } else {
            print '            <h5 class="name text-warning">' . $row["activity_name"] . '</h5>';
        }
        print $paragraph .
            '       </div>' .
            '   </div>';
    }
    foreach ($completedArray as $row) {
        $today_date = date('Y-m-d');
        $from_date = strtotime(date($today_date)); //Convert the start date to second
        $to_date = strtotime($row['activity_completion_date']); // Convert the end date to second
        $timeBound = (int)(($to_date - $from_date) / (60 * 60 * 24)); // Convert the time bound to day and check whether it exceeds the time limit or not
        if ($timeBound < 0) {
            $paragraph = '<p class="title">Already expires ' . ($timeBound * -1) . ' days ago.</p>';
        } else {
            $paragraph = '<p class="title">Ends in ' . $timeBound . ' days.</p>';
        }
        print '<div class="col-md-6 col-lg-4 text-success item" style="cursor: pointer;" onclick="window.location=\' ' .
            '/Project/gtracker-mentor-1.0/ap-action-plan-slider.php?goal-id=' //Need to be replaced with target web link
            . $goalID
            . '&activity-id='
            . $row['activity_id']
            . '\';" >' .
            '       <div class="acbox" style="background: var(--bs-light);">' .
            '           <p class="description"> ' . $row["activity_description"] . '</p>' .
            '       </div>' .
            '       <div class="author">' .
            '            <h5 class="name text-success">' . $row["activity_name"] . '</h5>' .
            $paragraph .
            '       </div>' .
            '   </div>';
    }

    echo '</div>';


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