<?php
include 'web_include/header.php';
ch_title("Moalym", "Academic");
include_once 'db/connect.php';
include_once 'function/query.php';


// $view_subject = view_subject($con,"Elective Subjects (Science Group)",$id);
// print_r($view_subject);
?>
<?php 
  
include 'web_include/navbar.php'; 
?>


<section class="page-section main">
    <div class="container">
        <div class="row">
            <h1>Academic</h1>

            <ul class="listings">
                <?php
                                                $view_academic = view_academic($con,'academic'); 
                                                for ($i=0; $i < count($view_academic) ; $i++) { 
                                                    // print_r($view_academic[$i]);
                                                ?>
                <li>
                    <a href="subject.php?id=<?=$view_academic[$i]['id']?>"><img
                            src="<?=$view_academic[$i]['academic_image']?>" width="140" height="140">
                        <span><?=$view_academic[$i]['academic_name']?></span></a>
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