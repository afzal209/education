<?php
include_once 'db/connect.php';


include_once 'includes/header.php';
ch_title("Moalym", "Add Test Subject");

include_once 'socialLogin/config.php';
// include_once 'db/connect.php';
// @session_start();

// if (!isset($_SESSION['user_token'])) {
//     echo "<script>location.href='index.php';</script>";
//     // header("Location: index.php");
//     // ob_end_clean();
// }
// if (!isset($_SESSION['user_token']) && !empty($_SESSION['user_token'])) {
//     echo "<script>location.href='index.php';</script>";
//     // ob_end_clean();
// }
// if(!isset($_SESSION['data']['email']) && !empty($_SESSION['data']['email']))
// {
//     echo "<script>location.href='index.php';</script>";

//     // header('location:index.php');
//     // ob_end_clean();
// }
if (empty($_SESSION) ) {
    // echo 'Yes';
    $_SESSION['url'] = $_SERVER['SCRIPT_NAME'];
    echo "<script>location.href='login.php';</script>";
    // ob_end_clean();
}

// print_r( $_SESSION);
// exit;


if(isset($_SESSION['data']['local']['email']) ){
    $insert_by = $_SESSION['data']['local']['email'];
}
elseif(isset($_SESSION['data']['social']['email'])){
    $insert_by = $_SESSION['data']['social']['email'];
}
// // echo $user_name;
// print_r($_SESSION['user_token']);
// exit;

// print_r($_SESSION);
// exit;


if (isset($_POST['submit'])) {
    

    if (empty($_POST['subject'] || empty($_POST['insert_type']))) {
        header('location:add_test_subject.php?response=error&class=danger&message=Please fill the Record');
    } elseif (!empty($_POST['subject'])) {
        $image = $_FILES['image_t']['tmp_name'];
        $image_name = $_FILES['image_t']['name'];
        $location = 'img/';
        $name = $_POST['subject'];
        $insert_type = $_POST['insert_type'];
        $sql = "select * from test_subject where subject_name like '%$name%'";
        // echo $sql;
        // exit;
        $query = mysqli_query($con,$sql);
        if (mysqli_num_rows($query) > 0) {
            //  header('location: add_test_subject.php?response=error&class=danger&message=Name Already Exist');
              echo "<script>location.href='add_test_subject.php?response=error&class=danger&message=Name Already Exist';</script>";
        }
        else{
            // print_r("insert into test_subject(subject_image,subject_name,insert_by) values('$location$image_name','$name','$insert_by')");
        // exit;
        if (move_uploaded_file($image, $location.$image_name)) {
            // print_r($location.$image_name);
            $query = mysqli_query($con, "insert into test_subject(subject_image,subject_name,insert_by) values('$location$image_name','$name','$insert_by')");
            if ($query) {
                //echo "<p class='alert alert-success'>inserted success</p>";
                // echo "<script>location.href='add_subject.php?response=success&class=success&message=Record inserted Successfully';</script>";
                header('location: add_test_subject.php?response=success&class=success&message=Record inserted Successfully');
            } else {
                //echo "<p class='alert alert-success'>inserted success</p>";
                echo "<script>location.href='add_test_subject.php?response=error&class=danger&message=error';</script>";
                // header('location: add_subject.php?response=error&class=danger&message=error');
            }
        } else {
            // header('location: add_subject.php?response=error&class=danger&message=Error In Image ');
            echo "<script>location.href='add_test_subject.php?response=error&class=danger&message=Error In Image';</script>";

        }
        }

        
    }
}


?>

<div id="wrapper">

    <!-- Sidebar -->
    <?php 
    include('includes/sidebar.php');
    ?>

    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php 
        include('includes/topbar.php')
        ?>


            <main id="main" class="main">
                <div class="container" style="margin: auto;">
                    <div class="row ">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2>Add Subject</h2>
                                </div>
                                <div class="card-body">
                                <?php 
                                        if(@$_GET['response'] != ''){
                                            echo '  <div class="alert alert-'.@$_GET['class'].'">
                                                        <strong>'.ucfirst(@$_GET['response']).'!</strong> '.@$_GET['message'].'
                                                    </div>';
                                                }
                                    ?>
                                    <form method="POST" action="" enctype="multipart/form-data">
                                        
                                        <div class="mb-3">
                                            <div class="row">
                                                <label for="image" class="form-label">Add Image</label>
                                                <div class="col-8">
                                                    <input type="file" class="form-control" id="image_t"
                                                        placeholder="Add Topic" name="image_t">
                                                </div>
                                            
                                            </div>
                                        </div>
                                       
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="text"
                                                placeholder="option a" name="subject">
                                            <label for="text">Subject Name</label>
                                        </div>
                                        
                                        <div class="col-12 mb-3">
                                            <button type="submit" class="btn btn-primary" name="submit">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </main><!-- End #main -->

            <!-- Footer -->
            <?php 
       include('includes/copy_write.php')
       ?>
        </div>
    </div>
</div>


<?php 
     
     include('includes/footer.php');
     
     ?>