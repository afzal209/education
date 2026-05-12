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
	ch_title("Moalym", "Make Academic");
    ?>
       <div id="wrapper">



    <!-- Sidebar -->

    <?php 

    include(BASE_PATH .'includes/sidebar.php');

    ?>



    <div id="content-wrapper" class="d-flex flex-column">



        <!-- Main Content -->

        <div id="content">



            <!-- Topbar -->

            <?php 

        include(BASE_PATH .'includes/topbar.php')

        ?>





            <main id="main" class="main">

                <div class="container" style="margin: auto;">

                    <div class="row ">

                        <div class="col-12">

                            <div class="card">

                                <div class="card-header">

                                    <h2>View Academic Lists</h2>

                                </div>

                                <div class="card-body">
<?php 
                                        if(@$_GET['response'] != ''){
                                            echo '  <div class="alert alert-'.@$_GET['class'].'">
                                                        <strong>'.ucfirst(@$_GET['response']).'!</strong> '.@$_GET['message'].'
                                                    </div>';
                                                }
                                    ?>
                                    <div class="col-md-12">

                                        <ol>
        <?php
            $a = 1;
            $query = mysqli_query($con, "SELECT * FROM test_subject");

            if(mysqli_num_rows($query) > 0){
                while($row = mysqli_fetch_assoc($query)){
                    echo '<li class="cs-a">'.$a++.'. 
                            <a href="mokesubject.php?id='.$row['id'].'">
                                '.$row['subject_name'].'
                            </a>
                          </li>';
                }
            }
            else{
                echo '<li>No Chapter Found</li>';
            }
        ?>
    </ol>



                                    </div>

                                </div>

                            </div>



                        </div>

                    </div>

                </div>





            </main><!-- End #main -->

            

            <!-- Footer -->

            <?php 

       include(BASE_PATH .'includes/copy_write.php')

       ?>

        </div>

    </div>

</div>
<?php
         include_once(BASE_PATH.'/includes/footer.php'); 

    ?>