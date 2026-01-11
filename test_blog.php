<?php
include 'web_include/header.php';
ch_title("Moalym", "Topic");
include_once 'db/connect.php';
include_once 'function/query.php';
$id = $_GET['id'];

$chapter_id = $_GET['chap_id'];
unset($_SESSION['correctCount']);
unset($_SESSION['a']);
unset($_SESSION['totalCount']);
unset($_SESSION['quiz']);
unset($_SESSION['action']);
// print_r( $_SESSION);
// $view_subject = view_subject($con,"Elective Subjects (Science Group)",$id);
// print_r($view_subject);

$view_topic = get_test_topic_id($con,$id);
// print_r($view_topic);
?>
<?php 
  
include 'web_include/navbar.php'; 
?>

<section class="page-section blog-page">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12 ">
                <?php 
                        for ($i=0; $i < count($view_topic) ; $i++) { 
                            # code...
                            // print_r($view_topic[$i]['topic_embed']);
                        
                            
                        ?>
                <h1 class="border"><?=$view_topic[$i]['topic_name']?></h1>
                <div class="video"><img class="w-100" src="<?=$view_topic[$i]['topic_image']?>" alt=""></div>
                
                <h1><?=$view_topic[$i]['topic_title'];?></h1>
                <p><?=$view_topic[$i]['topic_article']?></p>
                
                
                <div class="video">
                    <?php 
                            if (preg_match('/youtube/', $view_topic[$i]['topic_embed'])) {
                                $youtube_link = str_replace('https://www.youtube.com/watch?v=', 'https://www.youtube.com/embed/', $view_topic[$i]['topic_embed']);
                                echo'			
                                <iframe class="w-100" width="600" height="310"  src="'.$youtube_link.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                            } elseif (preg_match('/youtu.be/', $view_topic[$i]['topic_embed'])) {
                                $youtube_embed_link = str_replace('https://youtu.be/', 'https://www.youtube.com/embed/', $view_topic[$i]['topic_embed']);
                                echo'			
                                <iframe class="w-100" width="600" height="310"  src="'.$youtube_embed_link.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                            } elseif (preg_match('/dailymotion/', $view_topic[$i]['topic_embed'])) {
                                $dailymotion_link = str_replace('https://www.dailymotion.com/video', 'https://www.dailymotion.com/embed/video/', $view_topic[$i]['topic_embed']);
                                echo'			
                                <iframe class="w-100" width="600" height="310" src="'.$dailymotion_link.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>';
                            } elseif (preg_match('/dai.ly/', $view_topic[$i]['topic_embed'])) {
                                $dailymotion_embed_link = str_replace('https://dai.ly/', 'https://www.dailymotion.com/embed/video/', $view_topic[$i]['topic_embed']);
                                echo'			
                                <iframe class="w-100"  src="'.$dailymotion_embed_link.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>';
                            } else {
                                echo 'error';
                            }
                            
                            ?>
                </div>
                <div>
                <a href="test_quizz.php?id=<?=$view_topic[$i]['id']?>&chap_id=<?=$view_topic[$i]['test_chapter_id']?>&sub_id=<?=$view_topic[$i]['test_subject_id']?>" class="btn btn-primary" style="color:white;margin-right:30%">Attempt Question</a>    
                </div>
                <?php
                        }
                        ?>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <h1>Blog Details</h1>
                <ul class="blog">
                    <?php 
                            $view_tp = test_topic($con,$chapter_id);
                            for ($i=0; $i < count($view_tp); $i++) { 
                                // print_r($view_tp);
                                ?>
                    <li>
                        <div class="col-md-4 col-sm-4 col-xs-12 p-0">

                            <?php 
                            if (preg_match('/youtube/', $view_tp[$i]['topic_embed'])) {
                                $youtube_link = str_replace('https://www.youtube.com/watch?v=', 'https://www.youtube.com/embed/', $view_tp[$i]['topic_embed']);
                                echo'			
                                <iframe class="w-100" width="180" height="120"  src="'.$youtube_link.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                            } elseif (preg_match('/youtu.be/', $view_tp[$i]['topic_embed'])) {
                                $youtube_embed_link = str_replace('https://youtu.be/', 'https://www.youtube.com/embed/', $view_tp[$i]['topic_embed']);
                                echo'			
                                <iframe class="w-100" width="180" height="120"  src="'.$youtube_embed_link.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                            } elseif (preg_match('/dailymotion/', $view_tp[$i]['topic_embed'])) {
                                $dailymotion_link = str_replace('https://www.dailymotion.com/video', 'https://www.dailymotion.com/embed/video/', $view_tp[$i]['topic_embed']);
                                echo'			
                                <iframe class="w-100" width="180" height="120" src="'.$dailymotion_link.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>';
                            } elseif (preg_match('/dai.ly/', $view_tp[$i]['topic_embed'])) {
                                $dailymotion_embed_link = str_replace('https://dai.ly/', 'https://www.dailymotion.com/embed/video/', $view_tp[$i]['topic_embed']);
                                echo'			
                                <iframe class="w-100" width="180" height="120" src="'.$dailymotion_embed_link.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>';
                            } else {
                                ?>
                                <iframe class="w-100" width="180" height="120"  src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <?php
                            }
                            
                            ?>

                        </div>
                        <a
                            href="test_blog.php?id=<?=$view_tp[$i]['id']?>&sub_id=<?=$view_tp[$i]['test_subject_id']?>&chap_id=<?=$view_tp[$i]['test_chapter_id']?>">
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <h3> <?=$view_tp[$i]['topic_pic_description']?></h3>
                                <p><?=substr ($view_tp[$i]['topic_article'], 0, 100);?>.</p>
                            </div>
                        </a>
                    </li>
                    
                    <?php
                            }
                            ?>


                </ul>
            </div>


        </div>
    </div>
</section>

<?php 
include 'web_include/footer.php';
?>