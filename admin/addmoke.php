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
	ch_title("Moalym", "Add Moke");
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
                                    <h2>Add Moke</h2>
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
                                    <form method="POST" action="<?php echo BASE_URL; ?>admin/phpScript/moke_script.php"
                                        enctype="multipart/form-data">
                                        <input type="hidden" name="insert_by" value="<?php echo $_SESSION['user']['id']; ?>">
                                        
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="job_title" name="job_title"
                                                placeholder="Enter Job title" required>
                                            <label for="job_title">Enter Job title</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="date" value="<?php echo $today; ?>"  min="<?php echo $today; ?>" class="form-control" id="date" name="date"
                                                placeholder="Enter Date" required>
                                            <label for="date">Enter Date</label>
                                        </div>

                                        <!-- Username -->
                                        <div class="mb-3">
                                            <label for="role" class="form-label">Time</label>
                                            <select class="form-control" name="time" id="time" >
                                                <option value="">Time</option>
                                                    <option value="01:00">1</option>
                                                    <option value="02:00">2</option>
                                                    <option value="03:00">3</option>
                                                    <option value="04:00">4</option>
                                                    <option value="05:00">5</option>
                                                    <option value="06:00">6</option>
                                                    <option value="07:00">7</option>
                                                    <option value="08:00">8</option>
                                                    <option value="09:00">9</option>
                                            </select>
                                        </div>
                                        <!-- Email -->
                                        
 
                                        <!-- Role -->
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="start_paper" name="start_paper"
                                                placeholder="Enter Start Paper Ex:06:00:00am" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Start Paper Ex:06:00:00am'" required>
                                            <label for="start_paper">Enter Start Paper</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="end_paper" name="end_paper"
                                                placeholder="Enter End Paper Ex:06:00:00am" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter End Paper Ex:06:00:00am'" required>
                                            <label for="end_paper">Enter End Paper</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="no_of_question" name="no_of_question"
                                                placeholder="Enter Number of Questions" required>
                                            <label for="no_of_question">Enter Number of Questions</label>
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