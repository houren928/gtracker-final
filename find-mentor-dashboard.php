<?php include_once "include/config.php"; ?>
<?php include_once "include/m-session.php"; ?>
<?php
require_once "class/mentor-list.php";
$dCtrl  =   new mentorController($conn);
$mentors = $dCtrl->index();
?>

<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>GTracker - Dashboard</title>
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- CDN CSS Datatable -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css"> -->
    <style>
        .bg-cus {
            background-color: #3a6ea5;
        }

        .dropdown .dropdown-list .dropdown-header {
            background-color:  #3a6ea5;
            border: 1px solid  #3a6ea5;
            padding-top: .75rem;
            padding-bottom: .75rem;
            color: #fff;
        }
        .bg-cus-light {
            background-color: rgba(58, 110, 165,0.8);
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
                                                if(empty($photo)){
                                                    $photoSource = "assets/img/default_pp.png";
                                                }
                                                else{$photoSource = 'data:image/jpeg;base64,' . base64_encode($photo) . '';}
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
                    <h3 class="text-dark mb-4">Mentors</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Mentor Info</p>
                        </div>
                        <div class="card-body" id="mentor-info">
                            <div class="container mt-5">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 m-auto">
                                        <table class="table table-hovered" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Country</th>
                                                    <th>E-mail</th>
                                                    <th>Age</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Print out all the mentor list using DataTable-->
                                                <?php require "include/ap-mentorlist.php"; ?>
                                            </tbody>
                                        </table>
                                        <section class="highlight-clean">
                                            <div class="buttons"><a class="btn btn-primary" role="button" href="find-mentor.php">Find Your Own Mentor</a></div>
                                        </section>
                                    </div>
                                </div>
                            </div>
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
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- CDN jQuery Datatable -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</body>

</html>
<script>
    // Create a datatable for the mentee list
    $(document).ready(function() {
        let table = $('table#dataTable').DataTable();
        // Make each row clickable and retreive the information of the clicked mentee
        $('#dataTable tbody tr').click(function() {
            let data = $(this).attr('id'); // Store the user_id in a variable
            window.location.href = "find-mentor.php?id=" + data; // Utilize $_GET to identfy which mentee the mentor clicks
        });
        // Change the appearance of the row when the mouse hover over the row
        $('#dataTable tbody tr').hover(function() {
            $(this).css('cursor', 'pointer');
        }, function() {
            $(this).css('cursor', 'auto');
        });
    });
</script>