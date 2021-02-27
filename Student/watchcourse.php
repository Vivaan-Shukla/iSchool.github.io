<?php
if (!isset($_SESSION)) {
    session_start();
}
include("../dbConnection.php");


if (isset($_SESSION['is_login'])) {
    $stuLogEmail = $_SESSION['stuLogEmail'];
} else {
    echo "<script> location.href='../index.php'; </script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <title>iSchool Student Watch Course</title>
</head>

<body>

    <div class="container-fluid mg-success p-2">
        <h3>Welcome to E-Learning</h3>
        <a href="./myCourses.php" class="btn btn-danger">My Course</a>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 border-right">
          <h4 class="text-center">Lessons</h4>
          <ul id="playlist" class="nav flex-column">
           <?php
           if(isset($_GET['course_id'])){
               $course_id = $_GET['course_id'];
               $sql = "SELECT * FROM lesson WHERE course_id = 
               '$course_id'";
               $result = $conn->query($sql);
               if($result->num_rows > 0){
                   while($row = $result->fetch_assoc()){
                       echo '<li class="nav-item border-bottom py-2"
                       movieurl='.$row['lesson_link'].' style="cursor:
                       pointer;">'.$row['lesson_name'].'</li>';
                   }
               }                                       
           }
           ?>
          </ul>
        </div>
        <div class="col-sm-8">
          <video id="videoarea" src="" class="mt-5 w-75 ml-2"
          controls></video>
        </div>
      </div>
    </div>

    <!--jQuery And Bootstap-->
    <script src="../assets/js/jquery-3.5.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <!--JS File-->
    <script src="custom.js"></script>

    <!--Font Awesome JS-->
    <script src="../assets/js/all.min.js"></script>

</body>

</html>