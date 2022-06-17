<?php
//Example - MySQLi
//Step 1. Connect to the database.
//Step 2. Handle connection errors
//including the database connection file
include_once "include/config.php";

session_start();
if((isset($_SESSION['userID']) && !empty($_SESSION['userID'])) ){
    $id = $_SESSION['userID'];
}

//getting id of the data from url
// $user_id = $_GET['user_id'];

//3. Execute the SQL query.
//deleting the row from table
$result = mysqli_query($conn, "DELETE FROM user WHERE user_id=$id");

//Step 5: Freeing Resources and Closing Connection using mysqli
mysqli_close($conn);

//4. Process the results.
//redirecting to the display page (index.php in our case)
header("Location: index.php");

?>