
<style>
/* Sidebar */


.nav-link.active{    background: #4e73df;    color: #fff !important;    border-radius: 5px;}.nav-link.active i{    color: #fff !important;}
</style>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">

        <?php 
        if (isset($_SESSION['data']['local'])) {
        ?>

        <div class="sidebar-brand-icon">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQv7kL-nf9YogeeALYYGIWQ1eWO7CZ_qQhsng&usqp=CAU"
                width="40" height="40">
        </div>

        <div class="sidebar-brand-text mx-3">
            <?= $_SESSION['data']['local']['username'] ?>
        </div>

        <?php
        } elseif(isset($_SESSION['data']['social'])) {
        ?>

        <div class="sidebar-brand-icon">
            <img src="<?= $_SESSION['data']['social']['picture'] ?>" width="40" height="40">
        </div>

        <div class="sidebar-brand-text mx-3">
            <?= $_SESSION['data']['social']['full_name'] ?>
        </div>

        <?php
        } else {
        ?>

        <div class="sidebar-brand-icon">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQv7kL-nf9YogeeALYYGIWQ1eWO7CZ_qQhsng&usqp=CAU"
                width="40" height="40">
        </div>

        <div class="sidebar-brand-text mx-3">
            Admin
        </div>

        <?php } ?>

    </a>

    <?php 
    if(isset($_SESSION['data'])){
    ?>

    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
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
    } else {

    if (@$_SESSION['user']['role'] == 'admin') {
    ?>

    <!-- USER MENU -->
   <li class="nav-item">
    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'viewuser.php' ? 'active' : ''; ?>" href="viewuser.php">
        <i class="fas fa-user"></i>
        <span>View User</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'adduser.php' ? 'active' : ''; ?>" href="adduser.php">
        <i class="fas fa-user-plus"></i>
        <span>Add User</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'addacademic.php' ? 'active' : ''; ?>" href="addacademic.php">
        <i class="fas fa-graduation-cap"></i>
        <span>Add Academy</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'viewacademic.php' ? 'active' : ''; ?>" href="viewacademic.php">
        <i class="fas fa-graduation-cap"></i>
        <span>View Academy</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'addsubject.php' ? 'active' : ''; ?>" href="addsubject.php">
        <i class="fas fa-book"></i>
        <span>Add Subject</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'viewsubject.php' ? 'active' : ''; ?>" href="viewsubject.php">
        <i class="fas fa-book"></i>
        <span>View Subject</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'addchapter.php' ? 'active' : ''; ?>" href="addchapter.php">
        <i class="fas fa-file-alt"></i>
        <span>Add Chapter</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'viewchapter.php' ? 'active' : ''; ?>" href="viewchapter.php">
        <i class="fas fa-file-alt"></i>
        <span>View Chapter</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'addtopic.php' ? 'active' : ''; ?>" href="addtopic.php">
        <i class="fas fa-list"></i>
        <span>Add Topic</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'viewtopic.php' ? 'active' : ''; ?>" href="viewtopic.php">
        <i class="fas fa-list"></i>
        <span>View Topic</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'addquestion.php' ? 'active' : ''; ?>" href="addquestion.php">
        <i class="fas fa-question-circle"></i>
        <span>Add Question</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'viewquestion.php' ? 'active' : ''; ?>" href="viewquestion.php">
        <i class="fas fa-question-circle"></i>
        <span>View Question</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'addmoke.php' ? 'active' : ''; ?>" href="addmoke.php">
        <i class="fas fa-book-open"></i>
        <span>Add Moke</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'mokeacademic.php' ? 'active' : ''; ?>" href="mokeacademic.php">
        <i class="fas fa-school"></i>
        <span>Moke Academic</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'mokelist.php' ? 'active' : ''; ?>" href="mokelist.php">
        <i class="fas fa-list-alt"></i>
        <span>Moke List</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'testsubject.php' ? 'active' : ''; ?>" href="testsubject.php">
        <i class="fas fa-book"></i>
        <span>Add Test Subject</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'viewtestsubject.php' ? 'active' : ''; ?>" href="viewtestsubject.php">
        <i class="fas fa-book"></i>
        <span>View Test Subject</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'testchapter.php' ? 'active' : ''; ?>" href="testchapter.php">
        <i class="fas fa-file-alt"></i>
        <span>Add Test Chapter</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'viewtestchapter.php' ? 'active' : ''; ?>" href="viewtestchapter.php">
        <i class="fas fa-file-alt"></i>
        <span>View Test Chapter</span>
    </a>
</li>



<li class="nav-item">
    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'testtopic.php' ? 'active' : ''; ?>" href="testtopic.php">
        <i class="fas fa-file-alt"></i>
        <span>Add Test Topic</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'viewtesttopic.php' ? 'active' : ''; ?>" href="viewtesttopic.php">
        <i class="fas fa-file-alt"></i>
        <span>View Test Topic</span>
    </a>
</li>


<li class="nav-item">
    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'testquestion.php' ? 'active' : ''; ?>" href="testquestion.php">
        <i class="fas fa-file-alt"></i>
        <span>Add Test Question</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'viewtestquestion.php' ? 'active' : ''; ?>" href="viewtestquestion.php">
        <i class="fas fa-file-alt"></i>
        <span>View Test Question</span>
    </a>
</li>

    <?php
        }
    }
    ?>

    <!-- LOGOUT -->
    <li class="nav-item">

        <a class="nav-link" href="logout.php">

            <i class="fas fa-right-from-bracket"></i>
            <span>Logout</span>

        </a>

    </li>

    <!-- Sidebar Toggle -->
    <div class="text-center d-none d-md-inline">

        <button class="rounded-circle border-0" id="sidebarToggle"></button>

    </div>

</ul>