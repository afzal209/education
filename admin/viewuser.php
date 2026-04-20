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
	ch_title("Moalym", "View User");


    include(BASE_PATH.'function/query.php');
   
    // include_once 'includeFile/navbar.php';
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

                                                       

                                                        <th class="thed" scope="col">Username</th>

                                                        <th scope="col">Email</th>

                                                        <th scope="col">Permission</th>
                                                        <th scope="col">Permission Subject</th>
                                                        <th scope="col">Role</th>
                                                        <th scope="col">Action</th>
                                                        

                                                    </tr>

                                                </thead>

                                                <tbody>

                                                    <?php 

                                                   $query=mysqli_query($con,'select user.*,user_permission.*,subject.*,academic.*,group_concat( subject.subject_name ) as permission_con  from user left join user_permission on user.id = user_permission.user_id LEFT JOIN subject ON subject.id = user_permission.permission_sub LEFT JOIN academic ON academic.id = user_permission.permission where user.id != 1 Group By user.username');
                                                    if(mysqli_num_rows($query) > 0){
                                                      while($row=mysqli_fetch_assoc($query)){ 
                                                        echo '<tr>'

                                                        .'<td>'.$row['username'].'</td>'
                                                        .'<td>'.$row['email'].'</td>'
                                                        .'<td>'.$row['permission_con'].'</td>'
                                                        .'<td>'.$row['academic_name'].'</td>'
                                                        .'<td>'.$row['role'].'</td>'
                                                        .'<td style="text-align : center"><a href="userpermission.php?id=' .$row['user_id'].'" class="pay_link"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                                        <a href="userupdate.php?id=' .$row['user_id'].'" class="pay_link"><i class="fa fa-pencil" aria-hidden="true"></i></a> <a href="phpDeleteScript/userdelete.php?id='. $row['user_id'].'" class="pay_link"><i class="fa fa-trash" aria-hidden="true"></i></a> </td>';

                                                       

                                                       

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