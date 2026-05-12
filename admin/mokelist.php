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
	ch_title("Moalym", "Make List");
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

                                    <h2>View Moke List</h2>

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

                                                        <th scope="col">Moke Title</th>

                                                        <th scope="col">Date</th>
                                                        <th scope="col">Timer</th>
                                                        <th scope="col">Start Paper</th>
                                                        <th scope="col">End Paper</th>
                                                        <th scope="col">No of Question</th>
                                                        <?php
                                                         if($_SESSION['user']['role'] == 'admin'){
                                                         ?>
                                                        <th scope="col">Insert By</th>
                                                        <?php 
                                                         }
                                                        ?>
                                                        <th scope="col">Action</th>

                                                       
                                                        

                                                    </tr>

                                                </thead>

                                                <tbody>

                                                    <?php 
                                                     if($_SESSION['user']['role'] == 'admin'){
                                                        $where  = '';
                                                     }
                                                     else{
                                                         $where  = 'where insert_by = '.$_SESSION['user']['id'];
                                                     }
                                                   $a =1;
                                                    $query = mysqli_query($con,"select * from moke_title " . $where);
                                                    if(mysqli_num_rows($query) > 0){
                                                      while($row=mysqli_fetch_assoc($query)){ 
                                                        echo '<tr>'

                                                        .'<td>'.$a++.'</td>'
                                                        .'<td><a href="mokeselected.php?id='.$row['id'].'">'.$row['job_title'].'</a></td>'
                                                        .'<td>'.$row['date'].'</td>'
                                                        .'<td>'.$row['time'].'</td>'
                                                        .'<td>'.$row['start_paper'].'</td>'
                                                        .'<td>'.$row['end_paper'].'</td>'
                                                        .'<td>'.$row['no_of_question'].'</td>';
                                                        if($_SESSION['user']['role'] == 'admin'){
                                                            echo '<td>'.$row['insert_by'].'</td>';
                                                        }
                                                        
                                                        echo'
                                                        <td style="text-align : center">
                                                        <a href="phpDeleteScript/mokedelete.php?id=' .$row['id'].'" class="pay_link"><i class="fa fa-trash" aria-hidden="true"></i></a> </td>';

                                                       

                                                       

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
