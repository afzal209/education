
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar Brand - Admin -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
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
            <img src="<?=$_SESSION['data']['social']['picture'] ?>" alt="" width="40px" height="40px">
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



    <!-- Nav Item - Dashboard -->
    <?php 
    //  print_r($_SESSION);
     if(isset($_SESSION['data'])){
        ?>
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>




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
    <?php
     }
     else{
        if (@$_SESSION['user']['role'] == 'admin') {
        ?>
    <li class="nav-item">

        <a class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#userMenu" role="button"
            aria-expanded="false" aria-controls="userMenu">

            <i class="fas fa-user"></i>
            User
        </a>

        <div id="userMenu" class="collapse" data-bs-parent="#accordionSidebar">

            <a class="nav-link" href="viewuser.php">View User</a>
            <a class="nav-link" href="adduser.php">Add User</a>

        </div>

    </li>
   <li class="nav-item">

    <a class="nav-link collapsed"
       data-bs-toggle="collapse"
       data-bs-target="#educationMenu"
       role="button">

        <i class="fas fa-graduation-cap"></i>
        Education
    </a>

    <div id="educationMenu" class="collapse" data-bs-parent="#accordionSidebar">

        <!-- Academy -->
        <a class="nav-link collapsed ps-3"
           data-bs-toggle="collapse"
           data-bs-target="#academyMenu">
            Academy
        </a>

        <div id="academyMenu" class="collapse ps-4">

            <a class="nav-link ps-5" href="addacademic.php">Add Academy</a>
            <a class="nav-link ps-5" href="viewacademic.php">View Academy</a>

        </div>

        <!-- Subject -->
        <a class="nav-link collapsed ps-3"
           data-bs-toggle="collapse"
           data-bs-target="#subjectMenu">
            Subject
        </a>

        <div id="subjectMenu" class="collapse ps-4">

            <a class="nav-link ps-5" href="subject_add.php">Add</a>
            <a class="nav-link ps-5" href="subject_view.php">View</a>

        </div>

        <!-- Topic -->
        <a class="nav-link collapsed ps-3"
           data-bs-toggle="collapse"
           data-bs-target="#topicMenu">
            Topic
        </a>

        <div id="topicMenu" class="collapse ps-4">

            <a class="nav-link ps-5" href="topic_add.php">Add</a>
            <a class="nav-link ps-5" href="topic_view.php">View</a>

        </div>

    </div>

</li>
    
    <?php
        }
     }
     ?>



    <li class="nav-item">
        <a class="nav-link" href="logout.php">
            <i class="fas fa-right-from-bracket" aria-hidden="true"></i>
            <span>Logout</span></a>
    </li>

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>





