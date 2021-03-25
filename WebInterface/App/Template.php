<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="App/css/Template.css"/>
    	<!-- <link rel="stylesheet" href="Responsive.css"/> -->
    	<script defer src="App/js/Upload.js"></script>
        <script defer src="App/js/Result.js"></script>
        <script defer src="App/js/Graph.js"></script>
        <script defer src="App/js/Ajax.js"></script>
    	<script src="https://kit.fontawesome.com/646143606b.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header id="topHeader">
            <nav class="menu">
                <a href="index.php">Home</a>
                <a href="index.php?action=affichageResult">Result</a>
                <a href="index.php?action=affichageGraph">Graph</a>
                <a href="index.php">Other</a>
            </nav>

            <h1><?php echo $this->title ?></h1>

            <a id="arrow" href="#topHeader"><i class="fas fa-chevron-up"></i></a>
        </header>

        <main>
            <?php echo $this->feedback ?>

            <?php echo $this->content ?>
        </main>

        <footer>
            <p>Copyright @ Moriniere Robin - Mohamed Lamine Seck</p>
        </footer>
    </body>
</html>
