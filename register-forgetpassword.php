<?php include_once "include/config.php"; // Always include the database oconnection before accessing the database?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>GTracker</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initialscale=1">
    <link rel="apple-touch-icon" type="image/png" sizes="180x180" href="assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="180x180" href="assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/img/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/img/android-chrome-512x512.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Highlight-Clean.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/Map-Clean.css">
    <link rel="stylesheet" href="assets/css/Newsletter-Subscription-Form.css">
    <link rel="stylesheet" href="assets/css/Projects-Horizontal.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/Social-Icons.css">
    <link rel="stylesheet" href="assets/css/Testimonials.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
    <link href="/Images/logo.png" rel="icon">
    <link rel="apple-touch-icon" type="image/png" sizes="180x180" href="assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="180x180" href="assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/img/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/img/android-chrome-512x512.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Just add style to the warning if password is not entered -->
    <link rel="stylesheet" href="css/register-login.css">
</head>

<body>
    <div class="d-flex align-items-center min-vh-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-5 mt-5">
                    <h1 class="fs-3 justify-content-center mb-5"><strong>Forgot Password?</strong></h1>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-5 ">
                    <form id="reset" action="" class="needs-validation" novalidate method="post">
                    <input id="action" type="hidden" name="action" value="update"/>
                        <div class="mb-4">
                            <label for="myNewPassword" class="form-label"><strong>Enter New Password:</strong></label><br />
                            <input id="myNewPassword" type="password" class="form-control" placeholder="Enter New Password" name="pass1" maxlength="20" required />
                            <div id="pass1-alert" style="display: none";><p id="pass1-alert-sentence" class="register-login-fail-warning fs-6">Please enter the new password</p></div>
                            <div class="text-end">
                                <input type="checkbox" onclick="myNewPass()"> Show Password
                            </div>
                            <div class="mb-4">
                                <label for="myReEnterPassword" class="form-label"><strong>Re-Enter New Password:</strong></label><br />
                                <input id="myReEnterPassword" type="password" class="form-control" placeholder="Re-enter New Password" name="pass2" maxlength="20" required/>
                                <div id="pass2-alert" style="display: none";><p id="pass2-alert-sentence" class="register-login-fail-warning fs-6">Please re-enter the new password</p></div>
                                <input id="email" type="hidden" name="email" value="<?php echo $_GET['email'];?>" />
                                <input id="userType" type="hidden" name="type" value="<?php echo $_GET['type'];?>" />
                                <div class="text-end">
                                    <input type="checkbox" onclick="myReEnterPass()"> Show Password
                                </div>
                            </div>
                            <button id="form-submit-button" class="btn btn-success btn-block w-100" type="submit" value="Reset Password">Change Password</button>
                    </form>
                    </div>
                </div>

            </div>
        </div>
        <script type="text/javascript" src="scripts/register-forgetpassword.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/bs-init.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
        <script src="assets/js/Simple-Slider.js"></script>
        <script src="assets/js/theme.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>

<script>
    // Work on the form submission when the document is rendered completely
    $(document).ready(function(){
        $('#form-submit-button').click(function(e){
            // Prevent the page reloading after form submission
            e.preventDefault();
            let pass1 = $('#myNewPassword').val();
            let pass2 = $('#myReEnterPassword').val();
            let usertype = $("#userType").val();
            let email = $('#email').val();
            let action = $('#action').val();
            $.ajax({
                type: 'post',
                url: 'set-new-password.php',
                data: {
                    pass1: pass1,
                    pass2: pass2,
                    usertype: usertype,
                    email: email,
                    action: action
                },
                dataType:'JSON', // Process "JSON" data type of return value in success() and error()
                success:function(data){
                    // data will catch and return the values from the php file that process the data sent
                    if(data.success == true){
                        // Both passwords are entered and consistent
                        document.getElementById('reset').reset();
                        alert(data.message);
                        window.location.href = 'register-login.php?type='+usertype;
                    }
                    else if(data.pass1 == true && data.pass2 == true ){
                        // Both passwords are entered but inconsistent
                        document.getElementById('reset').reset();
                        alert(data.message);
                        $('#pass1-alert').hide();
                        $('#pass2-alert').hide();
                    }
                    else if(data.pass1 == true && data.pass2 == false){
                        $('#pass1-alert').hide();
                        $('#pass2-alert').show();
                    }
                    else if(data.pass1 == false && data.pass2 == true){
                        $('#pass1-alert').show();
                        $('#pass2-alert').hide();
                    }
                    else if(data.pass1 == false && data.pass2 == false){
                        $('#pass1-alert').show();
                        $('#pass2-alert').show();
                    }
                },
                error: function(data){
                    alert(data);
                }
            })
        })
    });
</script>