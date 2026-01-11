<?php
include_once 'db/connect.php';
include 'web_include/header.php';
ch_title("Moalym", "Topic");

include_once 'function/query.php';

// if (empty($_SESSION['data']) ) {
//     // echo 'Yes';
    
//     echo "<script>location.href='login.php';</script>";
//     // ob_end_clean();
// }
unset($_SESSION['quiz']['total']);

$id = $_GET['id'];
$chap_id = $_GET['chap_id'];
$view_topic = get_test_topic_id($con,$id);
$correctCount = $_SESSION['correctCount'];
$a = $_SESSION['a'];
$totalCount = $_SESSION['totalCount'];
$totalSkip = $_SESSION['action']; 

// echo $totalSkip;
// echo $totalCount;
// echo $correctCount;
// print_r('Question');
// print_r(@$_SESSION['quiz']['questions']);
// echo '<br/>';

// print_r('Skip');
// print_r(@$_SESSION['quiz']['action']);
// if($totalSkip < 0){
// print_r(array_diff(@$_SESSION['quiz']['questions'],@$_SESSION['quiz']['action']));

if($totalSkip){
   $_SESSION['quiz']['questions'] = array_diff(@$_SESSION['quiz']['questions'],@$_SESSION['quiz']['action']);

// print_r($correct);
}

// }




$query = mysqli_query($con, "SELECT test_topic.topic_name, test_question.* 
FROM test_topic
RIGHT JOIN test_question ON test_topic.id = test_question.test_topic_id 
where test_topic_id = '$id'");
// print_r("SELECT test_topic.topic_name, test_question.* 
// FROM test_topic
// RIGHT JOIN test_question ON test_topic.id = test_question.topic_id 
// where test_topic_id = '$id'");
// print_r(@$_SESSION['quiz']['questions']);
while ($row = mysqli_fetch_assoc($query)) {
    
    if($totalSkip){
         if (@$row['correct'] == $_SESSION['quiz']['questions'][$row['id']]){
             ++$correctCount;
         }
    }
    else{
        if (@$row['correct'] == @$_SESSION['quiz']['questions'][$row['id']]) {
        ++$correctCount;
        }
    }
    
}
// echo $correctCount;

?>
<?php 
  
include 'web_include/navbar.php'; 
?>

<section class="page-section chapters results">
    <div class="container">
        <div class="row">
            <div class="content">
                <h1 class="text-center border">Results</h1>
                <?php 
                for ($i=0; $i < count($view_topic) ; $i++) {
                    echo '<h1>'.$view_topic[$i]['topic_name'].'</h1>'; 
                }
                ?>
                

                <div class="card">
                    <div class="pull-left circle">
                        <div class="progress-circle  p<?=$correctCount?>">
                            <span><?=$correctCount?></span>
                            <div class="left-half-clipper">
                                <div class="first<?=$correctCount?>-bar"></div>
                                <div class="value-bar"></div>
                            </div>
                        </div>
                    </div>
                    <div class="pull-left details">
                        <h4>Correct Answers</h4>
                        <p>descrition</p>
                    </div>
                    <div class="pull-left arrow">
                        <a href="#"> <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="card">
                    <div class="pull-left circle">
                        <div class="progress-circle less50 p<?=(int) ($totalCount - $correctCount - $totalSkip)?>">
                            <span><?=(int) ($totalCount - $correctCount - $totalSkip)?></span>
                            <div class="left-half-clipper">
                                <div class="first50-bar"></div>
                                <div class="value-bar"></div>
                            </div>
                        </div>
                    </div>
                    <div class="pull-left details">
                        <h4>Wrong Answers</h4>
                        <p>descrition</p>
                    </div>
                    <div class="pull-left arrow">
                        <a href="#"> <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="card">
                    <div class="pull-left circle">
                        <div class="progress-circle p<?=$totalCount?>">
                            <span><?=$totalCount?></span>
                            <div class="left-half-clipper">
                                <div class="first50-bar"></div>
                                <div class="value-bar"></div>
                            </div>
                        </div>
                    </div>
                    <div class="pull-left details">
                        <!-- <h4>50% Answers title</h4> -->
                        <h4>Total Question</h4>
                        <p>descrition</p>
                    </div>
                    <div class="pull-left arrow">
                        <a href="#"> <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>

                <div class="card">
                    <div class="pull-left circle">
                        <div class="progress-circle p<?=$totalSkip?>">
                            <span><?=$totalSkip?></span>
                            <div class="left-half-clipper">
                                <div class="first50-bar"></div>
                                <div class="value-bar"></div>
                            </div>
                        </div>
                    </div>
                    <div class="pull-left details">
                        <!-- <h4>50% Answers title</h4> -->
                        <h4>Skip Question</h4>
                        <p>descrition</p>
                    </div>
                    <div class="pull-left arrow">
                        <a href="#"> <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-4">
                <a class="btn pull-left" href="test_blog.php?id=<?=$id?>&chap_id=<?=$chap_id?>"> Back</a>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4"></div>
            <div class="col-md-6 col-sm-6 col-xs-4">
                <a class="btn" href=""> View Results</a>
            </div>
        </div>
    </div>
</section>