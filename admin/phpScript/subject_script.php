<?php

if (isset($_POST['submit'])) {
    // include '../db/connect.php';
  require_once dirname(dirname(__DIR__)) .'/config.php';
 	include(BASE_PATH.'/db/connect.php');
    if (empty($_POST['text'])) {
        header('location:../addsubject.php?response=error&class=danger&message=Please fill the Record');
    } elseif (!empty($_POST['text'])) {

    // print_r($_POST);
    // exit;
        $image = $_FILES['image']['tmp_name'];
        $image_name = $_FILES['image']['name'];
         $location = BASE_PATH.'img/';
            $db_path = 'img/'; 
        $name = $_POST['text'];
        $insert_by = $_POST['insert_by'];
        $academic_name = $_POST['academicname'];

        // print_r($location.$image_name);
        if (move_uploaded_file($image, $location.$image_name)) {
            // print_r($location.$image_name);
            $query = mysqli_query($con, "insert into subject(academy_id,subject_image,subject_name,insert_by) values('$academic_name','$db_path$image_name','$name',$insert_by)");
            if ($query) {
                //echo "<p class='alert alert-success'>inserted success</p>";
                header('location: ../addsubject.php?response=success&class=success&message=Record inserted Successfully');
            } else {
                //echo "<p class='alert alert-success'>inserted success</p>";
                header('location: ../addsubject.php?response=error&class=danger&message=error');
            }
        } else {
            header('location: ../addsubject.php?response=error&class=danger&message=Error In Image ');
        }
    }
}
