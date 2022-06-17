<?php

include_once "include/config.php";
include_once "include/m-session.php";

// session_start();
// if ((isset($_SESSION['userID']) && !empty($_SESSION['userID']))) {
//     $id = $_SESSION['userID'];
// }

$result1 = mysqli_query($conn, "SELECT user_username FROM user WHERE user_id =  $id"); // using mysqli_query instead
$result2 = mysqli_query($conn, "SELECT user_email FROM user WHERE user_id =  $id");
$result3 = mysqli_query($conn, "SELECT user_fname FROM user WHERE user_id =  $id");
$result4 = mysqli_query($conn, "SELECT user_lname FROM user WHERE user_id =  $id");
$result5 = mysqli_query($conn, "SELECT user_birthdate FROM user WHERE user_id =  $id");
$result6 = mysqli_query($conn, "SELECT user_gender FROM user WHERE user_id =  $id");
$result7 = mysqli_query($conn, "SELECT user_contact_num FROM user WHERE user_id =  $id");
$result8 = mysqli_query($conn, "SELECT user_address FROM user WHERE user_id =  $id");
$result9 = mysqli_query($conn, "SELECT user_city FROM user WHERE user_id =  $id");
$result10 = mysqli_query($conn, "SELECT user_country FROM user WHERE user_id =  $id");
$result11 = mysqli_query($conn, "SELECT user_photo FROM user WHERE user_id =  $id");
$resultSave = mysqli_query($conn, "SELECT * FROM user WHERE user_id =  $id");
$resultSave1 = mysqli_query($conn, "SELECT * FROM user WHERE user_id =  $id");
$resultDelete = mysqli_query($conn, "SELECT * FROM user WHERE user_id =  $id");

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="/Images/logo.png" rel="icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>GTracker - Profile</title>
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
    <link href="/Images/logo.png" rel="icon">
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
                    <li class="nav-item"><a class="nav-link" href="dashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="profileDummy.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
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
                    <h3 class="text-dark mb-4">Profile</h3>
                    <div class="row mb-3">
                        <div class="col-lg-4 d-xl-inline align-self-center">
                            <div class="card mb-3" style="min-height: 396px;">
                                <?php if ($row = $result11->fetch_assoc()) {
                                    if (empty($row['user_photo'])) { ?>
                                        <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="assets/img/2.jpg" width="160" height="160">
                                            <!-- <div class="gallery"> -->
                                        <?php } else { ?>
                                            <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['user_photo']); ?>" width="160" height="160">
                                        <?php }
                                } ?>
                                        <form action="processDummy.php" method="post" enctype="multipart/form-data">
                                            <div class="mb-3"><label class="btn btn-primary btn-sm">Upload Photo<input type="file" name="image" onchange="document.getElementById('submit3').click()" hidden><input type="submit" id="submit3" name="submit3" hidden></label></div>
                                        </form>
                                        <!-- <div><button class="btn btn-danger" type="button">DELETE ACCOUNT</button></div> -->
                                        <div><button class="btn btn-danger" type="button"><?php if ($res = mysqli_fetch_array($resultDelete)) {
                                                                                                echo "<a style='color:#FFFFFF;' href = \"processDelete.php?user_id=$id\" onClick=\"return confirm('Are you sure you want to delete?')\">DELETE ACCOUNT</a>";
                                                                                            } ?></button></div>
                                            </div>
                                        </div>
                            </div>
                            <div class="col">
                                <div class="card shadow mb-3">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 fw-bold">User Details</p>
                                    </div>
                                    <div class="card-body">
                                        <!-- <form method = "POST" action="processprofileUpdate.php" > -->
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-6"><label class=""><strong>Username</strong></label></div>
                                                <?php
                                                if ($res = mysqli_fetch_array($result1)) {
                                                    echo $res['user_username'];
                                                }
                                                ?>
                                            </div>
                                            <div class="col">
                                                <div class="mb-6"><label class=""><strong>Email Address</strong></label></div>
                                                <?php
                                                if ($res = mysqli_fetch_array($result2)) {
                                                    echo $res['user_email'];
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-6"><label class=""><strong>First Name</strong></label></div>
                                                <?php
                                                if ($res = mysqli_fetch_array($result3)) {
                                                    echo $res['user_fname'];
                                                }
                                                ?>
                                            </div>
                                            <div class="col">
                                                <div class="mb-6"><label class=""><strong>Last Name</strong></label></div>
                                                <?php
                                                if ($res = mysqli_fetch_array($result4)) {
                                                    echo $res['user_lname'];
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-6"><label class=""><strong>Age</strong></label></div>
                                                <?php
                                                if ($res = mysqli_fetch_array($result5)) {
                                                    echo $res['user_birthdate'];
                                                }
                                                ?>
                                            </div>
                                            <div class="col">
                                                <div class="mb-6"><label class=""><strong>Gender</strong></label></div>
                                                <?php
                                                if ($res = mysqli_fetch_array($result6)) {
                                                    echo $res['user_gender'];
                                                }
                                                // mysqli_close($conn);
                                                ?>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="mb-3"><button class="btn btn-sm btn-primary" type="button"><?php if ($res = mysqli_fetch_array($resultSave)) {
                                                                                                                    echo "<td><a style='color:#FFFFFF;' href = \"profileEdit1.php?user_id=$id\">Edit Details</a></td>";
                                                                                                                } ?></button></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row mb-3 d-none">
                                    <div class="col">
                                        <div class="card textwhite bg-primary text-white shadow">
                                            <div class="card-body">
                                                <div class="row mb-2">
                                                    <div class="col">
                                                        <p class="m-0">Peformance</p>
                                                        <p class="m-0"><strong>65.2%</strong></p>
                                                    </div>
                                                    <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                                </div>
                                                <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card textwhite bg-success text-white shadow">
                                            <div class="card-body">
                                                <div class="row mb-2">
                                                    <div class="col">
                                                        <p class="m-0">Peformance</p>
                                                        <p class="m-0"><strong>65.2%</strong></p>
                                                    </div>
                                                    <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                                </div>
                                                <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="card shadow">
                                            <div class="card-header py-3">
                                                <p class="text-primary m-0 fw-bold">Contact Details</p>
                                            </div>
                                            <div class="card-body">
                                                <form method="POST" action="processDummy.php">
                                                    <div class="mb-3"><label class="form-label" for="contact"><strong>Contact Number</strong></label><input class="form-control" type="text" id="contact" placeholder="+60184724920" name="contact" required value="<?php
                                                                                                                                                                                                                                                                    if ($res = mysqli_fetch_array($result7)) {
                                                                                                                                                                                                                                                                        echo $res['user_contact_num'];
                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                    ?>"></div>
                                                    <div class="mb-3"><label class="form-label" for="address"><strong>Address</strong></label><input class="form-control" type="text" id="address" placeholder="Sunset Blvd, 38" name="address" value="<?php
                                                                                                                                                                                                                                                        if ($res = mysqli_fetch_array($result8)) {
                                                                                                                                                                                                                                                            echo $res['user_address'];
                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                        ?>"></div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label" for="city"><strong>City</strong></label><input class="form-control" type="text" id="city" placeholder="Los Angeles" name="city" value="<?php
                                                                                                                                                                                                                                                if ($res = mysqli_fetch_array($result9)) {
                                                                                                                                                                                                                                                    echo $res['user_city'];
                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                ?>"></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label" for="country"><strong>Country</strong></label><input class="form-control" type="text" id="country" placeholder="USA" name="country" value="<?php
                                                                                                                                                                                                                                                    if ($res = mysqli_fetch_array($result10)) {
                                                                                                                                                                                                                                                        echo $res['user_country'];
                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                    ?>"></div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit" id="submit2" name="submit2">Save&nbsp;Changes</button><a href="profileUpdate.php"></a></div>
                                            </div>
                                            </form>
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
        <?php
        include_once 'show-all-alert-process.php';
        ?>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/bs-init.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
        <script src="assets/js/Simple-Slider.js"></script>
        <script src="assets/js/theme.js"></script>
</body>

</html>