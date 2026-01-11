<?php

// include_once 'db/connect.php';

// session_start();

include_once 'db/connect.php';


include_once 'includes/header.php';

ch_title("Moalym", "View Question");



include_once 'socialLogin/config.php';


include_once 'function/query.php';

// print_r($_SESSION['data']['email']);

// exit;

// if (!isset($_SESSION['user_token'])) {

//     echo "<script>location.href='index.php';</script>";

//     // header("Location: index.php");

//     // ob_end_clean();

// }

if (empty($_SESSION) ) {

    // echo 'Yes';

    $_SESSION['url'] = $_SERVER['SCRIPT_NAME'];

    echo "<script>location.href='login.php';</script>";

    // ob_end_clean();

}



// if (isset($_SESSION['user_token']['email']) ) {

//     $insert_by = $_SESSION['user_token']['email'];

// }

// elseif(isset($_SESSION['data']['email']) ){

//     $insert_by = $_SESSION['data']['email'];

// }



if(isset($_SESSION['data']['local']['email']) ){

    $insert_by = $_SESSION['data']['local']['email'];

}

elseif(isset($_SESSION['data']['social']['email'])){

    $insert_by = $_SESSION['data']['social']['email'];

}

?>





<div id="wrapper">



    <!-- Sidebar -->

    <?php 

    include('includes/sidebar.php');

?>



    <div id="content-wrapper" class="d-flex flex-column">



        <!-- Main Content -->

        <div id="content">



            <!-- Topbar -->

            <?php 

    include('includes/topbar.php')

?>





            <main id="main" class="main">

                <div class="container" style="margin: auto;">

                    <div class="row ">

                        <div class="col-12">

                            <div class="card">

                                <div class="card-header">

                                    <h2>View Question</h2>

                                </div>

                                <div class="card-body">

                                    <div class="col-md-12">

                                        <div class="table-wrap">

                                            <table class="table table-striped-columns">

                                                <thead style="background-color: green;">

                                                    <tr>



                                                        <th class="thed" scope="col">Topic Name</th>

                                                        <th scope="col">Question</th>

                                                        <th scope="col">Option A</th>

                                                        <th scope="col">Option B</th>

                                                        <th scope="col">Option C</th>

                                                        <th scope="col">Option D</th>

                                                        <th scope="col">Correct</th>

                                                        <th scope="col">status</th>

                                                    </tr>

                                                </thead>

                                                <tbody>

                                                    <?php 

                                                    $view_question = view_test_question($con);

                                                    // print_r($view_question);

                                                    for ($i=0; $i < count($view_question) ; $i++) { 

                                                        // print_r( $view_question[$i]['academic_name']);

                                                        echo '<tr>'

                                                        .'<td>'.$view_question[$i]['topic_name'].'</td>'

                                                        .'<td>'.$view_question[$i]['question'].'</td>'

                                                        .'<td>'.$view_question[$i]['option1'].'</td>'

                                                        .'<td>'.$view_question[$i]['option2'].'</td>'

                                                        .'<td>'.$view_question[$i]['option3'].'</td>'

                                                        .'<td>'.$view_question[$i]['option4'].'</td>'

                                                        .'<td>'.$view_question[$i]['correct'].'</td>';

                                                        if ($view_question[$i]['status_post'] == 1) {

                                                            echo '<td>Pending</td>';

                                                        }

                                                        elseif ($view_question[$i]['status_post'] == 2) {

                                                            echo '<td>Approve</td>';

                                                        }

                                                        else{

                                                            echo '<td>Rejected</td>';

                                                        }

                                                       

                                                        '</tr>';

                                                    }

                                                    

                                                    // print_r(view_question($con,'academic'));

                                                    

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

    include('includes/copy_write.php')

?>



        </div>

    </div>

</div>

<div class="modal" id="myModal">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h4 class="modal-title">Image</h4>

                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <img src="" alt="Payment Proof" class="pay_prof img-fluid">

            </div>

            <div class="modal-footer d-flex justify-content-center">

                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>



            </div>

        </div>

        <!-- /.modal-content -->

    </div>

    <!-- /.modal-dialog -->

</div>



<?php 

     

     include('includes/footer.php');

?>