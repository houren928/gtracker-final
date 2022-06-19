<?php
include_once "include/config.php"; // Always include the database oconnection before accessing the database
include_once "include/m-session.php";
// require_once "goals-list.php";
// $dCtrl  =   new goalController($conn);
// $menteeGoals = $dCtrl->index();
include_once "goal-page-process.php";

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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
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

        .smaller {
            font-size: x-small;
            text-align: end;
            font-weight: light;
        }
    </style>

</head>

<body id="page-top">
    <div id="wrapper">

        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-cus p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="dashboard.php">

                    <div class="sidebar-brand-icon rotate-n-15"><img class="mb-3 mt-4" src="assets/img/logo.png" width="40" height="30" style="transform: rotate(16deg) skew(0deg);margin-right: -10px;"></div>
                    <div class="sidebar-brand-text mx-3"><span>GTracker</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="dashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profileUpdate.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="goals.php"><i class="fas fa-bullseye" style="color: rgba(255,255,255,0.42);"></i><span style="margin-left: 0px;">Goals</span></a><a class="nav-link" href="find-mentor-dashboard.php"><i class="fas fa-user-plus"></i><span>Find Mentor</span></a></li>
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
                    <div class="row" style="height: 47.5938px;">
                        <div class="col">
                            <h3 class="text-dark mb-4">Goals</h3>
                        </div>
                        <div class="col">
                            <div class="text-md-end dataTables_filter" id="dataTable_filter"><button class="btn btn-primary bg-cus" role="button" onclick="document.location='ap-new-goal.php'" style="margin-right: 6px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-plus-circle">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
                                    </svg>&nbsp;New Goal</button><label class="form-label"></label></div>
                        </div>
                    </div>
                    <div class="card shadow mt-2">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">New Goals</p>
                        </div>
                        <div class="card-body" style="padding: 16px;padding-top: 5px;">
                            <div class="table-responsive table mt-2" id="dataTable-2" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable1">
                                    <thead>
                                        <tr>
                                            <th>Goal Name</th>
                                            <th>Start Date</th>
                                            <th>Target End Date</th>
                                            <th>Status</th>
                                            <th>Progress</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($newGoals as $newGoal) {
                                            echo '<tr class=\'clickable-row\' data-href="';
                                            echo 'ap-action-plan.php?goal-id=';
                                            echo $newGoal['goal_id']; //Change with targeted goal
                                            echo '">';
                                            echo '<td>';
                                            echo '<img class="rounded-circle me-2" width="30" height="30" src="';
                                            if (empty($photo)) {
                                                $photoSource = "assets/img/default_pp.png";
                                            } else {
                                                $photoSource = 'data:image/jpeg;base64,' . base64_encode($photo) . '';
                                            }
                                            echo $photoSource;
                                            echo '">';
                                            echo '';
                                            echo $newGoal["goal_title"];
                                            echo '</td>';
                                            echo '<td>';
                                            echo $newGoal["goal_start_date"];
                                            echo '</td>';
                                            echo '<td>';
                                            echo $newGoal["goal_completion_date"];
                                            echo '</td>';
                                            echo '<td><span class="badge bg-info">New</span></td>';
                                            echo '<td>';
                                            echo '<div class="progress">';
                                            echo '<div class="progress-bar progress-bar-striped progress-bar-animated bg-gray-400" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: ';
                                            echo '100';
                                            echo '%;">';
                                            echo '0';
                                            echo '%</div>';
                                            echo '</div>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr></tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mt-4">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Pending Goals</p>
                        </div>
                        <div class="card-body" style="padding: 16px;padding-top: 5px;">
                            <div class="table-responsive table mt-2" id="dataTable-2" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable2">
                                    <thead>
                                        <tr>
                                            <th>Goal Name</th>
                                            <th>Start Date</th>
                                            <th>Target End Date</th>
                                            <th>Status</th>
                                            <th>Progress</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($pendingGoals as $pendingGoal) {
                                            echo '<tr class=\'clickable-row\' data-href="';
                                            echo 'ap-action-plan.php?goal-id=';
                                            echo $pendingGoal['goal_id']; //Change with targeted goal
                                            echo '">';
                                            echo '<td>';
                                            echo '<img class="rounded-circle me-2" width="30" height="30" src="';
                                            if (empty($photo)) {
                                                $photoSource = "assets/img/default_pp.png";
                                            } else {
                                                $photoSource = 'data:image/jpeg;base64,' . base64_encode($photo) . '';
                                            }
                                            echo $photoSource;
                                            echo '">';
                                            echo '';
                                            echo $pendingGoal["goal_title"];
                                            echo '</td>';
                                            echo '<td>';
                                            echo $pendingGoal["goal_start_date"];
                                            echo '</td>';
                                            echo '<td>';
                                            echo $pendingGoal["goal_completion_date"];
                                            echo '</td>';
                                            echo '<td><span class="badge bg-warning">Pending</span></td>';
                                            echo '<td>';
                                            echo '<div class="progress">';
                                            echo '<div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: ';
                                            echo $pendingGoal["goal_progress"];
                                            echo '%;">';
                                            echo $pendingGoal["goal_progress"];
                                            echo '%</div>';
                                            echo '</div>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr></tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mt-4">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Completed Goals</p>
                        </div>
                        <div class="card-body" style="padding: 16px;padding-top: 5px;">
                            <div class="table-responsive table mt-2" id="dataTable-2" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Goal Name</th>
                                            <th>Start Date</th>
                                            <th>Target End Date</th>
                                            <th>Status</th>
                                            <th>Progress</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($completedGoals as $completedGoal) {
                                            echo '<tr class=\'clickable-row\' data-href="';
                                            echo 'ap-action-plan.php?goal-id=';
                                            echo $completedGoal['goal_id']; //Change with targeted goal
                                            echo '">';
                                            echo '<td>';
                                            echo '<img class="rounded-circle me-2" width="30" height="30" src="';
                                            if (empty($photo)) {
                                                $photoSource = "assets/img/default_pp.png";
                                            } else {
                                                $photoSource = 'data:image/jpeg;base64,' . base64_encode($photo) . '';
                                            }
                                            echo $photoSource;
                                            echo '">';
                                            echo '';
                                            echo $completedGoal["goal_title"];
                                            echo '</td>';
                                            echo '<td>';
                                            echo $completedGoal["goal_start_date"];
                                            echo '</td>';
                                            echo '<td>';
                                            echo $completedGoal["goal_completion_date"];
                                            echo '</td>';
                                            echo '<td><span class="badge bg-success">Done</span></td>';
                                            echo '<td>';
                                            echo '<div class="progress">';
                                            echo '<div class="progress-bar progress-bar-striped progress-bar-animated bg-success" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: ';
                                            echo $completedGoal["goal_progress"];
                                            echo '%;">';
                                            echo $completedGoal["goal_progress"];
                                            echo '%</div>';
                                            echo '</div>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr></tr>
                                    </tfoot>
                                </table>
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
    <?php
    include_once 'show-all-alert-process.php';
    ?>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js "></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js "></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable(); //Change your table id
        });
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
        $(document).ready(function() {
            $('#dataTable1').DataTable(); //Change your table id
        });
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
        $(document).ready(function() {
            $('#dataTable2').DataTable(); //Change your table id
        });
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
    </script>
</body>

</html>