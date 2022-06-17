<?php 
session_start();
if((isset($_SESSION['userID']) && !empty($_SESSION['userID']))  && (isset($_SESSION['userType']) && !empty($_SESSION['userType']))){
    $id = $_SESSION['userID'];
    $type = $_SESSION['userType'];
    $roleID = null; // Check the current user is a mentor / mentee
    if($type == 'mentor' && isset($_SESSION['mentorID']) && !empty($_SESSION['mentorID'])){
        $roleID = $_SESSION['mentorID'];
    }
    if($type == 'mentee' && isset($_SESSION['menteeID']) && !empty($_SESSION['menteeID'])){
        $roleID = $_SESSION['menteeID'];
    }
    // If the application is unable to recognize the user type, we should print error message
    if($roleID == null){
        echo("Unable to recognize user type");
    }
}
else{
    echo("Session cannot be set up. Something wrong happens...");
}
?>