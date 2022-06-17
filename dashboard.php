<?php
include_once "include/config.php"; // Always include the database oconnection before accessing the database
include_once "include/m-session.php";
include_once "overoll-goal-progress.php";
require_once "goals-list.php";
// echo $roleID;
$dCtrl  =   new goalController($conn);
$menteeGoals = $dCtrl->index();
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
    <style>
        .btnalign {
            text-align: end;
            align-items: flex-end;
            align-self: flex-end;
            align-content: flex-end;
        }
    </style>
    <style>
        .bg-cus {
            background-color: #3a6ea5;
        }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- <?php echo $roleID; ?> -->
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-cus p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><img class="mb-3 mt-4" src="assets/img/logo.png" width="40" height="30" style="transform: rotate(16deg) skew(0deg);margin-right: -10px;"></div>
                    <div class="sidebar-brand-text mx-3"><span>GTracker</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active" href="dashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profileUpdate.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="goals.php"><i class="fas fa-bullseye" style="color: rgba(255,255,255,0.42);"></i><span style="margin-left: 0px;">Goals</span></a><a class="nav-link" href="find-mentor-dashboard.php"><i class="fas fa-user-plus"></i><span>Find Mentor</span></a></li>
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
                <div class="container-fluid">
                    <div class="text-start d-sm-flex justify-content-between align-items-center justify-content-xl-center mb-4"></div>
                    <div class="row">
                        <div class="col-md-6 col-xl-3 align-self-center mb-4">
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="fw-bold">All Goal(s)</h6>
                                        </div>
                                    </div>
                                    <div class="card shadow border-start-success py-2">
                                        <div class="card-body">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col me-2">
                                                    <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>TOTAL&nbsp;&nbsp;</span></div>
                                                    <div class="text-dark fw-bold h5 mb-0"><span>
                                                            <?php include_once "all-goals.php"; ?>
                                                        </span></div>
                                                </div>
                                                <div class="col-auto"><i class="fa-solid fa-shapes fa-2x text-gray-300"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow border-start-primary py-2">
                                        <div class="card-body">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col me-2">
                                                    <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>COMPLETED</span></div>
                                                    <div class="text-dark fw-bold h5 mb-0"><span>
                                                            <?php echo $allGoalsCompletedCount; ?>
                                                        </span></div>
                                                </div>
                                                <div class="col-auto"><i class="fa fa-check-circle fa-2x text-gray-300"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow border-start-primary py-2">
                                        <div class="card-body">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col me-2">
                                                    <div class="text-uppercase text-warning fw-bold text-xs mb-1"><span>Pending</span></div>
                                                    <div class="text-dark fw-bold h5 mb-0"><span>
                                                            <?php echo $allGoalsPendingCount; ?>
                                                        </span></div>
                                                </div>
                                                <div class="col-auto"><i class="fa fa-spinner fa-2x text-gray-300"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 align-self-center mb-4">
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="fw-bold">Monthly Goal(s)</h6>
                                        </div>
                                    </div>
                                    <div class="card shadow border-start-success py-2">
                                        <div class="card-body">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col me-2">
                                                    <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>TOTAL</span></div>
                                                    <div class="text-dark fw-bold h5 mb-0"><span>
                                                            <?php include_once "monthly-goal.php"; ?>
                                                        </span></div>
                                                </div>
                                                <div class="col-auto"><i class="fa-solid fa-shapes fa-2x text-gray-300"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow border-start-primary py-2">
                                        <div class="card-body">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col me-2">
                                                    <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>COMPLETED</span></div>
                                                    <div class="text-dark fw-bold h5 mb-0"><span>
                                                            <?php echo $monthlyGoalCompletedCount; ?>
                                                        </span></div>
                                                </div>
                                                <div class="col-auto"><i class="fa fa-check-circle fa-2x text-gray-300"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow border-start-primary py-2">
                                        <div class="card-body">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col me-2">
                                                    <div class="text-uppercase text-warning fw-bold text-xs mb-1"><span>Pending</span></div>
                                                    <div class="text-dark fw-bold h5 mb-0"><span>
                                                            <?php echo $monthlyGoalPendingCount; ?>
                                                        </span></div>
                                                </div>
                                                <div class="col-auto"><i class="fa fa-spinner fa-2x text-gray-300"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6" id="two-chart">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary fw-bold m-0">Overoll Goal Tracker</h6>
                                    <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button" disabled><i class="fas fa-ellipsis-v text-gray-100"></i></button>
                                        <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                            <p class="text-center dropdown-header">Other Chart Types</p>
                                            <a class="dropdown-item" id="radar-chart">&nbsp;Action</a>
                                            <!-- <a class="dropdown-item" href="#">&nbsp;Another action</a> -->
                                            <!-- <div class="dropdown-divider"></div><a class="dropdown-item" href="#">&nbsp;Something else here</a> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <!-- <canvas data-bss-chart="{&quot;type&quot;:&quot;line&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Jan&quot;,&quot;Feb&quot;,&quot;Mar&quot;,&quot;Apr&quot;,&quot;May&quot;,&quot;Jun&quot;,&quot;Jul&quot;,&quot;Aug&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Earnings&quot;,&quot;fill&quot;:true,&quot;data&quot;:[&quot;0&quot;,&quot;5&quot;,&quot;13&quot;,&quot;8&quot;,&quot;7&quot;,&quot;9&quot;,&quot;6&quot;,&quot;11&quot;],&quot;backgroundColor&quot;:&quot;rgba(78, 115, 223, 0.05)&quot;,&quot;borderColor&quot;:&quot;rgba(78, 115, 223, 1)&quot;}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;],&quot;drawOnChartArea&quot;:false},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;padding&quot;:20}}],&quot;yAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;]},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;padding&quot;:20}}]}}}"></canvas> -->
                                        <canvas id="myChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-4">
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <!-- <span class="text-primary m-0 fw-bold">Latest Goals</span> -->
                                    <div class="row">
                                        <div class="col"> <span class="text-start text-primary m-0 fw-bold ">Latest Goals</span>
                                        </div>
                                        <div class="col">
                                            <div class="text-end btnalign"><button type="button" class="btn-sm btn-primary" onclick="document.location='ap-new-goal.php'">New Goal</button></div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
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
                                                include_once "dashboard-goal-process.php"; // Always include the database oconnection before accessing the database
                                                ?>
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
                </div>
            </div>
            <footer class="bg-white sticky-footer ">
                <div class="container my-auto ">
                    <div class="text-center my-auto copyright "><span>Copyright © GTracker 2022</span></div>
                </div>
            </footer>

        </div><a class="border rounded d-inline scroll-to-top " href="#page-top "><i class="fas fa-angle-up "></i></a>
    </div>
    <?php
    include_once 'show-all-alert-process.php';
    ?>
    <script src="assets/bootstrap/js/bootstrap.min.js "></script>
    <script src="assets/js/chart.min.js "></script>
    <script src="assets/js/bs-init.js "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js "></script>
    <script src="assets/js/Simple-Slider.js "></script>
    <script src="assets/js/theme.js "></script>
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
    </script>
    <script>
        $chartType = "line";
        // document.getElementById("radar-chart").onclick = function() {
        //     myFunction()
        // };
        // function myFunction() {
        // $('#two-chart').load(document.URL +  ' #two-chart');
        // };

        const month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        const d = new Date();
        const sMonth = d.getMonth() - 3;
        const monthLabel = [month[d.getMonth() - 3], month[d.getMonth() - 2], month[d.getMonth() - 1], month[d.getMonth()], month[d.getMonth() + 1], month[d.getMonth() + 2], month[d.getMonth() + 3]];
        // const labels = [
        //     'January',
        //     'February',
        //     'March',
        //     'April',
        //     'May',
        //     'June',
        // ];

        // const data = {
        //     labels: labels,
        //     datasets: [{
        //         label: 'My First dataset',
        //         // fill: true,
        //         backgroundColor: 'rgba(78, 115, 223, 0.05)',
        //         // maintainAspectRatio: false,
        //         borderColor: 'rgba(78, 115, 223,1)',
        //         // fontStyle: normal,
        //         data: [0, 10, 5, 2, 20, 30, 45],

        //     }]
        // };

        var monthTotalGoalCountArray = <?php echo $monthTotalGoalCountArray; ?>;
        var monthCompletedGoalCountArray = <?php echo $monthCompletedGoalCountArray; ?>;
        var monthPendingGoalCountArray = <?php echo $monthPendingGoalCountArray; ?>;
        const totalData = [monthTotalGoalCountArray[d.getMonth() - 3], monthTotalGoalCountArray[d.getMonth() - 2], monthTotalGoalCountArray[d.getMonth() - 1], monthTotalGoalCountArray[d.getMonth()], monthTotalGoalCountArray[d.getMonth() + 1], monthTotalGoalCountArray[d.getMonth() + 2], monthTotalGoalCountArray[d.getMonth() + 3]];
        const pendingData = [monthPendingGoalCountArray[d.getMonth() - 3], monthPendingGoalCountArray[d.getMonth() - 2], monthPendingGoalCountArray[d.getMonth() - 1], monthPendingGoalCountArray[d.getMonth()], monthPendingGoalCountArray[d.getMonth() + 1], monthPendingGoalCountArray[d.getMonth() + 2], monthPendingGoalCountArray[d.getMonth() + 3]];
        const completedData = [monthCompletedGoalCountArray[d.getMonth() - 3], monthCompletedGoalCountArray[d.getMonth() - 2], monthCompletedGoalCountArray[d.getMonth() - 1], monthCompletedGoalCountArray[d.getMonth()], monthCompletedGoalCountArray[d.getMonth() + 1], monthCompletedGoalCountArray[d.getMonth() + 2], monthCompletedGoalCountArray[d.getMonth() + 3]];

        // console.log(monthTotalGoalCountArray);
        // console.log(monthCompletedGoalCountArray);
        // console.log(monthPendingGoalCountArray);

        const config = {
            "type": $chartType,
            "data": {
                "labels": monthLabel,
                "datasets": [{
                    "label": "Completed Goal",
                    "fill": true,
                    "data": completedData,
                    "backgroundColor": "rgba(75, 192, 192, 0.2)",
                    "borderColor": "rgba(75, 192, 192,0.8)"
                }, {
                    "label": "Pending Goal",
                    "fill": true,
                    "data": pendingData,
                    "backgroundColor": "rgba(255, 159, 64, 0.2)",
                    "borderColor": "rgba(255, 159, 64,0.8)"
                }, {
                    "label": "Total Goal",
                    "fill": true,
                    "data": totalData,
                    "backgroundColor": "rgba(255, 205, 86, 0.2)",
                    "borderColor": "rgba(255, 205, 86, 0.8)"
                }]
            },
            "options": {
                "maintainAspectRatio": false,
                "legend": {
                    "display": false,
                    "labels": {
                        "fontStyle": "normal"
                    }
                },
                "title": {
                    "fontStyle": "normal"
                },
                "scales": {
                    "xAxes": [{
                        "gridLines": {
                            "color": "rgb(234, 236, 244)",
                            "zeroLineColor": "rgb(234, 236, 244)",
                            "drawBorder": false,
                            "drawTicks": false,
                            "borderDash": ["2"],
                            "zeroLineBorderDash": ["2"],
                            "drawOnChartArea": false
                        },
                        "ticks": {
                            "fontColor": "#858796",
                            "fontStyle": "normal",
                            "padding": 20
                        }
                    }],
                    "yAxes": [{
                        "gridLines": {
                            "color": "rgb(234, 236, 244)",
                            "zeroLineColor": "rgb(234, 236, 244)",
                            "drawBorder": false,
                            "drawTicks": false,
                            "borderDash": ["2"],
                            "zeroLineBorderDash": ["2"]
                        },
                        "ticks": {
                            "fontColor": "#858796",
                            "fontStyle": "normal",
                            "padding": 20
                            // beginAtZero: true,
                            // callback: function(value) {
                            //     if (value % 1 === 0) {
                            //         return value;
                            //     }
                            // },
                            // "stepSize": ["1"]
                        }
                    }]
                }
            }
        }
    </script>
    <script>
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>


</body>

</html>