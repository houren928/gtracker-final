<?php
include_once "include/config.php"; // Always include the database oconnection before accessing the database
?>

<?php
// The submit button in the form is clicked and the data is passed to this form
try {
    $goalID = $_GET['gid'];
    $menteeID = $_GET['mid'];
    // $sql = "SELECT * FROM activity WHERE mentee_id=$menteeID AND goal_id=$goalID";
    // $result = mysqli_query($conn, $sql);
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
                array_push($completedArray, $row);
            } else {
                array_push($pendingArray, $row);
            }
        }
    }

    foreach ($pendingArray as $row) {
        $today_date = date('Y-m-d');
        $from_date = strtotime(date($today_date)); //Convert the start date to second
        $to_date = strtotime($row['activity_completion_date']); // Convert the end date to second
        $timeBound = (int)(($to_date - $from_date) / (60 * 60 * 24)); // Convert the time bound to day and check whether it exceeds the time limit or not
        if ($timeBound < 0) {
            $paragraph = '<p class="title">Already expires ' . ($timeBound * -1) . ' days.</p>';
        } else {
            $paragraph = '<p class="title">Ends in ' . $timeBound . ' days.</p>';
        }
        print '<div class="col-md-6 col-lg-4 text-success item" style="cursor: pointer;" onclick="window.location=\'m-ap-action-plan-slider.php?gid=' . $goalID . '&mid=' . $menteeID . '&aid=' . $row['activity_id'] . '\'">' .
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
            $paragraph = '<p class="title">Already expires ' . ($timeBound * -1) . ' days.</p>';
        } else {
            $paragraph = '<p class="title">Ends in ' . $timeBound . ' days.</p>';
        }
        print '<div class="col-md-6 col-lg-4 text-success item" style="cursor: pointer;" onclick="window.location=\'m-ap-action-plan-slider.php?gid=' . $goalID . '&mid=' . $menteeID . '&aid=' . $row['activity_id'] . '\'">' .
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
    mysqli_close($conn);
} catch (mysqli_sql_exception $e) {
    die($e->getMessage());
}
?>