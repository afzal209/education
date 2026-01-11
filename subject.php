<?php
include 'web_include/header.php';
ch_title("Moalym", "Subject");
include_once 'db/connect.php';
include_once 'function/query.php';
$id = $_GET['id'];
    
// $view_subject = view_subject($con,"Elective Subjects (Science Group)",$id);
// print_r($view_subject);
?>

<?php
include 'web_include/navbar.php'; 
?>

<section class="page-section main">
    <div class="container">
        <div class="row">
            <h1>Compulsory Subjects (Science Group)</h1>

            <ul class="listings">
                <?php
                                                 $view_subject = view_subject($con,"Compulsory Subjects (Science Group)",$id); 
                                                for ($i=0; $i < count($view_subject) ; $i++) { 
                                                    // print_r($view_subject[$i]);
                                                ?>
                <li>
                    <a href="chapter.php?id=<?=$view_subject[$i]['id']?>&acad_id=<?=$view_subject[$i]['academy_id']?>"><img
                            src="<?=$view_subject[$i]['subject_image']?>" width="140" height="140">
                        <span><?=$view_subject[$i]['subject_name']?></span></a>
                </li>
                <?php 
                                                }
                                            ?>
            </ul>
        </div>
    </div>
</section>
<section class="page-section main">
    <div class="container">
        <div class="row">
            <h1>Elective Subjects (Science Group)</h1>

            <ul class="listings">
            <?php
                                                 $view_subject = view_subject($con,"Elective Subjects (Science Group)",$id); 
                                                for ($i=0; $i < count($view_subject) ; $i++) { 
                                                    // print_r($view_subject[$i]);
                                                ?>
                <li>
                    <a href="chapter.php?id=<?=$view_subject[$i]['id']?>&acad_id=<?=$view_subject[$i]['academy_id']?>"><img
                            src="<?=$view_subject[$i]['subject_image']?>" width="140" height="140">
                        <span><?=$view_subject[$i]['subject_name']?></span></a>
                </li>
                <?php 
                                                }
                                            ?>
            </ul>
        </div>
    </div>
</section>
<section class="page-section main">
    <div class="container">
        <div class="row">
            <h1>Compulsory Subject (Arts Group)</h1>

            <ul class="listings">
            <?php
                                                 $view_subject = view_subject($con,"Compulsory Subject (Arts Group)",$id); 
                                                for ($i=0; $i < count($view_subject) ; $i++) { 
                                                    // print_r($view_subject[$i]);
                                                ?>
                <li>
                    <a href="chapter.php?id=<?=$view_subject[$i]['id']?>&acad_id=<?=$view_subject[$i]['academy_id']?>"><img
                            src="<?=$view_subject[$i]['subject_image']?>" width="140" height="140">
                        <span><?=$view_subject[$i]['subject_name']?></span></a>
                </li>
                <?php 
                                                }
                                            ?>
            </ul>
        </div>
    </div>
</section>

<section class="page-section main">
    <div class="container">
        <div class="row">
            <h1>Elective Subjects (Arts Group)</h1>

            <ul class="listings">
            <?php
                                                 $view_subject = view_subject($con,"Elective Subjects (Arts Group)",$id); 
                                                for ($i=0; $i < count($view_subject) ; $i++) { 
                                                    // print_r($view_subject[$i]);
                                                ?>
                <li>
                    <a href="chapter.php?id=<?=$view_subject[$i]['id']?>&acad_id=<?=$view_subject[$i]['academy_id']?>"><img
                            src="<?=$view_subject[$i]['subject_image']?>" width="140" height="140">
                        <span><?=$view_subject[$i]['subject_name']?></span></a>
                </li>
                <?php 
                                                }
                                            ?>
            </ul>
        </div>
    </div>
</section>

<?php 
include 'web_include/footer.php';
?>