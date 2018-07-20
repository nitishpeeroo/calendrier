<?php

namespace App\Date;

class Month {

    private $months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
    private $month;
    private $year;

    /**
     * Month constructor
     * @param int $month Le mois compris entre 1 et 12
     * @param int $year  L'année supérieur 1970
     * @throws \Exception
     */
    public function __construct($month = -null, $year = null) {
        if ($month === null || !is_numeric($month)) {
            $month = intval(date('m'));
        }
        if ($year === null || !is_numeric($year)) {
            $year = intval(date('Y'));
        }
       
        if ($month < 1 || $month > 12) {
            $month = $month % 12;
        }

        if ($year < 1970) {
            throw new \Exception("L'année $year n'est pas valide");
        }
        $this->month = abs($month);
        $this->year = abs($year);
    }

    public function toString() {
        return $this->months[$this->month - 1] . " " . $this->year;
    }

}
