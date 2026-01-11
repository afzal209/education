<?php
include_once 'db/connect.php';
include 'web_include/header.php';
ch_title("Moalym", "Test Quizz");
// include_once 'socialLogin/config.php';

include_once 'function/query.php';

$id = $_GET['id'];
$subject_id = $_GET['sub_id'];
$chapter_id = $_GET['chap_id'];
$url =  $_SERVER['REQUEST_URI'];

// echo $_SESSION;
// echo  $url;
// exit;
// echo "/moalym","",$_SERVER['REQUEST_URI'];
// exit;
// if (empty($_SESSION['data']) ) {
//     // echo 'Yes';
//     // exit;
//     $_SESSION['url'] = $_SERVER['REQUEST_URI'];
// //     // echo $_SESSION['url'];
// //     // exit;
//     echo "<script>location.href='login.php';</script>";
// //     // ob_end_clean();
// }



?>
<?php 
  
include 'web_include/navbar.php'; 
?>


<section class="page-section">
    <div class="container">
        <div class="row">
            <div class="content">
                <?php 
                $topic_name = get_column($con,'test_topic','topic_name',$id);
                // print_r($get_topic_id['topic_name']);
                $page1 = (isset($_GET['page'])) ? $_GET['page'] : 1;
                $questionPerPage1 = 1;
                $startingQuestion1 = ($page1 * $questionPerPage1) - $questionPerPage1;
                $id = $_GET['id'];
                $a = 1;
                $query3 = mysqli_query($con, "SELECT test_topic.topic_name, test_question.* 
                FROM test_topic
                RIGHT JOIN test_question ON test_topic.id = test_question.test_topic_id 
                where test_topic_id = '$id'
                ORDER BY test_question.id ASC
                LIMIT $startingQuestion1, $questionPerPage1
               ");
            //    print_r( $query3);
               $row3 = mysqli_fetch_array($query3);
            //    print_r($row3);
                $query2 = mysqli_query($con, "select count(*) as total from test_question where test_topic_id = '$id'");
                $row2 = mysqli_fetch_assoc($query2);
                ?>
                <form id="quizForm" name="quizForm" >
                <!-- onclick="SubmitQuestion(this,\'quizz.php?id='.@$id.'&page='.(@$page + 1).'&chap_id='.@$chapter_id.'&sub_id='.@$subject_id.'&acad_id='.@$academy_id.'\');" -->
                <h1 class="text-center border"><a class="pull-left" href="#"><i class="fa fa-angle-left"></i></a> <?=$topic_name['topic_name']?>
                    Quiz <a class="pull-right" href="javascript:void(0);" data-option="<?=$row3['correct']?>" onclick="SubmitQuestion(this,'test_quizz.php?id=<?php echo @$id?>&page=<?php echo ($page1 + 1);?>&chap_id=<?php echo @$chapter_id;?>&sub_id=<?php echo @$subject_id; ?>','skip')">Skip</a>
                </h1>
                <input type="hidden" value="<?=$page1?>" id="page" name="page" />
                <input type="hidden" id="paperId" name="paperId" value="<?=@$_GET['id']?>"/>
                <input type="hidden" id="questionId" name="questionId" value="<?=@$row3['id']?>"/>
                <input type="hidden" id="totalquestion" name="totalquestion" value="<?=@$row2['total']?>"/>
                </form>
                <div class="col-md-12">
                    <div class="progress">
                        <div class="progress-bar" style="width: <?=$_SESSION['quiz']['total']?>%;" aria-valuenow="<?=$_SESSION['quiz']['total']?>" aria-valuemin="0"
                            aria-valuemax="100"><?=$_SESSION['quiz']['total']?>%</div>
                    </div>
                </div>
                <?php 
                        
                        $subject_name = get_column($con,'test_subject','subject_name',$subject_id);
                        $chapter_name = get_column($con,'test_chapter','chapter_name',$id)
                        ?>
                <h1><?=$subject_name['subject_name']?> Chapters</h1>

                <ul class="listing quiz">
                    <?php 
                             $page = (isset($_GET['page'])) ? $_GET['page'] : 1;

                             $questionPerPage = 1;
                             $startingQuestion = ($page * $questionPerPage) - $questionPerPage;
                             $id = $_GET['id'];
                             $a = 1;
                             $query = mysqli_query($con, "SELECT test_topic.topic_name, test_question.* 
                             FROM test_topic
                             RIGHT JOIN test_question ON test_topic.id = test_question.test_topic_id 
                             where test_question.test_topic_id = '$id'
                             ORDER BY test_question.id ASC
                             LIMIT $startingQuestion, $questionPerPage
                            ");
                            // echo "SELECT test_topic.topic_name, test_question.* 
                            //  FROM test_topic
                            //  RIGHT JOIN test_question ON topic.id = test_question.test_topic_id 
                            //  where test_question.test_topic_id = '$id'
                            //  ORDER BY test_question.id ASC
                            //  LIMIT $startingQuestion, $questionPerPage
                            // ";
                            // exit;
                            $query1 = mysqli_query($con, "select count(*) as total from test_question where test_topic_id = '$id'");
                            if (mysqli_num_rows($query) == 0) {
                                // print_r($_SESSION['quiz']['questions']);
                                // exit;
                                $_SESSION['correctCount'] = $correctCount = 0;
                                $_SESSION['a'] = $a;
                                $_SESSION['totalCount'] = count($_SESSION['quiz']['questions']);
                                if (empty($_SESSION['quiz']['action'])) {
                                    $_SESSION['action'] = 0;
                                }
                                else{
                                    $_SESSION['action'] = count($_SESSION['quiz']['action']);
                                }
                                // echo 'Yes';
                                echo "<script>location.href='test_result.php?id=$id&chap_id=$chapter_id';</script>";
                                // echo "<script>location.href='result.php?id='.$id.'&chap_id='.$chapter_id';</script>";
                                // header('location:result.php?id='.$id.'&chap_id='.$chapter_id);
                               
                            }
                            else {
                                while ($row = mysqli_fetch_array($query)) {
                                    // print_r($query);
                                    $row1 = mysqli_fetch_assoc($query1);
                                    
                                    echo '
                                    <h2>'.$row['question']. '</h2>
                                    <form id="quizForm" name="quizForm" >
                                    ';
                                    for ($i = 1; $i <= 4; ++$i) {
                                    echo'
                                    <li>
                                        <input type="radio" class="pull-right scales"  data-option="'.$row['option'.$i].'" id="option'.$i.'" name="option'.$i.'" onclick="SubmitQuestion(this,\'test_quizz.php?id='.@$id.'&page='.(@$page + 1).'&chap_id='.@$chapter_id.'&sub_id='.@$subject_id.'\',\'next\');"  />
                                        <label for="option'.$i.'">'.$row['option'.$i].'</label>
                                    </li>
                                    ';
                                    }
                                    echo '
                                    <input type="hidden" value="'.@$row['correct'].'" id="correct_answer" name="correct_answer" />
                                    <input type="hidden" value="'.$page.'" id="page" name="page" />
                                    <input type="hidden" id="paperId" name="paperId" value="'.@$_GET['id'].'"/>
                                    <input type="hidden" id="questionId" name="questionId" value="'.@$row['id'].'"/>
                                    <input type="hidden" id="totalquestion" name="totalquestion" value="'.@$row1['total'].'"/>
                                   
                                    
                                    </form>';
                                }
                            }
                            ?>

                    <!-- <li>
                        <input type="radio" id="scales" class="pull-right scales" name="scales" />
                        <label for="scales">Scales</label>
                    </li>
                    <li>
                        <input type="radio" id="scales2" class="pull-right scales" name="scales" />
                        <label for="scales2">Scales</label>
                    </li>
                    <li>
                        <input type="radio" id="scales3" class="pull-right scales" name="scales" />
                        <label for="scales3">Scales</label>
                    </li>
                    <li>
                        <input type="radio" id="scales4" class="pull-right scales" name="scales" />
                        <label for="scales4">Scales</label>
                    </li> -->


                </ul>
            </div>
        </div>
    </div>
</section>


<?php 
include 'web_include/footer.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script type="text/javascript" src="web_asset/js/snippets/papers.js"></script>   -->

<script type="text/javascript">
function SubmitQuestion(obj, nextPagelink,action) {
    var form = obj.closest('form');
    var a = $(form).serialize();
    // console.log(action);
    var option = $(obj).data('option');
    var id = $(obj).attr('id');
    // //console.log($(obj).data('option'));
    // //alert();
    $.ajax({
        url: 'ajax/testpaper.php',
        data: a + '&option=' + option + '&submitQuestion=true'+'&action='+action,
        method: "POST",
        success: function(e) {
            // console.log(e);
            if (e != '') {
                alert(e);
            } else {
                if ($(obj).data('option') == $(form).find('[name="correct_answer"]').val()) {
                    //alert("correct");
                    $("#"+id).attr('checked', 'checked');
                    // $(obj).css({ 'background': 'green' });
                } else {
                    $("#"+id).attr('checked', 'checked');
                    // $(obj).css({ 'background': 'red' });
                }

                setTimeout(function() {
                    window.location.href = nextPagelink;
                }, 100);

            }
        }


    });
}
</script>