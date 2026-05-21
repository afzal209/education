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
	ch_title("Moalym", "Add Job");
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
                                    <h2>Add Organization</h2>
                                </div>
                                <div class="card-body">
                                    <?php 
                                        if(@$_GET['response1'] != ''){
                                            echo '  <div class="alert alert-'.@$_GET['class1'].'">
                                                        <strong>'.ucfirst(@$_GET['response1']).'!</strong> '.@$_GET['message1'].'
                                                    </div>';
                                                }

                                                  $timezone = "Asia/Karachi";
                                            date_default_timezone_set($timezone);
                                           $today = date("Y-m-d");
                                    ?>
                                    <form method="POST" action="<?php echo BASE_URL; ?>admin/phpScript/job_ads_script.php"
                                        enctype="multipart/form-data">
                                        <input type="hidden" name="insert_by" value="<?php echo $_SESSION['user']['id']; ?>">
                                        <div class="mb-3">
                                            <div class="row">
                                                <label for="image" class="form-label">Add Image</label>
                                                <div class="col-8">
                                                    <input type="file" class="form-control" id="image_logo"
                                                        placeholder="Add Topic" name="image_logo">
                                                </div>
                                            
                                            </div>
                                        </div>    


                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="organization" name="organization"
                                                placeholder="Enter Organization Name" required>
                                            <label for="text">Enter Organization Name</label>
                                        </div>
                                        
                                        
   

                                        <!-- Assign Academic -->
                                        
                                        <!-- Submit -->
                                        <div class="col-12 mb-3">
                                            <input type="submit" class="btn btn-primary" name="submit_Organization" value="Add">
                                        </div>

                                    </form>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h2>Add Job </h2>
                                </div>
                                <div class="card-body">
                                    <?php 
                                        if(@$_GET['response'] != ''){
                                            echo '  <div class="alert alert-'.@$_GET['class'].'">
                                                        <strong>'.ucfirst(@$_GET['response']).'!</strong> '.@$_GET['message'].'
                                                    </div>';
                                                }

                                        //           $timezone = "Asia/Karachi";
                                        //     date_default_timezone_set($timezone);
                                        //    $today = date("Y-m-d");

                                           $timezone = "Asia/Karachi";
                                        date_default_timezone_set($timezone);
                                        //$today = date("d/m/y h:i:sa");
                                        $today = date("d-M-Y l");
                                        $time = date("h:i:sa");
                                    ?>
                                    <form method="POST" action="<?php echo BASE_URL; ?>admin/phpScript/job_ads_script.php"
                                        enctype="multipart/form-data">
                                        <input type="hidden" name="insert_by" value="<?php echo $_SESSION['user']['id']; ?>">
                                        <div class="mb-3">
                                            <label for="role" class="form-label">Subject</label>
                                            <select class="form-control" name="choose_organization" id="choose_organization" required>
                                                <option value="">Organization Name</option>
                                                    <?php
                                                    $query=mysqli_query($con,"select * from organization");
                                                    while ($row=mysqli_fetch_assoc($query)) { 
                                                    ?>
                                                    <option value="<?php echo $row['id'];?>"><?php echo $row['organization_name'];?></option>
                                                    <?php 
                                                        }
                                                ?>
                                            </select>
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
                                            <input type="text" class="form-control" id="job_title" name="job_title"
                                                placeholder="Enter Job Title" required>
                                            <label for="job_title">Enter Job Title</label>
                                        </div>
                                        
                                         <div class="form-floating mb-3">
                                            <textarea type="text" class="form-control" id="content" name="content"
                                                placeholder="Enter Content" required></textarea>
                                            <label for="content">Enter Content</label>
                                        </div>
   

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="issue_date" name="issue_date"
                                                placeholder="Enter Issue Date" required value="<?php echo $today;?>">
                                            <label for="issue_date">Enter Issue Date</label>
                                        </div>


                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="issue_time" name="issue_time"
                                                placeholder="Enter Issue Time" required value="<?php echo $time;?>">
                                            <label for="issue_time">Enter Issue Time</label>
                                        </div>


                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="source" name="source"
                                                placeholder="Enter Source" required>
                                            <label for="source">Enter Source</label>
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