<?php
include('dbConnection.php');
include('header.php');
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

<!--START OF TEXT BANNER-->
<div class="container-fluid bg-danger txt-banner">
    <div class="row bottom-banner">
        <div class="col-sm">
            <h5><i class="fas fa-book"></i> 100+ Online Courses</h5>
        </div>
        <div class="col-sm">
            <h5><i class="fas fa-user mr-3"></i> Expert Instruction</h5>
        </div>
        <div class="col-sm">
            <h5><i class="fas fa-keyboard mr-3"></i> Lifetime Access</h5>
        </div>
        <div class="col-sm">
            <h5><i class="fas fa-rupee-sign"></i> Money Back Guarantee *</h5>
        </div>
    </div>
</div>
<!--END OF TEXT BANNER-->

<div class="container">
    <!-- Three columns of text below the carousel -->
    <?php
    $sql = "SELECT * FROM courses LIMIT 3";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $course_id = $row['course_id'];
            echo '
                <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                <a href="coursedetails.php?course_id=' . $course_id . '" class="btn" style="text-align: left; padding:0px; margin:0px;">
                    <img src="' . str_replace('..', '.', $row['course_img']) . '" class="card-img-top" alt="...">
                    <title>' . $row['course_name'] . '</title>
    
                    <h2>' . $row['course_name'] . '</h2>
                    <p>' . $row['course_detail'] . '</p>
                    <p class="card-text d-inline">Price: <small>' . $row['course_price'] . '</p>
                    <a class="btn btn-outline-dark" href="coursedetails.php?course_id=' . $course_id . '">Enroll</a>
                </a>
            </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
                   ';
        }
    }
    ?>
    <div class="text-center">
        <a href="courses.php" class="btn btn-outline-dark" style="text-align: center;">View All Courses</a>
    </div>
</div>

<br><br><br>
<!--START OF CONTACT US-->
<?php
include('contact-us.php');
?>


<div class="container-fluid bg-danger">
    <div class="row text-white text-center p-1">
        <div class="col-sm">
            <a href="text-white social-hover" href="#" style="color: #fff;"><i class="fab fa-facebook-f"></i> Facebook</a>
        </div>
        <div class="col-sm">
            <a href="text-white social-hover" href="#" style="color: #fff;"><i class="fab fa-facebook-f"></i> Twitter</a>
        </div>
        <div class="col-sm">
            <a href="text-white social-hover" href="#" style="color: #fff;"><i class="fab fa-facebook-f"></i> WhatsApp</a>
        </div>
        <div class="col-sm">
            <a href="text-white social-hover" href="#" style="color: #fff;"><i class="fab fa-facebook-f"></i> Instagram</a>
        </div>
    </div>
</div>

<?php
include('footer.php')
?>