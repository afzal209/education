<?php
include('../db/connect.php');
$id=$_GET['id'];
$delete_at = date('Y-m-d H:i:s');
$delete = mysqli_query($con,"delete from questions_meta where question_id = '$id'");
if ($delete) {
    $delete_question=mysqli_query($con,"delete from question where topic_id = '$id'");
    if($delete_question){
        $delete_topic = mysqli_query($con,"delete from topic where chapter_id ='$id' ");
        if ($delete_topic) {
            $delete_chapter=mysqli_query($con,"delete from chapter where id = '$id'");
            if($delete_chapter){
                $delete_subject=mysqli_query($con,"update subject set status_show = 2, deleted_at = '$delete_at' where id = '$id'");
                if($delete_subject){
                    header('location:../viewsubject.php');
                }
                else{
                    echo 'error in delete subject query';
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
}
else{
    echo 'error in delete  query';

}


?>