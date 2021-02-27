<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Admin Login</title>



    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="admin/signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <form>
            <h1 class="h3 mb-3 fw-normal">iSchool Admin Login</h1>
            <label for="inputEmail" class="visually-hidden">Email address</label>
            <input type="email" id="adminLogEmail" class="form-control" placeholder="Email address" required autofocus>
            <label class="visually-hidden">Password</label>
            <input type="password" id="adminLogPass" class="form-control" placeholder="Password" required>
            <div class="d-grid gap-2">
                <button class="btn btn-outline-dark" type="button" id="adminlog">Login</button>
                <a class="btn btn-outline-dark" href="index.php">Cancel</a>
            </div><br><br><br><br>
            <small id="statusLogMsg"></small>
        </form>
    </main>



    <!--Plugins-->

    <!--jQuery And Bootstap-->
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>


    <!--Font Awesome JS-->
    <script src="assets/js/all.min.js"></script>

    <!-- Ajax Call JS-->
    <script src="assets/js/adminajaxrequest.js"></script>
</body>

</html>