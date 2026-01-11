	<?php 
    include_once 'db/connect.php';
    if(!isset($_SESSION['user']['email']))
    {
        header('location:login.php');
    }

    include_once 'includeFile/header.php'; 
	ch_title("View Academic");
    include_once 'includeFile/navbar.php';
    ?>
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    View Academic Page
                </h1>
                <!-- <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span><a href="blog-home.html">Blog </a> <span class="lnr lnr-arrow-right"></span> <a href="blog-single.html"> Blog Details Page</a></p> -->
            </div>
        </div>
    </div>
</section>

<div class="whole-wrap">
    <div class="container">
        <div class="section-top-border">
            <?php 
                                        if(@$_GET['response'] != ''){
                                            echo '  <div class="alert alert-'.@$_GET['class'].'">
                                                        <strong>'.ucfirst(@$_GET['response']).'!</strong> '.@$_GET['message'].'
                                                    </div>';
                                                }
                                    ?>
            <div class="progress-table-wrap">
                <div class="progress-table">
                    <div class="table-head ">
                        <div class="country">Academic Name</div>
                        <div class="country">Image</div>
                        <div class="country">Insert Type</div>
                        <div class="country">Status</div>
                        <div class="country">Action</div>
                    </div>
                    <img src="" alt="">
                    <?php
                                    $query=mysqli_query($con,'select * from academic where status_show = 1');
                                    while($row=mysqli_fetch_assoc($query)){
                                        // echo '<pre>'.print_r($row,true).'</pre>'; 
                                    echo' 
                                    <div class="table-row">
                                        <div class="country">'.$row['academic_name'].'</div>
                                        <div class="country"><img src="../'.$row['academic_image'].'" style="width: 127px;height: 40px;"></div>
                                        <div class="country">'.$row['insert_type'].'</div>
                                        ';
                                        if($row['status_post'] == 1){
                                            echo ' <div class="country">Pending</div>';
                                        }
                                        elseif ($row['status_post'] == 2) {
                                            echo '<div class="country">Approve</div>';
                                        }
                                        elseif ($row['status_post'] == 3) {
                                            echo '<div class="country">Rejected</div>';
                                        }
                                        echo'
                                        <div class="country"><a href="academicupdate.php?id=' .$row['id'].'"><i class="fa fa-pencil" aria-hidden="true"></i></a>/<a href="phpDeleteScript/academicdelete.php?id='.$row['id'].'"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
                                    </div>
                                    ';
                                        }
                                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include('includeFile/footer.php');
    ?>