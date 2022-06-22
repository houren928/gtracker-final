<?php

include_once "include/config.php";
include_once "include/m-session.php";

// session_start();
// if((isset($_SESSION['userID']) && !empty($_SESSION['userID'])) ){
// $id = $_SESSION['userID'];
// }

$username = $fname = $lname = $age = $gender = "";

if (isset($_POST['submit1'])) {
    //The mysqli_real_escape_string() function escapes special characters in a string for use in an SQL statement.
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);


    // checking empty fields
    if (empty($username) || empty($first_name) || empty($last_name) || empty($age) || empty($gender)) {

        if (empty($username)) {
            echo "<font color='red'>Username field is empty.</font><br/>";
        }

        if (empty($first_name)) {
            echo "<font color='red'>First name field is empty.</font><br/>";
        }
        if (empty($last_name)) {
            echo "<font color='red'>Last name field is empty.</font><br/>";
        }

        if (empty($age)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }

        if (empty($gender)) {
            echo "<font color='red'>Gender field is empty.</font><br/>";
        }
    } else {
        //Step 3. Execute the SQL query.
        //updating the table
        $result = mysqli_query($conn, "UPDATE user 
                                       SET user_username='$username',
                                       user_fname='$first_name', 
                                       user_lname='$last_name',
                                       user_birthdate='$age',
                                       user_gender='$gender' 
                                       WHERE user_id=$id");

        //redirectig to the display page. In our case, it is index.php
        if ($result && $_SESSION['userType'] == "mentee") {
            header("Location: profileUpdate.php");
        } else if ($result && $_SESSION['userType'] == "mentor") {
            header("Location: m-profileUpdate.php");
        }

        //Step 5: Freeing Resources and Closing Connection using mysqli
        mysqli_close($conn);
    }
}

if (isset($_POST['submit2'])) {
    //The mysqli_real_escape_string() function escapes special characters in a string for use in an SQL statement.
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);

    // checking empty fields
    if (empty($contact) || empty($address) || empty($city) || empty($country)) {

        if (empty($contact)) {
            echo "<font color='red'>Contact field is empty.</font><br/>";
        }

        if (empty($address)) {
            echo "<font color='red'>Address field is empty.</font><br/>";
        }

        if (empty($city)) {
            echo "<font color='red'>City field is empty.</font><br/>";
        }
        if (empty($country)) {
            echo "<font color='red'>Country field is empty.</font><br/>";
        }
    } else {
        //Step 3. Execute the SQL query.
        //updating the table
        $result = mysqli_query($conn, "UPDATE user SET user_contact_num='$contact',user_address='$address',user_city='$city', user_country='$country' WHERE user_id=$id");

        //redirectig to the display page. In our case, it is index.php
        if ($result && $_SESSION['userType'] == "mentee") {
            header("Location: profileUpdate.php");
        } else if ($result && $_SESSION['userType'] == "mentor") {
            header("Location: m-profileUpdate.php");
        }

        //Step 5: Freeing Resources and Closing Connection using mysqli
        mysqli_close($conn);
    }
}

try{
if (isset($_POST["submit3"])) {

    // if(empty($user_photo)) {

    $error = false;
    $status = "";

    //check if file is not empty

    if (!empty($_FILES["image"]["name"])) {

        //file info 
        $file_name = basename($_FILES["image"]["name"]);
        $file_type = pathinfo($file_name, PATHINFO_EXTENSION);

        //make an array of allowed file extension
        $allowed_file_types = array('jpg', 'jpeg', 'png', 'gif');


        //check if upload file is an image
        if (in_array($file_type, $allowed_file_types)) {

            $tmp_image = $_FILES['image']['tmp_name'];
            $img_content = addslashes(file_get_contents($tmp_image));


            //Now run update query
            $query = $conn->query("UPDATE user SET user_photo = '$img_content' WHERE user_id = $id");

            //check if successfully inserted
            if ($query && $_SESSION['userType'] == "mentee") {
                header("Location: profileUpdate.php");
            } else if ($query && $_SESSION['userType'] == "mentor") {
                header("Location: m-profileUpdate.php");
            } else {
                $error = true;
                $status = "Something went wrong when updating image!!!";
                // echo '<script>alert("Welcome to Geeks for Geeks")</script>';
                if ($_SESSION['userType'] == "mentee") {
                    header("Location: profileUpdate.php?error=1");
                } else if ($_SESSION['userType'] == "mentor") {
                    header("Location: m-profileUpdate.php?error=1");
                }
            }
        } else {
            $error = true;
            $status = 'Only support jpg, jpeg, png, gif format';

            if ($_SESSION['userType'] == "mentee") {
                header("Location: profileUpdate.php?error=1");
            } else if ($_SESSION['userType'] == "mentor") {
                header("Location: m-profileUpdate.php?error=1");
            }
        }
    }
}}catch(Exception $e){
    if ($_SESSION['userType'] == "mentee") {
        header("Location: profileUpdate.php?error=1");
    } else if ($_SESSION['userType'] == "mentor") {
        header("Location: m-profileUpdate.php?error=1");
    }
}
$conn->close();
