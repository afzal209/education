<?php 
require_once dirname(__DIR__) .'/config.php';
// echo BASE_PATH;
// exit;


    // include(BASE_PATH.'db/connect.php');

     include(BASE_PATH.'db/connect.php');
    // include_once 'db/connect.php';
    if(!isset($_SESSION['user']['email']))
    {
        header('location:index.php');
    }

    include_once(BASE_PATH .'/includes/header.php'); 
	ch_title("Moalym", "View Test Topic");
        ?>
           <div id="wrapper">



    <!-- Sidebar -->

    <?php 

    include(BASE_PATH .'includes/sidebar.php');

    ?>



    <div id="content-wrapper" class="d-flex flex-column">



        <!-- Main Content -->

        <div id="content">



            <!-- Topbar -->

            <?php 

        include(BASE_PATH .'includes/topbar.php')

        ?>
        <main id="main" class="main">

                <div class="container" style="margin: auto;">

                    <div class="row ">

                        <div class="col-12">

                            <div class="card">

                                <div class="card-header">

                                    <h2>View Test Topic</h2>

                                </div>

                                <div class="card-body">
<?php 
                                        if(@$_GET['response'] != ''){
                                            echo '  <div class="alert alert-'.@$_GET['class'].'">
                                                        <strong>'.ucfirst(@$_GET['response']).'!</strong> '.@$_GET['message'].'
                                                    </div>';
                                                }
                                    ?>
                                    <div class="col-md-12">

                                        <div class="table-wrap">

                                            <table class="table table-responsive-lg table-striped-columns">

                                                <thead style="background-color: green;">

                                                    <tr>

                                                       

                                                       

                                                        <th class="thed" scope="col">Chapter Name</th>

                                                        <th scope="col">Topic Name</th>
                                                        <th scope="col">Topic Image</th>

                                                        <th scope="col">Topic Embed</th>
                                                        <th scope="col">Topic Description</th>
                                                        <th scope="col">Topic Article</th>
                                                        <?php
                                                        if($_SESSION['user']['role'] == 'admin'){
                                                            ?>
 <th scope="col">Insert By</th>
                                                            <?php
                                                        }

                                                        ?>
                                                       
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Action</th>
                                                        
                                                        
                                                        

                                                    </tr>

                                                </thead>

                                                <tbody>

                                                    <?php 

                                                $query=mysqli_query($con,'select test_chapter.chapter_name,test_topic.* from test_chapter RIGHT JOIN test_topic ON test_chapter.id = test_topic.test_chapter_id where test_topic.test_chapter_id = test_chapter.id');
                                                    if(mysqli_num_rows($query) > 0){
                                                      while($row=mysqli_fetch_assoc($query)){ 
                                                        $embed = $row['topic_embed'];
                                                      if(preg_match('/youtube/',$embed)){
                                                        $youtube_link=str_replace("https://www.youtube.com/watch?v=" , "https://www.youtube.com/embed/", $embed);
                                                        $topic_embed =' <iframe class="embed-responsive-item" width="100" height="100" src="'.$youtube_link.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                                                                //print_r($youtube_link);
                                                    }
                                                    elseif(preg_match('/youtu.be/',$embed)){
                                                        $youtube_embed_link=str_replace("https://youtu.be/" , "https://www.youtube.com/embed/", $embed);
                                                        $topic_embed =' <iframe class="embed-responsive-item" width="100" height="100" src="'.$youtube_embed_link.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                                                    }
                                                    elseif(preg_match('/dailymotion/',$embed)){
                                                        $dailymotion_link=str_replace("https://www.dailymotion.com/video","https://www.dailymotion.com/embed/video/" , $embed);
                                                        $topic_embed ='  <iframe class="embed-responsive-item" width="100" height="100" src="'.$dailymotion_link.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>';    
                                                    }
                                                   elseif(preg_match('/dai.ly/',$embed)){
                                                        $dailymotion_embed_link=str_replace("https://dai.ly/","https://www.dailymotion.com/embed/video/" , $embed);
                                                        $topic_embed ='  <iframe class="embed-responsive-item" width="100" height="100" src="'.$dailymotion_embed_link.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>';    
                                                    }
                                                    else{
                                                        $topic_embed = '
                                                        <image src="'.$embed.'" alt ="error">
                                                         ';
                                                    }
                                                        echo '<tr>'

                                                        .'<td>'.$row['chapter_name'].'</td>'
                                                         .'<td>'.$row['topic_name'].'</td>'
                                                         .'<td><img src="'.BASE_URL.$row['topic_image'].'" alt="'.$row['topic_name'].'" style="width: 100px; height: 100px;"></td>'
                                                          .'<td>'.$topic_embed.'</td>'
 .'<td>'.$row['topic_pic_description'].'</td>'
 .'<td>'.$row['topic_article'].'</td>'
                                                           ;

                                                                                           
                                                              
                                               if($_SESSION['user']['role'] == 'admin'){
                                         echo '<td>'.$row['insert_by'].'</td>';
                                        
                                        }         
                                                       
                                                       if($row['status_post'] == 1){
                                            echo ' <td>Pending</td>';
                                        }
                                        elseif ($row['status_post'] == 2) {
                                            echo '<td>Approve</td>';
                                        }
                                        elseif ($row['status_post'] == 3) {
                                            echo '<td>Rejected</td>';
                                        }
                                        
                                                        echo'
                                                        <td style="text-align : center">
                                                        <a href="testtopicupdate.php?id=' .$row['id'].'" class="pay_link"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
                                                        if($_SESSION['user']['role'] == 'admin'){
                                                        echo'/<a href="phpDeleteScript/testtopicdelete.php?id='.$row['id'].'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                                                        }
                                                        echo'</td>';

                                                       

                                                       

                                                        '</tr>';
                                                      }
                                                    }
                                                    // print_r($view_subject);  

                                                   

                                                    

                                                    // print_r(view_subject($con,'academic'));

                                                    

                                                    ?>

                                                </tbody>

                                            </table>

                                        </div>

                                    </div>

                                </div>

                            </div>



                        </div>

                    </div>

                </div>





            </main><!-- End #main -->

            

            <!-- Footer -->

            <?php 

       include(BASE_PATH .'includes/copy_write.php')

       ?>

        </div>

    </div>

</div>
        <?php
         include_once(BASE_PATH.'/includes/footer.php'); 

    ?>