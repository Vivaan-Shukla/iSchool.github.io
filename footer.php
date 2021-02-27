<!-- Login -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <i class="fas fa-user"></i><label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="stuLogemail" aria-describedby="emailHelp">

          </div>
          <div class="mb-3">
            <i class="fas fa-envelope"></i><label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="stuLogpass">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <small id="statusLogMsg"></small>
        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-outline-dark" id="stulog">Login</button>
      </div>
    </div>
  </div>
</div>

<!-- Sign Up -->

<!-- Modal -->
<div class="modal fade" id="stuSignUp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Student Registration</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
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
        </form>
      </div>
      <div class="modal-footer">
        <span id="successMsg"></span>
        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-outline-dark" id="stusignup_btn">Sign Up</button>
      </div>
    </div>
  </div>
</div>


<footer class="container-fluid text-center p-2" style="background-color: black;">
  <small class="text-white">Copyright &copy; 2021 || Designed By iSchool || <a href="adminlogin.php">Admin Login</a></small>
</footer>


<!--Plugins-->

<!--jQuery And Bootstap-->
<script src="assets/js/jquery-3.5.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>

<script>
  $(window).scroll(function() {
    $('nav').toggleClass('scrolled', $(this).scrollTop() > 500);
  });
</script>

<!--Font Awesome JS-->
<script src="assets/js/all.min.js"></script>

<!-- Ajax Call JS-->
<script src="assets/js/ajaxrequest.js"></script>

</body>

</html>