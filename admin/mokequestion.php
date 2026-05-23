<?php 
          require_once dirname(__DIR__) .'/config.php';
// echo BASE_PATH;
// exit;


    // include(BASE_PATH.'db/connect.php');

     include(BASE_PATH.'db/connect.php');

    if(!isset($_SESSION['user']['email']))
    {
        header('location:index.php');
    }
        ?>

         <?php
   include_once(BASE_PATH .'/includes/header.php'); 
	ch_title("Moalym", "Make Question");
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

        include(BASE_PATH .'includes/topbar.php');
$id=$_GET['id'];
                                $query=mysqli_query($con,"select test_subject.* , test_chapter.* ,test_topic.*  from test_subject inner join test_chapter on test_subject.id = test_chapter.test_subject_id inner join test_topic on test_chapter.id = test_topic.test_chapter_id where test_topic.id='$id'");
                                $row=mysqli_fetch_assoc($query); 
        ?>



<div class="container-fluid mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-2 rounded">

            <!-- <li class="breadcrumb-item">
                <a href="dashboard.php">Dashboard</a>
            </li> -->

            <li class="breadcrumb-item">
                Moke Test
            </li>

            <li class="breadcrumb-item" >
                <a href="mokeacademic.php">Test Subject</a>
            </li>

              <li class="breadcrumb-item" >
                <a href="mokesubject.php?id=<?php echo $row['test_subject_id']; ?>"><?php echo $row['subject_name']; ?></a>
                
            </li>


              <li class="breadcrumb-item">
                <a href="mokechapter.php?id=<?php echo $row['test_chapter_id']; ?>"><?php echo $row['chapter_name']; ?></a>

               
                
            </li>

             <li class="breadcrumb-item active" aria-current="page">
                <?php echo $row['topic_name']; ?>
                
            </li>
               

        </ol>
    </nav>
</div>





            <main id="main" class="main">

                <div class="container" style="margin: auto;">

                    <div class="row ">

                        <div class="col-12">

                            <div class="card">

                                <div class="card-header">

                                    <h2>Moke Topic</h2>

                                </div>

                                <div class="card-body">
<?php 
                                        if(@$_GET['response'] != ''){
                                            echo '  <div class="alert alert-'.@$_GET['class'].'">
                                                        <strong>'.ucfirst(@$_GET['response']).'!</strong> '.@$_GET['message'].'
                                                    </div>';
                                                }
                                    ?>
                                    <form method="POST" action="<?php echo BASE_URL; ?>admin/phpScript/moke_question_script.php"
                                        enctype="multipart/form-data">
                                        <input type="hidden" name="insert_by" value="<?php echo $_SESSION['user']['id']; ?>">
                                        <div class="mb-3">
                                            <label for="role" class="form-label">Organization Name</label>
                                            <select class="form-control" name="job_title" id="job_title" required>
                                                <option value="">Select Moke</option>
                                                    <?php
                                                    $query=mysqli_query($con,"select * from moke_title");
                                                    if (mysqli_num_rows($query) > 0) {
                                                    while ($row=mysqli_fetch_assoc($query)) { 
                                                    ?>
                                                    <option value="<?php echo $row['id'];?>"><?php echo $row['job_title'];?></option>
                                                    <?php 
                                                        }
                                                    }
                                                    else{
                                                    header("location: addmoke.php?response=error&class=danger&message=First Add moke Test");
                                                    }
                                                ?>
                                            </select>
                                        </div>    

                                        <div class="col-md-12">

                                       <div class="table-wrap">

                                            <table class="table table-responsive-lg table-striped-columns">

                                                <thead style="background-color: green;">

                                                    <tr>

                                                       

                                                       

                                                        <th class="thed" scope="col">#</th>

                                                        <th scope="col">Topic Name</th>
                                                        
                                                        
                                                        
                                                        

                                                    </tr>

                                                </thead>

                                                <tbody>

                                                    <?php 
                                                    $id=$_GET['id'];
                                                $a = 1;
                                                $query=mysqli_query($con,"select * from test_question where test_topic_id='$id' and status_post = 2");
                                                    if(mysqli_num_rows($query) > 0){
                                                      while($row=mysqli_fetch_assoc($query)){ 
                                                       
                                                        echo '<tr>'

                                                        .'<td><input type="checkbox"  name="checkbox[]" value="'.$row['id'].'"> </td>'
                                                        .'<input type="hidden" name="t_id" value="'.$row['test_topic_id'].'"/>'
                                                         .'<td>'.$row['question'].'</td>'.
                                                        
                                                        '</tr>';
                                                      }
                                                      echo '<input type="hidden" name="time"  id="time"/>';
                                                    }
                                                    // print_r($view_subject);  

                                                   

                                                    

                                                    // print_r(view_subject($con,'academic'));

                                                    

                                                    ?>

                                                </tbody>

                                            </table>

                                        </div>



                                    </div>
                                        
                                        <!-- Submit -->
                                        <div class="col-12 mb-3">
                                            <input type="submit" class="btn btn-primary" name="t_submit" value="Add">
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

       include(BASE_PATH .'includes/copy_write.php')

       ?>

        </div>

    </div>

</div>
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

            <script type="text/javascript">
            $(document).ready(function(e){
                    
                    $('#job_title').on('change', function(e){
                        //console.log(e);
                        var job_title = e.target.value;
                        //console.log(job_ads_id);
                        $.get('ajax/mokeServer.php?id='+job_title, function(data){
                            //console.log(data);
                            var result = JSON.parse(data);
                            //console.log(result);
                            //$('#subject').empty();  
                            for(var i=0 ;i<result.length ; i++ ){
                                //console.log(result[i].id);
                                //$('#subject').append('<option value = "'+result[i].id+'">'+result[i].subject_name+'</option>');
                                $('#time').val(result[i].time);
                                
                            }
                        });
                    });
                });
            </script>
<?php
         include_once(BASE_PATH.'/includes/footer.php'); 

    ?>