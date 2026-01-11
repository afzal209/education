<?php







if(isset($_POST['submit'])){



    @include ('../db/connect.php');

    $name=$_POST['name'];

    $title = $_POST['title'];

    $video=$_POST['video'];

    $article=htmlspecialchars($_POST['article']);

    $status_post = $_POST['status_post'];

    

    if(preg_match('/youtube/',$video)){



        //echo 'youtube';



    $youtube_link=$video;



    $update=mysqli_query($con,"update topic set topic_name='$name',topic_title='$title', topic_embed='$youtube_link',topic_article='$article',status_post = $status_post where id='$id'");



        if($update){

            // header('location:viewtopic.php?response=success&class=success&message=Record has been updated Successfully');
 echo "<script>location.href='viewtopic.php?response=success&class=success&message=Record has been updated Successfully';</script>";
            // ob_end_flush();

        }



    }

    elseif(preg_match('/youtu.be/',$video)){



        //echo 'youtube';



    $youtube_embed_link=$video;



    $update=mysqli_query($con,"update topic set topic_name='$name',topic_title='$title', topic_embed='$youtube_embed_link',topic_article='$article',status_post = $status_post where id='$id'");



        if($update){

            // header('location:viewtopic.php?response=success&class=success&message=Record has been updated Successfully');
 echo "<script>location.href='viewtopic.php?response=success&class=success&message=Record has been updated Successfully';</script>";
            // ob_end_flush();

        }



    }

    elseif(preg_match('/dailymotion/',$video)){



        //echo 'dailymotion';



        $dailymotion_link=$video;



        $update=mysqli_query($con,"update topic set topic_name='$name',topic_title='$title', topic_embed='$dailymotion_link',topic_article='$article',status_post = $status_post where id='$id'");



        if($update){

            // header('location:viewtopic.php?response=success&class=success&message=Record has been updated Successfully');
 echo "<script>location.href='viewtopic.php?response=success&class=success&message=Record has been updated Successfully';</script>";
            // ob_end_flush();

        }



    }

    elseif(preg_match('/dai.ly/',$video)){



        //echo 'dailymotion';



        $dailymotion_embed_link=$video;



        $update=mysqli_query($con,"update topic set topic_name='$name',topic_title='$title', topic_embed=' $dailymotion_embed_link',topic_article='$article',status_post = $status_post where id='$id'");



        if($update){

            // header('location:viewtopic.php?response=success&class=success&message=Record has been updated Successfully');
 echo "<script>location.href='viewtopic.php?response=success&class=success&message=Record has been updated Successfully';</script>";
            // ob_end_flush();

        }

    }



    else {

        echo "<script>alert('This Link is not Allowed')</script>";

    }



    

}

?>