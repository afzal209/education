<?php 

if(isset($_POST['submit'])){
    // include '../db/connect.php';
    require_once dirname(dirname(__DIR__)) .'/config.php';
 	include(BASE_PATH.'/db/connect.php');

    if (empty($_POST['text'])) {
        header('location:../testsubject.php?response=error&class=danger&message=Please fill the Record');
    }
    else{

    $image = $_FILES['image_t']['tmp_name'];
        $image_name = $_FILES['image_t']['name'];
        $location = BASE_PATH.'img/';
        $db_path = 'img/';
        $name = $_POST['text'];
        
        $sql = "select * from test_subject where subject_name like '%$name%'";
        $query = mysqli_query($con,$sql);
         if (mysqli_num_rows($query) > 0) {
            header('location:../testsubject.php?response=error&class=danger&message=This name Already Exist');
         
         }
         else{
$name = $_POST['text'];
        $insert_by = $_POST['insert_by'];
            if (move_uploaded_file($image, $location.$image_name)) {
                $query = mysqli_query($con,"insert into test_subject(subject_image,subject_name,insert_by) values('$db_path$image_name','$name','$insert_by')");
        if ($query == 1) {
            header('location:../testsubject.php?response=success&class=success&message=Record Has Been inserted');
        }
        else{
            header('location:../testsubject.php?response=error&class=danger&message=Error');
        }
            }
            else{
                header('location:../testsubject.php?response=error&class=danger&message=Error uploading image');
            }
        
         }
        
    }
}


?>