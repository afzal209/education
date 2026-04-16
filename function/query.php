<?php
function view_academic($con, $type = NULL)
{
    if ($type == NULL) {
        $query = "select * from academic ";
        $my_query = mysqli_query($con, $query);
        $value = array();
        while ($row = mysqli_fetch_assoc($my_query)) {
            $value[] = $row;
        }
        return $value;
    } else {

        $query = "select * from academic where insert_type= '$type' and status_post =2";
        // echo $query;
        // exit;
        $my_query = mysqli_query($con, $query);
        $value = array();
        while ($row = mysqli_fetch_assoc($my_query)) {
            $value[] = $row;
        }
        return $value;
    }
}



function view_subject($con, $type = NULL, $id = NULL)
{
    if ($type == NULL) {
        $query = "select subj.*,aca.academic_name from academic aca,subject subj where aca.id = subj.academy_id ";
        $my_query = mysqli_query($con, $query);
        $value = array();
        while ($row = mysqli_fetch_assoc($my_query)) {
            $value[] = $row;
        }
        return $value;
    } else {

        $query = "select subj.*,aca.academic_name from academic aca,subject subj where aca.id = subj.academy_id and subj.status_post =2 and subj.insert_type = '$type' and subj.academy_id='$id'  ";

        $my_query = mysqli_query($con, $query);
        $value = array();
        while ($row = mysqli_fetch_assoc($my_query)) {
            // print_r($row);
            $value[] = $row;
        }
        // exit;
        return $value;
    }
}

function view_chapter($con)
{
    $query = "select chap.*,subj.subject_name,aca.academic_name from academic aca,subject subj,chapter chap where aca.id = chap.academy_id and subj.id = chap.subject_id ";
    $my_query = mysqli_query($con, $query);
    $value = array();
    while ($row = mysqli_fetch_assoc($my_query)) {
        $value[] = $row;
    }
    return $value;
}

function view_topic($con)
{
    $query = "select top.*,chap.chapter_name,subj.subject_name,aca.academic_name from academic aca,subject subj,chapter chap,topic top where aca.id = top.academy_id and subj.id = top.subject_id and chap.id = top.chapter_id ";
    $my_query = mysqli_query($con, $query);
    $value = array();
    while ($row = mysqli_fetch_assoc($my_query)) {
        $value[] = $row;
    }
    return $value;
}


function view_question($con)
{
    $query = "select ques.*,top.topic_name from question ques,topic top where top.id = ques.topic_id ";
    $my_query = mysqli_query($con, $query);
    $value = array();
    while ($row = mysqli_fetch_assoc($my_query)) {
        $value[] = $row;
    }
    return $value;
}



function view_test_subject($con)
{

    $query = "select subj.* from test_subject subj";
    $my_query = mysqli_query($con, $query);
    $value = array();
    while ($row = mysqli_fetch_assoc($my_query)) {
        $value[] = $row;
    }
    return $value;

    // exit;
    return $value;
}



function view_test_chapter($con)
{
    $query = "select chap.*,subj.subject_name from test_subject subj,test_chapter chap where  subj.id = chap.test_subject_id ";
    $my_query = mysqli_query($con, $query);
    $value = array();
    while ($row = mysqli_fetch_assoc($my_query)) {
        $value[] = $row;
    }
    return $value;
}


function view_test_topic($con)
{
    $query = "select top.*,chap.chapter_name,subj.subject_name from test_subject subj,test_chapter chap,test_topic top where  subj.id = top.test_subject_id and chap.id = top.test_chapter_id ";
    $my_query = mysqli_query($con, $query);
    $value = array();
    while ($row = mysqli_fetch_assoc($my_query)) {
        $value[] = $row;
    }
    return $value;
}


function view_test_question($con)
{
    $query = "select ques.*,top.topic_name from test_question ques,test_topic top where top.id = ques.test_topic_id ";
    $my_query = mysqli_query($con, $query);
    $value = array();
    while ($row = mysqli_fetch_assoc($my_query)) {
        $value[] = $row;
    }
    return $value;
}

// function get_data($con,$table){
//     $select = "SELECT * FROM $table ";
//     $query = mysqli_query($con,$select);
//       while($row = mysqli_fetch_assoc($query)){
//             $value[] = $row;
//         }
//         return $value;
// }

function get_data($con, $table)
{
    $value = [];   // initialize array

    $select = "SELECT * FROM $table";
    $query  = mysqli_query($con, $select);

    if ($query) {
        while ($row = mysqli_fetch_assoc($query)) {
            $value[] = $row;
        }
    }

    return $value;
}


function get_column($con, $table, $column, $id)
{
    $select = "SELECT $column FROM $table WHERE id =$id";
    $query = mysqli_query($con, $select);
    $row = mysqli_fetch_assoc($query);
    return $row;
}

function chapter($con, $id)
{
    $select = "SELECT * from chapter where subject_id = '$id' and status_post=2";
    $query = mysqli_query($con, $select);
    $value = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $value[] = $row;
    }
    return $value;
}

function topic($con, $id)
{
    $select = "SELECT * from topic where chapter_id  = '$id' and status_post=2";
    $query = mysqli_query($con, $select);
    $value = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $value[] = $row;
    }
    return $value;
}


function test_chapter($con, $id)
{
    $select = "SELECT * from test_chapter where test_subject_id = '$id' and status_post=2";
    $query = mysqli_query($con, $select);
    $value = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $value[] = $row;
    }
    return $value;
}

function test_topic($con, $id)
{
    $select = "SELECT * from test_topic where test_chapter_id  = '$id' and status_post=2";
    $query = mysqli_query($con, $select);
    $value = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $value[] = $row;
    }
    return $value;
}

function get_topic_id($con, $id)
{
    $select = "SELECT * from topic where id  = '$id' and status_post=2";
    $query = mysqli_query($con, $select);
    $value = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $value[] = $row;
    }
    return $value;
}

function get_test_topic_id($con, $id)
{
    $select = "SELECT * from test_topic where id  = '$id' and status_post=2";
    $query = mysqli_query($con, $select);
    $value = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $value[] = $row;
    }
    return $value;
}

function store_url($con, $url)
{
    $sql = "select * from setting";
    $query = mysqli_query($con, $sql);
    if (mysqli_num_rows($query) == 0) {

        $isert_sql = "insert into setting(url) values('$url')";
        mysqli_query($con, $isert_sql);
    }
}

function get_url($con)
{
    $value = '';
    $sql = "select * from setting";
    $query = mysqli_query($con, $sql);

    if (mysqli_num_rows($query) > 0) {

        $fetch = mysqli_fetch_assoc($query);
        $value = $fetch;
    }

    return $value; 
}
