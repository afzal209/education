<?php
require_once dirname(__DIR__) .'/config.php'; 
        include(BASE_PATH.'db/connect.php');
       if(!isset($_SESSION['user']['email']))
    {
        header('location:index.php');
    }
    

    // print_r($_SESSION);
        ?>



        <?php
       include_once(BASE_PATH .'/includes/header.php'); 
	ch_title("Moalym", "Add Chapter");
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
                                    <form method="POST" action="<?php echo BASE_URL; ?>admin/phpScript/chapter_script.php"
                                        enctype="multipart/form-data">
                                        <input type="hidden" name="insert_by" value="<?php echo $_SESSION['user']['id']; ?>">
                                         <input type="hidden" name="role" value="<?=$_SESSION['user']['role']?>">
                                        <!-- Username -->
                                        <div class="mb-3">
                                            <label for="role" class="form-label">Academy</label>
                                            <select class="form-control" name="academic" id="academic" >
                                                <option value="" selected>Academic Name</option>
                                                    <?php
                                                    $query=mysqli_query($con,"select * from academic where status_post =2 ");
                                                    while ($row=mysqli_fetch_assoc($query)) { 
                                                    ?>
                                                    <option value="<?php echo $row['id'];?>"><?php echo $row['academic_name'];?></option>
                                                    <?php 
                                                        }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- Email -->
                                         <div class="mb-3">
                                            <label for="role" class="form-label">Subject</label>
                                            <select class="form-control" name="subject" id="subject" >
                                                <option value="" selected>Subject Name</option>
                                                    
                                            </select>
                                        </div>

                                        <!-- Password -->
                                       

                                        <!-- Role -->
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Enter Chapter" required>
                                            <label for="name">Enter Chapter</label>
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

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

                <script type="text/javascript">
                    $(document).ready(function(e){
                        $('#academic').on('change', function(e){
                            //console.log(e);
                            var aca_id = e.target.value;
                            //console.log(aca_id);
                            $.get('ajax/chapterServer.php?id='+aca_id, function(data){
                                //console.log(data);
                                var result = JSON.parse(data);
                                //console.log(result);
                                $('#subject').empty();  
                                for(var i=0 ;i<result.length ; i++ ){
                                    //console.log(result[i].id);
                                    $('#subject').append('<option value = "'+result[i].id+'">'+result[i].subject_name+'</option>');
                                }
                            });
                        });
                    });
                </script>  
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