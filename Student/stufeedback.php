<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once("../dbConnection.php");
include("header.php");

if (isset($_SESSION['is_login'])) {
    $stuLogEmail = $_SESSION['stuLogEmail'];
} else {
    echo "<script> location.href='../index.php'; </script>";
}

$sql = "SELECT * FROM student WHERE stu_email='$stuLogEmail'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $stuId = $row["stu_id"];
    $stuName = $row["stu_name"];
    $stuOcc = $row["stu_occ"];
    $stuImg = $row["stu_mg"];
}

if (isset($_REQUEST['submitFeedbackBtn'])) {
    if (($_REQUEST['f_content'] == "")) {
        //msg displayed if required field missing
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2"
         role="alert"> Fill All Fileds </div>';
    } else {
        $fconent = $_REQUEST["f_content"];
        $sql = "INSERT INTO feedback (f_content, stu_id) VALUES
        ('$fconent', '$stuId')";
        if ($conn->query($sql) == TRUE) {
            $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2"
            role="alert"> Submitted Successfully </div>';
        } else {
            $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2"
            role="alert"> Unable to Submitted </div>';
        }
    }
}

?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">FeedBack</h1>
    </div>
    <p class="bg-dark text-white p-2">FeedBack</p>
    <form action="" method="POST">
        <input type="text" class="form-control" name="stuId" id="stuId" value="<?php if (isset($stuId)) {
                                                                                    echo $stuId;
                                                                                } ?>" readonly><br>
        <input type="name" class="form-control" name="name" value="<?php if (isset($stuName)) {
                                                                        echo $stuName;
                                                                    } ?>" readonly><br>
        <input type="name" class="form-control" name="name" value="<?php if (isset($stuOcc)) {
                                                                        echo $stuOcc;
                                                                    } ?>" readonly><br>
        <textarea name="f_content" class="form-control" placeholder="Write Feedback:" style="height: 150px;" id="f_content"></textarea><br>
        <input class="btn btn-outline-dark" type="submit" name="submitFeedbackBtn"><br><br>
        <?php if (isset($passmsg)) {
            echo $passmsg;
        } ?>
    </form>
</main>

<?php
include("footer.php");
?>