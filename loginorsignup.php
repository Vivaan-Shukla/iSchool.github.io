<?php
include('dbConnection.php');
include('header.php');
?>

<div class="container-fluid bg-dark">
    <div class="row">
        <img src="media/banner2.jpg" alt="banner">
    </div>
</div>
<br><br>
<div class="container jumbortron nb-5" style="background-color: lightblue;">
    <div class="row">
        <div class="col-md-4">
            <h5 class="mb-3">If Already Registered !! Login</h5>
            <form>
                <div class="mb-3">
                    <i class="fas fa-user"></i><label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="stuLogemail" aria-describedby="emailHelp">

                </div>
                <div class="mb-3">
                    <i class="fas fa-envelope"></i><label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="stuLogpass">
                </div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="stulog">Login</button>
            </form><br>
            <small id="statusLogMsg"></small>
        </div>
        <div class="col-md-6 offset-md-1">
            <h5 class="mb-3">New User !! Sign Up</h5>
            <form id="stuRegForm">
                <div class="mb-3">
                    <i class="fas fa-user"></i><label for="name" class="pl-2 font-weight-bold">Name</label> <small id="statusMsg1"></small>
                    <input type="email" class="form-control" id="stuname">
                </div>
                <div class="mb-3">
                    <i class="fas fa-user"></i><label for="exampleInputEmail1" class="form-label">Email address</label><small id="statusMsg2"></small>
                    <input type="email" class="form-control" id="stuemail" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <i class="fas fa-envelope"></i><label for="exampleInputPassword1" class="form-label">Password</label><small id="statusMsg3"></small>
                    <input type="password" class="form-control" id="stupass">
                </div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="stusignup_btn">Sign Up</button>
            </form><br>
            <span id="successMsg"></span>
        </div>
    </div>
</div>
<br><br>



<?php
include('footer.php');
?>