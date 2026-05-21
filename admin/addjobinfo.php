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
	ch_title("Moalym", "Add Job Info");
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
                                    <h2>Add Job Info</h2>
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
                                    <form method="POST" action="<?php echo BASE_URL; ?>admin/phpScript/job_ads_info_script.php"
                                        enctype="multipart/form-data">
                                        <input type="hidden" name="insert_by" value="<?php echo $_SESSION['user']['id']; ?>">
                                        <div class="mb-3">
                                            <label for="role" class="form-label">Organization Name</label>
                                            <select class="form-control" name="organization_name" id="organization_name" required>
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
                                            <label for="role" class="form-label">Job Title</label>
                                            <select class="form-control" name="job_ads" id="job_ads" required>
                                                <option value="" selected>Choose Title</option>
                                            </select>
                                        </div>

                                        

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="no_of_post" name="no_of_post"
                                                placeholder="Enter Number of Posts" required>
                                            <label for="no_of_post">Enter Number of Posts</label>
                                        </div>
                                        
                                        
   

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="department" name="department"
                                                placeholder="Enter Department" required value="">
                                            <label for="department">Enter Department</label>
                                        </div>


                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="quota" name="quota"
                                                placeholder="Number (urban) Number (rural)" required value="">
                                            <label for="quota">Enter Quota</label>
                                        </div>


                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="job_designaiton" name="job_designaiton"
                                                placeholder="Enter Job Designation" required>
                                            <label for="job_designaiton">Enter Job Designation</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="city" name="city"
                                                placeholder="Enter City" required>
                                            <label for="city">Enter City</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="provinces" name="provinces"
                                                placeholder="Enter Province" required>
                                            <label for="provinces">Enter Province</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="issue_date" name="issue_date"
                                                placeholder="Enter Issue Date" required value="<?php echo $today;?>">
                                            <label for="issue_date">Enter Issue Date</label>
                                        </div>


                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="last_date" name="last_date"
                                                placeholder="Enter Last Date" required>
                                            <label for="last_date">Enter Last Date</label>
                                        </div>


                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="source" name="source"
                                                placeholder="Enter Source" required>
                                            <label for="source">Enter Source</label>
                                        </div>


                                         <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="categories" name="categories"
                                                placeholder="Enter Categories" required>
                                            <label for="categories">Enter Categories</label>
                                        </div>
                                        
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
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

                <script type="text/javascript">
                $(document).ready(function(e){
                        $('#organization_name').on('change', function(e){
                            //console.log(e);
                            var organization_name = e.target.value;
                            //console.log(job_ads_id);
                            $.get('ajax/organizationServer.php?id='+organization_name, function(data){
                                //console.log(data);
                                var result = JSON.parse(data);
                                //console.log(result);
                                $('#job_ads').empty();  
                                $('#job_ads').append('<option value = ""></option>');
                                for(var i=0 ;i<result.length ; i++ ){
                                    //console.log(result[i].id);
                                    $('#job_ads').append('<option value = "'+result[i].id+'">'+result[i].job_title+'</option>');
                                    // $('#issue_date').val(result[i].issue_date);
                                    // $('#source').val(result[i].source)
                                }
                            });
                        })
                        $('#job_ads').on('change', function(e){
                            //console.log(e);
                            var job_ads_id = e.target.value;
                            //console.log(job_ads_id);
                            $.get('ajax/jobServer.php?id='+job_ads_id, function(data){
                                //console.log(data);
                                var result = JSON.parse(data);
                                //console.log(result);
                                //$('#subject').empty();  
                                for(var i=0 ;i<result.length ; i++ ){
                                    //console.log(result[i].id);
                                    //$('#subject').append('<option value = "'+result[i].id+'">'+result[i].subject_name+'</option>');
                                    $('#issue_date').val(result[i].issue_date);
                                    $('#source').val(result[i].source)
                                }
                            });
                        });
                    });
                </script>
   <?php
    // include('includeFile/footer.php');

     include_once(BASE_PATH.'/includes/footer.php'); 
    
    ?>