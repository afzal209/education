<?php
include('../db/connect.php');
$id=$_GET['id'];

// $delete = mysqli_query($con,"delete from academic where id = '$id'");
$delete = mysqli_query($con,"update academic set status_show = 2 where id = '$id'");

if ($delete) {
    echo "<script>location.href='../viewacademic.php?response=success&class=success&message=Record has been Delete Successfully';</script>";
}

?>