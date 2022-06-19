<?php
include_once "include/config.php"; // Always include the database oconnection before accessing the database
include_once "include/m-session.php"
?>

<?php
// The submit button in the form is clicked and the data is passed to this form
try {
    // $sql = "SELECT * FROM `activity` WHERE goal_id = $goalID AND activity_id = $activityID;";
    $sql = "SELECT * FROM `alert` WHERE mentee_id = '$roleID' ORDER BY `alert_date`DESC,`alert_time` DESC";
    $result = mysqli_query($conn, $sql);
    $reversedArray = array();

    // $flag = 0;
    echo '<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">';
    echo '<div class="offcanvas-header">';
    echo '<h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">All Reminders</h5>';
    echo '<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>';
    echo '</div>';
    echo '<div class="offcanvas-body pt-2">';
    echo '<hr>';

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
        array_push($reversedArray,$row);
    }

    
    while ($row = array_pop($reversedArray)) {
        $activityID = $row['activity_id'];
        $sql2 = "SELECT * FROM `activity` WHERE activity_id = $activityID";
        $result2 = mysqli_query($conn, $sql2);
        while ($row2 = mysqli_fetch_array($result2)) {
            $activityName = $row2['activity_name'];
            $goalID = $row2['goal_id'];
        }
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
    }
    echo '</div>';
    echo '</div>';
    mysqli_close($conn);


 
} catch (mysqli_sql_exception $e) {
    die($e->getMessage());
}
?>