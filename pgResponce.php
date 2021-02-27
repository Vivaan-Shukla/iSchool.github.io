<?php
if (!isset($_SESSION)) {
  session_start();
}
include("dbConnection.php");

// Insert Order Data
if (isset($_POST['ORDER_ID']) && isset($_POST['TXN_AMOUNT'])) {
  $order_id = $_POST['ORDER_ID'];
  $stu_email = $_SESSION['stuLogEmail'];
  $course_id = $_SESSION['course_id'];
  $amount = $_POST['TXN_AMOUNT'];
  $sql = "INSERT INTO course_order(order_id, stu_email, amount, course_id) VALUES
    ('$order_id', '$stu_email', '$amount', '$course_id')";
  if ($conn->query($sql) == TRUE) {
    echo "Course Purchased Successfully!!!
       Redirecting to My Profile.....";
    echo "<script> setTimeout(() => {
          window.location.href = 'Student/myCourses.php';
        }, 1000); </script>";
  }
}
