<?php
define('ROOT', dirname(__DIR__));
define('URI', '/PHP-Mini-MVC-Framework/public/');
require '../App/App.php';
$app = \App\App::getInstance();
if(isset($_GET['p']))
    $page = $_GET['p'];
else
    $page = 'home';

/*ROOTS*/
if($page === 'home'){

}

/*BEGIN POST ROOTS*/
elseif($page === 'post.index'){
    $controller = new \App\Controller\PostController();
    $controller->index();
}elseif($page === 'post.single'){
    $controller = new \App\Controller\PostController();
    $controller->single($_GET['id']);
}elseif($page === 'post.category'){
    $controller = new \App\Controller\PostController();
    $controller->category($_GET['id']);
}/*END POST ROOTS*/

/*BEGIN Testimony ROOTS*/
elseif($page === 'testimony.index'){
    $controller = new \App\Controller\TestimonyController();
    $controller->index();
}elseif($page === 'testimony.single'){
    $controller = new \App\Controller\TestimonyController();
    $controller->single($_GET['id']);
}/*END POST ROOTS*/

/*BEGIN Page ROOTS*/
elseif($page === 'page.index'){
    $controller = new \App\Controller\PageController();
    $controller->index();
}elseif($page === 'page.single'){
    $controller = new \App\Controller\PageController();
    $controller->single($_GET['id']);
}/*END POST ROOTS*/

/*BEGIN Auth ROOTS*/
elseif($page === 'auth.login'){
    $controller = new \App\Controller\AuthController();
    $controller->login();
}/*END POST ROOTS*/

/*BEGIN Administration ROOTS*/
elseif($page === 'admin.index'){
    $controller = new \App\Controller\Admin\AdminController();
    $controller->index();
}
    /*Post admin*/
    elseif($page === 'admin.post.index'){
        $controller = new \App\Controller\Admin\PostController();
        $controller->index();
    }elseif($page === 'admin.post.edit'){
        $controller = new \App\Controller\Admin\PostController();
        $controller->edit($_GET['id']);
    }elseif($page === 'admin.post.create'){
        $controller = new \App\Controller\Admin\PostController();
        $controller->create();
    }elseif($page === 'admin.post.delete'){
        $controller = new \App\Controller\Admin\PostController();
        $controller->delete();
    }/*END POST ADMIN*/

    /*Page admin*/
    elseif($page === 'admin.page.index'){
        $controller = new \App\Controller\Admin\PageController();
        $controller->index();
    }elseif($page === 'admin.page.edit'){
        $controller = new \App\Controller\Admin\PageController();
        $controller->edit($_GET['id']);
    }elseif($page === 'admin.page.create'){
        $controller = new \App\Controller\Admin\PageController();
        $controller->create();
    }elseif($page === 'admin.page.delete'){
        $controller = new \App\Controller\Admin\PageController();
        $controller->delete();
    }/*END Page ADMIN*/

    /*Testimony admin*/
    elseif($page === 'admin.testimony.index'){
        $controller = new \App\Controller\Admin\TestimonyController();
        $controller->index();
    }elseif($page === 'admin.testimony.edit'){
        $controller = new \App\Controller\Admin\TestimonyController();
        $controller->edit($_GET['id']);
    }elseif($page === 'admin.testimony.create'){
        $controller = new \App\Controller\Admin\TestimonyController();
        $controller->create();
    }elseif($page === 'admin.testimony.delete'){
        $controller = new \App\Controller\Admin\TestimonyController();
        $controller->delete();
    }/*END Testimony ADMIN*/

    /*Category admin*/
    elseif($page === 'admin.category.index'){
        $controller = new \App\Controller\Admin\CategoryController();
        $controller->index();
    }elseif($page === 'admin.category.edit'){
        $controller = new \App\Controller\Admin\CategoryController();
        $controller->edit($_GET['id']);
    }elseif($page === 'admin.category.create'){
        $controller = new \App\Controller\Admin\CategoryController();
        $controller->create();
    }elseif($page === 'admin.category.delete'){
        $controller = new \App\Controller\Admin\CategoryController();
        $controller->delete();
    }/*END Category ADMIN*/

    /*User admin*/
    elseif($page === 'admin.user.index'){
        $controller = new \App\Controller\Admin\UserController();
        $controller->index();
    }elseif($page === 'admin.user.edit'){
        $controller = new \App\Controller\Admin\UserController();
        $controller->edit($_GET['id']);
    }elseif($page === 'admin.user.create'){
        $controller = new \App\Controller\Admin\UserController();
        $controller->create();
    }elseif($page === 'admin.user.delete'){
        $controller = new \App\Controller\Admin\UserController();
        $controller->delete();
    }/*END User ADMIN*/
/*END admin ROOTS*/