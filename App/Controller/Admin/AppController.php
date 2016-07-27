<?php

namespace App\Controller\Admin;


use App\App;

/**
 * @property \Core\Auth\DBAuth auth
 */
class AppController extends \App\Controller\AppController
{
    protected $styles = [];
    protected $scripts = [];

    /**
     * AppController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        if(!$this->isAuthorized())
            $this->forbidden();

    }

    protected function init()
    {
        /*Initialize styles and scripts for edit and create pages*/
        $this->style('//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css');
        $this->style(URI . 'froala/css/froala_editor.min.css');
        $this->style('https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css');
        $this->style(URI . 'froala/css/plugins/char_counter.css');
        $this->style(URI . 'froala/css/plugins/code_view.css');
        $this->style(URI . 'froala/css/plugins/colors.css');
        $this->style(URI . 'froala/css/plugins/emoticons.css');
        //$this->style('froala/css/plugins/file.css');
        $this->style(URI . 'froala/css/plugins/fullscreen.css');
        $this->style(URI . 'froala/css/plugins/image.css');
        $this->style(URI . 'froala/css/plugins/image_manager.css');
        $this->style(URI . 'froala/css/plugins/line_breaker.css');
        $this->style(URI . 'froala/css/plugins/quick_insert.css');
        $this->style(URI . 'froala/css/plugins/table.css');
        $this->style(URI . 'froala/css/plugins/video.css');

        $this->script('//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js');
        $this->script(URI . 'froala/js/froala_editor.min.js');
        $this->script('https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js');
        $this->script('https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js');
        $this->script(URI . 'froala/js/plugins/align.min.js');
        $this->script(URI . 'froala/js/plugins/char_counter.min.js');
        $this->script(URI . 'froala/js/plugins/code_beautifier.min.js');
        $this->script(URI . 'froala/js/plugins/code_view.min.js');
        $this->script(URI . 'froala/js/plugins/colors.min.js');
        $this->script(URI . 'froala/js/plugins/emoticons.min.js');
        $this->script(URI . 'froala/js/plugins/entities.min.js');
        //$this->script('froala/js/plugins/file.min.js');
        $this->script(URI . 'froala/js/plugins/font_family.min.js');
        $this->script(URI . 'froala/js/plugins/font_size.min.js');
        $this->script(URI . 'froala/js/plugins/fullscreen.min.js');
        $this->script(URI . 'froala/js/plugins/image.min.js');
        $this->script(URI . 'froala/js/plugins/image_manager.min.js');
        $this->script(URI . 'froala/js/plugins/inline_style.min.js');
        $this->script(URI . 'froala/js/plugins/line_breaker.min.js');
        $this->script(URI . 'froala/js/plugins/link.min.js');
        $this->script(URI . 'froala/js/plugins/lists.min.js');
        $this->script(URI . 'froala/js/plugins/paragraph_format.min.js');
        $this->script(URI . 'froala/js/plugins/paragraph_style.min.js');
        $this->script(URI . 'froala/js/plugins/quick_insert.min.js');
        $this->script(URI . 'froala/js/plugins/quote.min.js');
        $this->script(URI . 'froala/js/plugins/table.min.js');
        $this->script(URI . 'froala/js/plugins/save.min.js');
        $this->script(URI . 'froala/js/plugins/url.min.js');
        $this->script(URI . 'froala/js/plugins/video.min.js');
    }

    protected function isAuthorized()
    {
        $auth = App::getInstance()->getAuth();
        if($auth->logged()
            && (
                $auth->isOwner()
                || $auth->isAdmin()
            ))
            return true;

        return false;
    }

    protected function style($path)
    {
        $this->styles[] = $path;
    }

    protected function script($path)
    {
        $this->scripts[] = $path;
    }
}