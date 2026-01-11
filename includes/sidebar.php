<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar Brand - Admin -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../pages/index.php">
        <?php 
        // print_r($_SESSION);
        if (isset($_SESSION['data']['local']) ) {
            ?>
            <div class="sidebar-brand-icon ">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQv7kL-nf9YogeeALYYGIWQ1eWO7CZ_qQhsng&usqp=CAU"
                alt="" width="40px" height="40px">
        </div>
        <div class="sidebar-brand-text mx-3"> <?=$_SESSION['data']['local']['username']?> </div>
             
            <?php
        }
        elseif(isset($_SESSION['data']['social'])){
            ?>
            <div class="sidebar-brand-icon ">
            <img src="<?=$_SESSION['data']['social']['picture'] ?>"
                alt="" width="40px" height="40px">
        </div>
        <div class="sidebar-brand-text mx-3"> <?=$_SESSION['data']['social']['full_name']?> </div>
            <?php
        }
        else{
            ?>
           <div class="sidebar-brand-icon ">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQv7kL-nf9YogeeALYYGIWQ1eWO7CZ_qQhsng&usqp=CAU"
                alt="" width="40px" height="40px">
        </div>
        <div class="sidebar-brand-text mx-3"> Admin</div>
            <?php
        }
        
        ?>

    </a>

    <!-- Divider -->
    <!--<hr class="sidebar-divider my-0">-->

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>


    <!-- Divider -->
    <!-- <hr class="sidebar-divider"> -->

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
        Interface
    </div> -->
    
    <li class="nav-item">
        <a class="nav-link" href="add_test_subject.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Add Test Subject</span></a>
    </li>
     <li class="nav-item">
        <a class="nav-link" href="view_test_subject.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>View Test Subject</span></a>
    </li>
     <li class="nav-item">
        <a class="nav-link" href="add_test_chapter.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Add Test Chapter</span></a>
    </li>
     <li class="nav-item">
        <a class="nav-link" href="view_test_chapter.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>View Test Chapter</span></a>
    </li>
     <li class="nav-item">
        <a class="nav-link" href="add_test_topic.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Add Test topic</span></a>
    </li>
     <li class="nav-item">
        <a class="nav-link" href="view_test_topic.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>view Test Topic</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="add_test_question.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Add Test question</span></a>
    </li>
     <li class="nav-item">
        <a class="nav-link" href="view_test_question.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>View Test Question</span></a>
    </li>
    
<!--<li class="nav-item">-->
<!--    <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#testMenu" aria-expanded="false" aria-controls="testMenu">-->
<!--        <i class="fas fa-fw fa-book"></i>-->
<!--        <span>Test Preparation</span>-->
<!--    </a>-->
<!--    <div id="testMenu" class="collapse">-->
<!--        <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#testMenu1" aria-expanded="false" aria-controls="testMenu">-->
<!--        <i class="fas fa-fw fa-book"></i>-->
<!--        <span>Subject</span>-->
<!--    </a>-->
<!--        <div id="testMenu1" class="collapse">-->
<!--            <div class="bg-white py-2 collapse-inner rounded">-->
<!--                <a class="collapse-item" href="add_test_subject.php"><i class="fas fa-fw fa-plus"></i> Add Test Subject</a>-->
                
<!--                <a class="collapse-item" href="view_test_subject.php"><i class="fas fa-fw fa-plus"></i> View Test Subject</a>-->
               
<!--            </div>-->
<!--        </div>-->
<!--        <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#testMenu2" aria-expanded="false" aria-controls="testMenu">-->
<!--        <i class="fas fa-fw fa-book"></i>-->
<!--        <span>Chapter</span>-->
<!--    </a>-->
<!--        <div id="testMenu2" class="collapse">-->
            
<!--            <div class="bg-white py-2 collapse-inner rounded">-->
<!--            <a class="collapse-item" href="add_test_chapter.php"><i class="fas fa-fw fa-folder"></i> Add Test Chapter</a>-->
<!--            <a class="collapse-item" href="view_test_chapter.php"><i class="fas fa-fw fa-plus"></i> View Test Chapter</a>-->
<!--            </div>-->
<!--        </div>    -->
<!--         <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#testMenu3" aria-expanded="false" aria-controls="testMenu">-->
<!--        <i class="fas fa-fw fa-book"></i>-->
<!--        <span>Topic</span>-->
<!--    </a>-->
<!--        <div id="testMenu3" class="collapse">-->
<!--            <div class="bg-white py-2 collapse-inner rounded">-->
<!--            <a class="collapse-item" href="add_test_topic.php"><i class="fas fa-fw fa-folder"></i> Add Test topic</a>-->
<!--            <a class="collapse-item" href="view_test_topic.php"><i class="fas fa-fw fa-plus"></i> View Test Topic</a>-->
<!--            </div>-->
<!--        </div>   -->
<!--         <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#testMenu4" aria-expanded="false" aria-controls="testMenu">-->
<!--        <i class="fas fa-fw fa-book"></i>-->
<!--        <span>Question</span>-->
<!--    </a>-->
<!--        <div id="testMenu4" class="collapse">-->
<!--            <div class="bg-white py-2 collapse-inner rounded">-->
<!--             <a class="collapse-item" href="add_test_question.php"><i class="fas fa-fw fa-folder"></i> Add Test Question</a>-->
<!--              <a class="collapse-item" href="view_test_question.php"><i class="fas fa-fw fa-folder"></i> View Test Question</a>-->
<!--            </div>-->
<!--        </div>   -->
<!--    </div>-->
<!--</li>-->
    <!--<li class="nav-item">-->
    <!--    <a class="nav-link" href="add_test_subject.php">-->
    <!--        <i class="fas fa-fw fa-chart-area"></i>-->
    <!--        <span>Add Test Subject</span></a>-->
    <!--</li>-->
    <!--<li class="nav-item">-->
    <!--    <a class="nav-link" href="add_test_chapter.php">-->
    <!--        <i class="fas fa-fw fa-chart-area"></i>-->
    <!--        <span>Add Test Chapter</span></a>-->
    <!--</li>-->
    <!--<li class="nav-item">-->
    <!--    <a class="nav-link" href="add_academic.php">-->
    <!--        <i class="fas fa-fw fa-chart-area"></i>-->
    <!--        <span>Add Academic</span></a>-->
    <!--</li>-->
    <!--<li class="nav-item">-->
    <!--    <a class="nav-link" href="view_subject.php">-->
    <!--        <i class="fas fa-fw fa-chart-area"></i>-->
    <!--        <span>View Subject</span></a>-->
    <!--</li>-->
    <!--<li class="nav-item">-->
    <!--    <a class="nav-link" href="add_subject.php">-->
    <!--        <i class="fas fa-fw fa-chart-area"></i>-->
    <!--        <span>Add Subject</span></a>-->
    <!--</li>-->
    <!--<li class="nav-item">-->
    <!--    <a class="nav-link" href="view_chapter.php">-->
    <!--        <i class="fas fa-fw fa-chart-area"></i>-->
    <!--        <span>View Chapter</span></a>-->
    <!--</li>-->
    <!--<li class="nav-item">-->
    <!--    <a class="nav-link" href="add_chapter.php">-->
    <!--        <i class="fas fa-fw fa-chart-area"></i>-->
    <!--        <span>Add Chapter</span></a>-->
    <!--</li>-->
    <!--<li class="nav-item">-->
    <!--    <a class="nav-link" href="view_topic.php">-->
    <!--        <i class="fas fa-fw fa-chart-area"></i>-->
    <!--        <span>View Topic</span></a>-->
    <!--</li>-->
    <!--<li class="nav-item">-->
    <!--    <a class="nav-link" href="add_topic.php">-->
    <!--        <i class="fas fa-fw fa-chart-area"></i>-->
    <!--        <span>Add Topic</span></a>-->
    <!--</li>-->
    <!--<li class="nav-item">-->
    <!--    <a class="nav-link" href="view_question.php">-->
    <!--        <i class="fas fa-fw fa-chart-area"></i>-->
    <!--        <span>View Question</span></a>-->
    <!--</li>-->
    <!--<li class="nav-item">-->
    <!--    <a class="nav-link" href="add_question.php">-->
    <!--        <i class="fas fa-fw fa-chart-area"></i>-->
    <!--        <span>Add Question</span></a>-->
    <!--</li>-->

    <!-- <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item">
        <a class="nav-link" href="./report_list.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Create </span></a>
    </li> -->
    <li class="nav-item">
        <a class="nav-link" href="logout.php">
            <i class="fas fa-fw fa-chart-area" aria-hidden="true"></i>
            <span>Logout</span></a>
    </li>

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>

<script>
    $(document).ready(function () {
        $(".nav-link[data-bs-toggle='collapse']").click(function () {
            var target = $(this).attr("data-bs-target");
            $(target).collapse("toggle");
        });
    });
</script>