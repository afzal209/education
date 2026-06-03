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
	ch_title("Moalym", "Add Test Question");
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
                                    <h2>Add Test Question</h2>
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
                                    <form method="POST" action="<?php echo BASE_URL; ?>admin/phpScript/test_question_script.php"
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

                                        <div class="mb-3">
                                            <label for="role" class="form-label">Topic</label>
                                            <select class="form-control" name="topic" id="topic" >
                                                <option value="" selected>Topic Name</option>
                                                   
                                            </select>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <textarea type="text" class="form-control" id="question" name="question"
                                                placeholder="Enter Question" required></textarea>
                                            <label for="question">Enter Question</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="option1" name="option1"
                                                placeholder="Enter Option 1" required>
                                            <label for="option1">Enter Option 1</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="option2" name="option2"
                                                placeholder="Enter Option 2" required>
                                            <label for="option2">Enter Option 2</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="option3" name="option3"
                                                placeholder="Enter Option 3" required>
                                            <label for="option3">Enter Option 3</label>
                                        </div>
                                              

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="option4" name="option4"
                                                placeholder="Enter Option 4" required>
                                            <label for="option4">Enter Option 4</label>
                                        </div>

                                        
                                        
                                        <div class="mb-3">
                                            <label for="role" class="form-label">language</label>
                                            <select class="form-control" name="correct" id="correct" >
                                                <option value="" selected>Select Correct</option>
                                                <option value="option1">Option 1</option>
                                                <option value="option2">Option 2</option>
                                                <option value="option3">Option 3</option>
                                                <option value="option4">Option 4</option>
                                                
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
                        var sub_id=e.target.value;
                    
                        //console.log(req_id);
                        $.get('ajax/testquestionServer.php?id='+sub_id, function(data){
                            //console.log(data);
                            var result = JSON.parse(data);
                            //console.log(result);
                            //$('#subject').empty();  
                            $('#chapter').empty();
                            $('#chapter').append('<option value = ""></option>'); 
                            for(var i=0; i<result.length; i++){
                                //console.log(result[i].id);
                                $('#chapter').append('<option value="'+ result[i].id+'">'+result[i].chapter_name+'</option>');
                            }
                        });
                    });
                    $('#chapter').on('change',function(e){
                        var cha_id = e.target.value;
                        //console.log(sub_id);
                        $.get('ajax/testquestionServer1.php?id='+cha_id , function(data_s){
                            //console.log(data_s);
                            var result = JSON.parse(data_s);
                            //console.log(result);
                            $('#topic').empty();
                            $('#topic').append('<option value = ""></option>'); 
                            for(var i=0; i<result.length; i++){
                                //console.log(result[i].id);
                                $('#topic').append('<option value="'+ result[i].id+'">'+result[i].topic_name+'</option>');
                            }
                        })
                    });
                    
                });
            </script>   

       <?php
    // include('includeFile/footer.php');

     include_once(BASE_PATH.'/includes/footer.php'); 
    
    ?>