<?php
include("./dbConnection.php");
session_start();
if (!isset($_SESSION['is_login'])) {
    echo "<script> location.href = 'loginorsignup.php' </script>";
} else {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/all.min.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
        <title>Check Out</title>
    </head>

    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-6 offset-sm-3 jumbotron">
                    <h3 class="mb-5">Welcome to E-Learning Payment Page</h3>
                    <form action="pgResponce.php" method="post">
                    <div class="form-group row">
                            <label for="ORDER_ID" class="col-sm-4
                  col-form-label">Order ID</label>
                            <div class="col-sm-8">
                                <input id="ORDER_ID" class="form-control" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo "ORDS" .rand(10000,99999999)?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="CUST_ID" class="col-sm-4
                  col-form-label">Student Email</label>
                            <div class="col-sm-8">
                                <input id="CUST_ID" class="form-control" tabindex="1" maxlength="20" size="20" name="CUST_ID" autocomplete="off" value="<?php if(isset($_SESSION['stuLogEmail'])){echo $_SESSION['stuLogEmail']; }?>" readonly>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="TXN_AMOUNT" class="col-sm-4
                  col-form-label">Amount</label>
                            <div class="col-sm-8">
                                <input id="TXN_AMOUNT" class="form-control" tabindex="1" maxlength="20" size="20" name="TXN_AMOUNT" autocomplete="off" value="<?php if(isset($_POST['id'])){echo $_POST['id']; }?>" readonly>
                            </div>
                        </div>
                        <div class="text-center">
                         <input value="Check out" type="submit" class="btn btn-primary" onclick="">
                         <a href="./courses.php" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                    <small class="form-text text-muted">Note: Complete
                    Payment by Clicking Checkout Button</small>
                </div>
            </div>
        </div>



        <!--jQuery And Bootstap-->
        <script src="assets/js/jquery-3.5.1.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>

        <!--Font Awesome JS-->
        <script src="assets/js/all.min.js"></script>
    </body>

    </html>

<?php }

?>