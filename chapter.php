<?php
include 'web_include/header.php';
ch_title("Moalym", "Chapter");
include_once 'db/connect.php';
include_once 'function/query.php';
$id = $_GET['id'];
$academy_id = $_GET['acad_id'];

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
                        $academic_name = get_column($con,'academic','academic_name',$academy_id);
                        $subject_name = get_column($con,'subject','subject_name',$id);
                        ?>
                        <h1><?=$subject_name['subject_name']?></h1>
                        <?php 
                        
                        ?>
                        <hr>

                        <h2 class="text-left"><?=$academic_name['academic_name']?> Class <?=$subject_name['subject_name']?> Chapters</h2>

                        <ul class="listing">
                            <?php 
                            $view_chapter = chapter($con,$id);
                            // print_r($view_chapter);
                            $no = 1;
                            for ($i=0; $i < count($view_chapter); $i++) { 
                               ?>
                            <li><a href="topic.php?id=<?=$view_chapter[$i]['id']?>&acad_id=<?=$view_chapter[$i]['academy_id']?>&sub_id=<?=$view_chapter[$i]['subject_id']?>"><?=$view_chapter[$i]['chapter_name'];?> <span class="pull-right"><?=str_pad($no, 2, '0', STR_PAD_LEFT);?></span></a></li>

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