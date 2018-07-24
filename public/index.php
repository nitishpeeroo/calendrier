<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/calendar.css"/>

        <title>Mon super Calendrier</title>
    </head>
    <body>
        <nav class="navbar navbar-dark bg-primary nb-3">
            <a href="/index.php" class="navbar-brand">Mon calendrier</a>
        </nav>

        <?php
        require '../src/Date/Month.php';

        if (!isset($_GET['month'])) {
            $_GET['month'] = null;
        }
        if (!isset($_GET['year'])) {
            $_GET['year'] = null;
        }
        $month = new App\Date\Month($_GET['month'], $_GET['year']);
        $start = $month->getStartingDay()->modify("last monday");
        ?>
        <div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
             <h1><?= $month->toString(); ?></h1>
             <div>
                 <a href="" class="btn btn-primary">&lt;</a>
                 <a href="" class="btn btn-primary">&gt;</a>
             </div>
        </div>
       
        <table class="calendar__table calendar__table--<?= $month->getWeeks(); ?>weeks">
            <?php for ($i = 0; $i < $month->getWeeks(); $i++): ?>
                <tr>
                    <?php foreach ($month->days as $k => $day): ?>
                        <td> 
                            <?php if ($i === 0) { ?>
                                <div class="calendar__weekDay">
                                    <?=
                                    $day;
                                }
                                ?>
                            </div>
                            <div class="calendar__day">
                                <?php
                                $day = clone $start;
                                echo $day->modify("+" . ($k + $i * 7) . " days")->format('d');
                                ?>
                            </div>
                        </td>
                    <?php endforeach; ?>            
                </tr>
            <?php endfor; ?>
        </table>
    </body>
</html>