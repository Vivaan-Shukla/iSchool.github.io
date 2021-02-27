$(document).ready(function () {

  //Ajax Call Form Already Exists Email Verification
  $("#stuemail").on("keypress blur", function () {
    //console.log("Already Exists Email Verification Call");
    var stuemail = $("#stuemail").val();
    $.ajax({
      url: 'addstudent.php',
      method: 'POST',
      data: {
        checkemail: "checkmail",
        stuemail: stuemail,
      },
      success: function (data) {
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



  $("#stusignup_btn").click(function () {
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
    }

    else {
      $.ajax({
        url: 'addstudent.php',
        method: 'POST',
        dataType: "json",
        data: {
          stusignup: "stusignup",
          stuname: stuname,
          stuemail: stuemail,
          stupass: stupass,
        },
        success: function (data) {
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

// AJAX CALL FOR login verification of customar
$("#stulog").click(function () {
  //console.log("Login Button Clicked");
  var stuLogEmail = $("#stuLogemail").val();
  var stuLogPass = $("#stuLogpass").val();
  //console.log(stuLogEmail);
  //console.log(stuLogPass);
  $.ajax({
    url: 'addstudent.php',
    method: 'POST',
    data: {
      checkLogemail: "checklogmail",
      stuLogEmail: stuLogEmail,
      stuLogPass: stuLogPass,
    },
    success: function (data) {
      //console.log(data);
      if (data == 0) {
        $("#statusLogMsg").html(
          '<small class="alert alert-danger">Invalid Email ID or Password!</small>'
        );
      } else if (data == 1) {
        $("#statusLogMsg").html(
          '<div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden">Loading...</span></div><div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden">Loading...</span></div><div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden">Loading...</span></div><div class="spinner-grow spinner-grow-sm" role="status"><span class="visually-hidden">Loading...</span></div>'
        );
        setTimeout(() => {
          window.location.href = "index.php";
        }, 1000);
      }
    }
  });

});