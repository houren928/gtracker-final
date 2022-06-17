<?php include_once "include/config.php";?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>GTracker - Find Mentor</title>
    <link rel="apple-touch-icon" type="image/png" sizes="180x180" href="assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="180x180" href="assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/img/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/img/android-chrome-512x512.png">
    <!-- <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css"> -->
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>


<body>
    <div class="d-flex align-items-center min-vh-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-5 mt-5">
                    <h1 class="fs-2 mb-5"><strong>Forgot Password?</strong></h1>
                    <h1 class="fs-6 mb-2">Please enter your registered email address.</h1>
                    <h1 class="fs-6 mb-5 text-muted">Please check your email to reset your password.</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-5 ">
                    <form id="reset-password-form" method="post" action="" class="needs-validation" novalidate>
                        <div class="mb-4">
                            <label for="myRegisteredEmail" class="form-label"><strong>Email</strong></label>
                            <input id="email" type="email" class="form-control" id="myRegisteredEmail" plaveholder="Enter Email" required>
                            <div class="valid-feedback">
                                Valid.
                            </div>
                            <div class="invalid-feedback">
                                Please provide a valid email.
                            </div>
                        </div>
                        <button id="form-submit-button" class="btn btn-success btn-block w-100" type="submit">Next</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script type="text/javascript" src="scripts/register-email.js"></script>
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
            let mail_to = $('#email').val();
            $.ajax({
                type: 'post',
                url: 'reset-password-process.php?type=<?php echo($_GET['type'])?>',
                data: {
                    email: mail_to,
                },
                success:function(data){
                    document.getElementById('reset-password-form').reset();
                    // data will catch and retunr the values printed by "echo()" in php file
                    alert(data);
                },
                error: function(data){
                    alert(data);
                }
            })
        })
    });
</script>