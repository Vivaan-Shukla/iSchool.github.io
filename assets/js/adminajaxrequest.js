$(document).ready(function () {

    // AJAX CALL FOR login verification of customar
    $("#adminlog").click(function () {
        //console.log("Login Button Clicked");
        var adminLogEmail = $("#adminLogEmail").val();
        var adminLogPass = $("#adminLogPass").val();
        //console.log(adminLogEmail);
        //console.log(adminLogPass);

        $.ajax({
            url: "admin/admin.php",
            method: "POST",
            data: {
                checkLogemail: "checklogmail",
                adminLogEmail: adminLogEmail,
                adminLogPass: adminLogPass,
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
                        window.location.href = "admin/adminDashboard.php";
                    }, 1000);
                }
            }
        });

    });
});