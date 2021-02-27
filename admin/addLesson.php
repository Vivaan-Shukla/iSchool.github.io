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


if (isset($_REQUEST['savelessonbtn'])) {
    if (($_REQUEST['lesson_name'] == "")) {
        // msg displayed if required field missing
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2"
           role="alert"> Fill All Fileds </div>';
    } else {
        $course_name = $_REQUEST["course_name"];
        $course_id = $_REQUEST["course_id"];
        $lesson_name = $_REQUEST["lesson_name"];
        $lesson_detail = $_REQUEST["lesson_detail"];
        $lesson_link = $_FILES['lesson_link']['name'];
        $lesson_link_temp = $_FILES['lesson_link']['tmp_name'];
        $img_folder = '../media/lessonvid/' . $lesson_link;
        move_uploaded_file($lesson_link_temp, $img_folder);


        $sql = "INSERT INTO lesson (lesson_name, lesson_detail, lesson_link, course_id, course_name) VALUES
        ('$lesson_name', '$lesson_detail', '$img_folder', '$course_id', '$course_name')";
        if ($conn->query($sql) == TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2"
            role="alert"> Lesson Added Successfully </div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2"
            role="alert"> Unable to Add Lesson </div>';
        }
    }
}


?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h1 class="text-center">Add Lesson</h1>
    <form action="" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="course_name">Enter Course ID</label>
            <input type="name" name="course_id" class="form-control" value="<?php if(isset($_SESSION['course_id'])) { echo $_SESSION['course_id']; }?>" readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Enter Course Name</label>
            <input type="name" name="course_name" class="form-control" value="<?php if(isset($_SESSION['course_name'])) { echo $_SESSION['course_name']; }?>" readonly>
        </div>
        <div class="form-group">
            <label for="lesson_name">Enter Lesson Name</label>
            <input type="name" name="lesson_name" class="form-control">
        </div>

        <div class="form-group">
            <label for="lesson_detail">Enter Lesson Detail</label><br>
            <textarea name="lesson_detail" class="form-control" style="height: 150px;"></textarea>
        </div>

        <div class="form-group">
            <label for="lesson_link" class="form-label">Lesson Video</label>
            <input class="form-control" type="file" name="lesson_link">
        </div>

        <div class="form-group">
            <button class="btn btn-outline-dark" name="savelessonbtn" ">Save</button>
            <a href=" ./adminDashboard.php" class="btn btn-secondary" type="button">Cancel</a>
                <?php if (isset($msg)) {
                    echo $msg;
                } ?>
        </div>
    </form>
</main>

<?php
include("footer.php");
?>