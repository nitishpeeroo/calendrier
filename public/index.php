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

        <h1><?= $month->toString(); ?></h1>
        <table class="calendar__table">
            <?php for ($i = 0; $i < $month->getWeeks(); $i++): ?>
                <tr>
                    <?php foreach ($month->days as $k => $day): ?>
                        <?php if ($month->getWeeks() == 6) { ?>
                            <td class='calendar__6weekDay'> 
                            <?php } else { ?>
                            <td >
                            <?php } ?>
                            <?php if ($i === 0) { ?>
                                <div class="calendar__weekDay">
                                    <?=
                                    $day;
                                }
                                ?>
                            </div>


                            <div class="calendar__day">
                                <?php
                                $d = clone $start;
                                echo $d->modify("+" . ($k + $i * 7) . " days")->format('d');
                                ?>
                            </div>
                        </td>
                    <?php endforeach; ?>            
                </tr>
            <?php endfor; ?>
        </table>
    </body>
</html>