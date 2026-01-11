<?php



if(isset($_POST['submit'])){



@include ('../db/connect.php');

$question=$_POST['question'];

$option1=$_POST['option1'];

$option2=$_POST['option2'];

$option3=$_POST['option3'];

$option4=$_POST['option4'];

$correct=$_POST['correct'];

$status_post = $_POST['status_post'];


    $update=mysqli_query($con,"update question set question='$question', option1='$option1',option2='$option2' ,option3 = '$option3',option4='$option4' , correct = '$correct',status_post=$status_post where id='$id'");

    if($update){
        echo "<script>location.href='viewquestion.php?response=success&class=success&message=Record has been updated Successfully';</script>";
        // header('location:viewquestion.php?response=success&class=success&message=Record has been updated Successfully');
        // ob_end_flush();
    }

}

?>