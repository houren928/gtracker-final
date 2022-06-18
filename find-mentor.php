<?php include_once "include/config.php"; ?>
<?php include_once "include/m-session.php"; ?>

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
    <style>
        .bg-cus {
            background-color: #3a6ea5;
        }

        .dropdown .dropdown-list .dropdown-header {
            background-color: #3a6ea5;
            border: 1px solid #3a6ea5;
            padding-top: .75rem;
            padding-bottom: .75rem;
            color: #fff;
        }

        .bg-cus-light {
            background-color: rgba(58, 110, 165, 0.8);
        }
    </style>

</head>

<body id="page-top">
    <div id="wrapper">

        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-cus p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><img class="mb-3 mt-4" src="assets/img/logo.png" width="40" height="30" style="transform: rotate(16deg) skew(0deg);margin-right: -10px;"></div>
                    <div class="sidebar-brand-text mx-3"><span>GTracker</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="dashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profileUpdate.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="goals.php"><i class="fas fa-bullseye" style="color: rgba(255,255,255,0.42);"></i><span style="margin-left: 0px;">Goals</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="find-mentor-dashboard.php"><i class="fas fa-user-plus"></i><span>Find Mentor</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php"><i class="far fa-user-circle"></i><span>Logout</span></a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul>
                <div class="text-center d-none d-md-inline"></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <h6 class="text-nowrap text-black-50 mb-0">“Believe you can and you're halfway there.” — Theodore Roosevelt.</h6>
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"></div>
                        </form>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <?php include_once "alert-button-process.php"; ?>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown show no-arrow">
                                    <a class="dropdown-toggle nav-link" aria-expanded="true" data-bs-toggle="dropdown" href="#">
                                        <span class="d-none d-lg-inline me-2 text-gray-600 small">
                                            <?php
                                            $sql = "SELECT * FROM `user`
                                            WHERE user_id = '$id'
                                            ;";
                                            $result = mysqli_query($conn, $sql);

                                            while ($row = mysqli_fetch_array($result)) {
                                                $name = $row['user_email'];
                                                $photo = $row['user_photo'];
                                                if (empty($photo)) {
                                                    $photoSource = "assets/img/default_pp.png";
                                                } else {
                                                    $photoSource = 'data:image/jpeg;base64,' . base64_encode($photo) . '';
                                                }
                                            }
                                            echo $name;
                                            ?>
                                        </span>

                                        <img class="border rounded-circle img-profile" src="
                                        <?php
                                        echo $photoSource;
                                        ?>
                                        " />
                                    </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <section class="testimonials-clean">
                                <div class="container">
                                    <div class="intro">
                                        <h2 class="text-center" style="margin-bottom: 11px;">Invitation to Mentor</h2>
                                    </div>
                                    <div class="row people" style="padding-top: 0px;">
                                        <div class="col">
                                            <form id="mentor-invitation-form" method="post" , action="">
                                                <div class="mb-3"></div>
                                                <div class="mb-3"></div>
                                                <?php
                                                if (isset($_GET['id']) && !empty($_GET['id'])) {
                                                    $userID = $_GET['id'];
                                                    $email = $conn->query("SELECT user_email FROM user WHERE user_id=$userID")->fetch_assoc()['user_email'];
                                                } else {
                                                    $email = null;
                                                }
                                                ?>
                                                <div class="d-xl-flex justify-content-xl-center mb-3"><input type="email" id="mentor-email" class="form-control" name="email" placeholder="Type mentor email here" style="width: 745px; text-align: left;" <?php if ($email != null) {
                                                                                                                                                                                                                                                                echo "value=$email";
                                                                                                                                                                                                                                                            } ?>></div>
                                                <div class="d-xl-flex justify-content-xl-center mb-3"><textarea id="invitation-message" class="form-control" name="message" placeholder="Type your invitation message here" rows="14" style="width: 745px;height: 265px;text-align: left;"></textarea></div>
                                                <div class="d-xl-flex justify-content-xl-center mb-3"><button id="form-submit-button" class="btn btn-primary d-xl-flex justify-content-xl-center align-items-xl-center" role="button" name="feedbackBtn" value="sendFeedback">Send</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © GTracker 2022</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <?php
    include_once 'show-all-alert-process.php';
    ?>
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
    $(document).ready(function() {
        $('#form-submit-button').click(function(e) {
            // Prevent the page reloading after form submission
            e.preventDefault();
            let mail_to = $('#mentor-email').val();
            let mail_content = $('#invitation-message').val();
            $.ajax({
                type: 'post',
                url: 'invitation-message-process.php',
                data: {
                    email: mail_to,
                    message: mail_content
                },
                success: function(data) {
                    document.getElementById('mentor-invitation-form').reset();
                    // data will catch and retunr the values printed by "echo()" in php file
                    alert(data);
                },
                error: function(data) {
                    alert(data);
                }
            })
        })
    });
</script>