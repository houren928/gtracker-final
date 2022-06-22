<?php 
include_once "include/config.php"; // Always include the database oconnection before accessing the database
?>

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- Just add style to the warning if sign up fail due to existing email -->
    <link rel="stylesheet" href="css/register-login.css">

</head>

<body>
    <div class="d-flex align-items-center min-vh-100">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-5">
                    <h1 class="fs-3 justify-content-center mb-5"><strong>Sign Up</strong></h1>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-5">
                    <form method="post" action="signupProcess.php?type=<?php echo($_GET['type'])?><?php if(isset($_GET['response'])){echo "&response=".$_GET['response']."&mid=".$_GET['mid'];}?>" class="needs-validation" novalidate>
                        <div class="mb-4">
                            <label for="mySignUpEmail" class="form-label"><strong>Email</strong></label>
                            <input type="email" class="form-control" id="mySignUpEmail" name="email" placeholder="Enter Email" required>
                            <div class="valid-feedback">
                                Valid.
                            </div>
                           <div class="invalid-feedback">
                               Please provide a valid email.
                           </div>
                        </div>
                        <div class="mb-4">
                            <label for="mySignUpPassword" class="form-label"><strong>Password</strong></label>
                            <input type="password" class="form-control" id="mySignUpPassword" name="password" placeholder="Enter Password" required>
                            <div class="valid-feedback">
                                Valid.
                            </div>
                            <div class="invalid-feedback">
                                Please fill out this field.
                            </div>
                            <div class="text-end">
                                <input type="checkbox" onclick="mySignUp()"> Show Password
                            </div>
                            <?php
                            if(isset($_GET["error"])){
                                echo("<p class=\"register-login-fail-warning\">Email already exists. Please try another email.</p?");
                            }
                            else if(isset($_GET["response"])){
                                echo("<p class=\"register-login-fail-warning\">Please sign up as a mentor to accept invitation</p?");          
                            }
                            ?>
                        </div>
                        <button class="btn btn-success btn-block w-100" type="submit" name='signUpBtn' value='signUp'>Sign Up</button>
                        <hr>
                    </form>     
                </div>
            </div>

            <!-- <div class="row justify-content-center mb-5">
                <div class="d-grid gap-2 col-2">
                    <button class="btn btn-outline-primary" type="submit"> <i class="bi bi-facebook"></i> Facebook </button>
                </div>
                <div class="d-grid gap-2 col-2">
                    <button class="btn btn-outline-danger" type="submit"> <i class="bi bi-google"></i> Google</button>
                </div>
            </div> -->

            <div class="row justify-content-center mt-4">
                <div class="col-3">
                    <div class="input-group d-grid d-md-flex justify-content-center">
                        <h1 class="fs-6 text-muted p-1">Already have an account?</h1>
                        <a class="fs-6 p-1" href="register-login.php?type=<?php echo($_GET['type'])?>">Sign In</a>
                    </div>
                </div>
            </div>

        </div>

        <!-- <script>
            function mySignUp() {
                var x = document.getElementById("mySignUpPassword");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script> -->

    </div>

    <script type="text/javascript" src="scripts/register-signup.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>


</html>