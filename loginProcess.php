<?php 
include_once "config.php"; // Always include the database oconnection before accessing the database
?>

<?php
// The submit button in the form is clicked and the data is passed to this form
if(isset($_POST)){
    $email = $_POST["email"];
    $password = $_POST["password"];
    // If the mentor button is clicked in the index.php, we need to process the data to mentor
    $type = $_GET['type'];
    try{
        // Define a prepared statement to be created
        $preparedstmt = "SELECT * FROM $type WHERE Email=?";
        // Allows the database to prepare the prepared statement
        $stmt = $conn -> prepare($preparedstmt);
        // Bind the values input by the user with the bound parameter(?) in the prepared statement
        $stmt -> bind_param("s",$email);
        // Execute the complete query after binding the value
        $stmt -> execute();
        //After completing execution, check whether there is an user with the entered email
        $result = mysqli_stmt_get_result($stmt);
        $fetch = $result -> fetch_assoc();
        // If the email exists in the mentor / mentee table, we should avoid two user using the same email to resgiter
        if(mysqli_num_rows($result) == 0){
            header("Location:register-login.php?type=$type&error=accountdoesnotexist");
        // The email exists and the password is correct
         }else if(strcmp($fetch['Password'], $password) == 0){
            session_start();
            $_SESSION['userID'] = $fetch['$type'.'ID'];
            header("Location:register-login.php?type=$type&success=loginsuccessfully");
         }
         // If the account exists but the password entered is wrong, we should avoid him/her accessing
         else{
            header("Location:register-login.php?type=$type&error=wrongpassword");
         }
        // Close the statement after completing the query execution
        $stmt -> close();
        // Close the database after query execution
        $conn -> close();
        }catch(mysqli_sql_exception $e){
            die($e -> getMessage());
    }
}