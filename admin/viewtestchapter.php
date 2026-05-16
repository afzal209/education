<?php 
 require_once dirname(__DIR__) .'/config.php';
// echo BASE_PATH;
// exit;


    // include(BASE_PATH.'db/connect.php');

     include(BASE_PATH.'db/connect.php');
    // include_once 'db/connect.php';
    if(!isset($_SESSION['user']['email']))
    {
        header('location:index.php');
    }

    include_once(BASE_PATH .'/includes/header.php'); 
	ch_title("Moalym", "View Test Chapter");
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

                                    <h2>View Test Subject</h2>

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

                                                       

                                                       

                                                        <th class="thed" scope="col">Subject Name</th>

                                                        <th scope="col">Chapter Name</th>
                                                        <th scope="col">Status</th>

                                                        <th scope="col">Insert By</th>
                                                        <th scope="col">Action</th>
                                                        
                                                        
                                                        

                                                    </tr>

                                                </thead>

                                                <tbody>

                                                    <?php 

                                                $query=mysqli_query($con,'select test_subject.subject_name,test_chapter.* from test_subject RIGHT JOIN test_chapter ON test_subject.id = test_chapter.test_subject_id where test_chapter.test_subject_id = test_subject.id');
                                                    if(mysqli_num_rows($query) > 0){
                                                      while($row=mysqli_fetch_assoc($query)){ 
                                                        echo '<tr>'

                                                        .'<td>'.$row['subject_name'].'</td>'
                                                         .'<td>'.$row['chapter_name'].'</td>'
                                                           ;

                                                                                           
                                                              
                                                        
                                                       
                                                       if($row['status_post'] == 1){
                                            echo ' <td>Pending</td>';
                                        }
                                        elseif ($row['status_post'] == 2) {
                                            echo '<td>Approve</td>';
                                        }
                                        elseif ($row['status_post'] == 3) {
                                            echo '<td>Rejected</td>';
                                        }

                                        echo '<td>'.$row['insert_by'].'</td>';
                                                        echo'
                                                        <td style="text-align : center">
                                                        <a href="testchapterupdate.php?id=' .$row['id'].'" class="pay_link"><i class="fa fa-pencil" aria-hidden="true"></i></a>/<a href="phpDeleteScript/testchapterdelete.php?id='.$row['id'].'"><i class="fa fa-trash" aria-hidden="true"></i></a>
                     
                                                        </td>';

                                                       

                                                       

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