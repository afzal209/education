    <?php 
        require_once dirname(__DIR__) .'/config.php';
// echo BASE_PATH;
// exit;


    // include(BASE_PATH.'db/connect.php');

     include(BASE_PATH.'db/connect.php');

    if(!isset($_SESSION['user']['email']))
    {
        header('location:index.php');
    }
    ?>

    <?php
   include_once(BASE_PATH .'/includes/header.php'); 
	ch_title("Moalym", "Add Academic");
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
                                    <h2>Add Academic</h2>
                                </div>
                                <div class="card-body">
                                    <?php 
                                        if(@$_GET['response'] != ''){
                                            echo '  <div class="alert alert-'.@$_GET['class'].'">
                                                        <strong>'.ucfirst(@$_GET['response']).'!</strong> '.@$_GET['message'].'
                                                    </div>';
                                                }
                                    ?>
                                    <form method="POST" action="<?php echo BASE_URL; ?>admin/phpScript/academic_script.php"
                                        enctype="multipart/form-data">
                                        <div class="form-floating mb-3">
                                            <input type="file" class="form-control" id="image" name="image"
                                                 required>
                                            <label for="image">Select Image</label>
                                        </div>
                                        <!-- Username -->
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Enter Name" required>
                                            <label for="name">Enter Name</label>
                                        </div>

                                        <!-- Email -->
                                        

                                        <!-- Password -->
                                       

                                        <!-- Role -->
                                        <div class="mb-3">
                                            <label for="role" class="form-label">Type</label>
                                            <select class="form-control" name="insert_type" id="insert_type" >
                                                <option value="" selected>Insert Type</option>
                                                    <option value="academic">Academic</option>
                                                    <option value="entrytest">Entry Test</option>
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

     include_once(BASE_PATH.'/includes/footer.php'); 
    
    ?>