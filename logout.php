<?php 
//continue current session
session_start();
//check to see if session variable (uname) is set
//if set destroy the session
if(!empty($_SESSION['userID']) && !empty($_SESSION['userType'])){
    unset($_SESSION['userID']);
    unset($_SESSION['userType']);
    if(isset($_SESSION['mentorID']) && !empty($_SESSION['mentorID'])){
       unset($_SESSION['mentorID']);
    }
    else if(isset($_SESSION['menteeID']) && !empty($_SESSION['menteeID'])){
        unset($_SESSION['menteeID']);
    }
    else{
        echo("Unable to unset the user type in the session");
    }
    session_destroy();
    //redirect the user to the home page
    header("Location: index.php?action=logoutsuccessfully");
}
else{
    //redirect the user to the home page
    header("Location: index.php?action=somethingwentwrong");
}
?>