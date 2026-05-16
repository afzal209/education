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
        $id=$_GET['id'];

        $query=mysqli_query($con,"select * from test_chapter where id='$id'");
        $row=mysqli_fetch_assoc($query);
        $name=$row['chapter_name'];
        ?>



        <?php
        include_once(BASE_PATH .'/includes/header.php'); 
	ch_title("Moalym", "Test Update Chapter");
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
                                    <h2>Update Test Chapter</h2>
                                </div>
                                <div class="card-body">
                                    <?php 
                                        if(@$_GET['response'] != ''){
                                            echo '  <div class="alert alert-'.@$_GET['class'].'">
                                                        <strong>'.ucfirst(@$_GET['response']).'!</strong> '.@$_GET['message'].'
                                                    </div>';
                                                }
                                    ?>
                                    <form method="POST" action=""
                                        enctype="multipart/form-data">
                                          
                                        
                                        <!-- Username -->
                                      

                                        <!-- Email -->
                                        

                                        <!-- Password -->
                                       

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Enter Chapter Name" required value="<?php echo $name;?>">
                                            <label for="name">Enter Chapter Name</label>
                                        </div>


                                        <div class="mb-3">
                                            <label for="role" class="form-label">Status</label>
                                            <select class="form-control" name="status_post" id="status_post" >
                                               <option value="" >Status</option>
                                         <option value="1"
                                <?php if($row['status_post'] == 1) echo 'selected' ?>>Pending</option>
                                <option value="2" <?php if($row['status_post'] == 2) echo 'selected' ?>>Approve</option>
                                <option value="3" <?php if($row['status_post'] == 3) echo 'selected' ?>>Rejected
                                </option>
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
    // include('includeFile/footer.php');
     include_once(BASE_PATH.'admin/phpScript/update_test_chapter_script.php'); 

     include_once(BASE_PATH.'/includes/footer.php'); 
    
    ?>