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
        <h1 class="h2">Lessons's</h1>
    </div>
    <form action="" class="mt-3 form-inline d-print-none">
        <div class="form-group mr-3">
            <label for="checkid">Enter Course ID: </label>
            <input type="text" class="form-control ml-3" id="checkid" name="checkid">
        </div>
        <button type="submit" class="btn btn-danger">Search</button>
    </form>

    <?php
    $sql = "SELECT course_id FROM courses";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        if (isset($_REQUEST['checkid']) && $_REQUEST['checkid'] == $row['course_id']) {
            $sql = "SELECT * FROM courses WHERE course_id = {$_REQUEST['checkid']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if (($row['course_id']) == $_REQUEST['checkid']) {
                $_SESSION['course_id'] = $row['course_id'];
                $_SESSION['course_name'] = $row['course_name'];
    ?>
                <h3 class="mt-5 bg-dark text-white p-2">Course ID: <?php if (isset($row['course_id'])) {
                                                                        echo $row['course_id'];
                                                                    } ?>
                    Course Name: <?php if (isset($row['course_name'])) {
                                        echo $row['course_name'];
                                    } ?></h3>
                <?php

                $sql = "SELECT * FROM lesson WHERE course_id = {$_REQUEST['checkid']}";
                $result = $conn->query($sql);
                echo '<table class="table">
        <thead>
            <tr>
                <th scope="col">Lesson ID</th>
                <th scope="col">Lesson Name</th>
                <th scope="col">Lesson Link</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<th scope="row">' . $row['lesson_id'] . '</th>';
                    echo '<td>' . $row['lesson_name'] . '</td>';
                    echo '<td>' . $row['lesson_link'] . '</td>';
                    echo '<td>
                 <form action="" method="POST" class="d-inline">
                 <input type="hidden" name="id" value=' . $row['lesson_id'] . '>
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
                echo "0 Lesson's";
            }

            if (isset($_REQUEST['delete'])) {
                $sql = "DELETE FROM lesson WHERE lesson_id = {$_REQUEST['id']}";
                if ($conn->query($sql) == TRUE) {
                    echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
                } else {
                    echo "Unable to Delete Data";
                }
            }
        }
    }
    ?>

    <?php
    if (isset($_SESSION['course_id'])) {
        echo '
        <a class="btn btn-danger box" href="./addLesson.php"><i
        class="fas fa-plus fa-2x"></i></a>
        ';
    }
    ?>
</main>

<?php
include("footer.php");
?>