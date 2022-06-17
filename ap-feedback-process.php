<?php 
$menteeID = $_SESSION['menteeID'];
$goalID = $_GET['goal-id'];
try{
    $sql = "SELECT * FROM feedback WHERE mentee_id = $menteeID AND goal_id = $goalID ORDER BY feedback_id DESC";
    $result = $conn -> query($sql);
    if(mysqli_num_rows($result) > 0){
        // There is feedback for this mentee
        $feedbacks = $result -> fetch_all(MYSQLI_ASSOC);
        // Fetch the mentor id of this mentee
        $mentorID = $feedbacks[0]['mentor_id'];
        $mentor_details = $conn -> query("SELECT user_username, user_photo FROM user WHERE user_id = (SELECT user_id FROM mentor WHERE mentor_id = $mentorID)") ->fetch_assoc();
        foreach ($feedbacks as $feedback):
?>
                        <div class="col-md-6 col-lg-4 item">
                            <div class="box">
                                <p class="description"><?php echo $feedback['feedback_message']?></p>
                            </div>
                            <div class="author"><img class="rounded-circle" src="assets/img/1.jpg">
                                <h5 class="name"><?php echo $mentor_details['user_username']?></h5>
                                <p class="title"><?php echo $feedback['feedback_date']?></p>
                            </div>
                        </div>
<?php  
        endforeach;    
    }
}catch(Exception $e){
    die($e ->getMessage());
}
?>