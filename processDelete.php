<?php
//Example - MySQLi
//Step 1. Connect to the database.
//Step 2. Handle connection errors
//including the database connection file
include_once "include/config.php";
include_once "include/m-session.php";
// session_start();
// if((isset($_SESSION['userID']) && !empty($_SESSION['userID'])) ){
//     $id = $_SESSION['userID'];
// }

//getting id of the data from url
// $user_id = $_GET['user_id'];

//3. Execute the SQL query.
//deleting the row from table
// $result6 = mysqli_query($conn, "DELETE FROM mentor WHERE user_id=$id");
if($type == "mentee"){
$result5 = mysqli_query($conn, "DELETE FROM feedback WHERE mentee_id=$roleID");
$result4 = mysqli_query($conn, "DELETE FROM alert WHERE mentee_id=$roleID");
$result3 = mysqli_query($conn, "DELETE FROM activity WHERE mentee_id=$roleID");
$result2 = mysqli_query($conn, "DELETE FROM goal WHERE mentee_id=$roleID");
$result1 = mysqli_query($conn, "DELETE FROM mentee WHERE mentee_id=$roleID");
$result = mysqli_query($conn, "DELETE FROM user WHERE user_id=$id");}
else{
    $result6 = mysqli_query($conn, "DELETE FROM feedback WHERE mentor_id=$roleID");
    $result8 = mysqli_query($conn, "UPDATE mentee SET mentor_id = NULL WHERE mentor_id=$roleID");
    $result7 = mysqli_query($conn, "DELETE FROM mentor WHERE mentor_id=$roleID");
    $result9 = mysqli_query($conn, "DELETE FROM user WHERE user_id=$id");
}


//Step 5: Freeing Resources and Closing Connection using mysqli
mysqli_close($conn);

//4. Process the results.
//redirecting to the display page (index.php in our case)
header("Location: index.php");

?>