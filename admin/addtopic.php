<?php 
      require_once dirname(__DIR__) .'/config.php'; 
        include(BASE_PATH.'db/connect.php');
        if(!isset($_SESSION['user']['email']))
        {
            header('location:index.php');
        }
        
        $session_permission = $_SESSION['user']['academic_id'];
        //echo '<pre>'.print_r($session_permission_sub,true).'</pre>';
        $session_permission_sub = $_SESSION['user']['subject_id'];
        //echo '<pre>'.print_r($session_permission_sub,true).'</pre>';
        // //echo $session_var;
        //echo '<pre>'.print_r($session_permission_sub,true).'</pre>';
        $session_permission_ex = explode(',' ,$session_permission_sub);
        //echo '<pre>'.print_r($session_permission_ex,true).'</pre>';
        $session_permission_im = "'".implode(",",$session_permission_ex)."'";
        //echo '<pre>'.print_r($session_permission_im,true).'</pre>';
        $session_role = $_SESSION['user']['role'];
    
        $session_role_ex = explode(',',$session_role);
    
        $session_role_im = "'".implode("",$session_role_ex)."'";
        //echo '<pre>'.print_r($session_permission,true).'</pre>';
    
        // //echo $session_permission;
        $where = "";
        if($_SESSION['user']['role'] == 'editor'){
            $where = "where id IN ($session_permission) and status_post = 2 ";
        }
        else{
            $where = "where status_post = 2";
        }
        $query=mysqli_query($con,"select * from academic $where");
        $resultAcademics = array();
        while($row=mysqli_fetch_assoc($query)){
            $resultAcademics[] = $row;
        }
        //echo '<pre>'.print_r($resultAcademics,true).'</pre>';
        ?>



<?php
         include_once(BASE_PATH .'/includes/header.php'); 
	ch_title("Moalym", "Add Topic");
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
                                    <h2>Add Topic</h2>
                                </div>
                                <div class="card-body">
                                    <?php 
                                        if(@$_GET['response'] != ''){
                                            echo '  <div class="alert alert-'.@$_GET['class'].'">
                                                        <strong>'.ucfirst(@$_GET['response']).'!</strong> '.@$_GET['message'].'
                                                    </div>';
                                                }
                                    ?>
                                    <form method="POST" action="<?php echo BASE_URL; ?>admin/phpScript/topic_script.php"
                                        enctype="multipart/form-data">
                                        <input type="hidden" name="insert_by"
                                            value="<?php echo $_SESSION['user']['id']; ?>">
<input type="hidden" name="role" value="<?=$_SESSION['user']['role']?>">
                                        <!-- Username -->
                                        <div class="mb-3">
                                            <label for="role" class="form-label">Academy</label>
                                            <select class="form-control" name="academic" id="academic">
                                                <option value="" selected>Academic Name</option>
                                                <?php 
                                                        foreach($resultAcademics as $key=>$academic){
                                                            echo '<option value="'.$academic['id'].'" > '.$academic['academic_name'].' </option>';
                                                        }
                                                    ?>
                                            </select>
                                        </div>
                                        <!-- Email -->
                                        <div class="mb-3">
                                            <label for="role" class="form-label">Subject</label>
                                            <select class="form-control" name="subject" id="subject">
                                                <option value="" selected>Subject Name</option>

                                            </select>
                                        </div>


                                        <div class="mb-3">
                                            <label for="chapter" class="form-label">Chapter</label>
                                            <select class="form-control" name="chapter" id="chapter">
                                                <option value="" selected>Chapter Name</option>

                                            </select>
                                        </div>
                                        <!-- Password -->


                                        <!-- Role -->
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Enter Topic" required>
                                            <label for="name">Enter Topic</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="video" name="video"
                                                placeholder="Enter video" required>
                                            <label for="video">Enter video</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" id="article" name="article"
                                                placeholder="Enter article" required></textarea>
                                            <label for="article">Enter article</label>
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
            $(document).ready(function(e) {
                $('#academic').on('change', function(e) {
                    //console.log(e);
                    var aca_id = e.target.value;
                    var sub_hd = <?php echo $session_permission_im?>;
                    var role_hd = <?php echo $session_role_im?>
                    //console.log(aca_id);
                    $.get('ajax/topicServer.php?id=' + aca_id + '&sub_hd=' + sub_hd + '&role_hd=' +
                        role_hd,
                        function(data) {
                            //console.log(data);
                            var result = JSON.parse(data);
                            //console.log(result);
                            $('#subject').empty();
                            $('#subject').append('<option value = ""></option>');
                            for (var i = 0; i < result.length; i++) {
                                //console.log(result[i].id);
                                $('#subject').append('<option value = "' + result[i].id + '">' +
                                    result[i].subject_name + '</option>');
                            }
                        });
                });
                $('#subject').on('change', function(e) {
                    //console.log(e);
                    var sub_id = e.target.value;
                    //console.log(aca_id);
                    $.get('ajax/topicServer1.php?id=' + sub_id, function(data_s) {
                        //console.log(data);
                        var result = JSON.parse(data_s);
                        //console.log(result);
                        $('#chapter').empty();
                        for (var i = 0; i < result.length; i++) {
                            //console.log(result[i].id);
                            $('#chapter').append('<option value = "' + result[i].id + '">' +
                                result[i].chapter_name + '</option>');
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