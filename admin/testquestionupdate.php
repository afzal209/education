<?php 
        require_once dirname(__DIR__) .'/config.php';
// echo BASE_PATH;
// exit;


    // include(BASE_PATH.'db/connect.php');

     include(BASE_PATH.'db/connect.php');

        if(!isset($_SESSION['user']['email']))
        {
            header('location:index.php');
        }
        $id=$_GET['id'];

        $query=mysqli_query($con,"select * from test_question where id='$id'");

        $row=mysqli_fetch_assoc($query);

        $question=$row['question'];

        $option1=$row['option1'];

        $option2=$row['option2'];

        $option3=$row['option3'];

        $option4=$row['option4'];

        $correct=$row['correct'];
       
        ?>



        <?php
        include_once(BASE_PATH .'/includes/header.php'); 
	ch_title("Moalym", "Test Update Question");
        ?>
           <div id="wrapper">

    <!-- Sidebar -->
    <?php 
    include_once(BASE_PATH .'/includes/sidebar.php');
    ?>

    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php 
        include_once(BASE_PATH .'/includes/topbar.php')
        ?>


            <main id="main" class="main">
                <div class="container" style="margin: auto;">
                    <div class="row ">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2>Add Test Topic</h2>
                                </div>
                                <div class="card-body">
                                    <?php 
                                        if(@$_GET['response'] != ''){
                                            echo '  <div class="alert alert-'.@$_GET['class'].'">
                                                        <strong>'.ucfirst(@$_GET['response']).'!</strong> '.@$_GET['message'].'
                                                    </div>';
                                                }

                                                  $timezone = "Asia/Karachi";
                                            date_default_timezone_set($timezone);
                                           $today = date("Y-m-d");
                                    ?>
                                    <form method="POST" action="" enctype="multipart/form-data">
                                        <input type="hidden" name="insert_by"
                                            value="<?php echo $_SESSION['user']['id']; ?>">



                                        <div class="form-floating mb-3">
                                            <textarea type="text" class="form-control" id="question" name="question"
                                                placeholder="Enter Question" required><?php echo $question ?></textarea>
                                            <label for="question">Enter Question</label>
                                        </div>

                                         <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="correct" name="correct"
                                                placeholder="Enter Correct Option" required value="<?php echo $correct ?>">
                                            <label for="correct">Enter Correct Option</label>
                                        </div>   

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="option1" name="option1"
                                                placeholder="Enter Option 1" required value="<?php echo $option1 ?>">
                                            <label for="option1">Enter Option 1</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="option2" name="option2"
                                                placeholder="Enter Option 2" required value="<?php echo $option2 ?>">
                                            <label for="option2">Enter Option 2</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="option3" name="option3"
                                                placeholder="Enter Option 3" required value="<?php echo $option3 ?>">
                                            <label for="option3">Enter Option 3</label>
                                        </div>
                                              

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="option4" name="option4"
                                                placeholder="Enter Option 4" required value="<?php echo $option4 ?>">
                                            <label for="option4">Enter Option 4</label>
                                        </div>

                                        
                                        
                                        <div class="mb-3">
                                            <label for="role" class="form-label">Status</label>
                                            <select class="form-control" name="status_post" id="status_post" >
                                                <option value="" >Status</option>
                                                <option value="1" <?php if($row['status_post'] == 1) echo 'selected' ?>>Pending</option>
                                                <option value="2" <?php if($row['status_post'] == 2) echo 'selected' ?>>Approve</option>
                                                <option value="3" <?php if($row['status_post'] == 3) echo 'selected' ?>>Rejected</option>
                                            </select>
                                        </div>
                                        <!-- Assign Academic -->

                                        <!-- Submit -->
                                        <div class="col-12 mb-3">
                                            <input type="submit" class="btn btn-primary" name="submit" value="Add">
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
       include(BASE_PATH .'/includes/copy_write.php')
       ?>
        </div>
    </div>
</div>      
        <?php
        include(BASE_PATH .'/includes/footer.php');
        include(BASE_PATH .'/admin/phpScript/update_test_question_script.php');
        ?>