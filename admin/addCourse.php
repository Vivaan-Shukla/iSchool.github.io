<?php
include("../dbConnection.php");
include("header.php");

if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['is_admin_login'])) {
    $adminLogEmail = $_SESSION['adminLogEmail'];
} else {
    echo "<script> location.href='../index.php'; </script>";
}


if (isset($_REQUEST['savecoursebtn'])) {
    if (($_REQUEST['course_name'] == "")) {
        // msg displayed if required field missing
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2"
           role="alert"> Fill All Fileds </div>';
    } else {
        $course_name = $_REQUEST["course_name"];
        $course_price = $_REQUEST["course_price"];
        $course_detail = $_REQUEST["course_detail"];
        $course_image = $_FILES['course_img']['name'];
        $course_image_temp = $_FILES['course_img']['tmp_name'];
        $img_folder = '../media/courses/' . $course_image;
        move_uploaded_file($course_image_temp, $img_folder);


        $sql = "INSERT INTO courses (course_name, course_img, course_price, course_detail) VALUES
        ('$course_name', '$img_folder', '$course_price', '$course_detail')";
        if ($conn->query($sql) == TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2"
            role="alert"> Course Added Successfully </div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2"
            role="alert"> Unable to Add Course </div>';
        }
    }
}


?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h1 class="text-center">Add Course</h1>
    <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="course_name">Enter Course Name</label>
            <input type="name" name="course_name" class="form-control" id="course_name" placeholder="Enter Course Name">
        </div>

        <div class="form-group">
            <label for="course_detail">Enter Course Detail</label><br>
            <textarea name="course_detail" class="form-control" placeholder="Enter Course Detail" style="height: 150px;" id="course_detail"></textarea>
        </div>

        <div class="form-group">
            <label for="course_img" class="form-label">Course Image</label>
            <input class="form-control" type="file" id="course_img" name="course_img">
        </div>

        <div class="form-group">
            <label for="course_price">Enter Course Price</label><br>
            <input type="name" name="course_price" class="form-control" id="course_price" placeholder="Enter Course Price">
        </div>

        <div class="form-group">
            <button class="btn btn-outline-dark" name="savecoursebtn" id="savecoursebtn">Save</button>
            <a href="./adminDashboard.php" class="btn btn-secondary" type="button">Cancel</a>
            <?php if (isset($msg)) {
                echo $msg;
            } ?>
        </div>
    </form>
</main>

<?php
include("footer.php");
?>