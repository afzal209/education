<?php
// include_once 'db/connect.php';
// session_start();
include_once 'db/connect.php';
include_once 'includes/header.php';
ch_title("Moalym", "Add Academic");

include_once 'socialLogin/config.php';
// include_once 'db/connect.php';
// print_r($_SESSION['data']['email']);
// exit;
// if (!isset($_SESSION['user_token'])) {
//     echo "<script>location.href='index.php';</script>";
//     // header("Location: index.php");
//     // ob_end_clean();
// }
// echo $_SERVER['SCRIPT_NAME'];
// exit;

if (empty($_SESSION) ) {
    // echo 'Yes';
    $_SESSION['url'] = $_SERVER['SCRIPT_NAME'];
    echo "<script>location.href='login.php';</script>";
    // ob_end_clean();
}


if(isset($_SESSION['data']['local']['email']) ){
    $insert_by = $_SESSION['data']['local']['email'];
}
elseif(isset($_SESSION['data']['social']['email'])){
    $insert_by = $_SESSION['data']['social']['email'];
}
// echo $user_name;
// print_r($_SESSION['data']['email']);
// exit;


// print_r($_SESSION);
// exit;
if (isset($_POST['submit'])) {
 

    if (empty($_POST['name']) || empty($_POST['insert_type'])) {
        header('location:add_academic.php?response=error&class=danger&message=Please fill the Record');
    } else {
        $image = $_FILES['image']['tmp_name'];
        $image_name = $_FILES['image']['name'];
        $location = 'img/';
        $name = $_POST['name'];
        $insert_type = $_POST['insert_type'];

        // print_r("insert into academic(academic_name,academic_image,insert_type,insert_by) values('$name','$location$image_name','$insert_type','$insert_by')");
        // exit;
        if (move_uploaded_file($image, $location.$image_name)) {
            // print_r($location.$image_name);
            $query = mysqli_query($con, "insert into academic(academic_name,academic_image,insert_type,insert_by) values('$name','$location$image_name','$insert_type','$insert_by')");
            if ($query) {
                //echo "<p class='alert alert-success'>inserted success</p>";
                echo "<script>location.href='add_academic.php?response=success&class=success&message=Record inserted Successfully';</script>";
                // header('location: add_subject.php?response=success&class=success&message=Record inserted Successfully');
            } else {
                //echo "<p class='alert alert-success'>inserted success</p>";
                echo "<script>location.href='add_academic.php?response=error&class=danger&message=error';</script>";
                // header('location: add_subject.php?response=error&class=danger&message=error');
            }
        } else {
            // header('location: add_subject.php?response=error&class=danger&message=Error In Image ');
            echo "<script>location.href='add_academic.php?response=error&class=danger&message=Error In Image';</script>";

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
                                    <h2>Add Academic</h2>
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
                                            
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <label for="image" class="form-label">Add Image</label>
                                                <div class="col-8">
                                                    <input type="file" class="form-control" id="image"
                                                        placeholder="Add Topic" name="image">
                                                </div>
                                            
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="name" placeholder="option a"
                                                name="name">
                                            <label for="name">Academic Name</label>
                                        </div>
                                        <div class="form-group mt-10">
                                                <select class="form-control" name="insert_type" id="insert_type" >
                                                    <option value="" selected>Insert Type</option>
                                                    <option value="academic">Academic</option>
                                                    <option value="entrytest">Entry Test</option>
                                                    <option value="testparation">Test preparation</option>
                                                </select>
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