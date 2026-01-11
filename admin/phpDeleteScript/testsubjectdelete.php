<?php
include('../db/connect.php');
$id=$_GET['id'];
//$delete = mysqli_query($con,"delete from questions_meta where question_id = '$id'");
//if ($delete) {
    $delete_question=mysqli_query($con,"update  test_question set status_post = 3 where test_topic_id = '$id'");
    if($delete_question){
        $delete_topic = mysqli_query($con,"update test_topic set status_post = 3 where test_chapter_id ='$id' ");
        if ($delete_topic) {
            $delete_chapter=mysqli_query($con,"update test_chapter set status_post = 3 where test_subject_id = '$id'");
            if($delete_chapter){
                $delete_subject=mysqli_query($con,"update test_subject set status_post = 3 where id = '$id'");
                if($delete_subject){
                    header('location:../viewtestsubject.php');
                }
                else{
                echo 'error in delete Subject query';
                }
            }
            else{
                echo 'error in delete chapter query';
            }
        }
        else{
            echo 'error in delete topic query';
        }    
    }
    else{
        echo 'error in delete question query';
    }
//}
// else{
//     echo 'error in delete  query';

// }


?>