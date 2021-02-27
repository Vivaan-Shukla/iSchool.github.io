<?php
include("./dbConnection.php");
include("./header.php");
?>

<div class="container-fluid remove-vid-marg">
    <div class="vid-parent">
        <video playsinline autoplay muted loop>
            <source src="media/banvid.mp4">
        </video>
        <div class="vid-overlay"></div>
    </div>
    <div class="vid-content">
        <h1 class="my-content">Welcome to iSchool</h1>
        <small class="my-content">Learn And Implement</small> <br>
        <a href="#"  data-bs-toggle="modal" data-bs-target="#stuSignUp" class="btn btn-danger">Get Started</a>
    </div>
</div>

<div class="container mt-5">
    <h1 class="text-center">All Courses</h1>
    <div class="row gx-5">
        <?php
        $sql = "SELECT * FROM courses";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $course_id = $row['course_id'];
                echo '
                <div class="row py-lg-5">
                   <div class="col-lg-6 col-md-8 mx-auto">
                     <a href="coursedetails.php?course_id=' . $course_id . '" class="btn" style="text-align: left; padding:0px; margin:0px;">
                       <div class="card" style="width: 18rem;">
                           <img src="' . str_replace('..', '.', $row['course_img']) . '" class="card-img-top" alt="...">
                           <div class="card-body">
                               <h5 class="card-title">' . $row['course_name'] . '</h5>
                               <p class="card-text">' . $row['course_detail'] . '</p>
                              <p class="card-text d-inline">Price: <small>' . $row['course_price'] . '</p> 
                               <a class="btn btn-outline-dark" href="coursedetails.php?course_id=' . $course_id . '">Enroll</a>
                           </div>
                       </div>
                     </a>
                   </div>
               </div>
                   ';
            }
        }
        ?>
    </div>
</div>
<?php
include("./footer.php");
?>