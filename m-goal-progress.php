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
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><img class="mb-3 mt-4" src="assets/img/logo.png" width="40" height="30" style="transform: rotate(16deg) skew(0deg);margin-right: -10px;"></div>
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
                <div class="intro">
                    <?php
                    $sql = "SELECT * FROM `goal` WHERE goal_id = $goalID;";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        $goalTitle = $row['goal_title'];
                        $goalDescription = $row['goal_description'];
                        $goalSpecific = $row['goal_specific'];
                        $goalMeasurable = $row['goal_measurable'];
                        $goalAchievable = $row['goal_achievable'];
                        $goalRealistic = $row['goal_realistic'];
                        $goalStartDate = $row['goal_start_date'];
                        $goalCompletionDate = $row['goal_completion_date'];
                    }
                    echo '<h2 class="text-center">';
                    echo $goalTitle;
                    echo '</h2>';
                    echo '<p class="text-center">“ ';
                    echo $goalDescription;
                    echo ' ”</p>';
                    ?>
                </div>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card shadow mb-4" style="height: 447.125px;">
                                <div class="card-header py-3">
                                    <h6 class="text-primary fw-bold m-0">Goal Details</h6>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col me-2">
                                                <h6 class="mb-0"><strong>Specific</strong></h6><span class="text-xs" style="line-height: 6.8px;letter-spacing: 0px;">
                                                    <!-- I want to increase the number of sign-ups for our webinar by promoting it through social, email, and our blog. -->
                                                    <?php
                                                    echo $goalSpecific;
                                                    ?>
                                                    <br>
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col me-2">
                                                <h6 class="mb-0"><strong>Measurable</strong></h6><span class="text-xs">
                                                    <!-- Our goal is a 15% increase in sign-ups. -->
                                                    <?php
                                                    echo $goalMeasurable;
                                                    ?>
                                                    <br>
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col me-2">
                                                <h6 class="mb-0"><strong>Achievable</strong></h6><span class="text-xs">
                                                    <!-- Our last webinar saw a 10% increase in sign-ups when we only promoted it through email. -->
                                                    <?php
                                                    echo $goalAchievable;
                                                    ?>
                                                    <br>
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col me-2">
                                                <h6 class="mb-0"><strong>Relevant</strong></h6><span class="text-xs">
                                                    <!-- When our webinars generate more leads, sales has more opportunities to close. -->
                                                    <?php
                                                    echo $goalRealistic;
                                                    ?>
                                                    <br>
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col me-2">
                                                <h6 class="mb-0"><strong>Time-Bound</strong></h6>
                                                <!-- <span class="text-xs"><Strong>Start Date</Strong></span>
                                                <span class="text-xs">
                                                     15/5/2022 
                                                    <?php
                                                    echo $goalStartDate;
                                                    // echo '<br>';
                                                    ?>
                                                </span>
                                                <div class="text-xs"><Strong>Target Completion Date</Strong></span>
                                                    <span class="text-xs">
                                                         15/5/2022
                                                        <?php
                                                        echo $goalCompletionDate;
                                                        ?>
                                                </div> -->
                                                <table>
                                                    <tr>
                                                        <td><span class="text-xs text-secondary"><Strong>Start Date</Strong></span></td>
                                                        <td></td>
                                                        <td><span class="text-xs text-secondary">
                                                                <!-- 15/5/2022 -->
                                                                <?php
                                                                $date = date_create($goalStartDate);
                                                                echo date_format($date, "d-m-Y");
                                                                // echo date_format($goalStartDate,"d/m/Y");
                                                                // echo '<br>';
                                                                ?>
                                                            </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><span class="text-xs text-secondary"><Strong>Target Completion Date</Strong></span></td>
                                                        <td></td>
                                                        <td><span class="text-xs text-secondary">
                                                                <!-- 15/5/2022 -->
                                                                <?php
                                                                $date = date_create($goalCompletionDate);
                                                                echo date_format($date, "d-m-Y");
                                                                ?>
                                                            </span></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary fw-bold m-0">Goal Progress</h6>
                                    <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                        <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                            <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item" href="#">&nbsp;Action</a><a class="dropdown-item" href="#">&nbsp;Another action</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">&nbsp;Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!-- <div class="chart-area"><canvas data-bss-chart="{&quot;type&quot;:&quot;pie&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Completed&quot;,&quot;Pending&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Completed&quot;,&quot;backgroundColor&quot;:[&quot;rgba(87,220,93,0.79)&quot;,&quot;rgb(255,199,90)&quot;],&quot;borderColor&quot;:[&quot;#ffffff&quot;,&quot;#ffffff&quot;],&quot;data&quot;:[&quot;60&quot;,&quot;40&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;},&quot;position&quot;:&quot;top&quot;},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}}}"></canvas></div> -->
                                    <?php
                                    $sql = "SELECT count(activity_id) FROM activity WHERE activity_completion_flag = 1 AND goal_id = $goalID";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_array($result);
                                    $completedCount = $row[0];
                                    $sql = "SELECT count(activity_id) FROM activity WHERE activity_completion_flag = 0 AND goal_id = $goalID";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_array($result);
                                    $pendingCount = $row[0];
                                    if ($completedCount == 0 && $pendingCount == 0) {
                                        echo '  <div class="chart-area"><canvas data-bss-chart="{&quot;type&quot;:&quot;pie&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Completed&quot;,&quot;No-Activity&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Completed&quot;,&quot;backgroundColor&quot;:[&quot;rgb(70,127,208)&quot;,&quot;rgb(91, 192, 222)&quot;],&quot;borderColor&quot;:[&quot;#ffffff&quot;,&quot;#ffffff&quot;],&quot;data&quot;:[&quot;';
                                        echo    '0';
                                        echo    '&quot;,&quot;';
                                        echo    '1';
                                        echo    '&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;},&quot;position&quot;:&quot;top&quot;},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}}}"></canvas></div>';
                                        echo  '<div class="text-center small mt-4"><span class="me-2"><i class="fas fa-circle text-info text-primary" style="border-color: rgb(232,155,38);--bs-warning: #f6c23e;--bs-warning-rgb: 246,194,62;color: var(--bs-yellow);"></i>&nbsp;No-Activity</span><span class="me-2"></div>                                        ';
                                    } else {
                                        echo '  <div class="chart-area"><canvas data-bss-chart="{&quot;type&quot;:&quot;pie&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Completed&quot;,&quot;Pending&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Completed&quot;,&quot;backgroundColor&quot;:[&quot;rgba(87,220,93,0.79)&quot;,&quot;rgb(255,199,90)&quot;],&quot;borderColor&quot;:[&quot;#ffffff&quot;,&quot;#ffffff&quot;],&quot;data&quot;:[&quot;';
                                        echo    $completedCount;
                                        echo    '&quot;,&quot;';
                                        echo    $pendingCount;
                                        echo    '&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;},&quot;position&quot;:&quot;top&quot;},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}}}"></canvas></div>';
                                        echo '<div class="text-center small mt-4"><span class="me-2"><i class="fas fa-circle text-warning text-primary" style="border-color: rgb(232,155,38);--bs-warning: #f6c23e;--bs-warning-rgb: 246,194,62;color: var(--bs-yellow);"></i>&nbsp;Pending</span><span class="me-2"><i class="fas fa-circle text-success"></i>&nbsp;Completed</span></div>';
                                    }
                                    
                                    ?>
                                    <!-- <div class="text-center small mt-4"><span class="me-2"><i class="fas fa-circle text-warning text-primary" style="border-color: rgb(232,155,38);--bs-warning: #f6c23e;--bs-warning-rgb: 246,194,62;color: var(--bs-yellow);"></i>&nbsp;Pending</span><span class="me-2"><i class="fas fa-circle text-success"></i>&nbsp;Completed</span></div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xl-4 mb-4">
                            <div class="card shadow border-start-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Total Activities</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span>
                                                <!-- 12 -->
                                                <?php
                                    $sql = "SELECT count(activity_id) FROM activity WHERE goal_id = $goalID";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_array($result);
                                    $allActivitiesCount = $row[0];
                                    echo $allActivitiesCount;
                                    ?>
                                            </span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4 mb-4">
                            <div class="card shadow border-start-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>activities completed</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span>
                                                <!-- 5 -->
                                                <?php
                                    echo $completedCount;
                                    ?>
                                            </span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4 mb-4">
                            <div class="card shadow border-start-info py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-info fw-bold text-xs mb-1"><span>activities pending</span></div>
                                            <div class="row g-0 align-items-center">
                                                <div class="col-auto">
                                                    <div class="text-dark fw-bold h5 mb-0 me-3"><span>
                                                    <?php
                                    echo $pendingCount;
                                    ?>
                                                    </span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <section class="testimonials-clean">
                                <div class="container">
                                    <div class="intro">
                                        <h2 class="text-center" style="margin-bottom: 11px;">Feedback</h2>
                                    </div>
                                    <div class="row people" style="padding-top: 0px;">
                                        <div class="col">
                                            <form id="feedback-form" method="post", action="">
                                                <div class="mb-3"></div>
                                                <div class="mb-3"></div>
                                                <div class="d-xl-flex justify-content-xl-center mb-3"><textarea id="feedback-message" class="form-control" name="message" placeholder="Message" rows="14" style="width: 745px;height: 265px;text-align: left;"></textarea></div>
                                                <div class="d-xl-flex justify-content-xl-center mb-3"><button id="form-submit-button" class="btn btn-primary d-xl-flex justify-content-xl-center align-items-xl-center" role="button" name="feedbackBtn" value="sendFeedback">Send</div>
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
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/chart.min.js"></script>
        <script src="assets/js/bs-init.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
        <script src="assets/js/Simple-Slider.js"></script>
        <script src="assets/js/theme.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>

<script>
     $(() => {
        $('button#form-submit-button').click(function(e){
            e.preventDefault(); // Prevent the page from reloading after form submission
            let feedbackMsg = $('#feedback-message').val();
                $.ajax({
                    type: 'post',
                    url: 'm-send-feedback-process.php?gid=<?php echo $goalID;?>&mid=<?php echo $menteeID;?>',
                    data: {message: feedbackMsg},
                    success: function(data) {                           
                            // Ajax call completed successfully
                            document.getElementById('feedback-form').reset(); // Clear the input field after form submission
                             alert('Your feedback is sent successfully!');
                           
                        },
                        error: function(data) {
                            // Some error in ajax call
                            alert(data);
                        }
            });
        });
    });
</script>