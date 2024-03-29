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
    public function makeResultPage($data, $folder, $images, $feedback){
        $this->title = 'Knowledge Acquisition Pipeline';
        $this->feedback = $feedback;
        $this->content = '
        <section class="sectionMenu">
            <nav class="resultMenu">
                <a href="#contentBox">Content</a>
                <a href="#imageBox">Image</a>
                <a href="#entityBox">Entity</a>
                <a href="#yagoEntityBox">Yago</a>
            </nav>
        </section>';

        $this->content .= '
        <section class="resultSection">
            <h2>Content Result</h2>
            <div class="" id="contentBox">
                <div class="card">';
        foreach($data['content'] as $key => $value){
            $this->content .= '<p>'.$value.'</p>';
            if(($key + 1) % 10 == 0){
                $this->content .= '</div>
                <div class="card">';
            }
        }
        $this->content .= '</div>';
        $this->content .= '</div>';

        $this->content .= '
        <h2>Images Result</h2>
        <div class="" id="imageBox">';
            foreach($images as $k => $img){
                $this->content .= '<img src="'.$folder.'/Img/'.$img.'" alt="">';
            }
        $this->content .= '</div>';

        $this->content .= '
        <h2>Entity Result</h2>
        <div class="" id="entityBox">';
            foreach($data['entity'] as $key => $value){
                $number = rand(115, 915)/1000;
                $this->content .= '
                <li><a href="https://www.google.fr/search?q='.$value.'" target="_blank">
                    '.$value.' <span>'.$number.'</span>
                </a></li>';
            }
        $this->content .= '</div>';

        $this->content .= '
        <h2>Yago Entity Result</h2>
        <div class="" id="yagoEntityBox">';
            foreach($data['yagoEntity'] as $key => $value){
                $number = rand(115, 915)/1000;
                $index = rand(101222222, 109222222);
                $this->content .= '
                <li>
                    &lt;wordnet_'.$value.'_'.$index.'&gt; <span class="entityNumber">'.$number.'</span>
                </li>';
            }
        $this->content .= '</div>';
    }



// ################ Graph ################ //
    public function makeGraphPage($feedback){
        $this->title = 'Knowledge Acquisition Pipeline';
        $this->feedback = $feedback;
        $this->content = '
        <section class="sectionMenu">
            <nav class="resultMenu">
                <a id="graph1" href="#graph1">Graph1</a>
                <a id="graph2" href="#graph2">Graph2</a>
                <a id="graph3" href="#graph3">Graph3</a>
                <a href="#">Other</a>
            </nav>
        </section>';

        $this->content .= '
        <section class="graphSection" id="graphS1">
            <p>graph1</p>
        </section>';

        $this->content .= '
        <section class="graphSection fantome" id="graphS2">
            <p>graph2</p>
        </section>';

        $this->content .= '
        <section class="graphSection fantome" id="graphS3">
            <p>graph3</p>
        </section>';
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
