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
	ch_title("Moalym", "Add Test Topic");
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
                                    <form method="POST" action="<?php echo BASE_URL; ?>admin/phpScript/test_topic_script.php"
                                        enctype="multipart/form-data">
                                        <input type="hidden" name="insert_by" value="<?php echo $_SESSION['user']['id']; ?>">
<input type="hidden" name="role" value="<?=$_SESSION['user']['role']?>">
                                        
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
                                        <div class="mb-3">
                                            <label for="role" class="form-label">Chapter</label>
                                            <select class="form-control" name="chapter" id="chapter" >
                                                <option value="" selected>Chapter Name</option>
                                                   
                                            </select>
                                        </div>   


                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="topic" name="topic"
                                                placeholder="Enter Topic Name" required>
                                            <label for="topic">Enter Topic Name</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="video" name="video"
                                                placeholder="Enter Video Link" required>
                                            <label for="video">Enter Video Link</label>
                                        </div>

                                        <div class="mb-3">
                                            <div class="row">
                                                <label for="image" class="form-label">Add Image</label>
                                                <div class="col-8">
                                                    <input type="file" class="form-control" id="image"
                                                        placeholder="Add Image" name="image">
                                                </div>
                                            
                                            </div>
                                        </div>
                                        
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="description" name="description"
                                                placeholder="Enter Description" required>
                                            <label for="description">Enter Description</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <textarea type="text" class="form-control" id="article" name="article"
                                                placeholder="Enter Article" required></textarea>
                                            <label for="article">Enter Article</label>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="role" class="form-label">language</label>
                                            <select class="form-control" name="lang" id="lang" >
                                                <option value="" selected>Select Language</option>
                                                <option value="english">English</option>
                                                <option value="urdu">Urdu</option>
                                                <!-- Add more language options as needed -->
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
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



                <script type="text/javascript">

                    $(document).ready(function(e){

                        $('#subject').on('change', function(e){

                            //console.log(e);

                            var sub_id = e.target.value;

                        

                            //console.log(aca_id,sub_hd,role_hd);

                            $.get('ajax/testtopicServer.php?id='+sub_id, function(data){

                                //console.log(data);

                                var result = JSON.parse(data);

                                //console.log(result);

                                //$('#subject').empty(); 
                                $('#chapter').empty();   
                                $('#chapter').append('<option value=""> </option>');  

                                for(var i=0 ;i<result.length ; i++ ){

                                    //console.log(result[i].id);

                                    $('#chapter').append('<option value = "'+result[i].id+'">'+result[i].chapter_name+'</option>');

                                }

                            });

                        });

                        // $('#subject').on('change', function(e){

                        //     //console.log(e);

                        //     var sub_id = e.target.value;

                        //     //console.log(aca_id);

                        //     $.get('ajax/topicServer1.php?id='+sub_id, function(data_s){

                        //         //console.log(data);

                        //         var result = JSON.parse(data_s);

                        //         //console.log(result);

                        //          $('#chapter').empty();

                        //          for(var i=0 ;i<result.length ; i++ ){

                        //              //console.log(result[i].id);

                        //              $('#chapter').append('<option value = "'+result[i].id+'">'+result[i].chapter_name+'</option>');

                        //          }

                        //     });

                        // });

                    });

                </script>

       <?php
    // include('includeFile/footer.php');

     include_once(BASE_PATH.'/includes/footer.php'); 
    
    ?>