<?php

include_once "include/config.php";
include_once "include/m-session.php";


$result1 = mysqli_query($conn, "SELECT user_id FROM user WHERE user_id =  $id");
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
        .btnalign {
            text-align: end;
            align-items: flex-end;
            align-self: flex-end;
            align-content: flex-end;
        }

        .bg-cus {
            background-color: #3a6ea5;
            /* background-color: #8093f1; */
            /* background-color: #3a6ea5; */
            /* background-image: linear-gradient(rgba(120, 139, 255), rgba(191, 215, 255)); */

        }
    </style>
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
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="m-mentees.php">
                    <div class="sidebar-brand-icon rotate-n-15"><img class="mb-3 mt-4" src="assets/img/logo.png" width="40" height="30" style="transform: rotate(16deg) skew(0deg);margin-right: -10px;"></div>
                    <div class="sidebar-brand-text mx-3"><span>GTracker</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active" href="m-profileUpdate.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="m-mentees.php"><i class="fas fa-user-plus"></i><span>Mentees</span></a></li>
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
                        <h6 class="text-nowrap text-black-50 mb-0">???Believe you can and you're halfway there.??? ??? Theodore Roosevelt.</h6>
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
                    <h3 class="text-dark mb-4">Profile</h3>
                    <div class="row mb-3">
                        <div class="col-lg-4 d-xl-inline align-self-center">
                            <div class="card mb-3" style="min-height: 396px;">
                                <div class="card-body text-center shadow"><img class="border rounded-circle mb-3 mt-4" src="assets/img/default_pp.png" width="160" height="160">
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
                                    <form method="POST" action="processDummy.php">
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label" for="username"><strong>Username</strong></label><input class="form-control" type="text" id="username" placeholder="user.name" name="username" required></div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label" for="email"><strong>Email Address</strong></label><input class="form-control" type="email" id="email" name="email" disabled value="<?php
                                                                                                                                                                                                                                echo $name;
                                                                                                                                                                                                                                // if ($res = mysqli_fetch_array($result1)) {
                                                                                                                                                                                                                                //     echo $res['user_id'];
                                                                                                                                                                                                                                // }
                                                                                                                                                                                                                                ?>"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label" for="first_name"><strong>First Name</strong></label><input class="form-control" type="text" id="first_name" placeholder="John" name="first_name" required></div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label" for="last_name"><strong>Last Name</strong></label><input class="form-control" type="text" id="last_name" placeholder="Doe" name="last_name" required></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label" for="first_name"><strong>Age</strong></label><input class="form-control" type="number" id="age" placeholder="32" name="age" required></div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label" for="last_name"><strong>Gender</strong></label><input class="form-control" type="text" id="gender" placeholder="Male" name="gender" required></div>
                                            </div>
                                        </div>
                                        <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit" id="submit1" name="submit1">Save Changes</button><a href="profileUpdate.php"></a></div>
                                    </form>
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
                                                <div class="mb-3"><label class="form-label" for="contact"><strong>Contact Number</strong></label><input class="form-control" type="text" id="contact" required placeholder="+60184724920" name="contact" required></div>
                                                <div class="mb-3"><label class="form-label" for="address"><strong>Address</strong></label><input class="form-control" type="text" id="address" required placeholder="Sunset Blvd, 38" name="address"></div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="city"><strong>City</strong></label><input class="form-control" type="text" id="city" required placeholder="Los Angeles" name="city"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="country"><strong>Country</strong></label><input class="form-control" type="text" id="country" required placeholder="USA" name="country"></div>
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
                    <div class="text-center my-auto copyright"><span>Copyright ?? GTracker 2022</span></div>
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