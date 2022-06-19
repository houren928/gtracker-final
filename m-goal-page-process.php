<?php
include_once "include/config.php"; // Always include the database oconnection before accessing the database
include_once "include/m-session.php";
?>

<?php
// The submit button in the form is clicked and the data is passed to this form
$newGoals = array();
$pendingGoals = array();
$completedGoals = array();
try {
    $menteeID = $_GET['id'];
    $sql = "SELECT * FROM `goal`
    WHERE mentee_id = $menteeID
    ;";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
        // echo "haha";
        if ($row["goal_completion_flag"] == 1) {
            array_push($completedGoals, $row);
        } elseif ($row["goal_progress"] == 0) {
            array_push($newGoals, $row);
        } else {
            array_push($pendingGoals, $row);
        }
    }
    // echo print_r($newGoals);

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