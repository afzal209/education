<?php
include_once 'db/connect.php';
include_once 'includes/header.php';
ch_title("Moalym", "Add Test Chapter");
include_once 'db/connect.php';
include_once 'socialLogin/config.php';

// if (!isset($_SESSION['user_token'])) {
//     header("Location: index.php");
//     // ob_end_clean();
// }
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



if(isset($_POST['submit'])){

    

    if(empty($_POST['subject']) || empty($_POST['name']) ){

        header('location:add_chapter.php?response=error&class=danger&message=Please fill the Record');

    }

    else{
        

        $subject=$_POST['subject'];

        $name=$_POST['name'];

   

        // $image=$_FILES['image']['tmp_name'];

        // $image_name=$_FILES['image']['name'];

        // $location="image/";



       

        // $insert_by = $_POST['insert_by'];    
     

            $query=mysqli_query($con,"insert into test_chapter(test_subject_id,chapter_name,insert_by) values('$subject','$name','$insert_by')");

            if($query){
                echo "<script>location.href='add_test_chapter.php?response=success&class=success&message=Record inserted Successfully';</script>";

                // header('location:add_chapter.php?response=success&class=success&message=Record Has Been inserted');

            }

            else{
                echo "<script>location.href='add_test_chapter.php?response=error&class=danger&message=Error';</script>";

                // header('location:add_chapter.php?response=error&class=danger&message=Error');

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
                                    <h2>Add Chapter</h2>
                                </div>
                                <div class="card-body">
                                <?php 
                                        if(@$_GET['response'] != ''){
                                            echo '  <div class="alert alert-'.@$_GET['class'].'">
                                                        <strong>'.ucfirst(@$_GET['response']).'!</strong> '.@$_GET['message'].'
                                                    </div>';
                                                }
                                    ?>
                                    <form method="POST" action="#">
                                       
                                        <div class="mb-3">
                                            <label for="subject" class="form-label">Subject</label>
                                            <select class="form-select" aria-label="Default select example"
                                                id="subject" name="subject">
                                                <option selected>Select Subject</option>
                                                <?php
                                                    $query=mysqli_query($con,"select * from test_subject");
                                                    while ($row=mysqli_fetch_assoc($query)) { 
                                                    ?>
                                                <option value="<?php echo $row['id'];?>">
                                                    <?php echo $row['subject_name'];?></option>
                                                <?php 
                                                        }
                                                ?>
                                            </select>
                                        </div>
                                        
                                        
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="name"
                                                placeholder="option a" name="name">
                                            <label for="name">Chapter Name</label>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <button type="submit" name="submit" class="btn btn-primary ">Add</button>
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