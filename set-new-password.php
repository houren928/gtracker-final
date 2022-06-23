<?php include_once "include/config.php"; // Always include the database oconnection before accessing the database?>

<?php
if((isset($_POST["pass1"]) && (empty($_POST["pass1"]))) && (isset($_POST["pass2"]) && (!empty($_POST["pass2"])))){
    echo json_encode(["success" => false, 
                      "pass1" => false,
                      "pass2" => true]);  
}
else if((isset($_POST["pass1"]) && (!empty($_POST["pass1"]))) && (isset($_POST["pass2"]) && (empty($_POST["pass2"])))){
    echo json_encode(["success" => false,
                       "pass1" => true, 
                       "pass2" => false]);
}
else if((isset($_POST["pass1"]) && (empty($_POST["pass1"]))) && (isset($_POST["pass2"]) && (empty($_POST["pass2"])))){
    echo json_encode(["success" => false,
                      "pass1" => false, 
                      "pass2" => false]);
}
else{
    $usertype = $_POST['usertype'];
    $email = $_POST["email"];
    $pass1 = mysqli_real_escape_string($conn,$_POST["pass1"]);
    $pass2 = mysqli_real_escape_string($conn,$_POST["pass2"]);
    if ($pass1!=$pass2){
        echo json_encode(["success" => false, 
                          "pass1" => true, 
                          "pass2" => true, 
                          "message" => "Password do not match, both password should be same."]);
    }
    else{
        $hashpassword = password_hash($pass1, PASSWORD_DEFAULT);
        $result = $conn -> query("UPDATE user SET user_password='$hashpassword' WHERE user_email='$email' AND user_type='$usertype'");
        if($result){
            mysqli_query($conn,"DELETE FROM `password_reset_temp` WHERE `email`='$email' AND `user_type` = '$usertype'");
            echo json_encode(["success" => true, 
                              "pass1" => true, 
                              "pass2" => true, 
                              "message" => "Update password successfully"]);
        }
        else{
            echo json_encode(["success" => false,  
                              "pass1" => true, 
                              "pass2" => true, 
                              "message" =>"Update password fails"]);
        }
        }	
    }
?>