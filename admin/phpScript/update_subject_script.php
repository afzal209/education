<?php



if(isset($_POST['submit'])){

    @include ('../db/connect.php');
    $name=$_POST['name'];
    $academicname = $_POST['academicname'];
    $status_post=$_POST['status_post'];
    $insert_type = $_POST['insert_type'];
// echo "update subject set academy_id ='$academicname', subject_name='$name',status_post='$status_post' where id='$id'";
// exit;
    
   

    $update=mysqli_query($con,"update subject set academy_id =$academicname, subject_name='$name',insert_type='$insert_type',status_post=$status_post where id='$id'");

    if($update){
        // header('location:viewacademic.php?response=success&class=success&message=Record has been updated Successfully');
        // ob_end_flush();
        echo "<script>location.href='viewsubject.php?response=success&class=success&message=Record has been updated Successfully';</script>";
    }

   

    
}
?>