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

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Student's</h1>
    </div>
    <p class="bg-dark text-white p-2">List of Students</p>
    <?php
    $sql = "SELECT * FROM student";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Student ID</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Student Email</th>
                    <th scope="col">Student Password</th>
                    <th scope="col">Student Occupation</th>
                    <th scope="col">Student Profile Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<th scope="row">' . $row['stu_id'] . '</th>';
                    echo '<td>' . $row['stu_name'] . '</td>';
                    echo '<td>' . $row['stu_email'] . '</td>';
                    echo '<td>' . $row['stu_pass'] . '</td>';
                    echo '<td>' . $row['stu_occ'] . '</td>';
                    echo '<td>' . $row['stu_mg'] . '</td>';
                    echo '<td>
                    <form action="" method="POST" class="d-inline">
                    <input type="hidden" name="id" value=' . $row['stu_id'] . '>
                       <button
                       type="submit"
                       class="btn btn-secondary"
                       name="delete"
                       value="Delete">
                       <i class="far fa-trash-alt"></i>
                       </button>
                    </form>
                   </td>
                    </tr>
                    ';
                }
                ?>
            </tbody>
        </table>
    <?php } else {
        echo "0 Result";
    }
    if (isset($_REQUEST['delete'])) {
        $sql = "DELETE FROM student WHERE stu_id = {$_REQUEST['id']}";
        if ($conn->query($sql) == TRUE) {
            echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
        } else {
            echo "Unable to Delete Data";
        }
    }
    ?>
    <div>
        <a class="btn btn-danger box" data-bs-toggle="modal" data-bs-target="#stuSignUp"><i class="fas fa-plus fa-2x"></i></a>
    </div>
</main>

<?php
include("footer.php");
?>