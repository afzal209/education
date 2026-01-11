<?php

// include_once 'db/connect.php';
include_once 'db/connect.php';

include_once 'includes/header.php';

ch_title("Moalym", "Add Topic");


include_once 'socialLogin/config.php';



// if (!isset($_SESSION['user_token'])) {

//     header("Location: index.php");

//     // ob_end_clean();

// }

if (empty($_SESSION) ) {

    // echo 'Yes';

    $_SESSION['url'] = $_SERVER['SCRIPT_NAME'];

    echo "<script>location.href='login.php';</script>";

    // ob_end_clean();

}





// if(isset($_SESSION['data']['local']['email']) ){

//     $insert_by = $_SESSION['data']['local']['email'];

// }

// elseif(isset($_SESSION['data']['social']['email'])){

//     $insert_by = $_SESSION['data']['social']['email'];

// }


if(isset($_SESSION['data']['local']['email']) ){

    $insert_by = $_SESSION['data']['local']['email'];

}

elseif(isset($_SESSION['data']['social']['email'])){

    $insert_by = $_SESSION['data']['social']['email'];

}

if(isset($_POST['submit'])){



    



    if(empty($_POST['subject']) || empty($_POST['name']) || empty($_POST['article'])){

        echo "<script>location.href='add_topic.php?response=error&class=danger&message=Please fill the Record';</script>";

        // header('location:add_topic.php?response=error&class=danger&message=Please fill the Record');



    }



    else{

        $academic =$_POST['academic'];



        $subject=$_POST['subject'];



        $chapter=$_POST['chapter'];



        $name=$_POST['name'];



        $topic_title = $_POST['topic_title'];



        $video=$_POST['video'];



         $image = $_FILES['image']['tmp_name'];

        $image_name = $_FILES['image']['name'];

        $location = 'img/';

// echo $image;

// echo '<br/>';

// echo $image_name;

// echo '<br/>';

// echo $location;

// exit;

        $video_link;



        $article=htmlspecialchars($_POST['article']);



        // $insert_by = $_POST['insert_by'];    

        

        if(!empty($video)){

            if(preg_match('/youtube/',$video)){



                //echo 'youtube';



            $video_link=$video;

            

            



            }

            elseif(preg_match('/youtu.be/',$video)){

    

                //echo 'youtube';

    

            $video_link=$video;

    

            

    

            }

            elseif(preg_match('/dailymotion/',$video)){

    

                //echo 'dailymotion';

    

                $video_link=$video;

    

                

    

            }

            elseif(preg_match('/dai.ly/',$video)){

    

                //echo 'dailymotion';

    

                $video_link=$video;

    

                

    

            }

    

            else{

    

                header('location:add_topic.php?response=error&class=danger&message=This Video link is not supported');

    

            }    

        }

        

        if(empty($image_name)){

            // echo 'if';

            // echo "insert into topic(academy_id,subject_id,chapter_id,topic_name,topic_embed,topic_image,topic_title,topic_article,insert_by) values('$academic','$subject','$chapter','$name','$video_link','$location$image_name','$topic_title','$article','$insert_by')";

            // exit;

            $query=mysqli_query($con,"insert into topic(academy_id,subject_id,chapter_id,topic_name,topic_embed,topic_image,topic_title,topic_article,insert_by) values('$academic','$subject','$chapter','$name','$video_link','$location$image_name','$topic_title','$article','$insert_by')");



            if($query){

                echo "<script>location.href='add_topic.php?response=success&class=success&message=Record inserted Successfully';</script>";

                // header('location:add_topic.php?response=success&class=success&message=Record Has Been inserted');



            }



            else{



                // header('location:add_topic.php?response=error&class=danger&message=Error');

                echo "<script>location.href='add_topic.php?response=error&class=danger&message=Error';</script>";



            }    

        }

        else{

            // echo 'else';

            // echo "insert into topic(academy_id,subject_id,chapter_id,topic_name,topic_embed,topic_image,topic_title,topic_article,insert_by) values('$academic','$subject','$chapter','$name','$video_link','$location$image_name','$topic_title','$article','$insert_by')";

            // exit;

                if (move_uploaded_file($image, $location.$image_name)) {

                    $query=mysqli_query($con,"insert into topic(academy_id,subject_id,chapter_id,topic_name,topic_embed,topic_image,topic_title,topic_article,insert_by) values('$academic','$subject','$chapter','$name','$video_link','$location$image_name','$topic_title','$article','$insert_by')");

    

                if($query){

                    echo "<script>location.href='add_topic.php?response=success&class=success&message=Record inserted Successfully';</script>";

                    // header('location:add_topic.php?response=success&class=success&message=Record Has Been inserted');

    

                }

    

                else{

    

                    // header('location:add_topic.php?response=error&class=danger&message=Error');

                    echo "<script>location.href='add_topic.php?response=error&class=danger&message=Error';</script>";

    

                }

            

            }

            else{

                 echo "<script>location.href='add_academic.php?response=error&class=danger&message=Error In Image';</script>";

            }

        }

        

        

        



        //$link=substr($video,32);



        // if($_FILES["image"]["size"] > 5000000){



        //     header('location:addchapter.php?response=error&class=danger&message=File size is to large');



        // }



        // else{



        //     if(move_uploaded_file($image ,$location.$image_name)){



        // $query=mysqli_query($con,"insert into topic(subject_id,chapter_id,topic_name,topic_embed,topic_article,insert_by) values('$subject','$chapter','$name','$link','$article','$insert_by')");



        // if($query){



        //     header('location:addchapter.php?response=success&class=success&message=Record Has Been inserted');



        // }



        // else{



        //     header('location:addchapter.php?response=error&class=danger&message=Error');



        // }



        //     }



        // }



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

                                    <h2>Add Topic</h2>

                                </div>

                                <div class="card-body">

                                <?php 

                                        if(@$_GET['response'] != ''){

                                            echo '  <div class="alert alert-'.@$_GET['class'].'">

                                                        <strong>'.ucfirst(@$_GET['response']).'!</strong> '.@$_GET['message'].'

                                                    </div>';

                                                }

                                    ?>

                                    <form method="POST" action="#" enctype="multipart/form-data">

                                        <div class="mb-3">

                                            <label for="academic" class="form-label">Class</label>

                                            <select class="form-select" aria-label="Default select example"

                                                id="academic" name="academic">

                                                <option selected>Select Class</option>

                                                <?php

                                                    $query=mysqli_query($con,"select * from academic");

                                                    while ($row=mysqli_fetch_assoc($query)) { 

                                                    ?>

                                                <option value="<?php echo $row['id'];?>">

                                                    <?php echo $row['academic_name'];?></option>

                                                <?php 

                                                        }

                                                ?>

                                            </select>

                                        </div>

                                        <div class="mb-3">

                                            <label for="class" class="form-label">Subject</label>

                                            <select class="form-select" aria-label="Default select example" id="subject"

                                                name="subject">





                                            </select>

                                        </div>

                                        <div class="mb-3">

                                            <label for="subject" class="form-label">Chapter</label>

                                            <select class="form-select" aria-label="Default select example" id="chapter"

                                                name="chapter">





                                            </select>

                                        </div>

                                        

                                        <div class="form-floating mb-3">

                                            <input type="text" class="form-control" id="name" placeholder="option a"

                                                name="name">

                                            <label for="name">Topic Name</label>

                                        </div>

                                        <div class="form-floating mb-3">

                                            <input type="text" class="form-control" id="topic_title" placeholder="option a"

                                                name="topic_title">

                                            <label for="topic_title">Topic Title</label>

                                        </div>

                                        <div class="form-floating mb-3">

                                            <textarea type="text" class="form-control" id="video" name="video"

                                                placeholder="Enter Video Link" rows="2"></textarea>

                                            <label for="video">Video Link</label>

                                        </div>

                                        <div class="mb-3">

                                            <div class="row">

                                                <label for="image" class=" -label">Add Image</label>

                                                <div class="col-8">

                                                    <input type="file" class="form-control" id="image"

                                                        placeholder="Add Topic" name="image">

                                                </div>

                                            

                                            </div>

                                        </div>

                                        <div class="form-floating mb-3">

                                            <textarea type="text" class="form-control" id="article" name="article"

                                                placeholder="Enter article" rows="4"></textarea>

                                            <label for="article">Article</label>

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

                $('#academic').on('change', function(e) {

                    //console.log(e);

                    var aca_id = e.target.value;

                    //console.log(aca_id);

                    $.get('ajax/chapterServer.php?id=' + aca_id, function(data) {

                        //console.log(data);

                        var result = JSON.parse(data);

                        //console.log(result);

                        $('#subject').empty();

                        $('#subject').append('<option selected>Select Subject</option>');

                        for (var i = 0; i < result.length; i++) {

                            //console.log(result[i].id);

                            $('#subject').append('<option value = "' + result[i].id + '">' +

                                result[i].subject_name + '</option>');

                        }

                    });

                });

                $('#subject').on('change', function(e) {

                    //console.log(e);

                    var sub_id = e.target.value;

                    //console.log(aca_id);

                    $.get('ajax/topicServer1.php?id=' + sub_id, function(data_s) {

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