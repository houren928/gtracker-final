<?php
include_once "include/config.php"; // Always include the database oconnection before accessing the database
?>

<?php
// The submit button in the form is clicked and the data is passed to this form
try {
    $goalID = $_GET['gid'];
    $menteeID = $_GET['mid'];
    $activityID = $_GET['aid'];
    // We need to display the activity that is clicked first
    $sql = "SELECT * FROM activity 
            WHERE mentee_id=$menteeID AND goal_id=$goalID AND activity_id >= $activityID
            UNION
            SELECT * FROM activity 
            WHERE mentee_id=$menteeID AND goal_id=$goalID AND activity_id < $activityID";
    $result = mysqli_query($conn, $sql);

    $flag = 0;
    // echo '<div class="row people" style="padding-bottom: 1px;">';
    while ($row = mysqli_fetch_array($result)) {
        echo '<div class="swiper-slide">';
        echo '<div class="acbox" style="background: var(--bs-light);">';
        echo '<section class="newsletter-subscribe" style="margin-top: 25px;padding-top: 25px;">';
        echo '<div class="container">';
        echo '<div class="intro">';
        echo '<h2 class="text-center">';
        echo $row["activity_name"];
        echo '&nbsp;</h2>';
        echo '<div class = "text-center" ><a href="/ap-reminder.html"><i class="bi bi-bell"></i></a></div>';
        echo '<p class="text-center">"&nbsp;';
        echo $row["activity_description"];
        echo '"</p>';
        echo '<p class="text-center" style="margin-top: 50px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-clock">';
        echo '<path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"></path>';
        echo '<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"></path>';
        echo '</svg>&nbsp;';
        $time =  $row["activity_time"]; 
        echo date('h:i a', strtotime($time));
        echo '</p>';
        echo '<p class="text-center" style="margin-top: 10px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-calendar">';
        echo '<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"></path>';
        echo '</svg>&nbsp;';
        $date =  $row["activity_completion_date"]; 
        echo date('d-m-Y', strtotime($date));
        echo '</p>';
        echo '<p class="text-center" style="margin-top: 10px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-geo-alt">';
        echo '<path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"></path>';
        echo '<path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>';
        echo '</svg>&nbsp;';
        echo $row["activity_location"];
        echo '</p>';
        echo '</div>';
        echo '</div>';
        echo '</section>';
        echo '</div>';
        echo '<section class="highlight-clean" style="padding-top: 0px;">';
        echo '<div class="container">';
        echo '</div>';
        echo '</section>';
        echo '<div class="author"></div>';
        echo '</div>';
    }

    mysqli_close($conn);
} catch (mysqli_sql_exception $e) {
    die($e->getMessage());
}
?>