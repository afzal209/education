<?php

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

include 'web_include/header.php';
include_once 'db/connect.php';
include_once 'function/query.php';
ch_title("Moalym", "Index");

include_once 'function/query.php';

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
        $base_url = $protocol . "://" . $_SERVER['HTTP_HOST'] .$_SERVER['REQUEST_URI'];
store_url($con,$base_url);
        // echo $base_url;
        // exit;
// $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// echo $actual_link;
// $sql = "select * from setting";
// $query = mysqli_query($con,$sql);
// if(mysqli_num_rows($query) == 0){
   
//     $isert_sql = "insert into setting(url) values('$base_url')";
//     mysqli_query($con,$isert_sql);
// }
?>

<?php
include 'web_include/navbar.php'; 
?>
<!--<section class="page-section">-->
<!--    <div class="container-fluid">-->
<!--        <div class="row">-->

<!--            <div id="myCarousel" class="carousel slide" data-ride="carousel">-->
<!--                <ol class="carousel-indicators">-->
<!--                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>-->
<!--                    <li data-target="#myCarousel" data-slide-to="1"></li>-->
<!--                    <li data-target="#myCarousel" data-slide-to="2"></li>-->
<!--                </ol>-->

<!--                <div class="carousel-inner">-->
<!--                    <div class="item active">-->
<!--                        <img src="web_asset/images/uni1.jpg" alt="Los Angeles">-->
<!--                    </div>-->

<!--                    <div class="item">-->
<!--                        <img src="web_asset/images/uni2.jpg" alt="Chicago">-->
<!--                    </div>-->

<!--                    <div class="item">-->
<!--                        <img src="web_asset/images/uni1.jpg" alt="Los Angeles">-->
<!--                    </div>-->
<!--                </div>-->

<!--                <a class="left carousel-control" href="#myCarousel" data-slide="prev">-->
<!--                    <span class="glyphicon glyphicon-chevron-left"></span>-->
<!--                    <span class="sr-only">Previous</span>-->
<!--                </a>-->
<!--                <a class="right carousel-control" href="#myCarousel" data-slide="next">-->
<!--                    <span class="glyphicon glyphicon-chevron-right"></span>-->
<!--                    <span class="sr-only">Next</span>-->
<!--                </a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

<!--</section>-->
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
<section class="page-section main">
   <div class="container">
       <div class="row">
           <h1>Entry Test</h1>

           <ul class="listings">
                <?php
                                                $view_academic = view_academic($con,'entrytest'); 
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
<section class="page-section main">
    <div class="container">
        <div class="row">
            <h1>Job Test Preparation</h1>

            <ul class="listings">
                <?php
                                                $view_academic = get_data($con,'test_subject'); 
                                                // print_r($view_academic);
                                                if(count($view_academic) != 0){
                                                    for ($i=0; $i < count($view_academic) ; $i++) { 
                                                    // print_r($view_academic[$i]);
                                                ?>
                <li>
                    <a href="test_chapter.php?id=<?=$view_academic[$i]['id']?>"><img
                            src="<?=$view_academic[$i]['subject_image']?>" width="140" height="140">
                        <span><?=$view_academic[$i]['subject_name']?></span></a>
                </li>
                <?php 
                                                }
                                                }
                                                
                                            ?>
            </ul>
        </div>
    </div>
</section>

<!-- <section class="page-section main">
            <div class="container">
                <div class="row">
                    <h1>Scholarships</h1>

                    <ul class="listings">
                    <?php
                                                $view_academic = view_academic($con,'entrytest'); 
                                                for ($i=0; $i < count($view_academic) ; $i++) { 
                                                    // print_r($view_academic[$i]);
                                                ?>
                        <li>
                            <a href="#"><img src="<?=$view_academic[$i]['academic_image']?>" width="140" height="140"> <span><?=$view_academic[$i]['academic_name']?></span></a>
                        </li>
                        <?php 
                                                }
                                            ?>
                    </ul>
                </div>
            </div>
        </section> -->
<!-- <section class="page-section main">
            <div class="container">
                <div class="row">
                    <h1>Jobs Ads</h1>

                    <ul class="listings">
                        <li>
                            <a href="#"><img src="images/mcad.png"> <span>Mcad</span></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/ete.png"> <span>etea</span></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/gre.png"> <span>gre</span></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/apt.png"> <span>aptitude test</span></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/ecad.png"> <span>ecad</span></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/lat.png"> <span>lat</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </section> -->




<?php 
include 'web_include/footer.php';
?>