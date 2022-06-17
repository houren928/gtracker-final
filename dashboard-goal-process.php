<?php
include_once "include/config.php"; // Always include the database oconnection before accessing the database
include_once "include/m-session.php";
?>

<?php
// The submit button in the form is clicked and the data is passed to this form
try {
    $sql = "SELECT * FROM `goal`
    WHERE mentee_id = '$roleID'
    ;";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
        // echo print_r($row);
        echo '<tr class=\'clickable-row\' data-href="';
        echo 'ap-action-plan.php?goal-id=';
        echo $row['goal_id']; //Change with targeted goal
        echo '">';
        echo '<td>';
        echo '<img class="rounded-circle me-2" width="30" height="30" src="'; 
        echo 'data:image/jpeg;base64,' . base64_encode($photo) . '';
        echo '">';
        echo '';
        echo $row["goal_title"];
        echo '</td>';
        echo '<td>';
        echo $row["goal_start_date"];
        echo '</td>';
        echo '<td>';
        echo $row["goal_completion_date"];
        echo '</td>';
        if ($row["goal_completion_flag"] == 1) {
            echo '<td><span class="badge bg-success">Done</span></td>';
            echo '<td>';
            echo '<div class="progress">';
            echo '<div class="progress-bar progress-bar-striped progress-bar-animated bg-success" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: ';
            echo $row["goal_progress"];
            echo '%;">';
            echo $row["goal_progress"];
            echo '%</div>';
        } elseif ($row["goal_progress"] == 0) {
            echo '<td><span class="badge bg-info">New</span></td>';
            echo '<td>';
            echo '<div class="progress">';
            echo '<div class="progress-bar progress-bar-striped progress-bar-animated bg-gray-400" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: ';
            echo '100';
            echo '%;">';
            echo '0';
            echo '%</div>';
        } else {
            echo '<td><span class="badge bg-warning">Pending</span></td>';
            echo '<td>';
            echo '<div class="progress">';
            echo '<div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: ';
            echo $row["goal_progress"];
            echo '%;">';
            echo $row["goal_progress"];
            echo '%</div>';
        }

        echo '</div>';
        // echo '</div>';
        echo '</td>';
        echo '</tr>';
    }
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


<!-- <?php
        echo '<tr>';
        echo '<td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar2.jpeg">Goal 2</td>';
        echo '<td>02/03/2022 </td>';
        echo '<td>02/03/2022 </td>';
        echo '<td><span class="badge bg-primary">Done</span></td>';
        echo '<td>';
        echo '<div class="progress">';
        echo '<div class="progress-bar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50%</div>';
        echo '</div>';
        echo '</td>';
        echo '</tr>';
        ?> -->