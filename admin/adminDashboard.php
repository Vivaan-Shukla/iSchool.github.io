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
$sql = "SELECT * FROM courses";
$result = $conn->query($sql);
$totalcourse = $result->num_rows;

$sql = "SELECT * FROM student";
$result = $conn->query($sql);
$totalstu = $result->num_rows;

$sql = "SELECT * FROM course_order";
$result = $conn->query($sql);
$totalsold = $result->num_rows;
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card text-white bg-danger mb-3" style="max-width: 10rem;">
                <div class="header text-center">Courses</div>
                <div class="card-body">
                    <h4 class="card-title text-center">
                        <?php echo $totalcourse; ?>
                    </h4>
                    <a href="#" class="btn text-white"></a>
                </div>
            </div>
        </div>


        <div class="col-lg-4">
            <div class="card text-white bg-success mb-3" style="max-width: 10rem;">
                <div class="header text-center">Student</div>
                <div class="card-body">
                    <h4 class="card-title text-center">
                        <?php echo $totalstu; ?>
                    </h4>
                    <a href="#" class="btn text-white"></a>
                </div>
            </div>
        </div>


        <div class="col-lg-4">
            <div class="card text-white bg-info mb-3" style="max-width: 10rem;">
                <div class="header text-center">Sold</div>
                <div class="card-body">
                    <h4 class="card-title text-center">
                        <?php echo $totalsold; ?>
                    </h4>
                    <a href="#" class="btn text-white"></a>
                </div>
            </div>
        </div>
    </div>
    <p class="bg-dark text-white p-2">List of Orders</p>
    <?php
    $sql = "SELECT * FROM course_order";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Course ID</th>
                    <th scope="col">Order ID</th>
                    <th scope="col">Student Email</th>
                    <th scope="col">Course ID</th>
                    <th scope="col">Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<th scope="row">' . $row['co_id'] . '</th>';
                    echo '<td>' . $row['order_id'] . '</td>';
                    echo '<td>' . $row['stu_email'] . '</td>';
                    echo '<td>' . $row['amount'] . '</td>';
                    echo '<td>' . $row['course_id'] . '</td>';
                    echo '
                    </tr>
                    ';
                }
                ?>
            </tbody>
        </table>
    <?php } else {
        echo "0 Order's";
    }

    ?>
</main>

<?php
include("footer.php");
?>