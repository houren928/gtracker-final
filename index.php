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

</head>

<body>
    <div class="d-flex align-items-center min-vh-100">
        <div class="container mt-2 mb-2">

            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <img src="images/goals_1.jpg" class="rounded mx-auto d-block w-100" alt="Goals Tracker">
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col">
                    <h1 class="display-4 text-center mb-1 p-3"><strong>Welcome To Goal Tracker!</strong></h1>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col">
                    <figure class="text-center mb-1 p-3">
                        <blockquote class="blockquote">
                            <p>You are never too old to set another goal or to dream a new dream</p>
                        </blockquote>
                        <figcaption class="blockquote-footer">
                            C.S. Lewis
                        </figcaption>
                    </figure>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col">
                <form action="register-login.php" method="get">
                    <div class="btn-group d-grid gap-2 col-6 mx-auto text-center" role="group" aria-label="Basic outlined example">
                        <button class="btn btn-outline-primary" id="r-mentor-btn" name="type" value="mentor">Mentor</button>
                        <button class="btn btn-outline-primary" id="r-mentee-btn" name="type" value="mentee">Mentee</button>
                    </div>
                    </form>
                </div>
            </div>

        </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="scripts/register-welcome.js" type="text/javascript"></script>

</body>


</html>