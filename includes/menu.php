<?php
$menu = [

    // Dashboard (for logged-in data users)
    [
        'title' => 'Dashboard',
        'icon'  => 'fas fa-fw fa-tachometer-alt',
        'link'  => 'index.php',
        'show'  => isset($_SESSION['data'])
    ],

    // Test Module
    [
        'title' => 'Test Management',
        'icon'  => 'fas fa-chart-area',
        'show'  => isset($_SESSION['data']),
        'submenu' => [
            ['title' => 'Add Subject', 'link' => 'add_test_subject.php'],
            ['title' => 'View Subject', 'link' => 'view_test_subject.php'],
            ['title' => 'Add Chapter', 'link' => 'add_test_chapter.php'],
            ['title' => 'View Chapter', 'link' => 'view_test_chapter.php'],
            ['title' => 'Add Topic', 'link' => 'add_test_topic.php'],
            ['title' => 'View Topic', 'link' => 'view_test_topic.php'],
            ['title' => 'Add Question', 'link' => 'add_test_question.php'],
            ['title' => 'View Question', 'link' => 'view_test_question.php'],
        ]
    ],

    // Admin Panel
    [
        'title' => 'User',
        'icon'  => 'fas fa-user',
        'show'  => (@$_SESSION['user']['role'] == 'admin'),
        'submenu' => [
            ['title' => 'View User', 'link' => 'viewuser.php'],
            ['title' => 'Add User', 'link' => 'adduser.php'],
        ]
    ],

    [
        'title' => 'Education',
        'icon'  => 'fas fa-graduation-cap',
        'show'  => (@$_SESSION['user']['role'] == 'admin'),
        'submenu' => [
            ['title' => 'Add Academy', 'link' => 'addacademic.php'],
            ['title' => 'View Academy', 'link' => 'viewacademic.php'],
            ['title' => 'Add Subject', 'link' => 'addsubject.php'],
            ['title' => 'View Subject', 'link' => 'viewsubject.php'],
            ['title' => 'Add Chapter', 'link' => 'addchapter.php'],
            ['title' => 'View Chapter', 'link' => 'viewchapter.php'],
            ['title' => 'Add Topic', 'link' => 'addtopic.php'],
            ['title' => 'View Topic', 'link' => 'viewtopic.php'],
            ['title' => 'Add Question', 'link' => 'addquestion.php'],
            ['title' => 'View Question', 'link' => 'viewquestion.php'],
        ]
    ],

    [
        'title' => 'Moke',
        'icon'  => 'fas fa-user',
        'show'  => (@$_SESSION['user']['role'] == 'admin'),
        'submenu' => [
            ['title' => 'Add Moke', 'link' => 'addmoke.php'],
            ['title' => 'Moke Academic', 'link' => 'mokeacademic.php'],
            ['title' => 'Moke List', 'link' => 'mokelist.php'],
        ]
    ],

    // Logout
    [
        'title' => 'Logout',
        'icon'  => 'fas fa-right-from-bracket',
        'link'  => 'logout.php',
        'show'  => true
    ]
];


function renderMenu($menu) {
    foreach ($menu as $index => $item) {

        if (!$item['show']) continue;

        // If submenu exists
        if (isset($item['submenu'])) {
            $menuId = 'menu_' . $index;

            echo '
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" 
                   data-bs-toggle="collapse" 
                   data-bs-target="#'.$menuId.'">
                   
                    <i class="'.$item['icon'].'"></i>
                    <span>'.$item['title'].'</span>
                </a>

                <div id="'.$menuId.'" class="collapse" data-bs-parent="#accordionSidebar">';

            foreach ($item['submenu'] as $sub) {
                echo '<a class="nav-link ps-4" href="'.$sub['link'].'">'.$sub['title'].'</a>';
            }

            echo '</div></li>';

        } else {
            // Normal link
            echo '
            <li class="nav-item">
                <a class="nav-link" href="'.$item['link'].'">
                    <i class="'.$item['icon'].'"></i>
                    <span>'.$item['title'].'</span>
                </a>
            </li>';
        }
    }
}

?>