<?php 
include_once "config.php"; // Always include the database oconnection before accessing the database
?>

<?php
// The submit button in the form is clicked and the data is passed to this form
if(isset($_POST)){
    $email = $_POST["email"];
    $password = $_POST["password"];
    // If the mentor button is clicked in the index.php, we need to process the data to mentor
    $type = $_GET["type"];
    try{
        $sql = "SELECT * FROM $type WHERE Email='$email'";
        $result = mysqli_query($conn,$sql);
        }catch(mysqli_sql_exception $e){
            die($e -> getMessage());
    }
    // Check whether the email exists in the database before signing up the new mentor / mentee
    // If the email exists in the mentor / mentee table, we should avoid two user using the same email to resgiter
    if(mysqli_num_rows($result) == 1){
        header("Location:register-signup.php?type=$type&error=emailalreadyexists");
    }
    // If there is no any result found in the database, we should register this new member
    else if(mysqli_num_rows($result) == 0){
        try{
            // Define a prepared statement to be created
            $preparedstmt = "INSERT INTO $type(Email,Password) VALUES(?,?)";
            // Allows the database to prepare the prepared statement
            $stmt = $conn -> prepare($preparedstmt);
            // Bind the values input by the user with the bound parameter(?) in the prepared statement
            $stmt -> bind_param("ss",$email,$password);
            // Execute the complete query after binding the value
            $stmt -> execute();
            // Close the statement after completing the query execution
            $stmt -> close();
            // Close the database after query execution
            $conn -> close();
            header("Location:register-signup.php?type=$type&success=registersuccessfully");
        }catch(Exception $e){
            die($e -> getMessage());
        }
    }
}