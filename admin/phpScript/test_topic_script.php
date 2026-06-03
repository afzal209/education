<?php
if(isset($_POST['submit'])){



    require_once dirname(dirname(__DIR__)) .'/config.php';
 	include(BASE_PATH.'/db/connect.php');



    if(empty($_POST['subject']) || empty($_POST['chapter']) || empty($_POST['article'])){



        header('location:../testtopic.php?response=error&class=danger&message=Please fill the Record');



    }



    else{

       



        $subject=$_POST['subject'];



        $chapter=$_POST['chapter'];



        $topic=$_POST['topic'];



        $video=$_POST['video'];

        $image=$_FILES['image']['tmp_name'];
        $image_name=$_FILES['image']['name'];
        $location=BASE_PATH.'img/';
        $db_path = 'img/';

        $description = $_POST['description'];
        $lang = $_POST['lang'];
        

        // $image=$_FILES['image']['tmp_name'];



        // $image_name=$_FILES['image']['name'];



        // $location="image/";







        $article=$_POST['article'];



        $insert_by = $_POST['insert_by'];    

        if ($image == "") {
            if(preg_match('/youtube/',$video)){



                //echo 'youtube';



            $youtube_link=$video;

            if($_POST['role'] == 'admin'){
                $query = "insert into topic(academy_id,subject_id,chapter_id,topic_name,topic_embed,topic_article,insert_by,status_post) values('$academic','$subject','$chapter','$name','$youtube_link','$article','$insert_by','2')";
            }
            else{
                $query = "insert into topic(academy_id,subject_id,chapter_id,topic_name,topic_embed,topic_article,insert_by) values('$academic','$subject','$chapter','$name','$youtube_link','$article','$insert_by')";
            }

            $query=mysqli_query($con,$query);



            if($query){



                header('location:../testtopic.php?response=success&class=success&message=Record Has Been inserted');



            }



            else{



                header('location:../testtopic.php?response=error&class=danger&message=Error');



            }



            }

            elseif(preg_match('/youtu.be/',$video)){



                //echo 'youtube';



            $youtube_embed_link=$video;
            if($_POST['role'] == 'admin'){
                $query = "insert into topic(academy_id,subject_id,chapter_id,topic_name,topic_embed,topic_article,insert_by,status_post) values('$academic','$subject','$chapter','$name','$youtube_embed_link','$article','$insert_by','2')";
            }
            else{
                $query = "insert into topic(academy_id,subject_id,chapter_id,topic_name,topic_embed,topic_article,insert_by) values('$academic','$subject','$chapter','$name','$youtube_embed_link','$article','$insert_by')";
            }


            $query=mysqli_query($con,$query);



                if($query){



                    header('location:../testtopic.php?response=success&class=success&message=Record Has Been inserted');



                }



                else{



                    header('location:../testtopic.php?response=error&class=danger&message=Error');



                }



            }

            elseif(preg_match('/dailymotion/',$video)){



                //echo 'dailymotion';



                $dailymotion_link=$video;

                if($_POST['role'] == 'admin'){
                    $query = "insert into topic(academy_id,subject_id,chapter_id,topic_name,topic_embed,topic_article,insert_by,status_post) values('$academic','$subject','$chapter','$name','$dailymotion_link','$article','$insert_by','2')";
                }
                else{
                    $query = "insert into topic(academy_id,subject_id,chapter_id,topic_name,topic_embed,topic_article,insert_by) values('$academic','$subject','$chapter','$name','$dailymotion_link','$article','$insert_by')";
                }


                $query=mysqli_query($con,$query);



                if($query){



                    header('location:../testtopic.php?response=success&class=success&message=Record Has Been inserted');



                }



                else{



                    header('location:../testtopic.php?response=error&class=danger&message=Error');



                }



            }

            elseif(preg_match('/dai.ly/',$video)){



                //echo 'dailymotion';



                $dailymotion_embed_link=$video;



                if($_POST['role'] == 'admin'){
                    $query = "insert into topic(academy_id,subject_id,chapter_id,topic_name,topic_embed,topic_article,insert_by,status_post) values('$academic','$subject','$chapter','$name','$dailymotion_embed_link','$article','$insert_by','2')";
                }
                else{
                    $query = "insert into topic(academy_id,subject_id,chapter_id,topic_name,topic_embed,topic_article,insert_by) values('$academic','$subject','$chapter','$name','$dailymotion_embed_link','$article','$insert_by')";
                }

                $query=mysqli_query($con,$query);



                if($query){



                    header('location:../testtopic.php?response=success&class=success&message=Record Has Been inserted');



                }



                else{



                    header('location:../testtopic.php?response=error&class=danger&message=Error');



                }



            }



            else{



                header('location:../testtopic.php?response=error&class=danger&message=This Video link is not supported');



            }

        }
        else {
             if($_POST['role'] == 'admin'){
                $query = "insert into topic(academy_id,subject_id,chapter_id,topic_name,topic_embed,topic_article,insert_by,status_post) values('$academic','$subject','$chapter','$name','','$article','$insert_by','2')";   
             }
             else{
                $query = "insert into topic(academy_id,subject_id,chapter_id,topic_name,topic_embed,topic_article,insert_by) values('$academic','$subject','$chapter','$name','','$article','$insert_by')";
             }


            if(move_uploaded_file($image, $location.$image_name)){
                $query=mysqli_query($con,$query);
                if($query){
                    header('location:../testtopic.php?response=success&class=success&message=Record Has Been inserted');
                }
                else{
                    header('location:../testtopic.php?response=error&class=danger&message=This Video link is not supported');
                }
            }
        }

        


        //$link=substr($video,32);



        // if($_FILES["image"]["size"] > 5000000){



        //     header('location:addchapter.php?response=error&class=danger&message=File size is to large');



        // }



        // else{



        //     if(move_uploaded_file($image ,$location.$image_name)){



        // $query=mysqli_query($con,"insert into topic(subject_id,chapter_id,topic_name,topic_embed,topic_article,lang,insert_by) values('$subject','$chapter','$name','$link','$article','$lang','$insert_by')");



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