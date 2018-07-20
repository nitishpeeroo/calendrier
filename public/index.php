<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
        <title>Mon super Calendrier</title>
    </head>
    <body>
        <nav class="navbar navbar-dark bg-primary nb-3">
            <a href="/index.php" class="navbar-brand">Mon calendrier</a>
        </nav>

        <?php
        require '../src/Date/Month.php';
         
        if(!isset($_GET['month'])){
            $_GET['month'] = null;
        }
         if(!isset($_GET['year'])){
            $_GET['year'] = null;
        }
        $month = new App\Date\Month($_GET['month'] ,$_GET['year']);
        ?>
        
        <h1><?= $month->toString(); ?></h1>
        <h2><?= $month->getWeeks(); ?></h2>
        
    </body>
</html>