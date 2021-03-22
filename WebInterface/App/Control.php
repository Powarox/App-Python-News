<?php

namespace WebInterface\App;

class Control {
    protected $view;
    protected $feedback;

    public function __construct($view){
        $this->view = $view;

        $feedback = key_exists('feedback', $_SESSION) ? $_SESSION['feedback'] : '';
        $this->feedback = $feedback;
        $_SESSION['feedback'] = '';
    }

    public function execute(){
        if(key_exists('action', $_GET)  && $_GET['action'] != null){
            $action = $_GET['action'];
            if(method_exists($this->view, $action)){
                $this->view->$action();
            }
            else if(method_exists($this, $action)){
                $this->$action();
            }
            else {
                $this->defaultAction();
            }
        }
        else {
            $this->defaultAction();
        }
        $this->view->render();
    }

// ################ Default Action ################ //
    public function defaultAction(){
        $this->view->makeHomePage($this->feedback);
    }

    public function fileLink(){
        $_SESSION['upload'] = 'link';
        $exemple = $_POST;

        // var_dump($exemple['link'][0]);

        $folder = 'File/'.$exemple['link'][0];
        $file = 'JsonContentFile.json';
        $filePath = $folder . $file;



        $this->view->makeResultPage($this->feedback);
    }

    public function upload(){
        $_SESSION['upload'] = 'upload';
        // action ...

        $this->view->makeResultPage($this->feedback);
    }


    public function affichageResult(){
        if(empty($_SESSION['upload'])){
            $this->view->displayNeedDocument();
        }

        $this->view->makeResultPage($this->feedback);
    }


    public function affichageGraph(){
        if(empty($_SESSION['upload'])){
            $this->view->displayNeedDocument();
        }

        $this->view->makeGraphPage($this->feedback);
    }
}
