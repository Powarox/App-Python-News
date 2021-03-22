<?php

namespace WebInterface\App;

class View {
    public function __construct(){
        $this->title = 'Test Librairie PHP ...name...';
        $this->content = '';
    }

// ################ Home Page ################ //
    public function makeHomePage($feedback){
        $this->title = 'Knowledge Acquisition Pipeline';
        $this->feedback = $feedback;
        $this->content = '
        <section class="link">
            <form id="linkForm" action="index.php?action=fileLink" method="post">
                <h3>Give a link here : </h3>
                <select id="linkSelect" class="" name="" value="test">
                    <option value="">Select From Exemple</option>
                    <option value="ex1">Exemple 1</option>
                    <option value="ex2">Exemple 2</option>
                    <option value="ex3">Exemple 3</option>
                </select>

                <input id="linkInputGhost" type="text" name="link[]" value=""">
                <input id="linkInput" type="text" name="link[]" value="" placeholder="http://...">
                
                <button id="linkButton" type="submit" name="button"><i class="fas fa-cog"></i> Analyse</button>
            </form>
        </section>

        <section class="upload">
            <form id="dropFileForm" action="index.php?action=upload" method="post" onsubmit="uploadFiles(event)">
                <h3>Upload your document here : </h3>
                <div id="dropFileDiv"
                ondragover="overrideDefault(event);fileHover();" ondragenter="overrideDefault(event);fileHover();" ondragleave="overrideDefault(event);fileHoverEnd();" ondrop="overrideDefault(event);fileHoverEnd();
                      addFiles(event);">
                    <label for="fileInput" id="fileLabel">
                        <i class="fas fa-upload"></i>
                        <span id="fileLabelText">
                          Choose a file or drop here
                        </span>
                        <span id="uploadStatus"></span>
                        <i class="fas fa-upload"></i>
                    </label>
                    <input type="file" name="files[]" id="fileInput" multiple onchange="addFiles(event)">
                </div>

                <progress id="progressBar"></progress>

                <input id="uploadButton" type="submit" value="Upload">
            </form>
        </section>
        ';
    }

    public function displayNeedDocument(){
        $this->POSTredirect('index.php?', '<p class="feedback">You need to upload document or give us a link, before this action</p>');
    }



// ################ Result ################ //
    public function makeResultPage($feedback){
        $this->title = 'Knowledge Acquisition Pipeline';
        $this->feedback = $feedback;
        $this->content = '
        <h2>Content Result</h2>

        <section class="previewInfo">
            <nav class="sectionMenu">
                <a href="#contentBox">Content</a>
                <a href="#imageBox">Image</a>
                <a href="#entityBox">Entity</a>
                <a href="#">IPC</a>
                <a href="#">Other</a>
            </nav>
        </section>

        <section class="resultSection">
            <div class="" id="contentBox">

            </div>

            <div class="" id="imageBox">

            </div>

            <div class="" id="entityBox">

            </div>
        </section>
        ';
    }



// ################ Graph ################ //
    public function makeGraphPage($feedback){
        $this->title = 'Knowledge Acquisition Pipeline';
        $this->feedback = $feedback;
        $this->content = '';
    }



// ################ Utilitaire ################ //
    public function render(){
        include('Template.php');
    }

    public function POSTredirect($url, $feedback){
        $_SESSION['feedback'] = $feedback;
        header("Location: ".htmlspecialchars_decode($url), true, 303);
        die;
    }
}
