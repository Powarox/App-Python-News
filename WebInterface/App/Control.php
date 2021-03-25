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

        if($exemple['link'][0] == ''){
            $_SESSION['folder'] = 'Ex1';
        }
        else{
            $_SESSION['folder'] = $exemple['link'][0];
        }

        $this->affichageResult();
    }

    public function upload(){
        $_SESSION['upload'] = 'upload';
        // action ...

        $this->affichageResult();
    }


    public function affichageResult(){
        if(empty($_SESSION['upload'])){
            $this->view->displayNeedDocument();
        }
        else{
            $folder = 'App/Files/'.$_SESSION['folder'];
            $file = '/JsonContentFile.json';
            $filePath = $folder . $file;

            $jsonData = file_get_contents($filePath);
            $data = json_decode($jsonData, true);

            $images = $this->getImagesName($_SESSION['folder']);

            $this->view->makeResultPage($data, $folder, $images, $this->feedback);
        }
    }


    public function affichageGraph(){
        if(empty($_SESSION['upload'])){
            $this->view->displayNeedDocument();
        }

        $this->view->makeGraphPage($this->feedback);
    }





    public function getImagesName($folder){
        $files = scandir(__DIR__ .'/Files//'.$folder.'/Img');
        if (!empty($files)) {
            $elemAutre = array_shift($files);
            $elemAutre = array_shift($files);
        }
        return $files;
    }
}
