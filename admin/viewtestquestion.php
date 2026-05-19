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
	ch_title("Moalym", "View Test Question");
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

                                    <h2>View Test Question</h2>

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

                                                       

                                                       

                                                        <th class="thed" scope="col">Topic Name</th>

                                                        <th scope="col">Question Name</th>
                                                        <th scope="col">Correct Answer</th>

                                                        <th scope="col">Option 1</th>
                                                        <th scope="col">Option 2</th>
                                                        <th scope="col">Option 3</th>
                                                        <th scope="col">Option 4</th>

                                                        <?php
                                                        if($_SESSION['user']['role'] == 'admin'){
                                                            ?>
 <th scope="col">Insert By</th>
                                                            <?php
                                                        }

                                                        ?>
                                                       
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Action</th>
                                                        
                                                        
                                                        

                                                    </tr>

                                                </thead>

                                                <tbody>

                                                    <?php 

                                                $query=mysqli_query($con,'select test_topic.topic_name,test_question.* from test_topic RIGHT JOIN test_question ON test_topic.id = test_question.test_topic_id where test_question.test_topic_id = test_topic.id');
                                                    if(mysqli_num_rows($query) > 0){
                                                      while($row=mysqli_fetch_assoc($query)){ 
                                                      
                                                      
                                                        echo '<tr>'

                                                        .'<td>'.$row['topic_name'].'</td>'
                                                         .'<td>'.$row['question'].'</td>'
                                                          .'<td>'.$row['correct'].'</td>'
                                                          .'<td>'.$row['option1'].'</td>'
                                                          .'<td>'.$row['option2'].'</td>'
                                                          .'<td>'.$row['option3'].'</td>'
                                                          .'<td>'.$row['option4'].'</td>'
                                                           ;

                                                                                           
                                                              
                                               if($_SESSION['user']['role'] == 'admin'){
                                         echo '<td>'.$row['insert_by'].'</td>';
                                        
                                        }         
                                                       
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
                                                        <a href="testquestionupdate.php?id=' .$row['id'].'" class="pay_link"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
                                                          if($_SESSION['user']['role'] == 'admin'){
                                                        echo '/<a href="phpDeleteScript/testquestiondelete.php?id='.$row['id'].'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                     }
                                                        echo'</td>';
                                                          
                                                       

                                                       

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