<?php
include_once '../db/connect.php';

$chap_id = @$_GET['id'];

// echo '<pre>'.print_r($sub_id,true).'</pre>';

$query = mysqli_query($con,"select * from test_chapter where test_subject_id  = '$chap_id'");

$result = array();

while($row = mysqli_fetch_assoc($query)){

    array_push($result, $row);

}

//return $query; 

echo json_encode($result,true);
?>