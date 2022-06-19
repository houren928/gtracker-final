<?php  include_once "include/config.php";?>
<?php  include_once "include/m-session.php";?>
<?php 
   $goalID = $_GET['gid'];
   $menteeID = $_GET['mid'];
   $titleSQL = "SELECT goal_title, goal_description FROM goal WHERE goal_id=$goalID AND mentee_id=$menteeID";
   $goal = $conn -> query($titleSQL) ->fetch_assoc();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>GTracker - Goals</title>
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
    </style>
    
</head>

<body id="page-top">
    <div id="wrapper">

    <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-cus p-0">
            <div class="container-fluid d-flex flex-column p-0">

<a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="m-mentees.php">                    <div class="sidebar-brand-icon rotate-n-15"><img class="mb-3 mt-4" src="assets/img/logo.png" width="40" height="30" style="transform: rotate(16deg) skew(0deg);margin-right: -10px;"></div>
                    <div class="sidebar-brand-text mx-3"><span>GTracker</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="m-profileUpdate.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="m-mentees.php"><i class="fas fa-user-plus"></i><span>Mentees</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php"><i class="far fa-user-circle"></i><span>Logout</span></a></li>
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
                                            }
                                            echo $name;
                                            ?>
                                        </span>

                                        <img class="border rounded-circle img-profile" src="
                                        <?php
                                        echo 'data:image/jpeg;base64,' . base64_encode($photo) . '';
                                        ?>
                                        " />
                                    </a>
                            </li>
                        </ul>
                        </div>
                </nav>
                <section class="testimonials-clean">
                    <div class="container">
                        <div class="intro">
                            <h2 class="text-center"><?php echo($goal['goal_title']);?></h2>
                            <p class="text-center"><?php echo($goal['goal_description']);?></p>
                        </div>
                        <!-- <a href="m-ap-action-plan-slider.html">-->
                            <div>
                            <!-- <div class="row people" style="padding-bottom: 1px;">
                                    <div class="col-md-6 col-lg-4 text-warning item">
                                        <div class="acbox" style="background: var(--bs-light);">
                                            <p class="description">&nbsp;I wanna less 10 kg weight in 10 days!</p>
                                        </div>
                                        <div class="author">
                                            <h5 class="name">Less Weight 10kg</h5>
                                            <p class="title">Ends in 10 days.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 text-warning item">
                                        <div class="acbox">
                                            <p class="description">Meeting with Kong: Prepare some snacks and weight analysis</p>
                                        </div>
                                        <div class="author">
                                            <h5 class="name">Meeting with Teacher</h5>
                                            <p class="title">Located at University of Malaya</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 text-success item">
                                        <div class="acbox">
                                            <p class="description">Sleep earlier continuously for 10 days.</p>
                                        </div>
                                        <div class="author">
                                            <h5 class="name">Sleep Earlier</h5>
                                            <p class="title">Ends in 8 days.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row people" style="padding-top: 0px;">
                                    <div class="col-md-6 col-lg-4 text-success item">
                                        <div class="acbox" style="background: var(--bs-light);">
                                            <p class="description">&nbsp;I wanna less 10 kg weight in 10 days!</p>
                                        </div>
                                        <div class="author">
                                            <h5 class="name">Less Weight 10kg</h5>
                                            <p class="title">Ends in 10 days.</p>
                                        </div>
                                    </div>
                                    <div class="col-auto col-md-6 col-lg-4 text-success item">
                                        <div class="acbox">
                                            <p class="description">Sleep earlier continuously for 10 days.</p>
                                        </div>
                                        <div class="author">
                                            <h5 class="name">Sleep Earlier</h5>
                                            <p class="title">Ends in 8 days.</p>
                                        </div>
                                    </div>
                                </div> -->
                                <?php include_once "include/m-ap-action-plan-process.php"; // Always include the database oconnection before accessing the database?>
                            </div>
                       <!-- </a> -->
                    </div>
                </section>
                <section class="highlight-clean">
                    <div class="buttons"><a class="btn btn-primary" role="button" href="m-goal-progress.php?gid=<?php echo $goalID;?>&mid=<?php echo $menteeID;?>">View Goal Progress</a></div>
                </section>
                </div>
                <footer class="bg-white sticky-footer">
                    <div class="container my-auto">
                        <div class="text-center my-auto copyright"><span>Copyright © GTracker 2022</span></div>
                    </div>
                </footer>
            </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        </div>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/bs-init.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
        <script src="assets/js/Simple-Slider.js"></script>
        <script src="assets/js/theme.js"></script>
</body>

</html>