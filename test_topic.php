<?php
include 'web_include/header.php';
ch_title("Moalym", "Test Topic");
include_once 'db/connect.php';
include_once 'function/query.php';
$id = $_GET['id'];
$subject_id = $_GET['sub_id'];
// $view_subject = view_subject($con,"Elective Subjects (Science Group)",$id);
// print_r($view_subject);
?>
<?php 
  
include 'web_include/navbar.php'; 
?>


<section class="page-section">
            <div class="container">
                <div class="row">
                    <div class="centerColor">
                        <?php 
                        $subject_name = get_column($con,'test_subject','subject_name',$subject_id);
                        $chapter_name = get_column($con,'test_chapter','chapter_name',$id)
                        ?>
                        <h1><?=$chapter_name['chapter_name']?></h1>
                        <?php 
                        
                        ?>
                        <hr>

                        <h2 class="text-left"><?=$subject_name['subject_name']?> Chapters</h2>

                        <ul class="listing">
                            <?php 
                            $view_topic = test_topic($con,$id);
                            // print_r($view_topic);
                            $no = 1;
                            for ($i=0; $i < count($view_topic); $i++) { 
                               ?>
                            <li><a href="test_blog.php?id=<?=$view_topic[$i]['id']?>&sub_id=<?=$view_topic[$i]['test_subject_id']?>&chap_id=<?=$view_topic[$i]['test_chapter_id']?>"><?=$view_topic[$i]['topic_name'];?> <span class="pull-right"><?=str_pad($no, 2, '0', STR_PAD_LEFT);?></span></a></li>

                               <?php
                            $no++;}
                            ?>
                            
                        </ul>
                    </div>
                </div>

            </div>
        </section>


<?php 
include 'web_include/footer.php';
?>