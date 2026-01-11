<?php 

if(isset($_POST['submit'])){
    include('../db/connect.php');

    if( empty($_POST['name'])){
        header('location:../addacademic.php?response=error&class=danger&message=Please fill the Record');
    }
    else
    {
            $image = $_FILES['image']['tmp_name'];
            $image_name = $_FILES['image']['name'];
            $location = '../../img/';
            $name= $_POST['name'];
            $insert_type = $_POST['insert_type'];
            if (move_uploaded_file($image, $location.$image_name)) {
                $query=mysqli_query($con,"insert into academic(academic_name,academic_image,insert_type) values('$name','$location$image_name','$insert_type')");
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