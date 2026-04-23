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
	ch_title("Moalym", "View Subject");
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

                                    <h2>View Subject</h2>

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

                                            <table class="table table-striped-columns">

                                                <thead style="background-color: green;">

                                                    <tr>

                                                       

                                                        <th class="thed" scope="col">Academic Name</th>

                                                        <th scope="col">Subject Name</th>

                                                        <th scope="col">Image</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Action</th>
                                                       
                                                        

                                                    </tr>

                                                </thead>

                                                <tbody>

                                                    <?php 

                                                   $query=mysqli_query($con,'select subj.*,aca.academic_name from academic aca,subject subj where aca.id = subj.academy_id');
                                                    if(mysqli_num_rows($query) > 0){
                                                      while($row=mysqli_fetch_assoc($query)){ 
                                                        echo '<tr>'

                                                        .'<td>'.$row['academic_name'].'</td>'
                                                         .'<td>'.$row['subject_name'].'</td>'
                                                        .'<td><img src="../'.$row['subject_image'].'" style="width: 127px;height: 40px;"></td>';
                                                       
                                                       if($row['status_post'] == 1){
                                            echo ' <td>Pending</td>';
                                        }
                                        elseif ($row['status_post'] == 2) {
                                            echo '<td>Approve</td>';
                                        }
                                        elseif ($row['status_post'] == 3) {
                                            echo '<td>Rejected</td>';
                                        }
                                                        echo'
                                                        <td style="text-align : center">
                                                        <a href="subjectupdate.php?id=' .$row['id'].'" class="pay_link"><i class="fa fa-pencil" aria-hidden="true"></i></a> <a href="phpDeleteScript/subjectdelete.php?id='. $row['id'].'" class="pay_link"><i class="fa fa-trash" aria-hidden="true"></i></a> </td>';

                                                       

                                                       

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