<?php namespace Pur\Purmoduler\Regnskap;

class Formelregner
{

    private $a;
    private $b;
    private $x;

    public function __construct($variabler)
    {
        $this->a = isset($variabler['a']) ? (float)$variabler['a'] : 0.0;
        $this->b = isset($variabler['b']) ? (float)$variabler['b'] : 0.0;
        $this->x = isset($variabler['x']) ? (float)$variabler['x'] : 0.0;
    }


    public function brukFormel($formelNr)
    {
        $a = $this->a;
        $b = $this->b;
        $x = $this->x;

        switch ($formelNr) {
            case 1 :
                return $a;
            case 2 :
                return $a / 5;
            case 3 :
                return $a / 1.25;
            case 4 :
                return $b;
            case 5 :
                return $b / 5;
            case 6 :
                return $b / 1.25;
            case 7 :
                return -$a;
            case 8 :
                return -$a / 5;
            case 9 :
                return -$a / 1.25;
            case 10 :
                return -$b;
            case 11 :
                return -$b / 5;
            case 12 :
                return -$b / 1.25;
            case 13 :
                return $a - $b;
            case 14 :
                return -($a - $b);
            case 15 :
                return ($a - $b) * ($x / 100);
            case 16 :
                return ($a - $b) * ($x / 100) / 5;
            case 17 :
                return ($a - $b) * ($x / 100) / 1.25;
            case 18 :
                return ($a - $b) * (100 - $x) / 100;
            case 19 :
                return -($a - $b) * ($x / 100);
            case 20 :
                return -($a - $b) * ($x / 100) / 5;
            case 21 :
                return -($a - $b) * ($x / 100) / 1.25;
            case 22 :
                return -($a - $b) * (100 - $x) / 100;
            case 23 :
                return $a * 0.141;
            case 24 :
                return $a * 0.12;
            case 25 :
                return $a * 0.141 * 0.12;
            case 26 :
                return -$a * 0.141;
            case 27 :
                return -$a * 0.12;
            case 28 :
                return -$a * 0.141 * 0.12;
            default :
                return 0;
        }
    }


    /**
     * Returnerer tabell med definisjoner på klassens formler
     *
     * @return array
     */
    public static function navnAlleFormler()
    {
        return $navnAlleFormler = [
             0 => 'Velg formel',
             1 => 'a',
             2 => 'a / 5',
             3 => 'a / 1,25',
             4 => 'b',
             5 => 'b / 5',
             6 => 'b / 1,25',
             7 => '- a',
             8 => '- a / 5',
             9 => '- a / 1,25',
            10 => '- b',
            11 => '- b / 5',
            12 => '- b / 1,25',
            13 => 'a - b',
            14 => '- (a - b)',
            15 => '(a - b) * (x / 100)',
            16 => '(a - b) * (x / 100) / 5',
            17 => '(a - b) * (x / 100) / 1,25',
            18 => '(a - b) * (100 - x) / 100',
            19 => '- (a - b) * (x / 100)',
            20 => '- (a - b) * (x / 100) / 5',
            21 => '- (a - b) * (x / 100) / 1,25',
            22 => '- (a - b) * (100 - x) / 100',
            23 => 'a * 0,141',
            24 => 'a * 0,12',
            25 => 'a * 0,141 * 0,12',
            26 => '- a * 0,141',
            27 => '- a * 0,12',
            28 => '- a * 0,141 * 0,12'
        ];
    }

}