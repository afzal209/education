<?php

include '../db/connect.php';

if (@$_POST['submitQuestion'] == true) {
    $correct = 0;

    $wrong = 0;

    $question_id = @$_POST['questionId'];

    $option = @$_POST['option'];

    $page = @$_POST['page'];
    
    $total = @$_POST['totalquestion'];

    $action = @$_POST['action'];
//     echo '<pre>'.print_r($_POST,true).'<pre>';
// exit;
    /*

    if(!isset($_POST['ans']) || empty($_POST['ans'])){

        echo 'Please choose any option.';

    }else{

        */

    //echo '<pre>'.print_r($_SESSION,true).'<pre>';
    $countSkip = 0;

    if ($action == 'skip') {
        if (!isset($_SESSION['quiz']['action'])) {
            $_SESSION['quiz']['action'] = [];
        }
        $_SESSION['quiz']['action'][$question_id] = @$_POST['option'];
    }


    $result = $page / $total * 100;
    
    // echo $result;
    // exit;

    if (!isset($_SESSION['quiz'])) {
        $_SESSION['quiz'] = [];
    }

    $_SESSION['quiz']['paper_id'] = $_POST['paperId'];

    if (!isset($_SESSION['quiz']['questions'])) {
        $_SESSION['quiz']['questions'] = [];
    }

    $_SESSION['quiz']['questions'][$question_id] = @$_POST['option'];

    $_SESSION['quiz']['total'] = $result;
    //$query=mysqli_query($con,"select correct from question where correct = '$ans' and id ='$question_id' ");

        //$row=mysqli_fetch_row($query);

        // if($row){

        //    $correct++;

        // }

        // else{

        //     $wrong++;

        // }

        //echo '<pre>'.print_r($_SESSION,true).'<pre>';

    /*

    }

    */
}
