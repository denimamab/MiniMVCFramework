<?php

namespace Core\Controller;

class Controller
{
    protected $viewPath;
    protected $layoutPath;
    protected $layout;

    public function render($view, $args=[]){
        ob_start();
        extract($args);
        $_view = str_replace('.','/',$view);
        require $this->viewPath . '/' . $_view . '.php';
        $content = ob_get_clean();
       # $_view = explode('/',$_view);
        require $this->layoutPath . '/' . $this->layout . '/inc/header.php';
        #require $this->layoutPath . '/' . $this->layout . '/' . current($_view) . '/' . end($_view) .'.php';
        #require $this->layoutPath . '/' . $this->layout . '/' . $_view .'.php';
        require $this->layoutPath . '/' . $this->layout . '/index.php';
        require $this->layoutPath . '/' . $this->layout . '/inc/footer.php';
    }

    protected function forbidden(){
        header('HTTP/1.0 404 Forbidden');
        die('Access denied.');
    }

    protected function notFound(){
        header('HTTP/1.0 404 Not Found');
        require $this->layoutPath . '/' . $this->layout . '/' . '404.php';
        die();
    }

}