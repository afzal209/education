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
	ch_title("Moalym", "Make Subject");
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

        include(BASE_PATH .'includes/topbar.php');
$id=$_GET['id'];
                                $query=mysqli_query($con,"select * from test_subject where id=$id ");
                                $row=mysqli_fetch_assoc($query); 
        ?>



<div class="container-fluid mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-2 rounded">

            <!-- <li class="breadcrumb-item">
                <a href="dashboard.php">Dashboard</a>
            </li> -->

            <li class="breadcrumb-item">
                Moke Test
            </li>

            <li class="breadcrumb-item" >
                <a href="mokeacademic.php">Test Subject</a>
            </li>

              <li class="breadcrumb-item active" aria-current="page">
                <?php echo $row['subject_name']; ?>
            </li>   

        </ol>
    </nav>
</div>





            <main id="main" class="main">

                <div class="container" style="margin: auto;">

                    <div class="row ">

                        <div class="col-12">

                            <div class="card">

                                <div class="card-header">

                                    <h2>Moke Subject</h2>

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

                                       <div class="table-wrap">

                                            <table class="table table-responsive-lg table-striped-columns">

                                                <thead style="background-color: green;">

                                                    <tr>

                                                       

                                                       

                                                        <th class="thed" scope="col">#</th>

                                                        <th scope="col">Subject Name</th>
                                                        
                                                        
                                                        
                                                        

                                                    </tr>

                                                </thead>

                                                <tbody>

                                                    <?php 
                                                    $id=$_GET['id'];
                                                $a = 1;
                                                $query=mysqli_query($con,"select * from test_chapter where test_subject_id = '$id' and status_post = 2");
                                                    if(mysqli_num_rows($query) > 0){
                                                      while($row=mysqli_fetch_assoc($query)){ 
                                                       
                                                        echo '<tr>'

                                                        .'<td>'.$a++.'</td>'
                                                         .'<td><a href="mokechapter.php?id='.$row['id'].'">'.$row['chapter_name'].'</a></td>'.
                                                        
                                                        '</tr>';
                                                      }
                                                    }
                                                    // print_r($view_subject);  

                                                   

                                                    

                                                    // print_r(view_subject($con,'academic'));

                                                    

                                                    ?>

                                                </tbody>

                                            </table>

                                        </div>



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