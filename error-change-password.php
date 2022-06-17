<?php include_once "include/config.php"; // Always include the database oconnection before accessing the database?>

<?php
if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["type"]) && isset($_GET["action"]) && ($_GET["action"]=="reset") && !isset($_POST["action"])){
  $key = $_GET["key"];
  $email = $_GET["email"];
  $usertype = $_GET["type"];
  $curDate = date("Y-m-d H:i:s");
  $result = $conn ->query("SELECT * FROM password_reset_temp WHERE `email`='$email' AND `key`='$key'");
  if (mysqli_num_rows($result) == 0){
  echo '<h2>Invalid Link</h2>
<p>The link is invalid/expired. Either you did not copy the correct link
from the email, or you have already used the key in which case it is 
deactivated.</p>
<p><a href="http://localhost/gtracker-lalala/reset-password.php?type='.$usertype.'">
Click here</a> to reset password.</p>';
	}else{
  $row = mysqli_fetch_assoc($result);
  $expDate = $row['expDate'];
  if ($expDate >= $curDate){
    header("Location: register-forgetpassword.php?key=$key&type=$usertype&email=$email&action=reset");
  }
  else{
    echo"<h2>Link Expired</h2>
    <p>The link is expired. You are trying to use the expired link which 
    as valid only 24 hours (1 days after request).<br /><br /></p>";
  }
}
}else{
    echo "<h2>Errors occur. Please try again later!</h2>";
}
  ?>