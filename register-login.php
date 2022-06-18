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
    <!-- Just add style to the warning if login fail due to errors -->
    <link rel="stylesheet" href="css/register-login.css">
</head>

<body>
    <div class="d-flex align-items-center min-vh-100">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-5 mt-5">
                    <h1 class="fs-3 justify-content-center mb-5"><strong>Log in</strong></h1>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-5">
                    <form action="loginProcess.php?type=<?php echo($_GET['type'])?>" class="needs-validation" novalidate method="post">
                        <!-- add at onsubmit -->
                        <div class="mb-4">
                            <label for="myLogInEmail" class="form-label"><strong>Email</strong></label>
                            <input type="email" class="form-control" id="myLogInEmail" name="email" placeholder="Enter Email" required>
                            <div class='valid-feedback'>
                                Valid
                            </div>
                            <div class="invalid-feedback">
                                Please provide a valid email.
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="row">
                                <div class="col">
                                    <label for="myLogInPassword" class="form-label"><strong>Password</strong></label>
                                </div>
                                <div class="col text-end">
                                    <a href="reset-password.php?type=<?php echo($_GET['type'])?>">Forget Password?</a>
                                </div>
                            </div>
                            <input type="password" class="form-control" id="myLogInPassword" name="password" placeholder="Enter Password" required>
                            <div class='valid-feedback'>
                                Valid
                            </div>
                            <div class="invalid-feedback">
                            Please fill out this field.
                            </div>
                            <div class="text-end">
                                <input type="checkbox" onclick="myFunction()"> Show Password
                            </div>
                            <?php
                                 if(isset($_GET['error'])){
                                    $errorMsg = $_GET['error'];
                                    if(strcmp($errorMsg, "wrongpassword") == 0){
                                        echo("<p class=\"register-login-fail-warning\">Password entered is wrong. Please try again.</p>");
                                    }else if (strcmp($errorMsg, "accountdoesnotexist") == 0){
                                        echo("<p class=\"register-login-fail-warning\">Account does not exist. Please try again.</p>");
                                    }
                                    else{
                                        echo("<p class=\"register-login-fail-warning\">Opps...Something went wrong. Please try again later.</p>");
                                    }
                                }
                            ?>
                        </div>
                        <button class="btn btn-success btn-block w-100" type="submit" name='loginBtn' value='login'>Log in</button>
                        <hr>
                    </form>
                </div>
            </div>

            <div class="row justify-content-center mt-4">
                <div class="col-3">
                    <div class="input-group d-grid d-md-flex justify-content-center">
                        <h1 class="fs-6 text-muted p-1">Need an account?</h1>
                        <a class="fs-6 p-1" href="register-signup.php?type=<?php echo($_GET['type'])?>">Sign Up</a>
                    </div>
                </div>
            </div>

        </div>

        <script>
            function myFunction() {
                var x = document.getElementById("myLogInPassword");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>

    </div>


    <script type="text/javascript" src="scripts/register-login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>


</html>