<?php
include_once 'db/connect.php';


include_once 'includes/header.php';

ch_title("Moalym", "Add Question");




include_once 'socialLogin/config.php';



if (empty($_SESSION) ) {

    // echo 'Yes';

    $_SESSION['url'] = $_SERVER['SCRIPT_NAME'];

    echo "<script>location.href='login.php';</script>";

    // ob_end_clean();

}





if(isset($_SESSION['data']['local']['email']) ){

    $insert_by = $_SESSION['data']['local']['email'];

}

elseif(isset($_SESSION['data']['social']['email'])){

    $insert_by = $_SESSION['data']['social']['email'];

}

if(isset($_POST['submit'])){



    







    if( empty($_POST['subject']) || empty($_POST['chapter']) || empty($_POST['question']) || empty($_POST['correct']) || empty($_POST['option1']) || empty($_POST['option2']) || empty($_POST['option3']) || empty($_POST['option4'])){



        // header('location:add_question.php?response=error&class=danger&message=All fields are mandatory.');

        echo "<script>location.href='add_test_question.php?response=error&class=danger&message=All fields are mandatory.';</script>";



    }



    else{

     



        $subject=$_POST['subject'];



        $chapter=$_POST['chapter'];

        

        $topic=$_POST['topic'];



        $question=$_POST['question'];



        $correct=$_POST[$_POST['correct']];



        $option1=$_POST['option1'];



        $option2=$_POST['option2'];



        $option3=$_POST['option3'];



        $option4=$_POST['option4'];



        $new=str_replace("'","\'", $question); 



        // $insert_by = $_POST['insert_by'];



        $query=mysqli_query(



            $con,"insert into test_question (test_subject_id,test_chapter_id,test_topic_id,question,correct,option1,option2,option3,option4,insert_by)



                    values('$subject','$chapter','$topic','$new','$correct','$option1','$option2','$option3','$option4','$insert_by')



                ");



            if($query){



                // header('location:add_question.php?response=success&class=success&message=Record has been added');

                echo "<script>location.href='add_test_question.php?response=success&class=success&message=Record has been added.';</script>";



            }   



        }



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

                                    <h2>Add Question</h2>

                                </div>

                                <div class="card-body">

                                    <?php 

                                        if(@$_GET['response'] != ''){

                                            echo '  <div class="alert alert-'.@$_GET['class'].'">

                                                        <strong>'.ucfirst(@$_GET['response']).'!</strong> '.@$_GET['message'].'

                                                    </div>';

                                                }

                                    ?>

                                    <form method="POST" action="#">

                                        

                                        <div class="mb-3">

                                            <label for="class" class="form-label">Subject</label>

                                            <select class="form-select" aria-label="Default select example" id="subject"

                                                name="subject">

                                                <option selected>Select Subject</option>

                                                <?php

                                                    $query=mysqli_query($con,"select * from test_subject");

                                                    while ($row=mysqli_fetch_assoc($query)) { 

                                                    ?>

                                                <option value="<?php echo $row['id'];?>">

                                                    <?php echo $row['subject_name'];?></option>

                                                <?php 

                                                        }

                                                ?>



                                            </select>

                                        </div>

                                        <div class="mb-3">

                                            <label for="subject" class="form-label">Chapter</label>

                                            <select class="form-select" aria-label="Default select example" id="chapter"

                                                name="chapter">





                                            </select>

                                        </div>

                                        <div class="mb-3">

                                            <label for="topic" class="form-label">Topic</label>

                                            <select class="form-select" aria-label="Default select example" id="topic"

                                                name="topic">





                                            </select>

                                        </div>

                                        <div class="form-floating mb-3">

                                            <textarea type="text" class="form-control" id="question" name="question"

                                                placeholder="Add question here..." rows="2"></textarea>

                                            <label for="question">Question</label>

                                        </div>

                                        <div class="form-floating mb-3">

                                            <input type="text" class="form-control" id="option1" name="option1"

                                                placeholder="option a">

                                            <label for="option1">(a)</label>

                                        </div>

                                        <div class="form-floating mb-3">

                                            <input type="text" class="form-control" id="option2" name="option2"

                                                placeholder="option b">

                                            <label for="option2">(b)</label>

                                        </div>

                                        <div class="form-floating mb-3">

                                            <input type="text" class="form-control" id="option3" name="option3"

                                                placeholder="option c">

                                            <label for="option3">(c)</label>

                                        </div>

                                        <div class="form-floating mb-3">

                                            <input type="text" class="form-control" id="option4" name="option4"

                                                placeholder="option d">

                                            <label for="option4">(d)</label>

                                        </div>

                                        <div class="mb-3">

                                            <label for="class" class="form-label">Correct Answer</label>

                                            <select class="form-select" aria-label="Default select example" id="correct"

                                                name="correct">

                                                <option value="" selected>Correct Answer</option>

                                                <option value="option1">a</option>

                                                <option value="option2">b</option>

                                                <option value="option3">c</option>

                                                <option value="option4">d</option>



                                            </select>

                                        </div>

                                        <div class="col-12 mb-3">

                                            <button type="submit" name="submit" class="btn btn-primary ">Add</button>

                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>





            </main><!-- End #main -->



            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



            <script type="text/javascript">

            $(document).ready(function(e) {

               

                $('#subject').on('change', function(e) {

                    //console.log(e);

                    var sub_id = e.target.value;

                    //console.log(aca_id);

                    $.get('ajax/chapterServer_test.php?id=' + sub_id, function(data_s) {

                        //console.log(data);

                        var result = JSON.parse(data_s);

                        //console.log(result);

                        $('#chapter').empty();

                        $('#chapter').append('<option>Select Chapter</option>');

                        for (var i = 0; i < result.length; i++) {

                            //console.log(result[i].id);

                            $('#chapter').append('<option value = "' + result[i].id + '">' +

                                result[i].chapter_name + '</option>');

                        }

                    });

                });

                $('#chapter').on('change', function(e) {

                    var chap_id = e.target.value;

                    //console.log(sub_id);

                    $.get('ajax/topicServer_test.php?id=' + chap_id, function(data_c) {

                        //console.log(data_s);

                        var result = JSON.parse(data_c);

                        //console.log(result);

                        $('#topic').empty();

                        $('#topic').append('<option>Select Topic</option>');

                        for (var i = 0; i < result.length; i++) {

                            //console.log(result[i].id);

                            $('#topic').append('<option value="' + result[i].id + '">' + result[

                                i].topic_name + '</option>');

                        }

                    })

                });



            });

            </script>

            <!-- Footer -->

            <?php 

       include('includes/copy_write.php')

       ?>

        </div>

    </div>

</div>





<?php 

     

     include('includes/footer.php');

     

     ?>