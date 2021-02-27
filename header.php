<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <title>iSchool</title>
    <style>
        .bg-dark {
            background: transparent !important;
        }

        .bg-dark.scrolled {
            background: #225470 !important;
        }
    </style>
</head>

<body class="homepage">
    <nav class="navbar fixed-top navbar-expand-lg bg-dark navbar-dark pl-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">iSchool</a>
            <span class="navbar-text">Learn And Implement</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav custom-nav pl-5">
                    <li class="nav-item">
                        <a class="nav-link custom-nav-item active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link custom-nav-item active" aria-current="page" href="courses.php">Courses</a>
                    </li>
                    <?php
                    session_start();
                    if (isset($_SESSION['is_login'])) {
                        echo '                       <li class="nav-item">
                        <a class="nav-link custom-nav-item active" aria-current="page" href="Student/profile.php">My Profile</a>
                    </li>                   
                        <li class="nav-item">
                        <a class="nav-link custom-nav-item active" aria-current="page" href="logout.php">Logout</a>
                    </li>';
                    } else {
                        echo '                    <li class="nav-item">
                        <a class="nav-link custom-nav-item active" aria-current="page" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link custom-nav-item active" aria-current="page" href="#" data-bs-toggle="modal" data-bs-target="#stuSignUp">SignUp</a>
                    </li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>