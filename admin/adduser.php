<?php 
    // include_once 'db/connect.php';

    require_once dirname(__DIR__) .'/config.php';
// echo BASE_PATH;
// exit;


    // include(BASE_PATH.'db/connect.php');

     include(BASE_PATH.'db/connect.php');

    if(!isset($_SESSION['user']['email']))
    {
        header('location:index.php');
    }
    
    if ($_SESSION['user']['role'] == 'admin') {
        
    ?>



<?php
   include_once(BASE_PATH .'/includes/header.php'); 
	ch_title("Moalym", "Add User");
   
    // include_once 'includeFile/navbar.php';
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
                                    <h2>Add User</h2>
                                </div>
                                <div class="card-body">
                                    <?php 
                                        if(@$_GET['response'] != ''){
                                            echo '  <div class="alert alert-'.@$_GET['class'].'">
                                                        <strong>'.ucfirst(@$_GET['response']).'!</strong> '.@$_GET['message'].'
                                                    </div>';
                                                }
                                    ?>
                                    <form method="POST" action="<?php echo BASE_URL; ?>phpScript/user_script.php"
                                        enctype="multipart/form-data">

                                        <!-- Username -->
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="username" name="username"
                                                placeholder="Enter Username" required>
                                            <label for="username">Enter Username</label>
                                        </div>

                                        <!-- Email -->
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Enter Email" required>
                                            <label for="email">Enter Email</label>
                                        </div>

                                        <!-- Password -->
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Enter Password" required>
                                            <label for="password">Enter Password</label>
                                        </div>

                                        <!-- Role -->
                                        <div class="mb-3">
                                            <label for="role" class="form-label">Type</label>
                                            <select class="form-control" name="role" id="role" onchange="ck_type()">
                                                <option value="" selected>Select Type</option>
                                                <option value="subadmin">Sub Admin</option>
                                                <option value="editor">Editor</option>
                                                <option value="jobeditor">Job Editor</option>
                                                <option value="testeditor">Test Editor</option>
                                                <option value="neweditor">New Editor</option>
                                            </select>
                                        </div>

                                        <!-- Assign Academic -->
                                        <div class="mb-3">
                                            <label for="assignacademic" class="form-label">Assign Academic</label>
                                            <select class="form-control" name="assignacademic" id="assignacademic">
                                                <option value="" selected>Select Academic</option>
                                                <?php
                $query = mysqli_query($con,"select * from academic where status_post =2");
                while ($row = mysqli_fetch_assoc($query)) {
            ?>
                                                <option value="<?php echo $row['id']; ?>">
                                                    <?php echo $row['academic_name']; ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <!-- Assign Subject -->
                                        <div class="mb-3">
                                            <label for="assignsubject" class="form-label">Assign Subject</label>
                                            <select class="form-control selectpicker" multiple data-live-search="true"
                                                name="assignsubject[]" id="assignsubject">
                                                <option value=""></option>
                                            </select>
                                        </div>

                                        <!-- Submit -->
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
       include(BASE_PATH .'/includes/copy_write.php')
       ?>
        </div>
    </div>
</div>
<?php
    // include('includeFile/footer.php');

     include_once(BASE_PATH.'/includes/footer.php'); 
        }
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script>
            $(document).ready(function(e){
                $('#assignacademic').on('change', function(e){
                    //console.log(e);
                    var aca_id = e.target.value;
                    //console.log(aca_id);
                    $.get('ajax/userServer.php?id='+aca_id, function(data){
                    // console.log(data);
                        var result = JSON.parse(data);
                        //var str = '';
                        //console.log(result);
                        $('#assignsubject').empty();  
                        for(var i=0 ;i<result.length ; i++ ){
                            //console.log(result[i].id);
                            // if(result[i].selected){
                            //     str +=result[i].value + ',';
                            // }
                            $('#assignsubject').append('<option value = "'+result[i].id+'">'+result[i].subject_name+'</option>');
                            $('.selectpicker').selectpicker('refresh');    
                        }
                    });
                });
            });
            function ck_type(){
            //alert('tested');
                var user_type = document.getElementById('role').value;
                var assignacademic = document.getElementById('assignacademic');
                var assignsubject = document.getElementById('assignsubject');
                if (user_type == 'editor') {
                    assignacademic.disabled = false;
                    assignsubject.disabled = false;
                }   
                else{
                    assignacademic.disabled = true;
                    assignsubject.disabled = true;
                    assignacademic.value = '';
                    $('.selectpicker option:selected').remove();
                    $('.selectpicker').selectpicker('refresh');
                }
            }
            </script>