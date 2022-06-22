<?php 
session_start();
// echo $_SESSION['userID'];
// echo $_SESSION['userType'];
if((isset($_SESSION['userID']) && !empty($_SESSION['userID']))  && (isset($_SESSION['userType']) && !empty($_SESSION['userType']))){
    $id = $_SESSION['userID'];
    $type = $_SESSION['userType'];
    $roleID = null; // Check the current user is a mentor / mentee
    if($_SESSION['userType'] == "mentor" ){
        $roleID = $_SESSION['mentorID'];
    }
    else{
        $roleID = $_SESSION['menteeID'];
    }
    // If the application is unable to recognize the user type, we should print error message
    if($roleID == null){
        echo("Unable to recognize user type");
    }
}
else{
    header("Location:index.php");
    die();
}
?>