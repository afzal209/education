<?php



if(isset($_POST['submit'])){

    @include ('../db/connect.php');
    $name=$_POST['name'];
    $insert_type=$_POST['insert_type'];
    $status_post=$_POST['status_post'];

    
   

    $update=mysqli_query($con,"update academic set academic_name='$name',insert_type='$insert_type',status_post='$status_post' where id='$id'");

    if($update){
        // header('location:viewacademic.php?response=success&class=success&message=Record has been updated Successfully');
        // ob_end_flush();
        echo "<script>location.href='viewacademic.php?response=success&class=success&message=Record has been updated Successfully';</script>";
    }

   

    
}
?>