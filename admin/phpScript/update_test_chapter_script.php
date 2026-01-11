<?php



if(isset($_POST['submit'])){

    @include ('../db/connect.php');
    $name=$_POST['name'];
    $status_post = $_POST['status_post'];

    
   

    $update=mysqli_query($con,"update test_chapter set chapter_name='$name', status_post ='$status_post' where id='$id'");

    if($update){
        header('location:viewtestchapter.php?response=success&class=success&message=Record has been updated Successfully');
        ob_end_flush();
    }

   

    
}
?>