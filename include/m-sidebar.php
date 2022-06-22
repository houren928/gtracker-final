<?php 
echo
('
<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
<div class="container-fluid d-flex flex-column p-0">
<a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="m-mentees.php">
        <div class="sidebar-brand-icon rotate-n-15"><img class="mb-3 mt-4" src="assets/img/logo.png" width="40" height="30" style="transform: rotate(16deg) skew(0deg);margin-right: -10px;"></div>
        <div class="sidebar-brand-text mx-3"><span>GTracker</span></div>
    </a>
    <hr class="sidebar-divider my-0">
    <ul class="navbar-nav text-light" id="accordionSidebar">
    <li class="nav-item"></li>
        <li class="nav-item"><a class="nav-link" href="m-profileUpdate.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
        <li class="nav-item"><a class="nav-link" href="m-mentees.php"><i class="fas fa-user-plus"></i><span>Mentees</span></a></li>
        <li class="nav-item"><a class="nav-link" href="logout.php"><i class="far fa-user-circle"></i><span>Logout</span></a></li>
        <li class="nav-item"></li>
        <li class="nav-item"></li>
    </ul>
    <div class="text-center d-none d-md-inline"></div>
</div>
</nav>
');
?>