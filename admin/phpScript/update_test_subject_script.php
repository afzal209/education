<?php



if(isset($_POST['submit'])){

    @include ('../db/connect.php');
    $name=$_POST['name'];
    $image=$_FILES['image_t']['tmp_name'];
    $image_name=$_FILES['image_t']['name'];
    $status_post=$_POST['status_post'];
    // print_r($_POST);
    // exit;
     $query = mysqli_query($con,"select id,subject_image from test_subject where id='$id'");
     $row = mysqli_fetch_assoc($query);
     $image_old = $row['subject_image'];
    $location="../img/";
    $db_path = "img/";
    $path =$location.$image_name;
    if($image_name != ""){
        rename($image_old,$path);
     if(move_uploaded_file($image,$path)){
          $update=mysqli_query($con,"update test_subject set  subject_name='$name',subject_image='$db_path$image_name',status_post=$status_post where id='$id'");
     }
    }
    else{
        $update=mysqli_query($con,"update test_subject set  subject_name='$name',status_post=$status_post where id='$id'");
    }
    
    // $insert_type = $_POST['insert_type'];
// echo "update test_subject set  subject_name='$name',insert_type='$insert_type',status_post=$status_post where id='$id'";
// exit;
   
   

   

    if($update){
        // header('location:viewacademic.php?response=success&class=success&message=Record has been updated Successfully');
        // ob_end_flush();
        echo "<script>location.href='viewtestsubject.php?response=success&class=success&message=Record has been updated Successfully';</script>";
    }

   

    
}
?>