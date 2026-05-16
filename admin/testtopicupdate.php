<?php 
          // include_once 'db/connect.php';

         require_once dirname(__DIR__) .'/config.php';
// echo BASE_PATH;
// exit;


    // include(BASE_PATH.'db/connect.php');

     include(BASE_PATH.'db/connect.php');

        if(!isset($_SESSION['user']['email']))
        {
            header('location:index.php');
        }
        $id = $_GET['id'];

        //echo $id;
    
        $query = mysqli_query($con,"select * from test_topic where id = '$id'");
    
        $row = mysqli_fetch_assoc($query);
    
        $name = $row['topic_name'];
    
        $embed = $row['topic_embed'];
        
        $image = $row['topic_image'];
        
        $description = $row['topic_pic_description'];
        
        $article = $row['topic_article'];  
        
        $lang = $row['lang'];

        // print_r($row);
        ?>



<?php
       include_once(BASE_PATH .'/includes/header.php'); 
	ch_title("Moalym", "Test Update Topic");
        ?>
<div id="wrapper">

    <!-- Sidebar -->
    <?php 
    include_once(BASE_PATH .'/includes/sidebar.php');
    ?>

    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php 
        include_once(BASE_PATH .'/includes/topbar.php')
        ?>


            <main id="main" class="main">
                <div class="container" style="margin: auto;">
                    <div class="row ">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2>Add Test Topic</h2>
                                </div>
                                <div class="card-body">
                                    <?php 
                                        if(@$_GET['response'] != ''){
                                            echo '  <div class="alert alert-'.@$_GET['class'].'">
                                                        <strong>'.ucfirst(@$_GET['response']).'!</strong> '.@$_GET['message'].'
                                                    </div>';
                                                }

                                                  $timezone = "Asia/Karachi";
                                            date_default_timezone_set($timezone);
                                           $today = date("Y-m-d");
                                    ?>
                                    <form method="POST" action="" enctype="multipart/form-data">
                                        <input type="hidden" name="insert_by"
                                            value="<?php echo $_SESSION['user']['id']; ?>">



                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Enter Topic Name" value="<?php echo $name;?>" required>
                                            <label for="topic">Enter Topic Name</label>
                                        </div>
                                        <?php 
                                        if($embed !=''){
                                        ?>
                                        <div class="form-floating mb-3">
                                            <?php 
                                                    if(preg_match('/youtube/',$embed)){
                                                        $youtube_link=str_replace("https://www.youtube.com/watch?v=" , "https://www.youtube.com/embed/", $embed);
                                                        echo' <iframe class="embed-responsive-item" width="407" height="310" src="'.$youtube_link.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                                                                //print_r($youtube_link);
                                                    }
                                                    elseif(preg_match('/youtu.be/',$embed)){
                                                        $youtube_embed_link=str_replace("https://youtu.be/" , "https://www.youtube.com/embed/", $embed);
                                                        echo' <iframe class="embed-responsive-item" width="407" height="310" src="'.$youtube_embed_link.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                                                    }
                                                    elseif(preg_match('/dailymotion/',$embed)){
                                                        $dailymotion_link=str_replace("https://www.dailymotion.com/video","https://www.dailymotion.com/embed/video/" , $embed);
                                                        echo'  <iframe class="embed-responsive-item" width="480" height="270" src="'.$dailymotion_link.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>';    
                                                    }
                                                   elseif(preg_match('/dai.ly/',$embed)){
                                                        $dailymotion_embed_link=str_replace("https://dai.ly/","https://www.dailymotion.com/embed/video/" , $embed);
                                                        echo'  <iframe class="embed-responsive-item" width="480" height="270" src="'.$dailymotion_embed_link.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>';    
                                                    }
                                                    else{
                                                        echo '
                                                        <image src="'.$embed.'" alt ="error">
                                                         ';
                                                    }
                                            ?>
                                        </div>
                                        <?php
                                        } 
                                        ?>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="video" name="video"
                                                placeholder="Enter Video Link" required value="<?=$embed ?>">
                                            <label for="video">Enter Video Link</label>
                                        </div>

                                        <div class="mb-3">
                                            <div class="row">
                                                <label for="image" class="form-label">Add Image</label>
                                                <div class="col-8">
                                                    <input type="file" class="form-control" id="image_t"
                                                        placeholder="Add Image" name="image_t">
                                                </div>

                                            </div>
                                        </div>
                                        <?php 
                                        if($image !=''){
                                            ?>
                                        <div class="mb-3">
                                            <div class="row">
                                                <image src="<?=BASE_URL.$image;?>" alt="error" width="480" height="270">
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        ?>


                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="description" name="description"
                                                placeholder="Enter Description" value="<?php echo $description;?>"
                                                required>
                                            <label for="description">Enter Description</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <textarea type="text" class="form-control" id="article" name="article"
                                                placeholder="Enter Article" required><?php echo $article ?></textarea>
                                            <label for="article">Enter Article</label>
                                        </div>

                                        <div class="mb-3">
                                            <label for="role" class="form-label">language</label>
                                            <select class="form-control" name="lang" id="lang">
                                                <option value="" selected>Select Language</option>
                                                <option value="english"
                                                    <?php echo ($lang == 'english') ? 'selected' : '' ?>>English
                                                </option>
                                                <option value="urdu" 
                                                    <?php echo ($lang == 'urdu') ? 'selected' : '' ?>>Urdu
                                                </option>
                                                <!-- Add more language options as needed -->
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="role" class="form-label">Status</label>
                                            <select class="form-control" name="status_post" id="status_post" >
                                                <option value="" >Status</option>
                                                <option value="1" <?php if($row['status_post'] == 1) echo 'selected' ?>>Pending</option>
                                                <option value="2" <?php if($row['status_post'] == 2) echo 'selected' ?>>Approve</option>
                                                <option value="3" <?php if($row['status_post'] == 3) echo 'selected' ?>>Rejected</option>
                                            </select>
                                        </div>
                                        <!-- Assign Academic -->

                                        <!-- Submit -->
                                        <div class="col-12 mb-3">
                                            <input type="submit" class="btn btn-primary" name="submit" value="Add">
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </main><!-- End #main -->


            <!-- Footer -->
            <?php 
       include(BASE_PATH .'/includes/copy_write.php')
       ?>
        </div>
    </div>
</div>
<?php

         include_once(BASE_PATH.'admin/phpScript/update_test_topic_script.php'); 

     include_once(BASE_PATH.'/includes/footer.php'); 
        ?>