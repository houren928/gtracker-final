<?php
include_once "include/config.php"; // Always include the database oconnection before accessing the database
include_once "include/m-session.php";
date_default_timezone_set("Asia/Kuala_lumpur");
// echo date_default_timezone_get();
$dt = new DateTime();
$today = $dt->format('Y-m-d H:i:s');
        // echo $today;
?>

<?php
// date_default_timezone_set("Asia/Kuala_Lumpur");

// The submit button in the form is clicked and the data is passed to this form
try {
    // $sql = "SELECT * FROM `activity` WHERE goal_id = $goalID AND activity_id = $activityID;";
    $sql = "SELECT * FROM `alert` WHERE `mentee_id` = $roleID";
    $result = mysqli_query($conn, $sql);
    $reversedArray = array();

    $flag = 0;

    while ($row = mysqli_fetch_array($result)) {
        // echo '<a class="dropdown-item d-flex align-items-center" href="">';
        // echo '<div class="me-3">';
        // echo '<div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>';
        // echo '</div>';
        // echo '<div><span class="small text-gray-500">';
        // $activityID = $row['activity_id'];
        // $sql2 = "SELECT * FROM `activity` WHERE activity_id = $activityID";
        // $result2 = mysqli_query($conn, $sql2);
        // while ($row2 = mysqli_fetch_array($result2)) {
        //     $activityName = $row2['activity_name'];
        // }
        // echo $activityName;
        // echo '</span>';
        // echo '<p>';
        // echo $row['alert_notes'];
        // echo '</p>';
        // echo '</div>';
        // echo '</a>';
        // if($flag >= 2){
        //     break;
        // }
        // $flag ++;
        // $dt = new DateTime();
        // $today = $dt->format('Y-m-d H:i:s');
        $alertD = $row['alert_date'];
        $alertT = $row['alert_time'];
        $datetime = "$alertD $alertT";
        $date = DateTime::createFromFormat("Y-m-d H:i:s",  $datetime);

        // datetime.strptime('$alertD $alertT', '%b %d %Y %I:%M%p')
        // echo "<script>console.log($date);</script>";
        // $today = date("Y-m-d H:i:s");
        // $date = $row['alert_date'] . " " . $row['alert_time'];
        if ($date <= $dt) {
            // if (time() >= strtotime($row['alert_time'])) {
            array_push($reversedArray, $row);
            // }
        }
    }
    if (count($reversedArray) > 0) {
        echo '<div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter">';
        echo count($reversedArray);
        echo '</span><i class="fas fa-bell fa-fw"></i></a>';
        echo '<div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">';
    } else {
        echo '<div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">';
        echo '<i class="fas fa-bell fa-fw"></i></a>';
        echo '<div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">';
    }

    echo '<h6 class="dropdown-header">reminders center</h6>';

    while ($row = array_pop($reversedArray)) {
        $activityID = $row['activity_id'];
        $sql2 = "SELECT * FROM `activity` WHERE activity_id = $activityID";
        $result2 = mysqli_query($conn, $sql2);
        while ($row2 = mysqli_fetch_array($result2)) {
            $activityName = $row2['activity_name'];
            $goalID = $row2['goal_id'];
        }
        // $ThatTime = "14:08:10";
        $today = date("Y-m-d H:i:s");
        $date = $row['alert_date'] . " " . $row['alert_time'];

        if ($date <= $today) {
            echo '<a class="dropdown-item d-flex align-items-center" href="alert-linking-process.php?goal-id=';
            echo $goalID;
            echo '&activity-id=';
            echo $activityID;
            echo '&alert-id=';
            echo $row['alert_id'];
            echo '">';


            echo '<div class="me-3">';
            echo '<div class="bg-cus-light icon-circle"><i class="fas fa-bell text-white"></i></div>';
            echo '</div>';
            echo '<div><span class="small text-gray-700">';
            echo $activityName;
            echo '</span>';
            echo '<div>';
            echo $row['alert_notes'];
            echo '</div>';
            echo '<div><span class="smaller text-gray-500">';
            echo $row['alert_date'];
            echo ' ';
            echo $row['alert_time'];
            echo '</span></div>';
            echo '</div>';
            echo '</a>';
            if ($flag >= 2) {
                break;
            }
            $flag++;
        }
    }
    // echo '<a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>';
    echo '<div class="dropdown-item text-center small text-gray-500" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">Show All Reminders</div>';
    echo '</div>';
    echo '</div>';

    // echo '<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">';
    // echo '<div class="offcanvas-header">';
    // echo '<h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Backdrop with scrolling</h5>';
    // echo '<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>';
    // echo '</div>';
    // echo '<div class="offcanvas-body">';
    // echo '<p>Try scrolling the rest of the page to see this option in action.</p>';
    // echo '</div>';
    // echo '</div>';
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