<?php 
           // include_once 'db/connect.php';
        require_once dirname(__DIR__) .'/config.php'; 
        include(BASE_PATH.'db/connect.php');
        if(!isset($_SESSION['user']['email']))
        {
            header('location:login.php');
        }
        
        ?>



        <?php
         include_once(BASE_PATH .'/includes/header.php'); 
	ch_title("Moalym", "Add Test Chapter");
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
                                    <h2>Add Test Chapter</h2>
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
                                    <form method="POST" action="<?php echo BASE_URL; ?>admin/phpScript/test_chapter_script.php"
                                        enctype="multipart/form-data">
                                        <input type="hidden" name="insert_by" value="<?php echo $_SESSION['user']['id']; ?>">
                                        <div class="mb-3">
                                            <label for="role" class="form-label">Subject</label>
                                            <select class="form-control" name="subject" id="subject" >
                                                <option value="" selected>subject Name</option>
                                                    <?php
                                                    $query=mysqli_query($con,"select * from test_subject where status_post =2 ");
                                                    while ($row=mysqli_fetch_assoc($query)) { 
                                                    ?>
                                                    <option value="<?php echo $row['id'];?>"><?php echo $row['subject_name'];?></option>
                                                    <?php 
                                                        }
                                                ?>
                                            </select>
                                        </div>    


                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="chapter" name="chapter"
                                                placeholder="Enter Chapter Name" required>
                                            <label for="chapter">Enter Chapter Name</label>
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
    // include('includeFile/footer.php');

     include_once(BASE_PATH.'/includes/footer.php'); 
    
    ?>