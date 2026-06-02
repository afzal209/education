<?php 

if(isset($_POST['submit'])){
    // include('../db/connect.php');
    require_once dirname(dirname(__DIR__)) .'/config.php';
 	include(BASE_PATH.'/db/connect.php');

    if( empty($_POST['name'])){
        header('location:../addacademic.php?response=error&class=danger&message=Please fill the Record');
    }
    else
    {
            $image = $_FILES['image']['tmp_name'];
            $image_name = $_FILES['image']['name'];
            $location = BASE_PATH.'img/';
            $db_path = 'img/'; 
            $name= $_POST['name'];
            $insert_type = $_POST['insert_type'];
            $insert_by = $_POST['insert_by'];
            if($_POST['role'] == 'admin'){
                $query = "insert into academic(academic_name,academic_image,insert_type,insert_by,status_post) values('$name','$db_path$image_name','$insert_type','$insert_by','2')";
            }
            else{
                $query = "insert into academic(academic_name,academic_image,insert_type,insert_by) values('$name','$db_path$image_name','$insert_type','$insert_by')";
            }

            if (move_uploaded_file($image, $location.$image_name)) {
                $query=mysqli_query($con,$query);
                if($query){
                    //echo "<p class='alert alert-success'>inserted success</p>";
                    header('location: ../addacademic.php?response=success&class=success&message=Record inserted Successfully');
                }
                else{
                    //echo "<p class='alert alert-success'>inserted success</p>";
                    header('location: ../addacademic.php?response=error&class=danger&message=error');
                }
            }
    }

}
?>