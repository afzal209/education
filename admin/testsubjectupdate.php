<?php 
        include_once 'db/connect.php';
        $id=$_GET['id'];

        $query1=mysqli_query($con,"select * from test_subject where id='$id'");
        $row1=mysqli_fetch_assoc($query1);
        $imageName = $row1["subject_image"];
        
        if(!isset($_SESSION['user']['email']))
        {
            header('location:login.php');
        }
    
        ?>



<?php
        include_once 'includeFile/header.php'; 
        ch_title("Test Update Subject");
        include_once 'includeFile/navbar.php';
        ?>
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Update Subject
                </h1>
                <!-- <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span><a href="blog-home.html">Blog </a> <span class="lnr lnr-arrow-right"></span> <a href="blog-single.html"> Blog Details Page</a></p> -->
            </div>
        </div>
    </div>
</section>

<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <h3 class="mb-30 text-center">Update Subject</h3>
                    <?php 
                                        if(@$_GET['response'] != ''){
                                            echo '  <div class="alert alert-'.@$_GET['class'].'">
                                                        <strong>'.ucfirst(@$_GET['response']).'!</strong> '.@$_GET['message'].'
                                                    </div>';
                                                }
                                    ?>
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="mt-10">
                            <input type="file" name="image_t" id="image_t" value="<?=$imageName?>">
                        </div>
                        
                        <div class="mt-10">
                            <input type="text" name="name" id="name" placeholder="Enter Subject"
                                value="<?=$row1['subject_name'];?>" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Enter Subject'" required class="single-input">
                        </div>
                        <div class="form-group mt-10">
                            <select class="form-control" name="status_post" id="status_post">
                                <option value="" >Status</option>
                                <option value="1" <?php if($row1['status_post'] == 1) echo 'selected' ?>>Pending
                                </option>
                                <option value="2" <?php if($row1['status_post'] == 2) echo 'selected' ?>>Approve
                                </option>
                                <option value="3" <?php if($row1['status_post'] == 3) echo 'selected' ?>>Rejected
                                </option>
                            </select>
                        </div>
                        
                        <div class="button-group-area mt-40">
                            <input class="genric-btn success-border circle" type="submit" name="submit" value="Add">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
        include 'phpScript/update_test_subject_script.php';
        include('includeFile/footer.php');
        ?>