<!-- Display the mentee list for a mentor in a DataTable -->
<?php 
    if($mentees != null){
        // Initialise a prepared statement
        $sql = "SELECT user_username, user_country, user_email, user_birthdate, user_photo FROM user WHERE user_id = ?";
        // Create a prepared statement
        $stmt = $conn -> prepare($sql);
        if($stmt){
            // Stores the mentee id in an indexed array
            foreach($mentees as $mentee) :
                // The prepared statement is created successfully
                $stmt -> bind_param('s',$mentee['user_id']); 
                $stmt -> execute();
                $result = mysqli_stmt_get_result($stmt);    
            ?>
            
            <tr id="<?php echo $mentee['mentee_id'];?>">
                <?php 
                    if($result){
                        $menteeDetails = $result->fetch_assoc();
                ?>
                    <td><img class="rounded-circle me-2" width="30" height="30" src="<?php echo $menteeDetails['user_photo']; ?>"><?php echo $menteeDetails['user_username']; ?></a></td>
                    <td><?php echo $menteeDetails['user_country']; ?></td>
                    <td><?php echo $menteeDetails['user_email']; ?></td>
                    <td><?php echo $menteeDetails['user_birthdate']; ?></td>
                <?php 
                }
                else{
                    // The database is not able to execute the prepared statement
                    echo("Something wrong happens");
                }
                ?>
                </tr> 
            <?php endforeach;}
            // The statement cannot be prepared and error occurs
            else{
                echo("Database is not able to prepare prepared statement");
            }
            $conn -> close();
    }
    // The mentor has no any mentee
    else{
        echo("You have no any mentees");
    }
?>   