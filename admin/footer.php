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


<!--Plugins-->

<!--jQuery And Bootstap-->
<script src="../assets/js/jquery-3.5.1.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>


<!--Font Awesome JS-->
<script src="../assets/js/all.min.js"></script>

<!--Ajax JS File-->
<script>
    $(document).ready(function() {

        //Ajax Call Form Already Exists Email Verification
        $("#stuemail").on("keypress blur", function() {
            //console.log("Already Exists Email Verification Call");
            var stuemail = $("#stuemail").val();
            $.ajax({
                url: '../addstudent.php',
                method: 'POST',
                data: {
                    checkemail: "checkmail",
                    stuemail: stuemail,
                },
                success: function(data) {
                    //  console.log(data);
                    if (data != 0) {
                        $("#statusMsg2").html(
                            '<small style="color:red;">Email ID Already Used !</small>'
                        );
                        $("#stusignup_btn").attr("disabled", true);
                    } else if (data == 0) {
                        $("#stusignup_btn").attr("disabled", false);
                    }
                }
            });
        });



        $("#stusignup_btn").click(function() {
            //console.log("Button Clicked");
            var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
            var stuname = $("#stuname").val();
            var stuemail = $("#stuemail").val();
            var stupass = $("#stupass").val();
            //console.log(stuname);
            //console.log(stuemail);
            //console.log(stupass);

            //Check Form Fields on Form Submission
            if (stuname.trim() == "") {
                $("#statusMsg1").html('<small style="color:red;">Please Enter Name !</small>');
                $("#stuname").focus();

                return false;

            } else if (stuemail.trim() == "") {
                $("#statusMsg2").html('<small style="color:red;">Please Enter Email!</small>');
                $("#stuemail").focus();
                return false;


            } else if (stupass.trim() == "") {
                $("#statusMsg2").html('<small style="color:red;">Please Enter Password!</small>');
                $("#stupass").focus();
                return false;
            } else if (stuemail.trim() != "" && !reg.test(stuemail)) {
                $("#statusMsg2").html('<small style="color:red;">Please Enter Valid Email e.g. example@gmail.com</small>');
                $("#stuemail").focus();
                return false;
            } else {
                $.ajax({
                    url: '../addstudent.php',
                    method: 'POST',
                    dataType: "json",
                    data: {
                        stusignup: "stusignup",
                        stuname: stuname,
                        stuemail: stuemail,
                        stupass: stupass,
                    },
                    success: function(data) {
                        //console.log(data);
                        if (data == "OK") {
                            $('#successMsg').html("<span class='alert alert-success'>Registration Successful !</span>");
                            clearStuRegField();
                        } else if (data == "Failed") {
                            $('#successMsg').html("<span class='alert alert-danger'>Unable To Register Please Try Again Later</span>");
                        }
                    }
                });
            }
        });
    });

    // Empty All Fields 
    function clearStuRegField() {
        $("#stuRegForm").trigger("reset");
        $("#statusMsg1").html("");
        $("#statusMsg2").html("");
        $("#statusMsg3").html("");
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
</body>

</html>